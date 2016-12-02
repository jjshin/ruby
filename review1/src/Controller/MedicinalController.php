<?php
/**
 * Created by PhpStorm.
 * User: Vuilniss
 * Date: 1/10/2016
 * Time: 5:20 PM
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\View\Helper\FormHelper;

/**
 * Medicinal Controller
 *
 * @property \App\Model\Table\MedicinalTable $Medicinal
 */
class MedicinalController extends AppController
{

    public $paginate = ['order' => ['name' => 'asc']];

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        //allows the public to see these views without having to log in
        $this->Auth->allow(array('about', 'contact','enquire', 'securityprivacy', 'shippingpolicies', 'termsconditions'));

    }

    public function index(){
        if ($this->Auth->user('user_type') == 'admin') {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalmenu');
        } else {
            return $this->redirect(['controller' => 'Pages']);
        }

        $medicinal = $this->paginate($this->Medicinal);

        $this->set(compact('medicinal'));
        $this->set('_serialize', ['medicinal']);
    }

    public function add(){
        if ($this->Auth->user('user_type') == 'admin') {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalmenu');
        } else {
            return $this->redirect(['controller' => 'Pages']);
        }

        $medicinal = $this->Medicinal->newEntity();
        if ($this->request->is('post')) {
            $medicinal = $this->Medicinal->patchEntity($medicinal, $this->request->data);
            if ($this->Medicinal->save($medicinal)) {
                $this->Flash->success(__('This entry has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The entry could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('medicinal'));
        $this->set('_serialize', ['medicinal']);
    }

    public function edit($id = null){
        if ($this->Auth->user('user_type') == 'admin') {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalmenu');
        } else {
            return $this->redirect(['controller' => 'Pages']);
        }

        $medicinal = $this->Medicinal->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $medicinal = $this->Medicinal->patchEntity($medicinal, $this->request->data);
            if ($this->Medicinal->save($medicinal)) {
                $this->Flash->success(__('This entry has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('This entry could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('medicinal'));
        $this->set('_serialize', ['medicinal']);
    }

    public function view($id = null){
        if ($this->Auth->user('user_type') == 'admin' ) {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalmenu');
        } else {
            return $this->redirect(['controller' => 'Pages']);
        }

        $medicinal = $this->Medicinal->get($id, [
            'contain' => []
        ]);

        $this->set('medicinal', $medicinal);
        $this->set('_serialize', ['medicinal']);
    }

    public function delete($id = null){
        if ($this->Auth->user('user_type') == 'admin') {
            $this->Auth->allow();
        } else {
            return $this->redirect(['controller' => 'Pages']);
        }

        $this->request->allowMethod(['post', 'delete']);
        $medicinal = $this->Medicinal->get($id);
        if ($this->Medicinal->delete($medicinal)) {
            $this->Flash->success(__('This section has been deleted.'));
        } else {
            $this->Flash->error(__('This section could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }


    public function about($id = 1) {
        $medicinal = $this->Medicinal->get($id);

        $this->set('medicinal', $medicinal);
        $this->set('_serialize', ['medicinal']);
    }

    public function shippingpolicies($id = 2){
        $medicinal = $this->Medicinal->get($id);

        $this->set('medicinal', $medicinal);
        $this->set('_serialize', ['medicinal']);
    }

    public function termsconditions($id = 3){
        $medicinal = $this->Medicinal->get($id);

        $this->set('medicinal', $medicinal);
        $this->set('_serialize', ['medicinal']);
    }

    public function securityprivacy($id = 4){
        $medicinal = $this->Medicinal->get($id);

        $this->set('medicinal', $medicinal);
        $this->set('_serialize', ['medicinal']);
    }

    public function contact($id = 10){
        $medicinal = $this->Medicinal->get($id);

        $this->set('medicinal', $medicinal);
        $this->set('_serialize', ['medicinal']);
    }

    public function enquire(){
        $medicinal = $this->Medicinal->get($id = 11);

        $this->set('medicinal', $medicinal);
        $this->set('_serialize', ['medicinal']);
    }

    public function welcomemembers($id = 12){
        $medicinal = $this->Medicinal->get($id);

        $this->set('medicinal', $medicinal);
        $this->set('_serialize', ['medicinal']);
    }
}
