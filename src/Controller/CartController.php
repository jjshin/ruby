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
			//Check quantity of product
			$productObj=new ProductsController;
			$qty_check=$productObj->check_qty($this->request->data['products_id'], $this->request->data['qty']);
			if($qty_check>0){
				if($this->Auth->user('id')){	//for users
	       	$this->loadModel('Carts');
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
				}else{ //for none users
					if(empty($this->request->session()->read('session_id'))){
						$this->request->session()->write(['session_id'=> time()]);
					}
					$session_id=$this->request->session()->read('session_id');

					$this->loadModel('Tmpcarts');
	 		 			$check=$this->Tmpcarts->find()
					 						->where(array('session_id'=>$session_id, 'products_id'=>$this->request->data['products_id']))
											->first();
					 if($check){	//product already in the cart
						 $query=$this->Tmpcarts->query();
						 $query->update()
						 					->set(array('qty'=>$check['qty']+$this->request->data['qty']))
											->where(array('id'=>$check['id']))
											->execute();
							return $this->redirect(['action'=>'index']);
					 }else{	// add new product
						 $cart=$this->Tmpcarts->newEntity();
						 $data=array(
							 'session_id'=>$session_id,
							 'products_id'=>$this->request->data['products_id'],
							 'qty'=>$this->request->data['qty']
						 );
						 $cart=$this->Tmpcarts->patchEntity($cart, $data);
						 //echo '<pre>'; print_r($cart);exit;
						 if($this->Tmpcarts->save($cart)){
						 	return $this->redirect(['action'=>'index']);
						}
					}
				}
			}else{
				$this->Flash->error(__('Not enough stock.'));
				$this->redirect($this->referer());
			}
    }

		public function index(){
				if($this->Auth->user('id')){
					$this->loadModel('Carts');
					$this->loadModel('Products');
					$this->loadModel('Brands');
					$cart=$this->Carts->find()
										->select($this->Carts)
										->select($this->Products)
										->select($this->Brands)
										->join(array(
												'table'=>'products',
												'alias'=>'Products',
												'conditions'=>array('Carts.products_id = Products.id'),
												'type'=>'inner'
										))
										->join(array(
												'table'=>'brands',
												'alias'=>'Brands',
												'conditions'=>array('Brands.id = Products.brands_id'),
												'type'=>'left outer'
										))
										->where(['Carts.users_id'=>$this->Auth->user('id')]);
					//print_r($cart);
					$this->set(compact('cart'));
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
			}else{
				$this->loadModel('Tmpcarts');
				$entity=$this->Tmpcarts->find()
					->where(['id'=>$cart_id, 'session_id'=>$this->request->session()->read('session_id')])
					->first();

				if($this->Tmpcarts->delete($entity)){
					$this->redirect(['action'=>'index']);
				}
			}
		}
}
