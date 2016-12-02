<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		$this->Auth->deny();
		$this->Auth->allow(['add','logout', 'register']);
	}


	public function isAuthorized($user)
	{
		return parent::isAuthorized($user);
	}

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($role=10)
    {
				$this->viewBuilder()->layout('admin');
				$users = $this->Users->find()
									->where(['role'=>$role]);
        $users = $this->paginate($users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

	public function logout()
	{
		return $this->redirect($this->Auth->logout());
	}

	public function login()
	{
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);

				$this->copy_cart();

				if($this->Auth->user('role')==1){	//Admin
					return $this->redirect('/users/index');
				}else{
					return $this->redirect('/');
				}
			}
			$this->Flash->error('Your email or password is incorrect.');
		}
	}

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$this->viewBuilder()->layout('admin');
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$this->viewBuilder()->layout('admin');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
					  if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->viewBuilder()->layout('admin');
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
		$this->viewBuilder()->layout('admin');
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

	public function register()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
						$user['role']=10;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['controller'=>'Main', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

		private function copy_cart(){
			/* Copty data from tmpcarts to carts table */
			if($this->request->session()->read('session_id')){
				$this->loadModel('Carts');
				$this->loadModel('Tmpcarts');

				$tmpcarts=$this->Tmpcarts->find()
									->select(['qty', 'products_id'])
									->where(['session_id'=>$this->request->session()->read('session_id')]);
				$data=array();
				if($tmpcarts->count() > 0){
					foreach($tmpcarts as $tmp){
						$item=array(
							'users_id'=>$this->Auth->user('id'),
							'products_id'=>$tmp['products_id'],
							'qty'=>$tmp['qty']
						);
						array_push($data, $item);
					}

					$cart=$this->Carts->newEntities($data);
					if($this->Carts->saveMany($cart)){
						if($this->Tmpcarts->deleteAll(['session_id'=>$this->request->session()->read('session_id')])){
							$this->request->session()->delete('session_id');
						}
					}
				}
			}
		}
}
