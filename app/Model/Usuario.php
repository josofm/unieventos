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
            
            'nome' => array(
                    'notEmpty' => array(
                            'rule' => 'notEmpty',
                            'required' => true,
                            'message' => 'Confime seu nome.'
                    ),
                    'minLength' => array(
                            'rule' => array('minLength', 2),
                            'required' => true,
                            'message' => 'Seu nome precisa conter pelo menos 2 caracteres.'
                    ),                    
                    
            ),
            
            'cpf' => array(
                    'notEmpty' => array(
                            'rule' => 'notEmpty',
                            'required' => true,
                            'message' => 'Confirme seu CPF.'
                    ), 
                    'minLength' => array(
                            'rule' => array('minLength', 11),
                            'required' => true,
                            'message' => 'Seu CPF não está completo.'
                    ),
            ),
            
            'rg' => array(
                    'notEmpty' => array(
                            'rule' => 'notEmpty',
                            'required' => true,
                            'message' => 'Confirme seu RG.'
                    ),
            ),
            'sexo' => array(
                    'notEmpty' => array(
                            'rule' => 'notEmpty',
                            'required' => true,
                            'message' => 'Confirme o Sexo.'
                    ),
            ),
            'email' => array(
                    'notEmpty' => array(
                            'rule' => 'notEmpty',
                            'required' => true,
                            'message' => 'Confirme o e-mail.'
                    ),
            ),
            'estado_id' => array(
                    'notEmpty' => array(
                            'rule' => 'notEmpty',
                            'required' => true,
                            'message' => 'Confirme seu Estado.'
                    ),
            ),
        
    );//
        public function passwordConfirmation($data){
         
        $senha = $this->data['Usuario']['senha'];
        $password_confirmation = Security::hash($this->data['Usuario']['senha_confirm'], null, true);
              
        if($senha===$password_confirmation){
             
            return true;
             
        }else{
             
            return false;
             
        }         
    }
}
?>