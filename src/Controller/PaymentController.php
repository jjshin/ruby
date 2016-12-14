<?php
namespace App\Controller;

use App\Controller\AppController;

class PaymentController extends AppController
{

    public function success()
    {
      $trasncationid = $this->request->param['tx'];
      $status = $this->request->param['st'];

    }

    public function failed(){

    }
}
