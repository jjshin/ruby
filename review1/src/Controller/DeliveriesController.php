<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Deliveries Controller
 *
 * @property \App\Model\Table\DeliveriesTable $Deliveries
 */
class DeliveriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $deliveries = $this->paginate($this->Deliveries);

        $this->set(compact('deliveries'));
        $this->set('_serialize', ['deliveries']);
    }

    /**
     * View method
     *
     * @param string|null $id Delivery id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $delivery = $this->Deliveries->get($id, [
            'contain' => []
        ]);

        $this->set('delivery', $delivery);
        $this->set('_serialize', ['delivery']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $delivery = $this->Deliveries->newEntity();
        if ($this->request->is('post')) {
            $delivery = $this->Deliveries->patchEntity($delivery, $this->request->data);
            if ($this->Deliveries->save($delivery)) {
                $this->Flash->success(__('The delivery has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The delivery could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('delivery'));
        $this->set('_serialize', ['delivery']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Delivery id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $delivery = $this->Deliveries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $delivery = $this->Deliveries->patchEntity($delivery, $this->request->data);
            if ($this->Deliveries->save($delivery)) {
                $this->Flash->success(__('The delivery has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The delivery could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('delivery'));
        $this->set('_serialize', ['delivery']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Delivery id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $delivery = $this->Deliveries->get($id);
        if ($this->Deliveries->delete($delivery)) {
            $this->Flash->success(__('The delivery has been deleted.'));
        } else {
            $this->Flash->error(__('The delivery could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
