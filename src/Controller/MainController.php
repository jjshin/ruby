<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\Products;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class MainController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
		$productObj=new ProductsController;
		$categories=$productObj->get_category();
		$this->set(compact('categories')); 
	}

}
