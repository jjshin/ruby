<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Event\EventManager;
use Cake\View\Helper\PaginatorHelper;
use App\Cart;
use Cake\Core\Configure;
use Cake\Controller\Controller;
use Cake\Http\Client;
use Cake\I18n\Time;

class ProductsController extends AppController
{

    public $paginate = ['order' => ['brand_id' => 'asc']];

    function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        //allows the public to see everything without having to log in
        $this->Auth->allow();

        //blocks the public from accessing these views via link
        $this->Auth->deny(array('add', 'edit', 'restock', 'index', 'inventoryindex', 'view'));
    }

    //main page listing all products in inventory
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

        $products = $this->paginate($this->Products, ['contain' => ['Categories', 'Lineitems', 'Brands']], ['order' => ['Products.brand_id' => 'DESC']]);
        $brands = $this->Products->Brands->find('list',['order' => ['Products.brand_id', 'Products.name']]);

        $this->set(compact('products', 'brands'));
        $this->set('_serialize', ['products']);
    }

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

        $product = $this->Products->get($id, ['contain' => ['Categories', 'Lineitems', 'Brands']]);
        
        $brands = $this->Products->Brands->find('list', ['limit' => 200]);
        $this->set(compact('product', 'categories', 'brands'));
        $this->set('_serialize', ['product']);
    }

    public function item($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Categories', 'Lineitems', 'Brands']
        ]);

        $uid = $this->Auth->user('id');
        $restricted = TableRegistry::get('Restrictedproducts');

        $this->set('product', $product);
        $brands = $this->Products->Brands->find('list', ['limit' => 200]);
        $this->set(compact('product', 'categories', 'brands', 'uid', 'restricted'));
        $this->set('_serialize', ['product']);
    }

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

        $product = $this->Products->newEntity();

        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));
                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Products->Categories->find('list', ['limit' => 200]);
        $brands = $this->Products->Brands->find('list', ['limit' => 200]);
        $this->set(compact('product', 'categories', 'brands'));
        $this->set('_serialize', ['product']);
    }

    public function edit($id = null){
        if ($this->Auth->user('user_type') == 'staff') {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalstaff');
        } else if ($this->Auth->user('user_type') == 'admin') {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalmenu');
        } else {
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }

        $product = $this->Products->get($id, ['contain' => ['Categories', 'Brands']]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));
                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Products->Categories->find('list', ['limit' => 200]);
        $brands = $this->Products->Brands->find('list', ['limit' => 200]);
        $this->set(compact('product', 'categories', 'brands'));
        $this->set('_serialize', ['product']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        //$categories = $this->Products->Categories->find('list')->where($id -> );
        
        $product = $this->Products->get($id);
        
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function restock($id = null)
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

        $product = $this->Products->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('Restocked!'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Could not update. Please try again'));
            }
        }

        $categories = $this->Products->Categories->find('list', ['limit' => 200]);
        $brands = $this->Products->Brands->find('list', ['limit' => 200]);
        $this->set(compact('product', 'categories', 'brands'));
        $this->set('_serialize', ['product']);
    }

    public function all()
    {
        $products = $this->Products->find('all', ['order' => ['Products.brand_id' => 'DESC']]);
        
        $uid = $this->Auth->user('id');
        $restricted = TableRegistry::get('Restrictedproducts');

        $this->set(compact('products', 'uid', 'restricted'));
        $this->set('_serialize', ['products']);
    }
    public function search ()
    {
        $query = $_GET['search'];
        $products = $this->Products->find('all', ['conditions' => ['Products.name LIKE' => '%'.$query.'%']]);

        $uid = $this->Auth->user('id');
        $restricted = TableRegistry::get('Restrictedproducts');

        $this->set(compact('products', 'uid', 'restricted'));
        $this->set('_serialize', ['products']);

    }
    //generates page based on the category name in url eg) ".../products/categories/supplements"
    public function categories()
    {

        // Getting all passed params
        $categories = $this->request->params['pass'];
        // Find the categories
        $products = $this->Products->find('categories', ['categories' => $categories,]);
        //Pass into view
        $this->set([
            'products' => $products,
            'categories' => $categories
        ]);

        $uid = $this->Auth->user('id');
        $restricted = TableRegistry::get('Restrictedproducts');
        
        $this->set(compact('products', 'uid', 'restricted'));
        $this->set('_serialize', ['products']);

    }

    //generates page based on the brand name in url eg) ".../products/brands/metagenics"
    public function brands()
    {

        // Getting all passed params
        $brands = $this->request->params['pass'];
        // Find the categories
        $products = $this->Products->find('brands', ['brands' => $brands]);
        //Pass into view
        $this->set([
            'products' => $products,
            'brands' => $brands
        ]);

        $uid = $this->Auth->user('id');
        $restricted = TableRegistry::get('Restrictedproducts');

        $this->set(compact('products', 'uid', 'restricted'));
        $this->set('_serialize', ['products']);

    }

    public function addToCart($id = null)
    {

        require_once(ROOT . DS . 'config' . DS . 'cart.php');
        $product = $this->Products->get($id);
        $oldCart = null;
        if ($this->request->session()->check('cart')) {

            $oldCart = [
                'items' => $this->request->session()->read('cart.items'),
                'totalQty' => $this->request->session()->read('cart.totalQty'),
                'totalPrice' => $this->request->session()->read('cart.totalPrice'),
                'totalWeight' => $this->request->session()->read('cart.totalWeight')
            ];
        }
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $this->request->session()->write('cart.items', ($cart->items));
        $this->request->session()->write('cart.totalQty', ($cart->totalQty));
        $this->request->session()->write('cart.totalPrice', ($cart->totalPrice));
        $this->request->session()->write('cart.totalWeight', ($cart->totalWeight));

        return $this->redirect($this->referer());
    }

    //reduces item count by one
    public function getReduceByOne($id)
    {
        require_once(ROOT . DS . 'config' . DS . 'cart.php');
        $product = $this->Products->get($id);
        $oldCart = null;
        if ($this->request->session()->check('cart')) {

            $oldCart = [
                'items' => $this->request->session()->read('cart.items'),
                'totalQty' => $this->request->session()->read('cart.totalQty'),
                'totalPrice' => $this->request->session()->read('cart.totalPrice'),
                'totalWeight' => $this->request->session()->read('cart.totalWeight')
            ];
        }
        $cart = new Cart($oldCart);
        $cart->reduceByOne($product->id);

        $this->request->session()->write('cart.items', ($cart->items));
        $this->request->session()->write('cart.totalQty', ($cart->totalQty));
        $this->request->session()->write('cart.totalPrice', ($cart->totalPrice));
        $this->request->session()->write('cart.totalWeight', ($cart->totalWeight));

        return $this->redirect($this->referer());
    }

    //removes item from the cart
    public function removeItem($id)
    {
        require_once(ROOT . DS . 'config' . DS . 'cart.php');
        $product = $this->Products->get($id);
        $oldCart = null;
        if ($this->request->session()->check('cart')) {

            $oldCart = [
                'items' => $this->request->session()->read('cart.items'),
                'totalQty' => $this->request->session()->read('cart.totalQty'),
                'totalPrice' => $this->request->session()->read('cart.totalPrice'),
                'totalWeight' => $this->request->session()->read('cart.totalWeight')
            ];
        }
        $cart = new Cart($oldCart);
        $cart->removeItem($product->id);

        $this->request->session()->write('cart.items', ($cart->items));
        $this->request->session()->write('cart.totalQty', ($cart->totalQty));
        $this->request->session()->write('cart.totalPrice', ($cart->totalPrice));
        $this->request->session()->write('cart.totalWeight', ($cart->totalWeight));
        if ($this->request->session()->check('cart')) {
            return $this->redirect($this->referer());
        }


    }

    //empties cart
    public function clearCart()
    {
        $session = $this->request->session();
        $session->destroy();
        $this->Flash->success(__('Your cart has been emptied'));
        return $this->redirect(
            ['controller' => 'pages']
        );
    }

    //cart page
    public function cart()
    {
        $this->request->session()->write('return', true);
        require_once(ROOT . DS . 'config' . DS . 'cart.php');
        if (!$this->request->session()->check('cart')) {
            $this->Flash->error(__('Your cart is empty'));
            return $this->redirect($this->referer());
        } else {
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
            $shippingcosts = TableRegistry::get('shippingcosts');

            $query = $shippingcosts->find()->where($totalWeight . ' BETWEEN from_weight AND to_weight');
            $shipping = $query->first();
            $shipping = $shipping['price'];
            $this->set('shippingCost', $shipping);
        };
    }
    public function success(){
        $orders = TableRegistry::get('Orders');
        $user = $this -> request -> session() -> read('Auth.User.id');
        $time = Time::now();


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
        $items = $cart->items;
        $totalPrice = $cart->totalPrice;
        $totalQty = $cart->totalQty;
        $totalWeight = $cart->totalWeight;
        $this->set('items', $items);
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
        $txn = $_GET['tx'];
        $amount = $_GET['amt'];
        $status = $_GET['st'];
        $order = $orders->get($this->request->session()->read('orderID'));
        $order->patchEntity([
            'type' => 'guest',
            'user_id' => $user,
            'total' => $amount,
            'status'  => $status,
            'shipping' => $shipping,
            'date' => $time,
            'transaction_no' => $txn,
            'deliveries_id' => $this->request->session()->read('deliveryID'),
        ]);
        $orders->save($order);
        if($user){
            $order->type = 'user';
            $orders->save($order);
        }
        $lineitems = TableRegistry::get('LineItems');
        $this->set('txn', $txn);

        foreach ($items as $item)
        {
            $id = $item['item']['id'];
            $qty = $item['qty'];
            $product = $this->Products->get($id, [
                'contain' => ['Categories', 'Lineitems', 'Brands']
            ]);
            $lineitem = $lineitems->newEntity();
            $lineitem->order_id = $order->id;
            $lineitem->product_id = $id;
            $lineitem->qty = $qty;
            $lineitems->save($lineitem);

            $product->qty = ($product->qty) - $qty;
            $this->Products->save($product);

        }

        $session = $this->request->session();
        $session->destroy();
    }
    
}