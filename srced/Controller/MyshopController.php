<?php
namespace App\Controller;

use App\Controller\AppController;

class MyshopController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		$this->Auth->deny();
		$this->Auth->allow(['index', 'order', 'orderDetail']);
	}

	public function index(){
	}

	public function order(){
		$this->loadModel('Orderdetails');

		$orders=$this->Orderdetails->find()
							->where(['users_id'=>$this->Auth->user('id')])
							->order(['id'=>'DESC']);
		$orders=$this->paginate($orders);
		$this->set(compact('orders'));
	}

	public function orderDetail($order_id){
		$this->loadModel('Orderdetails');
		$this->loadModel('Orderproducts');

		$order=$this->Orderdetails->find()
							->where(['users_id'=>$this->Auth->user('id'), 'id'=>$order_id])
							->first();

		$products=$this->Orderproducts->find()
							->select(['Orderproducts.id', 'Orderproducts.orderqty', 'Orderproducts.totalprice', 'Products.name', 'Products.image'])
							->join([
								'table'=>'products',
								'alias'=>'Products',
								'conditions'=>array('Products.id=Orderproducts.products_id'),
								'type'=>'INNER'
							])
							->where(['Orderproducts.orderdetails_id'=>$order_id]);
		$this->set(compact('order', 'products'));
	}

}
