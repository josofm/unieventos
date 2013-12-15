<?php
App::uses('AppController', 'Controller');

class Imprime_pdf extends AppController {
    
  public function viewPdf($id = null){ 
        $this->Invoice->id = $id;
            if (!$this->Invoice->exists()) {
                throw new NotFoundException(__('Invalid invoice'));
            }
            $this->pdfConfig = array(
                'orientation' => 'portrait',
                'filename' => 'Invoice_' . $id
            );
            $this->set('invoice', $this->Invoice->read(null, $id));
        }    
}
?>
