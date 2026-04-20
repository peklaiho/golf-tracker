<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;

/**
 * Courses Controller
 *
 * @property \App\Model\Table\CoursesTable $Courses
 */
class CoursesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Courses->find('all', order: ['Courses.name' => 'ASC'], contain: ['CourseHoles', 'CourseTees', 'CourseTees.Rounds']);
        $courses = $this->paginate($query);

        // Calculate distances by tee
        $distances = [];
        $distanceRows = $this->fetchTable('CourseHoleDistances')
            ->find()->all();
        foreach ($distanceRows as $row) {
            $distances[$row->course_tee_id] = ($distances[$row->course_tee_id] ?? 0) + $row['distance'];
        }

        $this->set(compact('courses', 'distances'));
    }

    /**
     * View method
     *
     * @param string|null $id Course id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $course = $this->Courses->get($id, contain: ['CourseHoles', 'CourseTees']);
        $distances = $this->getDistances($course);
        $this->set(compact('course', 'distances'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $course = $this->Courses->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $course = $this->Courses->patchEntity($course, [
                'name' => $data['name'],
            ]);
            if ($this->Courses->save($course) && $this->createHoles($course->id, $data['number_of_holes'])) {
                $this->Flash->success(__('The course has been saved.'));

                return $this->redirect(['action' => 'edit', $course->id]);
            }
            $this->Flash->error(__('The course could not be saved. Please, try again.'));
        }
        $this->set(compact('course'));
    }

    public function addTee($id)
    {
        $course = $this->Courses->get($id, contain: ['CourseTees']);

        $courseTeesTable = $this->fetchTable('CourseTees');
        $tee = $courseTeesTable->newEmptyEntity();
        $courseTeesTable->patchEntity($tee, [
            'course_id' => $id,
            'name' => 'Unnamed',
            'order' => count($course->course_tees),
        ]);
        $courseTeesTable->save($tee);

        return $this->redirect(['action' => 'edit', $id]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Course id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $course = $this->Courses->get($id, contain: ['CourseHoles', 'CourseTees']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $course = $this->Courses->patchEntity($course, [
                'name' => $data['name'],
            ]);
            if ($this->Courses->save($course) && $this->saveHoles($data['course_holes']) &&
                $this->saveTees($data['course_tees']) && $this->saveDistances($data['distances'])) {
                $this->Flash->success(__('The course has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The course could not be saved. Please, try again.'));
        }
        $distances = $this->getDistances($course);
        $this->set(compact('course', 'distances'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Course id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $course = $this->Courses->get($id);
        if ($this->Courses->delete($course)) {
            $this->Flash->success(__('The course has been deleted.'));
        } else {
            $this->Flash->error(__('The course could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    private function createHoles($id, $qty): bool
    {
        $connection = ConnectionManager::get('default');

        for ($i = 1; $i <= $qty; $i++) {
            $connection->insert('course_holes', [
                'course_id' => $id,
                'number' => $i,
                'par' => 4,
                'hcp' => 0,
            ]);
        }

        return true;
    }

    private function getDistances($course): array
    {
        $result = [];

        $holeIds = array_map(fn ($a) => $a->id, $course->course_holes);
        $teeIds = array_map(fn ($a) => $a->id, $course->course_tees);

        if (empty($holeIds) || empty($teeIds)) {
            return $result;
        }

        $existing = $this->fetchTable('CourseHoleDistances')
            ->find()
            ->where([
                'course_hole_id IN' => $holeIds,
                'course_tee_id IN' => $teeIds,
            ])
            ->all();

        foreach ($existing as $distance) {
            $result[$distance->course_hole_id][$distance->course_tee_id] = $distance->distance;
        }

        return $result;
    }

    private function saveDistances($distances): bool
    {
        $connection = ConnectionManager::get('default');

        $sql = 'INSERT INTO course_hole_distances (course_hole_id, course_tee_id, distance) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE distance = ?';

        foreach ($distances as $holeId => $tees) {
            foreach ($tees as $teeId => $value) {
                $connection->execute($sql, [
                    $holeId,
                    $teeId,
                    $value,
                    $value,
                ]);
            }
        }

        return true;
    }

    private function saveHoles($holes): bool
    {
        $connection = ConnectionManager::get('default');

        $sql = 'UPDATE course_holes SET par = ?, hcp = ? WHERE id = ?';

        foreach ($holes as $id => $data) {
            $connection->execute($sql, [
                $data['par'],
                $data['hcp'],
                $id,
            ]);
        }

        return true;
    }

    private function saveTees($tees): bool
    {
        $connection = ConnectionManager::get('default');

        $sql = 'UPDATE course_tees SET name = ? WHERE id = ?';

        foreach ($tees as $id => $data) {
            $connection->execute($sql, [
                $data['name'],
                $id,
            ]);
        }

        return true;
    }
}
