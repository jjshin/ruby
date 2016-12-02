<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sliders Controller
 *
 * @property \App\Model\Table\SlidersTable $Sliders
 */
class SlidersController extends AppController
{
    public function initialize()
    {
      parent::initialize();
      $this->Auth->deny();
      $this->viewBuilder()->layout('admin');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $sliders = $this->paginate($this->Sliders);

        $this->set(compact('sliders'));
        $this->set('_serialize', ['sliders']);
    }

    /**
     * View method
     *
     * @param string|null $id Slider id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $slider = $this->Sliders->get($id, [
            'contain' => []
        ]);

        $this->set('slider', $slider);
        $this->set('_serialize', ['slider']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $slider = $this->Sliders->newEntity();
        if ($this->request->is('post')) {
            /* Image upload */
            $image=$this->request->data['img'];
            $target_dir = "img/sliders/";
      			if(!$image['error']){
      				$file_name=basename($image["name"]);
      				$target_file = $target_dir . $file_name;

      				// Check if file already exists
      				if (file_exists($target_file)) {
      					$arrFilename = explode('.', $file_name);
      					$file_name = $arrFilename[0].'_'.time().'.'.$arrFilename[1];
      					$target_file = $target_dir . $file_name;
      				}

      				if (move_uploaded_file($image["tmp_name"], $target_file)) {
      					$this->request->data['img']='sliders/'.$file_name;
      				} else {
      					echo "Sorry, there was an error uploading your file.";exit;
      				}
      			}

            $slider = $this->Sliders->patchEntity($slider, $this->request->data);
            if ($this->Sliders->save($slider)) {
                $this->Flash->success(__('The slider has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The slider could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('slider'));
        $this->set('_serialize', ['slider']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Slider id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $slider = $this->Sliders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
          /* Image upload */
          $image=$this->request->data['img'];
          $target_dir = "img/sliders/";
          if(!$image['error']){
            $file_name=basename($image["name"]);
            $target_file = $target_dir . $file_name;

            // Check if file already exists
            if (file_exists($target_file)) {
              $arrFilename = explode('.', $file_name);
              $file_name = $arrFilename[0].'_'.time().'.'.$arrFilename[1];
              $target_file = $target_dir . $file_name;
            }

            if (move_uploaded_file($image["tmp_name"], $target_file)) {
              $this->request->data['img']='sliders/'.$file_name;
            } else {
              echo "Sorry, there was an error uploading your file.";exit;
            }
          }else{
            unset($this->request->data['img']);
          }


            $slider = $this->Sliders->patchEntity($slider, $this->request->data);
            if ($this->Sliders->save($slider)) {
                $this->Flash->success(__('The slider has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The slider could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('slider'));
        $this->set('_serialize', ['slider']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Slider id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $slider = $this->Sliders->get($id);
        if ($this->Sliders->delete($slider)) {
            $this->Flash->success(__('The slider has been deleted.'));
        } else {
            $this->Flash->error(__('The slider could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
