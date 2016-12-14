<?php
namespace App\Controller;

use App\Model\Entity\Orderdetail;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use App\Controller\AppController;
use Cake\ORM\Query;

/**
 * Enquires Controller
 *
 * @property \App\Model\Table\EnquiresTable $Enquires
 */
class EnquiresController extends AppController
{
    public function initialize()
    {
      parent::initialize();
      $this->Auth->deny();
      $this->Auth->allow(['add']);
      $this->viewBuilder()->layout('admin');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
       
        $enquires = $this->paginate($this->Enquires);

        $this->set(compact('enquires'));
        $this->set('_serialize', ['enquires']);
    }

    /**
     * View method
     *
     * @param string|null $id Enquire id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('Users');
        $this->loadModel('Products');
        $enquire = $this->Enquires->find()
                                    ->select($this->Enquires)
                                    ->select($this->Users)
                                    ->select($this->Products)
                                    ->join([
                                        'table' => 'users',
                                        'alias' => 'Users',
                                        'conditions' => ['enquires.users_id = Users.id'],
                                        'type' => 'left outer'])
            
                                    ->join([
                                        'table' => 'products',
                                        'alias' => 'Products',
                                        'conditions' => ['enquires.products_id = Products.id'],
                                        'type' => 'left outer'])
                                    ->where(['Enquires.id'=>$id])
                                    ->first();

        $this->set('enquire', $enquire);
        $this->set('_serialize', ['enquire']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($product_id=null)
    {
        $this->viewBuilder()->layout('default');
        $enquire = $this->Enquires->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['users_id']=$this->Auth->user('id') ? $this->Auth->user('id'): '';
            $enquire = $this->Enquires->patchEntity($enquire, $this->request->data);
            if ($this->Enquires->save($enquire)) {

                $query = $this->Enquires->find();
                $query->select(['products_id'])
                    ->where(['products_id'=> $product_id]);
                foreach ($query as $row){
                    $products_id = ($row->products_id);
                }
                $this->loadModel('Products');
                $query1 = $this->Products->find();
                $query1->select(['image'])
                    ->where(['id'=> $products_id]);
                foreach ($query1 as $row){
                    $pic = ($row->image);
                }

                $query1 = $this->Enquires->find();
                $query1->select(['email'])
                    ->where([['products_id'=> $product_id]]);

                foreach ($query1 as $row) {
                    $mail = ($row->email);
                }
                debug($mail);


                $email = new Email('gmail');
                $email
                    ->to(array($mail,'rubysgiftstest@gmail.com'))
                    ->subject('Enquire Details')
                    ->attachments([
                        'Product.jpg' => [
                            'file' => 'img/'.$pic,
                            'mimetype' => 'image/jpg',
                            'contentId' => 'my-unique-id'
                        ]
                    ])
                    ->template('enquire')
                    ->emailFormat('html')
                    ->send();
                $this->Flash->success(__('The enquire has been saved.'));





                if($product_id){
                  return $this->redirect(['controller'=>'Products', 'action'=>'view', $product_id]);
                }else{
                  return $this->redirect(['controller'=>'Main', 'action' => 'index']);
                }
            } else {
                $this->Flash->error(__('The enquire could not be saved. Please, try again.'));
            }
        }
        $this->request->data['products_id']=$product_id;
        $this->set(compact('enquire'));
        $this->set('_serialize', ['enquire']);



    }

    /**
     * Edit method
     *
     * @param string|null $id Enquire id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $enquire = $this->Enquires->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $enquire = $this->Enquires->patchEntity($enquire, $this->request->data);
            if ($this->Enquires->save($enquire)) {
                $this->Flash->success(__('The enquire has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The enquire could not be saved. Please, try again.'));
            }
        }
        $users = $this->Enquires->Users->find('list', ['limit' => 200]);
        $products = $this->Enquires->Products->find('list', ['limit' => 200]);
        $this->set(compact('enquire', 'users', 'products'));
        $this->set('_serialize', ['enquire']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Enquire id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $enquire = $this->Enquires->get($id);
        if ($this->Enquires->delete($enquire)) {
            $this->Flash->success(__('The enquire has been deleted.'));
        } else {
            $this->Flash->error(__('The enquire could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
