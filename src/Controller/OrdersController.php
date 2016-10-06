<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 */
class OrdersController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		$this->Auth->deny();
		$this->Auth->allow(['addCart', 'cart', 'delCart']);
	}

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function addCart($product_id)
    {
				if($this->Auth->user('username')){
	       $this->loadModel('Carts');
				 $cart=$this->Carts->newEntity();
				 $cart=$this->Carts->patchEntity($cart, ['users_id'=>$this->Auth->user('id'), 'products_id'=>$product_id]);
				 if($this->Carts->save($cart)){
				 	return $this->redirect(['action'=>'cart']);
				}
			 }
    }

		public function cart(){
				if($this->Auth->user('username')){
					$this->loadModel('Carts');
					$cart=$this->Carts->find()
										->select(['Carts.id', 'Products.id', 'Products.name', 'Products.image'])
										->join(array(
												'table'=>'products',
												'alias'=>'Products',
												'conditions'=>array('Carts.products_id = Products.id'),
												'type'=>'inner'
										))
										->where(['Carts.users_id'=>$this->Auth->user('id')]);
					$this->set(compact('cart'));
				}
		}

		public function delCart($cart_id){
			if($this->Auth->user('username')){
				$this->loadModel('Carts');
				$entity=$this->Carts->find()
					->where(['id'=>$cart_id, 'users_id'=>$this->Auth->user('id')])
					->first();

				if($this->Carts->delete($entity)){
					$this->redirect(['action'=>'cart']);
				}
			}
		}
}
