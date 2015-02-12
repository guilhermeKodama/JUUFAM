<?php

class RecuperarSenhaController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
               
	}

	public function actionRecuperarSenha(){
            ini_set('display_erros', 1);
            ini_set('display_startup_erros',1);
            error_reporting(E_ALL);
		if (isset ( $_POST ['RecuperarSenha'])) {
                    //print_r($_POST ['RecuperarSenha']['login']);
                    $login = $_POST ['RecuperarSenha']['login'];  
                    $email = $_POST ['RecuperarSenha']['email'];
                    $model=new RecuperarSenha();
                            //$emailform = $_POST['email'];
                            $modelUsuario = RecuperarSenha::model()->findByPk ($login );
                          if($email ==  $modelUsuario->email){
                               
                            //print_r($modelUsuario);
                           // print_r($modelUsuario);                            exit();
                               $geradorDeSenha = new GeraSenha();				
                                print("aqui");
				$novaSenha = $geradorDeSenha->geraSenha();
                                
                                
				$modelUsuario->senha = $novaSenha;		
		
                                
				$modelUsuario->save();print("aqui3");
				$nome = $modelUsuario->nome;
				$to = $modelUsuario->email;
				$from = "sistemas@icomp.ufam.edu.br";
				$subject = "CADASTRO JUUFAM - REDEFINIR SENHA";
				$message = "<html>
							<h2>Gestão JUUFAM</h2>
							Olá $nome.
							<br/>
							Esta é uma menssagem automática, não responda.
							<br/>
							<br/>
							
							<br/>
							Sua nova senha é: <b>$novaSenha</b>
							<br/>
							<br/>
							Clique <a href='http://localhost/juufam/juufam/index.php/site/login'>aqui</a> para acessar o sistema.
							<br/>
							Ou cole esse link no seu navegador. [http://localhost/juufam/juufam/index.php/site/login]
							<br/>
							<br/>
							Obrigado.
							<br/>
							<br/>
						</html>";
				$mail=Yii::app()->Smtpmail;
				$mail->SetFrom($from, 'no-reply - Gestão JUUFAM');
				$mail->Subject = $subject;
				$mail->MsgHTML($message); 
				$mail->AddAddress($to, "");
                                print("antes send");
                                $mail->Send();
                                print("depois send");
				/*if(!$mail->Send()) {
					$this->redirect('index.php/site/erroMail',array('erro' => $mail->ErrorInfo));
					//echo "Mailer Error: " . $mail->ErrorInfo;
				}else{
					$this->redirect('/juufam/juufam/index.php');
				}
                            }else{
                                print("Email incorreto");
                            }
                          }*/}
                
		else{
			$this->render('pages/recuperarSenha',array('model'=>$model));
		}
        }}
	public function actionErroMail(){
		$this->render('erroMail');
	}
        
        public function actionAlteraSenha(){
           if (isset ( $_POST ['RecuperarSenha'])) {
                    //print_r($_POST ['RecuperarSenha']['login']);
                    $login = $_POST ['RecuperarSenha']['login'];  
                    $email = $_POST ['RecuperarSenha']['email'];
                    $senhaNova = $_POST['RecuperarSenha']['senha'];
                    $model=new RecuperarSenha();
                            //$emailform = $_POST['email'];
                            $modelUsuario = RecuperarSenha::model()->findByPk ($login );
                          if($email ==  $modelUsuario->email && $login == $modelUsuario->login){
                              $modelUsuario->senha = $senhaNova;
                              $modelUsuario->save();
                               echo'<script> alert("Senha Alterada Com sucesso");</script>'; 
                              $this->redirect('/juufam/juufam/index.php');
                          }else{
                              echo'<script> alert("Dados Invalidos");</script>'; 
                              $this->redirect('/juufam/juufam/index.php');
                          }
            }
        }
}
