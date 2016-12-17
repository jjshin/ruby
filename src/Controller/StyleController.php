<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Style Controller
 *
 * @property \App\Model\Table\StyleTable $Style
 */
class StyleController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $style = $this->paginate($this->Style);

        $this->set(compact('style'));
        $this->set('_serialize', ['style']);
    }

    /**
     * View method
     *
     * @param string|null $id Style id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $style = $this->Style->get($id, [
            'contain' => ['Products']
        ]);

        $this->set('style', $style);
        $this->set('_serialize', ['style']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $style = $this->Style->newEntity();
        if ($this->request->is('post')) {
            $style = $this->Style->patchEntity($style, $this->request->data);
            if ($this->Style->save($style)) {
                $this->Flash->success(__('The style has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The style could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('style'));
        $this->set('_serialize', ['style']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Style id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $style = $this->Style->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $style = $this->Style->patchEntity($style, $this->request->data);
            if ($this->Style->save($style)) {
                $this->Flash->success(__('The style has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The style could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('style'));
        $this->set('_serialize', ['style']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Style id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $style = $this->Style->get($id);
        if ($this->Style->delete($style)) {
            $this->Flash->success(__('The style has been deleted.'));
        } else {
            $this->Flash->error(__('The style could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
