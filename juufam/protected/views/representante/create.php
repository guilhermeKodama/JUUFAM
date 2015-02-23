<?php
/* @var $this RepresentanteController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Criar',
);

$this->menu=array(
	array('label'=>'Listar Usuarios', 'url'=>array('index')),
	array('label'=>'Gerenciar Usuarios', 'url'=>array('admin')),
);
?>
<p>
</br><div class="infoblock shadow"><h1 style="color:#4682B4;"><b>Cadastrar Usuário</b></h1></div>
<hr>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>