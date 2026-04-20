<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;

/**
 * Rounds Controller
 *
 * @property \App\Model\Table\RoundsTable $Rounds
 */
class RoundsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Rounds->find('all', order: ['Rounds.tee_time' => 'DESC'], contain: ['Players', 'CourseTees', 'CourseTees.Courses', 'RoundHoles', 'RoundHoles.CourseHoles']);
        $rounds = $this->paginate($query);

        $this->set(compact('rounds'));
    }

    /**
     * View method
     *
     * @param string|null $id Round id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $round = $this->Rounds->get($id, contain: ['Players', 'CourseTees', 'CourseTees.Courses', 'RoundHoles', 'RoundHoles.CourseHoles']);
        $this->set(compact('round'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $round = $this->Rounds->newEmptyEntity();

        if ($this->request->is('post')) {
            $round = $this->Rounds->patchEntity($round, $this->request->getData());
            if ($this->Rounds->save($round) && $this->createHoles($round)) {
                $this->Flash->success(__('The round has been saved.'));

                return $this->redirect(['action' => 'edit', $round->id]);
            }
            $this->Flash->error(__('The round could not be saved. Please, try again.'));
        }

        $players = $this->Rounds->Players->find('list')->all();

        $courses = $this->fetchTable('Courses')->find('all', order: ['Courses.name' => 'ASC'], contain: 'CourseTees')->all();
        $courseTees = [];
        foreach ($courses as $course) {
            foreach ($course->course_tees as $tee) {
                $courseTees[$tee->id] = $course->name . ' / ' . $tee->name;
            }
        }

        $this->set(compact('round', 'players', 'courseTees'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Round id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $round = $this->Rounds->get($id, contain: ['Players', 'CourseTees', 'CourseTees.Courses', 'RoundHoles', 'RoundHoles.CourseHoles']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $this->Rounds->patchEntity($round, [
                'tee_time' => $data['tee_time'],
            ]);
            if ($this->Rounds->save($round) && $this->saveHoles($data['round_holes'])) {
                $this->Flash->success(__('The round has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The round could not be saved. Please, try again.'));
        }
        $this->set(compact('round'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Round id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $round = $this->Rounds->get($id);
        if ($this->Rounds->delete($round)) {
            $this->Flash->success(__('The round has been deleted.'));
        } else {
            $this->Flash->error(__('The round could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    private function createHoles($round): bool
    {
        $connection = ConnectionManager::get('default');

        $courseTee = $this->fetchTable('CourseTees')->get($round->course_tee_id, contain: ['Courses', 'Courses.CourseHoles']);

        foreach ($courseTee->course->course_holes as $hole) {
            $connection->insert('round_holes', [
                'round_id' => $round->id,
                'course_hole_id' => $hole->id,
                'strokes' => 0,
            ]);
        }

        return true;
    }

    private function saveHoles($holes): bool
    {
        $connection = ConnectionManager::get('default');

        foreach ($holes as $id => $data) {
            $connection->update('round_holes', [
                'strokes' => $this->parseValue($data['strokes'], 0),
                'fairway_hit' => $this->parseValue($data['fairway_hit']),
                'green_in_reg' => $this->parseValue($data['green_in_reg']),
                'putts' => $this->parseValue($data['putts']),
            ], ['id' => $id]);
        }

        return true;
    }

    private function parseValue($value, $default = null)
    {
        if ($value === '' || $value === 'null') {
            return null;
        }

        if (is_numeric($value)) {
            return intval($value);
        }

        return $default;
    }
}
