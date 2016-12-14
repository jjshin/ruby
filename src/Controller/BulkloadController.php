<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use PhillipsData\Csv\Reader;
use \SplFileObject;
use Cake\ORM\TableRegistry;
use Cake\Network;


class BulkloadController extends AppController
{

    public function initialize(){
        parent::initialize();
        $this->Auth->deny();
        $this->loadComponent('Upload');
    }


    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
    }



    public function productsImport()
    {
        if ($this->request->is('post')) {
            //echo $this->request->data['csv']['name'];
            if(!empty($this->request->data['csv']['name'])){
                $fileName = $this->request->data['csv']['name'];
                //Check if file name matches
                if ($fileName != 'products.csv') {
                    $this->Flash->error(__('The file name should be products.csv.'));
                    return $this->redirect(['action' => 'products_import']);
                }
                $uploadPath = 'upload/';
                $uploadFile = $uploadPath.$fileName;
                if(move_uploaded_file($this->request->data['csv']['tmp_name'],$uploadFile)){
                    return $this->redirect(['action' => 'productsProcess']);
                }else{
                    $this->Flash->error(__('Unable to upload file, please try again.'));
                }
            }else{
                $this->Flash->error(__('Please choose a file to upload.'));
            }
        }

    }

    public function productsProcess()
    {



        //read csv file
        $reader = Reader::input(new SplFileObject('upload/products.csv'));
        foreach ($reader->fetch() as $line) {
            $lines[] = $line;
        }

        //Store length of lines
        $count = count($lines);
        //echo $count;


        //set up connection
        $connection = TableRegistry::get('products');
        $query = $connection->query();
        date_default_timezone_set('Australia/Melbourne');
        $date = date('Y/m/d H:i:s', time());
        for ($x = 0; $x < $count; $x++) {
            //Loop through each line, Add line to query
            $query->insert(['id', 'name', 'qty', 'sku','brands_id','suppliers_id', 'subcategory_id',
                'image','short_desc','long_desc','retail_price','cost_price', 'sale_price','size','sizeunit',
                'weight','weightunit','height','heightunit','width','widthunit','length','lengthunit',
                'image2','image3','image4','image5','status','active','created'])
                ->values([
                    'id' => null,

                    'name' => $lines[$x]['Name'], //Specific values from excel matching with table fields
                    'qty' => $lines[$x]['Quantity'],
                    'sku' => $lines[$x]['SKU'],
                    'brands_id' => $lines[$x]['Brands ID'],
                    'suppliers_id' => $lines[$x]['Suppliers ID'],
                    'subcategory_id' => $lines[$x]['Subcategory ID'],
                    'image' => $lines[$x]['Image'],
                    'image2' => $lines[$x]['Image2'],
                    'image3' => $lines[$x]['Image3'],
                    'image4' => $lines[$x]['Image4'],
                    'image5' => $lines[$x]['Image5'],
                    'short_desc' => $lines[$x]['Short Desc'],
                    'long_desc' => $lines[$x]['Long Desc'],
                    'retail_price'=>$lines[$x]['Retail Price'],
                    'cost_price'=> $lines[$x]['Cost Price'],
                    'sale_price' => $lines[$x]['Sale Price'],
                    'size'=>$lines[$x]['Size'],
                    'sizeunit'=>$lines[$x]['Size Unit'],
                    'weight'=>$lines[$x]['Weight'],
                    'weightunit'=>$lines[$x]['Weight Unit'],
                    'height'=>$lines[$x]['Height'],
                    'heightunit'=>$lines[$x]['Height Unit'],
                    'width'=>$lines[$x]['Width'],
                    'widthunit'=>$lines[$x]['Width Unit'],
                    'length'=>$lines[$x]['Length'],
                    'lengthunit'=>$lines[$x]['Length Unit'],
                    'status' => $lines[$x]['Status'],
                    'active' => $lines[$x]['Active'],
                    'created' => $date


                ]);
            //echo implode("", $lines[$x]);
        }
        $query->execute(); //execute the query
        $return = array(
            'messages' => array(),
            'errors' => array(),
        );





        $this->Flash->success('The csv file has been imported into database.');

        $this->Flash->success('Please import your image files.');

        return $this->redirect(['action' => 'images_Import']);

    }

    public function imagesImport()
    {

        if ($this->request->is('post')) {
            $fileOK = $this->uploadFiles('img/uploads', $this->request->data['Images']);



            if(array_key_exists('errors', $fileOK))
            {
                foreach ($fileOK['errors'] as $error) {
                    $this->Flash->error($error);
                }
            }
            return $this->redirect(['action' => 'imagesProcess']);
//            debug($fileOK);
        }
        $this->set(compact('image'));
        $this->set('_serialize', ['image']);

    }
    public function imagesProcess(){
        $this->Flash->success('Images has been imported into database');
    }





}