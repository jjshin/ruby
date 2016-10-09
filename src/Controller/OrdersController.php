<?php
namespace App\Controller;

use App\Controller\AppController;

class OrdersController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		$this->Auth->deny();
		$this->Auth->allow(['index', 'proceed']);
	}

	public function index(){
		$this->loadModel('Carts');

		// Update carts table
		foreach($this->request->data['cart_id'] as $key=>$cart_id){
			$query=$this->Carts->query();
			$qty=$this->request->data['qty'][$key];
			$query->update()
				->set(['qty'=>$qty])
				->where(['id'=>$cart_id])
				->execute();
		}

		// Get cart list
		$cart=$this->getCarts();
		$this->set(compact('cart'));
	}

	public function proceed(){
		$this->loadModel('Orderdetails');
		$this->loadModel('Orderproducts');
		$this->loadModel('Carts');

		// Get Cart List
		$cart=$this->getCarts();
		$total=0;
		foreach($cart as $item){
			$total += $item['qty'] * $item->Products['price'];
		}
		// Add Orderdetails table
		$orderdetail=$this->Orderdetails->newEntity();
		$orderdetail=$this->Orderdetails->patchEntity($orderdetail, ['users_id'=>$this->Auth->user('id'), 'order_status'=>1, 'order_total'=>$total]);
		if($this->Orderdetails->save($orderdetail)){

			foreach($cart as $item){
				// Add Orderproducts table
				$orderproducts=$this->Orderproducts->newEntity();
				$data=array(
					'orderqty'=>$item['qty'],
					'totalprice'=>$item->Products['price'],
					'orderdetails_id'=>$orderdetail->id,
					'products_id'=>$item->Products['id']
				);
				$orderproducts=$this->Orderproducts->patchEntity($orderproducts, $data);
				$this->Orderproducts->save($orderproducts);
			}
			$this->Carts->deleteAll(['users_id'=>$this->Auth->user('id')]);
		}
	}

	private function getCarts(){
		$this->loadModel('Carts');
		$cart=$this->Carts->find()
							->select(['Carts.id', 'Carts.qty', 'Products.id', 'Products.name', 'Products.image', 'Products.price'])
							->join(array(
									'table'=>'products',
									'alias'=>'Products',
									'conditions'=>array('Carts.products_id = Products.id'),
									'type'=>'inner'
							))
							->where(['Carts.users_id'=>$this->Auth->user('id')]);
		return $cart;
	}

	public function adminIndex(){
		$this->viewBuilder()->layout('admin');

		$this->loadModel('Orderdetails');

		$orders=$this->Orderdetails->find()
							->select(['Orderdetails.id', 'Orderdetails.created', 'Orderdetails.order_status', 'Orderdetails.order_total',
											'Users.id', 'Users.firstname', 'Users.lastname', 'Users.username', 'Users.email'])
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
												'Users.id', 'Users.firstname', 'Users.lastname', 'Users.username', 'Users.email'])
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
