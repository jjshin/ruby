<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\View\Helper\FormHelper;
use App\Cart;
use Cake\ORM\TableRegistry;
/**
 * Users Controller. Control logic behind methods related to users data
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    public $paginate = ['order' => ['lname' => 'asc']];

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        //allows the public to see these views without having to log in
        $this->Auth->allow(array('login', 'register','checkout'));

        //blocks the public from accessing these views via link
        $this->Auth->deny(array('admin', 'staff', 'index', 'add', 'edit', 'manageusers', 'view', 'myaccount', 'updatedetails'));

    }


    public function isAuthorized($user) {
        return true;
    }

    //member homepage
    public function index()
    {

        $uid = $this->Auth->user('id');

        if (!$uid) {
            $this->Auth->deny();
            return $this->redirect(['controller' => 'Pages']);
        }

        $this->viewBuilder()->layout('internalmenumember');

        $uid = $this->Auth->user('id');
        $username = $this->Auth->user('fname');
        
        $user = $this->Users->get($uid, ['contain' => ['Countries', 'Orders', 'Products'] ]);
        $medicinaltable = TableRegistry::get('Medicinal');
        $medicinal = $medicinaltable->find()->where(['id' => 12]);
        
        $this->set(compact('medicinal', 'user', 'username'));
        $this->set('_serialize', ['user']);
    }

    //members can view their own personal details
    public function myaccount(){
        $uid = $this->Auth->user('id');

        if ($this->Auth->user('user_type') == 'admin' || $this->Auth->user('user_type') == 'staff' && !$uid) {
            $this->Auth->deny();
            return $this->redirect(['controller' => 'Pages']);
        }

        $this->viewBuilder()->layout('internalmenumember');

        $user = $this->Users->get($uid, ['contain' => ['Countries', 'Orders',  'Products'] ]);

        $countries = $this->Users->Countries->find('list', ['limit' => 200]);
        $this->set(compact('user', 'countries', 'products'));
        $this->set('_serialize', ['user']);
    }

    //members can update their personal details
    public function updatedetails(){
        $uid = $this->Auth->user('id');

        if (!$uid && !$this->Auth->user('user_type') == 'member') {
            $this->Auth->deny();
            return $this->redirect(['controller' => 'Pages']);
        }

        $this->viewBuilder()->layout('internalmenumember');

        $user = $this->Users->get($uid, ['contain' => ['Countries', 'Orders',  'Products'] ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Changes have been saved.'));
                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Changes could not be saved. Please, try again.'));
            }
        }

        $countries = $this->Users->Countries->find('list', ['limit' => 200]);
        $this->set(compact('user', 'countries', 'products'));
        $this->set('_serialize', ['user']);
    }

    //Changing password function
    public function changepassword(){
        $uid = $this->Auth->user('id');

        if (!$uid) {
            $this->Auth->deny();
            return $this->redirect(['controller' => 'Pages']);
        }

        if ($this->Auth->user('user_type') == 'admin'){
            $this->viewBuilder()->layout('internalmenu');
        } elseif ($this->Auth->user('user_type') == 'staff'){
            $this->viewBuilder()->layout('internalstaff');
        } elseif ($this->Auth->user('user_type') == 'member'){
            $this->viewBuilder()->layout('internalmenumember');
        } else {
            return $this->redirect(['controller' => 'Pages']);
        }

        $user =$this->Users->get($this->Auth->user('id'));

        if (!empty($this->request->data)) {
            $user = $this->Users->patchEntity($user, [
                'old_password' => $this->request->data['old_password'],
                'password' => $this->request->data['password1'],
                'password1' => $this->request->data['password1'],
                'password2' => $this->request->data['password2'] ],
                ['validate' => 'password']
            );
            if ($this->Users->save($user)) {
                $this->Flash->success('Password successfully changed');
                $this->redirect($this->referer());
            } else {
                $this->Flash->error('There was an error during the save!');
            }
        }

        $this->set('user',$user);
    }

    //admin homepage
    public function admin(){
        if ($this->Auth->user('user_type') == 'admin') {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalmenu');
        } else {
            return $this->redirect(['controller' => 'Pages']);
        }

        $user = $this->Auth->user('fname');

        $countries = $this->Users->Countries->find('list', ['limit' => 200]);
        $this->set(compact('user', 'countries', 'products'));
        $this->set('_serialize', ['user']);
    }

    //staff homepage
    public function staff(){

        if ($this->Auth->user('user_type') == 'staff') {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalstaff');
        } else {
            return $this->redirect(['controller' => 'Pages']);
        }

        $user = $this->Auth->user('fname');

        $countries = $this->Users->Countries->find('list', ['limit' => 200]);
        $this->set(compact('user', 'countries', 'products'));
        $this->set('_serialize', ['user']);
    }

    //Checks user type and redirects to appropriate homepage
    public function account()
    {
        if ($this->Auth->user('user_type') == 'member') {
            $this->Auth->allow();
            return $this->redirect(['action' => 'index']);
        } else if ($this->Auth->user('user_type') == 'staff') {
            $this->Auth->allow();
            return $this->redirect(['action' => 'staff']);
        } else if ($this->Auth->user('user_type') == 'admin') {
            $this->Auth->allow();
            return $this->redirect(['action' => 'admin']);
        } else {
            return $this->redirect(['controller' => 'Pages']);
        }

    }


    public function view($id = null)
    {
        if ($this->Auth->user('user_type') == 'staff' || $this->Auth->user('user_type') == 'member') {
            $this->Auth->deny();
            return $this->redirect(['controller' => 'Pages']);
        }

        $this->viewBuilder()->layout('internalmenu');

        $user = $this->Users->get($id, ['contain' => ['Countries', 'Orders', 'Products'] ]);

        $countries = $this->Users->Countries->find('list', ['limit' => 200]);
        $this->set(compact('user', 'countries', 'products'));
        $this->set('_serialize', ['user']);
    }


    public function add()
    {
        if ($this->Auth->user('user_type') == 'staff' || $this->Auth->user('user_type') == 'member') {
            $this->Auth->deny();
            return $this->redirect(['controller' => 'Pages']);
        }

        $this->viewBuilder()->layout('internalmenu');

        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('New User has been created'));
                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('This entry could not be saved. Please, try again.'));
            }
        }

        $countries = $this->Users->Countries->find('list', ['limit' => 200]);
        $this->set(compact('user', 'countries'));
        $this->set('_serialize', ['user']);
    }

    public function edit($id = null)
    {
        if ($this->Auth->user('user_type') == 'staff' || $this->Auth->user('user_type') == 'member') {
            $this->Auth->deny();
            return $this->redirect(['controller' => 'Pages']);
        }

        $this->viewBuilder()->layout('internalmenu');

        $user = $this->Users->get($id, ['contain' => [] ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Changes have been saved.'));
                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Changes could not be saved. Please, try again.'));
            }
        }

        $countries = $this->Users->Countries->find('list', ['limit' => 200]);
        $products = $this->Users->Products->find('list')->where(['restricted'=>1])->order(['id' => 'ASC']);

        $this->set(compact('user', 'countries', 'products'));
        $this->set('_serialize', ['user']);
    }

    //allows admin to record client notes
    public function clientnotes($id = null){
        if ($this->Auth->user('user_type') == 'staff' || $this->Auth->user('user_type') == 'member') {
            $this->Auth->deny();
            return $this->redirect(['controller' => 'Pages']);
        }

        $this->viewBuilder()->layout('internalmenu');

        $user = $this->Users->get($id, ['contain' => [] ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Client notes updated.'));
                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Client notes could not be updated. Please, try again.'));
            }
        }


        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    //Delete a user
    public function delete($id = null)
    {
        //ONLY ADMIN CAN DO THIS. DENY OTHERS
        if ($this->Auth->user('user_type') == 'staff' || $this->Auth->user('user_type') == 'member') {
            $this->Auth->deny();
            return $this->redirect(['controller' => 'Pages']);
        }

        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);

        if ($this->Users->delete($user)) {
            $this->Flash->success(__('This user has been deleted.'));
        } else {
            $this->Flash->error(__('This user could not be deleted. Please, try again.'));
        }
        return $this->redirect($this->referer());
    }

    //Login authentication. Redirects according to the user type.
    public function login(){

        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user) {
                $this->Auth->setUser($user);
                if ($this->Auth->user('user_type') == 'admin') {
                    $this->Auth->setUser($user);
                    return $this->redirect(['action' => 'admin']);
                } else if ($this->Auth->user('user_type') == 'member') {
                    $this->Auth->setUser($user);
                    return $this->redirect(['action' => 'index']);
                } else if ($this->Auth->user('user_type') == 'staff') {
                    $this->Auth->setUser($user);
                    return $this->redirect(['action' => 'staff']);
                } else {
                    $this->Flash->error('Incorrect Login');
                }
            }
            $this->Flash->error('Incorrect Login');
        }
    }

    //Logout user
    public function logout(){
        $this->Flash->success('You are logged out');
        return $this->redirect($this->Auth->logout());
    }

    //New member registration to collect details
    public function register(){
        $user = $this->Users->newEntity();

        if($this->request->is('post')){
            $user = $this->Users->patchEntity($user, $this->request->data);

            if($this->Users->save($user)){
                $this->Flash->success('You are registered and can login');
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error('You are not registered');
            }
        }

        $countries = $this->Users->Countries->find('list', ['limit' => 200]);
        $this->set(compact('user', 'countries'));
        $this->set('_serialize', ['user']);
    }

    //Admin has a list of all users registered to system
    public function manageusers()
    {
        //ONLY ADMIN CAN DO THIS. DENY OTHERS
        if ($this->Auth->user('user_type') == 'staff' || $this->Auth->user('user_type') == 'member') {
            $this->Auth->deny();
            return $this->redirect(['controller' => 'Pages']);
        }

        $this->viewBuilder()->layout('internalmenu');

        $user = $this->Auth->user('id');
        $users = $this->paginate($this->Users);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    public function checkout ()
    {
        $this->request->session()->write('return1', true);
        $this->request->session()->write('return', true);
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user) {
                $this->Auth->setUser($user);
                return $this->redirect(['controller'=>'orders','action' => 'checkoutguest']);
            }
            $this->Flash->error('Incorrect Login');
        }
        $uid = $this->Auth->user('id');
        if (!empty($uid)) {
            return $this->redirect(['controller' => 'orders', 'action' => 'checkoutguest']);
        }

        $countries = $this->Users->Countries->find('list', ['limit' => 200]);
        $this->set(compact('user', 'countries'));
        $this->set('_serialize', ['user']);

        require_once(ROOT . DS . 'config' . DS . 'cart.php');
        if (!$this->request->session()->check('cart')) {
            $this->Flash->error(__('Your cart is empty'));
        }

        $oldCart = [
            'items' => $this->request->session()->read('cart.items'),
            'totalQty' => $this->request->session()->read('cart.totalQty'),
            'totalPrice' => $this->request->session()->read('cart.totalPrice'),
            'totalWeight' => $this->request->session()->read('cart.totalWeight')
        ];


        $cart = new Cart($oldCart);
        $products = $cart->items;
        $totalPrice = $cart->totalPrice;
        $totalQty = $cart->totalQty;
        $totalWeight = $cart->totalWeight;
        $this->set('products', $products);
        $this->set('totalPrice', $totalPrice);
        $this->set('totalQty', $totalQty);
        $this->set('totalWeight', $totalWeight);
        $shippingCosts = TableRegistry::get('shippingcosts');

        $query = $shippingCosts->find()->where($totalWeight . ' BETWEEN from_weight AND to_weight');
        $shipping = $query->first();
        $shipping = $shipping['price'];
        $this->set('shippingCost', $shipping);
    }
    
}
