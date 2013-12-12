<?php 
App::uses('AppController', 'Controller');

class ProgramacoesController extends AppController{
	public $uses = array('Programacao');
    
	public function admin_index($id = null){
        $this->set('prog', $this->Programacao->find('all', array('conditions' => array('evento_id' => $id))));
        $this->set('ide',$id);
	}

	public function admin_programacaoEvento($id = null){
		if ($this->request->is('post')) {
            $this->Programacao->create();
            $this->request->data['Programacao']['evento_id'] = $id;
            if ($this->Programacao->saveAll($this->request->data)) {
                $this->Session->setFlash(__('A programação foi salva.'),'success');
                return $this->redirect(array('action' => 'index','admin' => true, $id));
            }else{
            	$this->Session->setFlash(__('Erro ao enviar sua menssagem.'), 'error');	
            }    
        }		
	}
}

?>