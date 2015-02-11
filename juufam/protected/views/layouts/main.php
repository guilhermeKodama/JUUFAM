


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US"
	xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Jogos Universitários da UFAM</title>

<!-- BOOTSTRAP -->
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />

<!-- END BOOTSTRAP -->

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/main_template/style.css"
	media="screen" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/main_template/application.css" />
<link type="text/css" rel="stylesheet"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/main_template/template_1.css" />
<link type="text/css" rel="stylesheet"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/main_template/template_css.css" />
<link
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/main_template/jquery-ui-1.10.1.custom.css"
	rel="stylesheet" />

<link
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/main_template/main.css"
	rel="stylesheet" />
<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<!-- Scripts -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>





<style type="text/css">
label.error {
	float: none;
	color: red;
	margin: 0 .5em 0 0;
	vertical-align: top;
	font-size: 10px
}
</style>

</head>
<body>
	<div id="art-page-background-glare-wrapper">
		<div id="art-page-background-glare"></div>
	</div>
	<div id="art-main">
		<div class="cleared reset-box"></div>
		<div class="art-header">
			<div class="art-header-img">

				<a href="/atividades_ec/"><img width="100%"src="<?php echo Yii::app()->request->baseUrl; ?>/images/juufam.png" /></a>
                                
                        </div>

			<div class="art-header-presentation">
				<a href="/atividades/"><img width="90%"src="<?php echo Yii::app()->request->baseUrl; ?>/images/sistema.png" /></a>
                                
			</div>

		</div>

		<div class="container">
			<div class="container-side">
				<div class="menu">
				<?php
				$items = array ();
				
				$mEventoController = new EventoController ( 'evento' );
				
				$itemsEventClosed = $mEventoController->getMenuClosedEvents ();
				
				$itemsEventOn = array ('items' => array (
						array ('label' => 'Principal','url' => array ('/site/index')),
						array ('label' => 'Cadastro','url' => array ('/site/index')),
						array ('label' => 'Gerenciar Modalidades','url' => array ('/modalidade/admin')),
						array ('label' => 'Gerenciar Atletas','url' => array ('/atleta/admin')),
						array ('label' => 'Gerenciar Representantes','url' => array ('/representante/admin')),
						array ('label' => 'Gerenciar Institutos','url' => array ('/instituto/admin')),
						array ('label' => 'Gerenciar Unidades','url' => array ('/unidade/admin')),
						array ('label' => 'Gerenciar Cursos','url' => array ('/curso/admin')),
						array ('label' => 'Relatorios','url' => array ('/relatorio/index')),
						array ('label' => 'Certificados','url' => array ('/certificado/index')),
						array ('label' => 'Inscricão','url' => array ('/site/index')),
						array ('label' => 'Regulamento','url' => array ('/site/index')),
						array ('label' => 'Descricão','url' => array ('/descricao/index')),
						array ('label' => 'Logout ('.Yii::app ()->user->name.')',
								'url' => array ('/site/logout' ),
								'visible' => ! Yii::app ()->user->isGuest )));
				
				$itemsEventOff = array ('items' => array_merge($itemsEventClosed,array (
						array ('label' => 'Criar Evento','url' => array ('/evento/index')),
						array ('label' => 'Logout ('.Yii::app ()->user->name.')',
								'url' => array ('/site/logout' ),
								'visible' => ! Yii::app ()->user->isGuest ))));
				
				$itemsLogOff = array (
						'items' => array (
								array (
										'label' => 'Página Inicial',
										'url' => array (
												'/site/index' 
										) 
								),
								array (
										'label' => 'Sobre',
										'url' => array (
												'/site/page',
												'view' => 'about' 
										) 
								),
								array (
										'label' => 'Contato',
										'url' => array (
												'/site/contact' 
										) 
								),
								array (
										'label' => 'Login',
										'url' => array (
												'/site/login' 
										),
										'visible' => Yii::app ()->user->isGuest 
								),
								array (
										'label' => 'Logout (' . Yii::app ()->user->name . ')',
										'url' => array (
												'/site/logout' 
										),
										'visible' => ! Yii::app ()->user->isGuest 
								) 
						) 
				);
				
                                  //Acesso do usuário quando ele é administrador
                                $itemsIsAdmin = array ( 'items' => array (
                                                array ('label' => 'Principal','url' => array ('/site/index')),
						array ('label' => 'Cadastro','url' => array ('/site/index')),
                                    array ('label' => 'Criar Evento','url' => array ('/evento/index')),
						array ('label' => 'Gerenciar Modalidades','url' => array ('/modalidade/admin')),
						array ('label' => 'Gerenciar Atletas','url' => array ('/atleta/admin')),
						array ('label' => 'Gerenciar Representantes','url' => array ('/representante/admin')),
						array ('label' => 'Gerenciar Institutos','url' => array ('/instituto/admin')),
						array ('label' => 'Gerenciar Unidades','url' => array ('/unidade/admin')),
						array ('label' => 'Gerenciar Cursos','url' => array ('/curso/admin')),
						array ('label' => 'Relatorios','url' => array ('/relatorio/index')),
						array ('label' => 'Certificados','url' => array ('/certificado/index')),
						array ('label' => 'Inscricão','url' => array ('/inscricao/index')),
						array ('label' => 'Regulamento','url' => array ('/regulamento/create')),
						array ('label' => 'Descricão','url' => array ('/descricao/index')),
						array ('label' => 'Logout ('.Yii::app ()->user->name.')',
								'url' => array ('/site/logout' ),
								'visible' => ! Yii::app ()->user->isGuest )));
                                
                                //Acesso do usuário quando ele é representante
                                $itemsIsRepresentante =array ( 'items' => array (
                                                array ('label' => 'Principal','url' => array ('/site/index')),
						array ('label' => 'Cadastro','url' => array ('/site/index')),
                                                array ('label' => 'Gerenciar Atletas','url' => array ('/atleta/admin')),
						array ('label' => 'Avaliar Inscrições Externas','url' => array ('/evaluateExternalRegistration/index')),
                                                array ('label' => 'Relatorios','url' => array ('/relatorio/index')),
						array ('label' => 'Certificados','url' => array ('/site/index')),
						array ('label' => 'Inscricão','url' => array ('/inscricao/index')),
						array ('label' => 'Regulamento','url' => array ('/regulamento/index')),
						array ('label' => 'Descricão','url' => array ('/descricao/index')),
						array ('label' => 'Logout ('.Yii::app ()->user->name.')',
								'url' => array ('/site/logout' ),
								'visible' => ! Yii::app ()->user->isGuest )));
                                
                                
				if (!Yii::app ()->user->isGuest && UsuarioController::isAdmin(Yii::app ()->user->name)) {//está logado
					if ($mEventoController->hasEventOpen()) {//tem um evento ocorrendo
						$items = $itemsIsAdmin;
					} else {
						$items = $itemsEventOff;
					}
				} else if (! Yii::app ()->user->isGuest && UsuarioController::isRepresentante ( Yii::app ()->user->name )) { // está logado
					if ($mEventoController->hasEventOpen ()) { // tem um evento ocorrendo
						$items = $itemsIsRepresentante;
					} else {
						$items = $itemsEventOff;
					}
				} else { // não está logado
					$items = $itemsLogOff;
				}
				
				$this->widget ( 'zii.widgets.CMenu', $items );
				
				?>
				</div>
			</div>

			<div class="container-main">
				<?php echo $content; ?>
			</div>
		</div>

		<div class="art-footer">
			<div class="art-footer-body">
				<div class="art-footer-text">
					<p>© ICOMP - Instituto de Computação</p>
				</div>
				<div class="cleared"></div>
			</div>
		</div>
		<div class="cleared"></div>
	</div>
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script
		src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
	<script
		src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js"></script>
</body>
</html>
