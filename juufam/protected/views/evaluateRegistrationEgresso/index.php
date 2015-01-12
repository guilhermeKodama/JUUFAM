<?php
/* @var $this EvaluateRegistrationEgressoController */
$this->breadcrumbs = array (
		'Evaluate Registration Egresso' 
);
?>
<h1>Avaliar Cadastro Egresso</h1>

<?php

$this->widget ( 'zii.widgets.grid.CGridView', array (
		'id' => 'atleta-grid',
		'dataProvider' => $model->searchEgresso (),
		'filter' => $model,
		'columns' => array (
				'matricula',
				'cpf',
				'rg',
				'nome',
				'data_nasc',
				'genero',
				'tipo_atleta',
				'id_curso',
				'status',
				array (
						'class' => 'CButtonColumn',
						'template' => '{approve}{decline}{back}',
						'buttons' => array (
								'approve' => array (
										'label' => 'Aprovar solicitação egresso',
										'imageUrl' => Yii::app ()->request->baseUrl . '/images/approve_32.png',
										'url' => 'Yii::app()->createUrl("evaluateRegistrationEgresso/approve", array("id"=>$data->cpf))',
										'visible' => '$data->status == "em analise"',
								),
								'decline' => array (
										'label' => 'Recusar solicitação egresso',
										'imageUrl' => Yii::app ()->request->baseUrl . '/images/decline_32.png',
										'url' => 'Yii::app()->createUrl("evaluateRegistrationEgresso/decline", array("id"=>$data->cpf))',
										'visible' => '$data->status == "em analise"'
								),'back' => array (
										'label' => 'Recusar solicitação egresso',
										'imageUrl' => Yii::app ()->request->baseUrl . '/images/back_32.png',
										'url' => 'Yii::app()->createUrl("evaluateRegistrationEgresso/back", array("id"=>$data->cpf))',
										'visible' => '$data->status == "aprovado" || $data->status == "reprovado" ',
								)
						) 
				) 
		) 
) );
?>