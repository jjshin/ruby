<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 */
class CartController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		$this->Auth->deny();
		$this->Auth->allow(['addCart', 'index', 'delCart']);
	}

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function addCart()
    {
				if($this->Auth->user('id')){
	       $this->loadModel('Carts');


				 $productObj=new ProductsController;
				 $qty_check=$productObj->check_qty($this->request->data['products_id'], $this->request->data['qty']);
				 if($qty_check>0){
	 				 $check=$this->Carts->find()
					 						->where(array('users_id'=>$this->Auth->user('id'), 'products_id'=>$this->request->data['products_id']))
											->first();
											//print_r($check);exit;
					 if($check){	//product already in the cart
						 $query=$this->Carts->query();
						 $query->update()
						 					->set(array('qty'=>$check['qty']+$this->request->data['qty']))
											->where(array('id'=>$check['id']))
											->execute();
							return $this->redirect(['action'=>'index']);
					 }else{	// add new product
						 $cart=$this->Carts->newEntity();
						 $data=array(
							 'users_id'=>$this->Auth->user('id'),
							 'products_id'=>$this->request->data['products_id'],
							 'qty'=>$this->request->data['qty']
						 );
						 $cart=$this->Carts->patchEntity($cart, $data);
						 if($this->Carts->save($cart)){
						 	return $this->redirect(['action'=>'index']);
						}
					}
				}else{
					$this->Flash->error(__('Not enough stock.'));
					$this->redirect($this->referer());
				}
			 }
    }

		public function index(){
				if($this->Auth->user('id')){
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
					//print_r($cart);
					$this->set(compact('cart'));
				}
		}

		public function delCart($cart_id){
			if($this->Auth->user('id')){
				$this->loadModel('Carts');
				$entity=$this->Carts->find()
					->where(['id'=>$cart_id, 'users_id'=>$this->Auth->user('id')])
					->first();

				if($this->Carts->delete($entity)){
					$this->redirect(['action'=>'index']);
				}
			}
		}
}
