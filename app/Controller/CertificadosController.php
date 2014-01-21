<?php
App::uses('AppController', 'Controller');

class CertificadosController extends AppController {
    
  	public function pdf($id = null){ 
    	$this->Certificado->id = $id;

        if (!$this->Certificado->exists()) {
            throw new NotFoundException(__('Opss, certificado invalido'));
        }

        $this->pdfConfig = array(
            'orientation' => 'landscape',
            'filename' => 'Certificado_' . $id
            );

        $this->set('certificado', $this->Certificado->read(null, $id));
    }    
    }    
}
?>
