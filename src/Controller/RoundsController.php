<?php
declare(strict_types=1);

namespace App\Controller;

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
        $query = $this->Rounds->find()
            ->contain(['Players', 'CourseTees']);
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
        $round = $this->Rounds->get($id, contain: ['Players', 'CourseTees', 'RoundHoles']);
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
            if ($this->Rounds->save($round)) {
                $this->Flash->success(__('The round has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The round could not be saved. Please, try again.'));
        }
        $players = $this->Rounds->Players->find('list', limit: 200)->all();
        $courseTees = $this->Rounds->CourseTees->find('list', limit: 200)->all();
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
        $round = $this->Rounds->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $round = $this->Rounds->patchEntity($round, $this->request->getData());
            if ($this->Rounds->save($round)) {
                $this->Flash->success(__('The round has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The round could not be saved. Please, try again.'));
        }
        $players = $this->Rounds->Players->find('list', limit: 200)->all();
        $courseTees = $this->Rounds->CourseTees->find('list', limit: 200)->all();
        $this->set(compact('round', 'players', 'courseTees'));
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
}
