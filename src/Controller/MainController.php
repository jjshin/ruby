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
    }

}
