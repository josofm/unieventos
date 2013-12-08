<?php 
class Usuario extends AppModel{
	public $hasMany = array('Msg');
	public $hasOne = array('Estado');

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

}
?>