<?php

function viewPdf($id = null) 
    { 
        if (!$id) 
        { 
            $this->Session->setFlash('Sorry, there was no property ID submitted.'); 
            $this->redirect(array('action'=>'index'), null, true); 
        } 
        Configure::write('debug',0); // Otherwise we cannot use this method while developing 

        $id = intval($id); 

        $property = $this->__view($id); // here the data is pulled from the database and set for the view 

        if (empty($property)) 
        { 
            $this->Session->setFlash('Sorry, there is no property with the submitted ID.'); 
            $this->redirect(array('action'=>'index'), null, true); 
        } 

        $this->layout = 'pdf'; //this will use the pdf.ctp layout 
        $this->render(); 
    } 

?>
