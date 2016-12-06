<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use App\Controller\AppController;
use Cake\ORM\Query;

class OrdersController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		$this->Auth->deny();
		$this->Auth->allow(['index', 'proceed']);
	}

	public function index(){

		if($this->Auth->user('id')){
			$this->loadModel('Carts');

			// Update carts table
			foreach($this->request->data['cart_id'] as $key=>$cart_id){
				$qty=$this->request->data['qty'][$key];
				$product_id=$this->request->data['product_id'][$key];

				$productObj=new ProductsController;
				$qty_check=$productObj->check_qty($product_id, $qty);
				if($qty_check>0){
					$query=$this->Carts->query();
					$query->update()
						->set(['qty'=>$qty])
						->where(['id'=>$cart_id])
						->execute();
				}else{
					$this->Flash->error(__('Not enough stock.'));
					$this->redirect($this->referer());
				}
			}
		}else{
			$this->redirect(['controller'=>'Users','action'=>'login']);
		}

		// Get cart list
		$cart=$this->getCarts();
		$this->set(compact('cart'));




	}

	private function getCarts(){
		if($this->Auth->user('id')){
			$this->loadModel('Carts');
			$cart=$this->Carts->find()
								->select(['Carts.id', 'Carts.qty', 'Products.id', 'Products.name', 'Products.image', 'Products.sale_price'])
								->join(array(
										'table'=>'products',
										'alias'=>'Products',
										'conditions'=>array('Carts.products_id = Products.id'),
										'type'=>'inner'
								))
								->where(['Carts.users_id'=>$this->Auth->user('id')]);
		}else{
			$this->loadModel('Tmpcarts');
			$cart=$this->Tmpcarts->find()
								->select($this->Tmpcarts)
								->select($this->Tmpcarts->Products)
								->join(array(
										'table'=>'products',
										'alias'=>'Products',
										'conditions'=>array('Tmpcarts.products_id = Products.id'),
										'type'=>'inner'
								))
								->where(['Tmpcarts.session_id'=>$this->request->session()->read('session_id')]);
		}
		return $cart;
        $totalQty = $carts->qty;
        $this->set('totalQty', $totalQty);
	}

	public function processing(){
		
	}

	public function adminIndex(){
		$this->viewBuilder()->layout('admin');

		$this->loadModel('Orderdetails');

		$orders=$this->Orderdetails->find()
							->select(['Orderdetails.id', 'Orderdetails.created', 'Orderdetails.order_status', 'Orderdetails.order_total',
											'Users.id', 'Users.firstname', 'Users.lastname', 'Users.email'])
							->join([
								'table'=>'users',
								'alias'=>'Users',
								'conditions'=>['Orderdetails.users_id=Users.id'],
								'type'=>'INNER'
							])
							->order(['Orderdetails.id'=>'DESC']);
		$orders=$this->paginate($orders);
		$this->set(compact('orders'));
	}

	public function adminDetail($order_id){
		$this->viewBuilder()->layout('admin');

		$this->loadModel('Orderdetails');
		$this->loadModel('Orderproducts');

		$order=$this->Orderdetails->find()
							->select(['Orderdetails.id', 'Orderdetails.created', 'Orderdetails.order_status', 'Orderdetails.order_total',
												'Users.id', 'Users.firstname', 'Users.lastname', 'Users.email'])
							->join([
								'table'=>'users',
								'alias'=>'Users',
								'conditions'=>['Orderdetails.users_id=Users.id'],
								'type'=>'INNER'
							])
							->where(['Orderdetails.id'=>$order_id])
							->first();

		$products=$this->Orderproducts->find()
							->select(['Orderproducts.id', 'Orderproducts.orderqty', 'Orderproducts.totalprice', 'Products.name', 'Products.price', 'Products.image'])
							->join([
								'table'=>'products',
								'alias'=>'Products',
								'conditions'=>array('Products.id=Orderproducts.products_id'),
								'type'=>'INNER'
							])
							->where(['Orderproducts.orderdetails_id'=>$order_id]);
		$this->set(compact('order', 'products'));
	}

	public function changeStatus($order_id, $order_status){
		$this->loadModel('Orderdetails');
		$query=$this->Orderdetails->query();
		if($query->update()
				->set(['order_status'=>$order_status])
				->where(['id'=>$order_id])
				->execute()
		){
			$this->redirect(['action'=>'adminIndex']);
		}
	}
}
