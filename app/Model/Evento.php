<?php 
	class Evento extends AppModel{
		public $hasMany = array('Programacao');
		public $displayField = 'name';

		public $hasAndBelongsToMany = array(
		    'Usuario' => array(
		      'className' => 'Usuario',
		      'joinTable' => 'eventos_usuarios',
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
        
        var $validate = array(
                             
            'nome' => array(
                    'notEmpty' => array(
                            'rule' => 'notEmpty',
                            'required' => true,
                            'message' => 'Confime o nome do Evento.'
                    ),
                    'minLength' => array(
                            'rule' => array('minLength', 2),
                            'required' => true,
                            'message' => 'Precisa conter pelo menos 2 caracteres.'
                    ),                    
                    
            ),
            
            'descricao' => array(
                    'notEmpty' => array(
                            'rule' => 'notEmpty',
                            'required' => true,
                            'message' => 'Confime a Descrição.'
                    ),               
            ),
            
            'data_ini' => array(
                    'notEmpty' => array(
                            'rule' => 'notEmpty',
                            'required' => true,
                            'message' => 'Confime a Data de Início.'
                    ),               
            ),
            
            'data_fim' => array(
                    'notEmpty' => array(
                            'rule' => 'notEmpty',
                            'required' => true,
                            'message' => 'Confime a Data de Término.'
                    ),               
            ),
            
            'tipo_evento' => array(
                    'notEmpty' => array(
                            'rule' => 'notEmpty',
                            'required' => true,
                            'message' => 'Confime o Tipo de Evento.'
                    ),               
            ),
            
            'tema' => array(
                    'notEmpty' => array(
                            'rule' => 'notEmpty',
                            'required' => true,
                            'message' => 'Confime o Tema.'
                    ),               
            ),
            
            'vagas' => array(
                    'notEmpty' => array(
                            'rule' => 'notEmpty',
                            'required' => true,
                            'message' => 'Confime o número de Vagas.'
                    ),               
            ),
            
            'duracao_horas' => array(
                    'notEmpty' => array(
                            'rule' => 'notEmpty',
                            'required' => true,
                            'message' => 'Confime a Duração em Horas.'
                    ),               
            ),
            
                        
        );    
	}
?>