<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Brands Controller
 *
 * @property \App\Model\Table\BrandsTable $Brands
 */
class BrandsController extends AppController
{

    public $paginate = ['order' => ['name' => 'asc']];
    
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        if ($this->Auth->user('user_type') == 'staff') {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalstaff');
        } else if ($this->Auth->user('user_type') == 'admin') {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalmenu');
        } else {
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }
        
        $brands = $this->paginate($this->Brands);

        $this->set(compact('brands'));
        $this->set('_serialize', ['brands']);
    }

    /**
     * View method
     *
     * @param string|null $id Brand id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if ($this->Auth->user('user_type') == 'staff') {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalstaff');
        } else if ($this->Auth->user('user_type') == 'admin') {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalmenu');
        } else {
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }
        
        $brand = $this->Brands->get($id, [
            'contain' => ['Products']
        ]);

        $this->set('brand', $brand);
        $this->set('_serialize', ['brand']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->Auth->user('user_type') == 'staff') {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalstaff');
        } else if ($this->Auth->user('user_type') == 'admin') {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalmenu');
        } else {
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }
        
        $brand = $this->Brands->newEntity();
        if ($this->request->is('post')) {
            $brand = $this->Brands->patchEntity($brand, $this->request->data);
            if ($this->Brands->save($brand)) {
                $this->Flash->success(__('The brand has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The brand could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('brand'));
        $this->set('_serialize', ['brand']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Brand id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if ($this->Auth->user('user_type') == 'staff') {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalstaff');
        } else if ($this->Auth->user('user_type') == 'admin') {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalmenu');
        } else {
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }
        
        $brand = $this->Brands->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $brand = $this->Brands->patchEntity($brand, $this->request->data);
            if ($this->Brands->save($brand)) {
                $this->Flash->success(__('The brand has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The brand could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('brand'));
        $this->set('_serialize', ['brand']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Brand id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        
        $this->request->allowMethod(['post', 'delete']);
        $brand = $this->Brands->get($id);
        if ($this->Brands->delete($brand)) {
            $this->Flash->success(__('The brand has been deleted.'));
        } else {
            $this->Flash->error(__('The brand could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
