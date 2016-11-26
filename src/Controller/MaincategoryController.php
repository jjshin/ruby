<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Maincategory Controller
 *
 * @property \App\Model\Table\MaincategoryTable $Maincategory
 */
class MaincategoryController extends AppController
{

    public function initialize()
	{
		parent::initialize();
		$this->Auth->deny();
        $this->viewBuilder()->layout('admin');
	}

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $maincategory = $this->paginate($this->Maincategory);

        $this->set(compact('maincategory'));
        $this->set('_serialize', ['maincategory']);
    }

    /**
     * View method
     *
     * @param string|null $id Maincategory id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $maincategory = $this->Maincategory->get($id, [
            'contain' => ['Category']
        ]);

        $this->set('maincategory', $maincategory);
        $this->set('_serialize', ['maincategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $maincategory = $this->Maincategory->newEntity();
        if ($this->request->is('post')) {
            $maincategory = $this->Maincategory->patchEntity($maincategory, $this->request->data);
            if ($this->Maincategory->save($maincategory)) {
                $this->Flash->success(__('The maincategory has been saved.'));

                return $this->redirect(['controller'=>'Category', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The maincategory could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('maincategory'));
        $this->set('_serialize', ['maincategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Maincategory id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $maincategory = $this->Maincategory->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $maincategory = $this->Maincategory->patchEntity($maincategory, $this->request->data);
            if ($this->Maincategory->save($maincategory)) {
                $this->Flash->success(__('The maincategory has been saved.'));

                return $this->redirect(['controller'=>'Category', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The maincategory could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('maincategory'));
        $this->set('_serialize', ['maincategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Maincategory id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $maincategory = $this->Maincategory->get($id);
        if ($this->Maincategory->delete($maincategory)) {
            $this->Flash->success(__('The maincategory has been deleted.'));
        } else {
            $this->Flash->error(__('The maincategory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'Category', 'action' => 'index']);
    }
}
