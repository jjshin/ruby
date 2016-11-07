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
    public function index(){
      $this->loadModel('Sliders');
      $sliders=$this->Sliders->find();
      $this->set(compact('sliders'));

      $this->loadModel('Products');
      $new_arrivals=$this->Products->find()
                    ->where(['active'=>1])
                    ->order(['id'=>'desc'])
                    ->limit(4);
      $this->set(compact('new_arrivals'));
    }

}
