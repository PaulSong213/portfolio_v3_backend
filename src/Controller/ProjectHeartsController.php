<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ProjectHearts Controller
 *
 * @property \App\Model\Table\ProjectHeartsTable $ProjectHearts
 * @method \App\Model\Entity\ProjectHeart[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectHeartsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Projects'],
        ];
        $projectHearts = $this->paginate($this->ProjectHearts);

        $this->set(compact('projectHearts'));
    }

    /**
     * View method
     *
     * @param string|null $id Project Heart id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projectHeart = $this->ProjectHearts->get($id, [
            'contain' => ['Projects'],
        ]);

        $this->set(compact('projectHeart'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projectHeart = $this->ProjectHearts->newEmptyEntity();
        if ($this->request->is('post')) {
            $projectHeart = $this->ProjectHearts->patchEntity($projectHeart, $this->request->getData());
            if ($this->ProjectHearts->save($projectHeart)) {
                $this->Flash->success(__('The project heart has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project heart could not be saved. Please, try again.'));
        }
        $projects = $this->ProjectHearts->Projects->find('list', ['limit' => 200]);
        $this->set(compact('projectHeart', 'projects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Project Heart id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projectHeart = $this->ProjectHearts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectHeart = $this->ProjectHearts->patchEntity($projectHeart, $this->request->getData());
            if ($this->ProjectHearts->save($projectHeart)) {
                $this->Flash->success(__('The project heart has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project heart could not be saved. Please, try again.'));
        }
        $projects = $this->ProjectHearts->Projects->find('list', ['limit' => 200]);
        $this->set(compact('projectHeart', 'projects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project Heart id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectHeart = $this->ProjectHearts->get($id);
        if ($this->ProjectHearts->delete($projectHeart)) {
            $this->Flash->success(__('The project heart has been deleted.'));
        } else {
            $this->Flash->error(__('The project heart could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function count($part = null,$projectId = null){
        $this->response = $this->response->cors($this->request)
        ->allowOrigin(['http://localhost:8080','https://jpsong.netlify.app',
            'https://jpsong.netlify.app/'])
        ->allowMethods(['GET', 'POST'])
        ->allowHeaders(['X-CSRF-Token'])
        ->allowCredentials()
        ->exposeHeaders(['Link'])
        ->maxAge(300)
        ->build();
        $projectHearts = null;
        if(!$projectId){
            $this->paginate = [
                'contain' => ['Projects'],
            ];
            $projectHearts = $this->paginate($this->ProjectHearts);
        }else{
            $this->paginate = [
                'contain' => ['Projects'],
                'conditions' =>['ProjectHearts.project_id' => $projectId],
            ];
            $projectHearts = $this->paginate($this->ProjectHearts);
        }
        
        $this->set(compact('projectId','projectHearts','part'));
    }
    
    public function addByUsers( $projectId = 2,$ipAddress= '')
    {   
        if ($this->request->is('post')) {
            $projectHeart = $this->ProjectHearts->newEmptyEntity();
            $projectHeart->project_id = $projectId;
            $projectHeart->ip_address = $ipAddress;
            if ($this->ProjectHearts->save($projectHeart)) {
                echo 'added';
            }
        }        
    }
    
}
