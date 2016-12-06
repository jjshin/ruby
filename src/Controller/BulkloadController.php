<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use PhillipsData\Csv\Reader;
use \SplFileObject;
use Cake\ORM\TableRegistry;


class BulkloadController extends AppController
{

    public function initialize()
    {

    }

    public function index()
    {
        if ($this->request->is('post')) {
            //echo $this->request->data['csv']['name'];
            if(!empty($this->request->data['csv']['name'])){
                $fileName = $this->request->data['csv']['name'];
                //Check if file name matches
                if ($fileName != 'test.csv') {
                    $this->Flash->error(__('The file name should be test.csv.'));
                    return $this->redirect(['action' => 'import']);
                }
                $uploadPath = 'upload/';
                $uploadFile = $uploadPath.$fileName;
                if(move_uploaded_file($this->request->data['csv']['tmp_name'],$uploadFile)){
                    return $this->redirect(['action' => 'process']);
                }else{
                    $this->Flash->error(__('Unable to upload file, please try again.'));
                }
            }else{
                $this->Flash->error(__('Please choose a file to upload.'));
            }
        }

    }

    public function process()
    {


        //read csv file
        $reader = Reader::input(new SplFileObject('upload/test.csv'));
        foreach ($reader->fetch() as $line) {
            $lines[] = $line;
        }

        //Store length of lines
        $count = count($lines);
        //echo $count;


            //set up connection
            $connection = TableRegistry::get('maincategory');
            $query = $connection->query();
            for ($x = 0; $x < $count; $x++) {
                //Loop through each line, Add line to query
                $query->insert(['id', 'name'])
                    ->values([
                        'id' => null,
                        'name' => $lines[$x]['Main Category Name']//Specific values from excel matching with table fields

                    ]);
                //echo implode("", $lines[$x]);
            }
            $query->execute(); //execute the query

            //$this->Flash->success('The csv file has been imported into database');



            return $this->redirect(['action' => 'import']);

        }




}