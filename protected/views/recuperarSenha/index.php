<?php
/* @var $this RecuperarSenhaController */

$this->breadcrumbs=array(
	'senha',
);
?>
<h1>Esqueci minha senha</h1>
<p> Informe seu email e enviaremos uma nova senha.</p>


<form enctype="multipart/form-data" method="post"
      action="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=recuperarSenha'?>">    	    
    
      	<?php if(isset($erro["emailUser"])){echo '<font size="2" color="red">'.$erro["emailUser"].'</font>';}?>
	<div>
		<input type="text" name="emailUser" placeholder="Email do usuário">
	</div>
        	
	<div>
		<button type="submit">Enviar</button>
	</div>
</form>
