<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 */
class SubcategoryController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($category_id=null)
    {
		$this->viewBuilder()->layout('admin');
        $subcategory = $this->paginate($this->Subcategory, array('conditions'=>array('category_id', $category_id)));

		$this->set('category_id', $category_id);
        $this->set(compact('subcategory'));
        $this->set('_serialize', ['subcategory']);
    }

	/**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($category_id=null)
    {
		$this->viewBuilder()->layout('admin');
        $subcategory = $this->Subcategory->newEntity();
        if ($this->request->is('post')) {
            $subcategory = $this->Subcategory->patchEntity($subcategory, $this->request->data);
            if ($this->Subcategory->save($subcategory)) {
                $this->Flash->success(__('The subcategory has been saved.'));

                return $this->redirect(['controller'=>'Category', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The subcategory could not be saved. Please, try again.'));
            }
        }
		$this->loadModel('Category');
		$category=$this->Category->find();

		$this->set('category_id', $category_id);
        $this->set(compact('subcategory', 'category'));
        $this->set('_serialize', ['subcategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id category id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->viewBuilder()->layout('admin');
        $subcategory = $this->Subcategory->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subcategory = $this->Subcategory->patchEntity($subcategory, $this->request->data);
            if ($this->Subcategory->save($subcategory)) {
                $this->Flash->success(__('The subcategory has been saved.'));

                return $this->redirect(['controller'=>'Category', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The subcategory could not be saved. Please, try again.'));
            }
        }

		$this->loadModel('Category');
		$category=$this->Category->find();

        $this->set(compact('subcategory', 'category'));
        $this->set('_serialize', ['subcategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id category id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
		$this->viewBuilder()->layout('admin');
        $this->request->allowMethod(['post', 'delete']);
        $subcategory = $this->Subcategory->get($id);
        if ($this->Subcategory->delete($subcategory)) {
            $this->Flash->success(__('The subcategory has been deleted.'));
        } else {
            $this->Flash->error(__('The subcategory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'Category', 'action' => 'index']);
    }
}
