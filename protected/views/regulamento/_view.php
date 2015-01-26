<?php
/* @var $this RegulamentoController */
/* @var $data Regulamento */
?>

<div class="view">

	<b> <?php echo CHtml::encode($data->getAttributeLabel('ano')); ?>:</b>
            <?php echo CHtml::link(CHtml::encode($data->ano), array('view', 'id'=>$data->ano)); ?>
	<br />

	<b> <?php echo CHtml::encode($data->getAttributeLabel('link')); ?>:</b>
        
            <?php //Yii::app()->createUrl('C:/xampp/htdocs/juufam/regulamento/').
            
        echo CHtml::link('Download', CHtml::encode($data->link), array('class' => 'hello')); ?>
	<br />


</div>