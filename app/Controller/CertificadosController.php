<?php
App::uses('AppController', 'Controller');

class CertificadosController extends AppController {
    
  public function pdf($id = null){ 
        $this->Certificado->id = $id;
            
            $this->set('certificado', $this->Certificado->read(null, $id));
        }    
}
?>
