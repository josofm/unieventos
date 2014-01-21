<?php 
class InvoicesController extends AppController {

    public $components = array('RequestHandler');

    public function view($id = null) {
        //$this->autoRender = false;
        $this->Invoice->id = $id;

        if (!$this->Invoice->exists()) {
            throw new NotFoundException(__('Invalid invoice'));
        }

        $this->pdfConfig = array(
            'orientation' => 'landscape',
            'filename' => 'Certificado_' . $id
            );

        $this->set('invoice', $this->Invoice->read(null, $id));
        $this->loadModel('Usuario');
        $this->Usuario->recursive= 0;
        $this->set('user', $this->Usuario->findById($this->Auth->user('id')));

    }

    public function admin_gerar($id = null){
        if($this->request->is('post')){
            $this->Invoice->create();
            $this->request->data['Invoice']['evento_id'] = $id;
            $this->Invoice->save($this->request->data);
            $this->Session->setFlash(__('Os Certificados foram gerados com sucesso!'),'success');
                $this->redirect(array('controller' => 'eventos','action' => 'meusEventos', 'admin' => true,$id));
        }

    }

    public function admin_index(){
        $cer = $this->Invoice->find('all',
            array(
                'fields' => ('*'),
            
            'joins' => array(
                array(
                            'table' => 'cadastros',
                            'alias' => 'cer',
                            'type' => 'INNER', 
                            'conditions'=> array(
                                'cer.usuario_id' =>$this->Auth->user('id')
                                )
                        ),
                array(
                        'table' => 'eventos',
                        'alias' => 'event',
                        'type' => 'INNER', 
                        'conditions'=> array(
                            'event.id =cer.evento_id'
                        )
                    )
                ),
            'group' => 'cer.evento_id'
            ));
        $this->set('cer', $cer);
        
    }
}

?>