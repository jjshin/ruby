<?php

namespace App\Controller;

use App\Model\Entity\Orderdetail;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use App\Controller\AppController;
use Cake\ORM\Query;
use Cake\Network\Http\Client;
class OrdersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->deny();
        $this->Auth->allow(['index', 'proceed', 'success']);
    }

    public function index()
    {

        if ($this->Auth->user('id')) {
            $this->loadModel('Carts');

            // Update carts table
            foreach ($this->request->data['cart_id'] as $key => $cart_id) {
                $qty = $this->request->data['qty'][$key];
                $product_id = $this->request->data['product_id'][$key];

                $productObj = new ProductsController;
                $qty_check = $productObj->check_qty($product_id, $qty);
                if ($qty_check > 0) {
                    $query = $this->Carts->query();
                    $query->update()
                        ->set(['qty' => $qty])
                        ->where(['id' => $cart_id])
                        ->execute();
                } else {
                    $this->Flash->error(__('Not enough stock.'));
                    $this->redirect($this->referer());
                }
            }
        } else {
            $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        // Get cart list
        $cart = $this->getCarts();
        $this->set(compact('cart'));


    }

    private function getCarts()
    {
        if ($this->Auth->user('id')) {
            $this->loadModel('Carts');
            $cart = $this->Carts->find()
                ->select(['Carts.id', 'Carts.qty', 'Products.id', 'Products.name', 'Products.image', 'Products.sale_price'])
                ->join(array(
                    'table' => 'products',
                    'alias' => 'Products',
                    'conditions' => array('Carts.products_id = Products.id'),
                    'type' => 'inner'
                ))
                ->where(['Carts.users_id' => $this->Auth->user('id')]);
        } else {
            $this->loadModel('Tmpcarts');
            $cart = $this->Tmpcarts->find()
                ->select($this->Tmpcarts)
                ->select($this->Tmpcarts->Products)
                ->join(array(
                    'table' => 'products',
                    'alias' => 'Products',
                    'conditions' => array('Tmpcarts.products_id = Products.id'),
                    'type' => 'inner'
                ))
                ->where(['Tmpcarts.session_id' => $this->request->session()->read('session_id')]);
        }
        return $cart;
        $totalQty = $carts->qty;
        $this->set('totalQty', $totalQty);
    }


public function proceed(){
    $this->viewBuilder()->layout('ajax');
      $this->loadModel('Orderdetails');
      $this->loadModel('Orderproducts');
      $this->loadModel('Carts');

      // Get Cart List
      $cart=$this->getCarts();
      $total=0;
      foreach($cart as $item){
         //Check qty of product
         $productObj=new ProductsController;
         $qty_check=$productObj->check_qty($item->Products['id'], $item['qty']);
         if($qty_check>0){   //continue
            $total += $item['qty'] * $item->Products['sale_price'];
         }else{
            $this->Flash->error(__('Not enough stock.'));
            break;
         }
      }
      $this->set('total', $total);
      if($qty_check>0){
         // Add Orderdetails table
         $orderdetail=$this->Orderdetails->newEntity();
         $od_data=array(
            'users_id'=>$this->Auth->user('id'),
            'order_status'=>1,
            'order_total'=>$total,
            'receive_name'=>$this->request->data['receive_name'],
            'phone'=>$this->request->data['phone'],
            'address1'=>$this->request->data['address1'],
            'address2'=>$this->request->data['address2'],
            'suburb'=>$this->request->data['suburb'],
            'state'=>$this->request->data['state'],
            'postcode'=>$this->request->data['postcode']
         );
         $orderdetail=$this->Orderdetails->patchEntity($orderdetail, $od_data);
         if($this->Orderdetails->save($orderdetail)){

            foreach($cart as $item){
               // Add Orderproducts table
               $orderproducts=$this->Orderproducts->newEntity();
               $data=array(
                  'orderqty'=>$item['qty'],
                  'totalprice'=>$item->Products['sale_price'],
                  'orderdetails_id'=>$orderdetail->id,
                  'products_id'=>$item->Products['id']
               );
               $orderproducts=$this->Orderproducts->patchEntity($orderproducts, $data);
               $this->Orderproducts->save($orderproducts);

               // Reduce qty of products table
               $conn = ConnectionManager::get('default');
               $conn->execute('UPDATE products SET qty=qty-'. $item['qty'].' WHERE id='.$item->Products['id']);
            }
            $this->Carts->deleteAll(['users_id'=>$this->Auth->user('id')]);

            $this->loadModel('Products');
            $products=$this->Orderproducts->find()
                           ->select($this->Orderproducts)
                           ->select($this->Products)
                           ->join(array(
                                 'table'=>'products',
                                 'alias'=>'Products',
                                 'conditions'=>array('Orderproducts.products_id = Products.id'),
                                 'type'=>'inner'
                           ))
                           ->where(['orderdetails_id'=> $orderdetail->id]);
            $products_id = $item->Products['id'];
             //debug($products_id);

             $query = $this->Products->find();
             $query->select(['weight'])
                 ->where(['id' => $products_id]);
             foreach ($query as $row) {
                 $weight = ($row->weight);
             }

             //debug($weight);
             $totalweight = $weight * $item['qty'];
             //debug($totalweight);

            $this->set(compact('products'));
            $this->set('order_id', $orderdetail->id);

             $http = new Client();
             $response = '{}';
             $link = 'http://api.fastway.org/v2/psc/lookup'.'/MEL/'.$this->request->data['suburb'].'/'
                 .$this->request->data['postcode'].'/'.$totalweight.'?api_key=4722ec68c2977ee513038aadb45e218e';

             //debug($link);
           //  die();

             $response = $http->get($link, ['type' => 'json']);

             $this->set('response', $response->body());





         }
      }else{
         $this->redirect(['controller'=>'Cart', 'action'=>'index']);
      }

   }

    public function adminIndex()
    {
        $this->viewBuilder()->layout('admin');

        $this->loadModel('Orderdetails');

        $orders = $this->Orderdetails->find()
            ->select(['Orderdetails.id', 'Orderdetails.created', 'Orderdetails.order_status', 'Orderdetails.order_total',
                'Users.id', 'Users.firstname', 'Users.lastname', 'Users.email'])
            ->join([
                'table' => 'users',
                'alias' => 'Users',
                'conditions' => ['Orderdetails.users_id=Users.id'],
                'type' => 'INNER'
            ])
            ->order(['Orderdetails.id' => 'DESC']);
        $orders = $this->paginate($orders);
        $this->set(compact('orders'));
    }

    public function adminDetail($order_id)
    {
        $this->viewBuilder()->layout('admin');

        $this->loadModel('Orderdetails');
        $this->loadModel('Orderproducts');


        $order = $this->Orderdetails->find()
            ->select($this->Orderdetails)
            ->select([
                'Users.id', 'Users.firstname', 'Users.lastname', 'Users.email'])
            ->join([
                'table' => 'users',
                'alias' => 'Users',
                'conditions' => ['Orderdetails.users_id=Users.id'],
                'type' => 'INNER'
            ])
            ->where(['Orderdetails.id' => $order_id])
            ->first();

        $products = $this->Orderproducts->find()
            ->select(['Orderproducts.id', 'Orderproducts.orderqty', 'Orderproducts.totalprice', 'Products.name', 'Products.sale_price', 'Products.image'])
            ->join([
                'table' => 'products',
                'alias' => 'Products',
                'conditions' => array('Products.id=Orderproducts.products_id'),
                'type' => 'INNER'
            ])
            ->where(['Orderproducts.orderdetails_id' => $order_id]);
        $this->set(compact('order', 'products'));
    }

    public function changeStatus($order_id, $order_status, $id)
    {
        $this->loadModel('Orderdetails');
        $this->loadModel('Orderproducts');
        $this->loadModel('Users');
        $this->loadModel('Products');

        $query = $this->Orderdetails->query();
       // debug($order_id);
        if ($query->update()
            ->set(['order_status' => $order_status])
            ->where(['id' => $order_id])
            ->execute()
        )
            $query = $this->Orderdetails->find();
        $query->select(['users_id'])
            ->where(['id' => $order_id]);
        foreach ($query as $row) {
            $user = ($row->users_id);
        }

        $query1 = $this->Users->find();
        $query1->select(['email'])
            ->where(['id' => $user]);

        foreach ($query1 as $row) {
            $mail = ($row->email);
        }
        $query2 = $this->Orderproducts->find();
        $query2->select(['products_id'])
            ->where(['orderdetails_id' => $order_id]);
        foreach ($query2 as $row){
            $products_id =($row->products_id);

        }
        //debug($products_id);
        $query3 = $this->Products->find();
        $query3->select(['image'])
            ->where(['id'=> $products_id]);
        foreach ($query3 as $row){
            $pic = ($row->image);
        }
        //debug($pic);


        $email = new Email('gmail');
        $email
            ->to(array($mail, 'rubysgiftstest@gmail.com'))
            ->from('rubysgiftstest@gmail.com')
            ->subject('Order Status Changed')
            ->attachments([
                'Product.jpg' => [
                    'file' => 'img/'.$pic,
                    'mimetype' => 'image/jpg',
                    'contentId' => 'my-unique-id'
                ]
            ])

            ->viewVars(['value' => $order_status])
            ->viewVars(['value1'=>$order_id])
            ->template('status')
            ->emailFormat('html')
            ->send();
        {
            $this->redirect(['action' => 'adminIndex']);
        }
    }

    public function success($order_id)
    {
        $this->loadModel('Orderdetails');
        $this->loadModel('Orderproducts');
        $this->loadModel('Users');
        $this->loadModel('Products');


        $query = $this->Orderdetails->find();
        $query->select(['users_id'])
            ->where(['id' => $order_id]);
        foreach ($query as $row) {
            $user = ($row->users_id);
        }

        $query->select(['receive_name'])
            ->where(['id' => $order_id]);
        foreach ($query as $row) {
            $name = ($row->receive_name);
        }

        $query -> select(['order_total'])
            ->where(['id'=> $order_id]);
        foreach ($query as $row) {
            $order_total = ($row->order_total);
        }
        $query -> select(['created'])
            ->where(['id'=> $order_id]);
        foreach ($query as $row) {
            $created = ($row->created);
        }



        $query1 = $this->Users->find();
        $query1->select(['email'])
            ->where(['id' => $user]);

        foreach ($query1 as $row) {
            $mail = ($row->email);
        }
        $query2 = $this->Orderproducts->find();
        $query2->select(['products_id'])
            ->where(['orderdetails_id' => $order_id]);
        foreach ($query2 as $row){
            $products_id = ($row->products_id);
        }




        $query2->select(['orderqty'])
            ->where(['orderdetails_id' => $order_id]);
        foreach ($query2 as $row){
            $orderqty =($row->orderqty);
        }
        $query2->select(['totalprice'])
            ->where(['orderdetails_id' => $order_id]);
        foreach ($query2 as $row){
            $unitprice =($row->totalprice);
        }



        //debug($products_id);
        $query3 = $this->Products->find();
        $query3->select(['image'])
            ->where(['id'=> $products_id]);
        foreach ($query3 as $row){
            $pic = ($row->image);
        }
       // debug($pic);

        $query3->select(['name'])
            ->where(['id'=> $products_id]);

        foreach ($query3 as $row){
            $products_name = $row->name;

        }




        $email = new Email('gmail');
        $email
            ->to(array($mail, 'rubysgiftstest@gmail.com'))
            // ->from('rubysgiftstest@gmail.com')
            ->subject('Order Conformation Details')
                ->attachments([
                    'Product.jpg' => [
                        'file' => 'img/'.$pic,
                        'mimetype' => 'image/jpg',
                        'contentId' => 'my-unique-id'
                    ]
                ])

            ->viewVars(['value1'=>$order_id])
            ->viewVars(['value2'=>$name])
            ->viewVars(['value3'=>$products_name])
            ->viewVars(['value4'=>$order_total])
            ->viewVars(['value5'=>$orderqty])
            ->viewVars(['value6'=>$unitprice])
            ->viewVars(['value7'=>$created])
            ->template('order')
            ->emailFormat('html')
            ->send();




        $tx=$this->request->query('tx');
        $st=$this->request->query('st');



        if($st=='Completed'){
            $this->loadModel('Orderdetails');
            $query = $this->Orderdetails->query();
                    
            $query->update()
                ->set([
                    'order_status'=>2,
                    'tranid'=>$tx
                ])
                ->where(['id'=>$order_id])
                ->execute();


        }


        /*    $email = new Email('gmail');
            $email
                ->to('rubysgiftstest@gmail.com')
                ->subject('Order Information')

                ->viewVars(['value' => $item->Products['name']])
                ->viewVars(['value1' => $item['qty']])
                ->viewVars(['value2' => $item->Orderdetails['receive_name']])
                ->template('order')
                ->emailFormat('html')
                ->send();
            }*/
    }
}

