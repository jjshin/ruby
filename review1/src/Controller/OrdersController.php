<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Exception;
use Cake\Event\Event;
use PayPal\API\Payer;
use Cake\Routing\Route;
use App\Cart;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 */
class OrdersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $this->Auth->allow(array('checkoutguest','checkoutregister', 'confirm'));

    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        if ($this->Auth->user('user_type') == 'admin') {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalmenu');
        } else {
            return $this->redirect(['controller' => 'Pages']);
        }

        $this->paginate = [
            'contain' => ['Users', 'Deliveries']
        ];
        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders'));
        $this->set('_serialize', ['orders']);
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if ($this->Auth->user('user_type') == 'admin') {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalmenu');
        } else {
            return $this->redirect(['controller' => 'Pages']);
        }

        $order = $this->Orders->get($id, [
            'contain' => ['Users', 'Deliveries', 'Lineitems', 'Lineitems.Products']
        ]);

        $this->set('order', $order);
        $this->set('_serialize', ['order']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        if ($this->Auth->user('user_type') == 'admin') {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalmenu');
        } else {
            return $this->redirect(['controller' => 'Pages']);
        }

        $order = $this->Orders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->data);
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The order could not be saved. Please, try again.'));
            }
        }
        $users = $this->Orders->Users->find('list', ['limit' => 200]);
        $deliveries = $this->Orders->Deliveries->find('list', ['limit' => 200]);
        $this->set(compact('order', 'users', 'deliveries'));
        $this->set('_serialize', ['order']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if ($this->Auth->user('user_type') == 'admin') {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalmenu');
        } else {
            return $this->redirect(['controller' => 'Pages']);
        }
        
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function checkoutGuest ()
    {
        $uid = $this->Auth->user('id');

        if(!empty($uid) && $this->request->session()->read('return')) {
            $this->request->session()->write('return', false);
            return $this->redirect(['controller'=>'orders','action' => 'confirm']);

        }

        
        $this->Auth->allow();
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

        $countries = TableRegistry::get('countries');
        $countries = $countries->find('list');
        $query = $shippingCosts->find()->where($totalWeight . ' BETWEEN from_weight AND to_weight');
        $shipping = $query->first();
        $shipping = $shipping['price'];
        $this->set('shippingCost', $shipping);
        $this->set('countries', $countries);
    }

    public function confirm(){
        $time = Time::now();
        $uid = $this->Auth->user('id');
        $users = TableRegistry::get('users');
        if($this->here = $this->referer()){
            $this->request->session()->write('return1', true);
        }
        require_once(ROOT . DS . 'config' . DS . 'cart.php');
        $user = $this->Auth->user('id');
        if (!empty($uid) && $this->request->session()->read('return1')){
            $user = $users->get($uid);
            $firstName = $user->fname;
            $lastName = $user->lname;
            $email = $user->email;
            $phone = $user->contactno;
            $address1 = $user->address1;
            $address2 = $user->address2;
            $country = $user->country_id;
            $state = $user->state;
            $suburb = $user->suburb;
            $postcode = $user->pcode;
        }
        else{
            $firstName = $_POST['firstname'];
            $lastName = $_POST['lastname'];
            $email = $_POST['emailaddress'];
            $phone = $_POST['phone'];
            $address1 = $_POST['address1'];
            $address2 = $_POST['address2'];
            if (empty($address2)){
                $address2 = ' ';
            }
            $country = $_POST['country'];
            $state = $_POST['state'];
            $suburb = $_POST['suburb'];
            $postcode = $_POST['postcode'];
        }
        $this->set(compact('firstName', 'lastName', 'email', 'phone', 'address1', 'address2', 'country', 'state', 'suburb', 'postcode'));
        $this->request->session()->write('return1', false);
        $deliveries = TableRegistry::get('deliveries');
        $delivery = $deliveries->find()
            ->where(['email' => $email])
            ->first();
        if (empty($delivery)) {
            $delivery = $deliveries->newEntity([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email'  => $email,
                'address1' => $address1,
                'address2' => $address2,
                'city' => $suburb,
                'country' => $country,
                'state' => $state,
                'zip' => $postcode,
                'contact_no' => $phone
            ]);
            $deliveries->save($delivery);}
        $deliveryID = $delivery->id;
        $this->request->session()->write('deliveryID', $deliveryID);

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


        $countries = TableRegistry::get('countries');
        $countries = $countries->find('list');
        $query = $shippingCosts->find()->where($totalWeight . ' BETWEEN from_weight AND to_weight');
        $shipping = $query->first();
        $shipping = $shipping['price'];
        $this->set('shippingCost', $shipping);
        $this->set('countries', $countries);

        $order = $this->Orders->newEntity([
            'type' => 'guest',
            'user_id' => $uid,
            'total' => $totalPrice + $shipping,
            'status'  => 'Pending',
            'shipping' => $shipping,
            'date' => $time,
            'transaction_no' => '',
            'deliveries_id' => $this->request->session()->read('deliveryID'),
        ]);

        $this->Orders->save($order);
        $this->request->session()->write('orderID', $order->id);
        if($user){
            $order->type = 'user';
            $this->Orders->save($order);
        }

    }

    //members can view their orders separately to admin view
    public function myorders(){
        $uid = $this->Auth->user('id');

        if ($this->Auth->user('user_type') == 'member' && $uid) {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalmenumember');
        } else {
            $this->Auth->deny();
            return $this->redirect(['controller' => 'Pages']);
        }

        $this->viewBuilder()->layout('internalmenumember');

        $orders = $this->Orders->find('all')
            ->where(['user_id'=>$uid]);


        $this->set(compact('user', 'countries', 'products', 'orders'));
        $this->set('_serialize', ['orders']);

    }

    //members can view their orders separately to admin view
    public function myorderreview($id = null){
       $uid = $this->Auth->user('id');

        if ($this->Auth->user('user_type') == 'member' && $uid) {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalmenumember');
        } else {
            $this->Auth->deny();
            return $this->redirect(['controller' => 'Pages']);
        }

        $order = $this->Orders->get($id, [
            'contain' => ['Users', 'Deliveries', 'Lineitems', 'Lineitems.Products']
        ]);

        $this->set(compact('order', 'products'));
        $this->set('_serialize', ['order']);

    }
    public function status($id = null)
    {

        if ($this->Auth->user('user_type') == 'admin') {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalmenu');
        } else {
            return $this->redirect(['controller' => 'Pages']);
        }

        $order = $this->Orders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->data);
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The order could not be saved. Please, try again.'));
            }
        }
        $users = $this->Orders->Users->find('list', ['limit' => 200]);
        $deliveries = $this->Orders->Deliveries->find('list', ['limit' => 200]);
        $this->set(compact('order', 'users', 'deliveries'));
        $this->set('_serialize', ['order']);
    }
 
}
