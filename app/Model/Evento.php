<?php 
        class Evento extends AppModel{
                public $hasMany = array('Programacao','Inscricao');
                public $displayField = 'name';
                
                //public $actsAs = array('Locale.Locale');

                public $hasAndBelongsToMany = array(
                    'Usuario' => array(
                      'className' => 'Usuario',
                      'joinTable' => 'cadastros',
                      'foreignKey' => 'evento_id',
                      'associationForeignKey' => 'usuario_id',
                      'unique' => 'keepExisting',
                    )  
                );


                public function beforeSave($options = array()){
                      // Get and loop all the HABTM models related to the POST
              foreach (array_keys($this->hasAndBelongsToMany) as $model){
                  // transform the data so instead of having
                  // $this->data['Post']['Tag'] you'll get $this->data['Tag']['Tag']
                  if(isset($this->data[$this->name][$model])){
                      $this->data[$model][$model] = $this->data[$this->name][$model];
                      unset($this->data[$this->name][$model]);
                  }
              }
              return true;
                  }
                
                public $components = array('Security');
        
           
        }
?>