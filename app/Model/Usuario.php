<?php 
class Usuario extends AppModel{
	public $hasMany = array('Estado','Msg');
    
    public $actsAs = array(
        'MeioUpload.MeioUpload' => array(
            'foto' => array(
                'allowedMime' => array('image/jpeg', 'image/pjpeg', 'image/png'),
                'allowedExt' => array('.jpg', '.jpeg', '.png'),
                'fields' => array(
                    'dir' => 'pasta',
                    'filesize' => 'tamanho',
                    'mimetype' => 'mimetype'
                ),
            )
        )
    );
	
	public $hasAndBelongsToMany = array(
		'Evento' => array(
			'className' => 'Evento',
			'joinTable' => 'cadastros',
			'foreignKey' => 'usuario_id',
			'associationForeignKey' => 'evento_id',
			'unique' => 'keepExisting',
			)
		);

	public function beforeSave($created = true){
		$senha = $this->data['Usuario']['senha'];
		if(!empty($senha)){
			$senha = AuthComponent::password($senha);
			$this->data['Usuario']['senha'] = $senha;
		}
		
		return parent::beforeSave($created);	
	}
        
        //apagar daqui em diante
        public $components = array('Security');
        
        
        public function passwordConfirmation($data){
         
        $senha = Security::hash($this->data['Usuario']['senha'], null, true);
        $password_confirmation = Security::hash($this->data['Usuario']['senha_confirm'], null, true);
              
        if($senha===$password_confirmation){
             
            return true;
             
        }else{
             
            return false;
             
        }         
    }
    
   /* var $name = 'Usuario';
	var $actsAs = array('CakeBr.Validacao'); // Aqui inclui o behavior do plugin CakeBr
	var $validates = array(
		'cpf' => array(
			'rule' => 'cpf'
		)
	);*/
}
?>