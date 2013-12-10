<?php 
class Usuario extends AppModel{
	public $hasMany = array('Estado','Msg');
	
	public $hasAndBelongsToMany = array(
		'Evento' => array(
			'className' => 'Evento',
			'joinTable' => 'eventos_usuarios',
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
        
        var $validate = array(
         
            'senha_confirm' => array(
                    'notEmpty' => array(
                            'rule' => 'notEmpty',
                            'required' => true,
                            'message' => 'Confime sua senha.'
                    ),
                    'minLength' => array(
                            'rule' => array('minLength', 6),
                            'required' => true,
                            'message' => 'Sua senha precisa conter pelo menos 6 caracteres.'
                    ),
                    'passwordConfirmation' => array(
                            'rule'    => array('passwordConfirmation'),
                    'message' => 'As duas senhas não conferem.'
                    ),
                    
            ),
        
    );
        public function passwordConfirmation($data){
         
        $senha = Security::hash($this->data['Usuario']['senha'], null, true);
        $password_confirmation = Security::hash($this->data['Usuario']['senha_confirm'], null, true);
              
        if($senha===$password_confirmation){
             
            return true;
             
        }else{
             
            return false;
             
        }
         
    }
}
?>