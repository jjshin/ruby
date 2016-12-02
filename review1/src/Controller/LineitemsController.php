<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Lineitems Controller
 *
 * @property \App\Model\Table\LineitemsTable $Lineitems
 */
class LineitemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

        if ($this->Auth->user('user_type') == 'admin') {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalmenu');
        } else {
            return $this->redirect(['controller' => 'Pages']);
        }
        
        $this->paginate = [
            'contain' => ['Orders', 'Products']
        ];
        $lineitems = $this->paginate($this->Lineitems);

        $this->set(compact('lineitems'));
        $this->set('_serialize', ['lineitems']);
    }

    /**
     * View method
     *
     * @param string|null $id Lineitem id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if ($this->Auth->user('user_type') == 'admin') {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalmenu');
        } else {
            return $this->redirect(['controller' => 'Pages']);
        }
        
        $lineitem = $this->Lineitems->get($id, [
            'contain' => ['Orders', 'Products']
        ]);

        $this->set('lineitem', $lineitem);
        $this->set('_serialize', ['lineitem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Lineitem id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if ($this->Auth->user('user_type') == 'admin') {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalmenu');
        } else {
            return $this->redirect(['controller' => 'Pages']);
        }
        
        $this->request->allowMethod(['post', 'delete']);
        $lineitem = $this->Lineitems->get($id);
        if ($this->Lineitems->delete($lineitem)) {
            $this->Flash->success(__('The lineitem has been deleted.'));
        } else {
            $this->Flash->error(__('The lineitem could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
