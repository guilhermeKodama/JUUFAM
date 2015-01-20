<?php
/* @var $this EvaluateExternalRegistrationController */
$this->breadcrumbs = array (
		'Evaluate External Registration' 
);
?>
<h1>Avaliar Inscrições Externas</h1>

<?php

$this->widget ( 'zii.widgets.grid.CGridView', array (
		'id' => 'atleta-grid',
		'dataProvider' => $model->searchExternalRegistrarion ( Yii::app ()->user->id ),
		'filter' => $model,
		'columns' => array (
				array (
						'header' => 'CPF',
						'value' => 'Atleta::model()->findByPk($data->id_atleta)->cpf',
						'type'=>'raw'
				),
				array (
						'header' => Atleta::model()->getAttributeLabel('nome'),
						'value' => 'Atleta::model()->findByPk($data->id_atleta)->nome',
						'type'=>'raw'
				),
				array (
						'header' => 'Curso Atleta',
						'value' => 'Curso::model()->findByPk(Atleta::model()->findByPk($data->id_atleta)->id_curso)->nome',
						'type'=>'raw'
				),
				array (
						'header' => 'Modalidade',
						'value' => 'Modalidade::model()->findByPk(Time::model()->findByPk($data->id_time)->id_modalidade)->nome',
						'type'=>'raw'
				),
				array (
						'header' => 'Curso Time',
						'value' => 'Curso::model()->findByPk(Time::model()->findByPk($data->id_time)->id_curso)->nome',
						'type'=>'raw'
				),
				'status',
				array (
						'class' => 'CButtonColumn',
						'template' => '{approve}{decline}{back}',
						'buttons' => array (
								'approve' => array (
										'label' => 'Aprovar solicitação egresso',
										'imageUrl' => Yii::app ()->request->baseUrl . '/images/approve_32.png',
										'url' => 'Yii::app()->createUrl("evaluateExternalRegistration/approve", array("id"=>$data->id))',
										'visible' => '$data->status == "em analise"' 
								),
								'decline' => array (
										'label' => 'Recusar solicitação egresso',
										'imageUrl' => Yii::app ()->request->baseUrl . '/images/decline_32.png',
										'url' => 'Yii::app()->createUrl("evaluateExternalRegistration/decline", array("id"=>$data->id))',
										'visible' => '$data->status == "em analise"' 
								),
								'back' => array (
										'label' => 'Voltar para analise',
										'imageUrl' => Yii::app ()->request->baseUrl . '/images/back_32.png',
										'url' => 'Yii::app()->createUrl("evaluateExternalRegistration/back", array("id"=>$data->id))',
										'visible' => '$data->status == "aprovado" || $data->status == "reprovado" ' 
								) 
						) 
				) 
		) 
) );

?>
