<?php

$baseUrl = Yii::app ()->baseUrl;
$cs = Yii::app ()->getClientScript ();
$cs->registerScriptFile ( $baseUrl . '/js/jquery-1.11.1.min.js' );
$cs->registerScriptFile ( $baseUrl . '/js/jquery.maskedinput.js' );
$cs->registerScriptFile ( $baseUrl . '/css/bootstrap.css');
$cs->registerScriptFile ( $baseUrl . '/css/bootstrap.min.css');
?>

</br><div class="infoblock shadow"><h1 style="color:#4682B4;"><b>Relatórios</b></h1></div>
<hr>

<form method="get" action="<?php echo Yii::app()->createUrl('relatorio/print'); ?>">
    <center><p><b><h5>Escolha uma modalidade:</h5><b></p></center>
    

    <div class="escolha-modalidade">
        <select name="modalidade">
        <option value="0">Todos</option>;
            <?php
                $modalidadeModal = new ModalidadeController('modalidade');
                $modalidades = $modalidadeModal->getAllModality();

                foreach ($modalidades as $modalidade) {
                    echo '<option value="' . $modalidade->id . '">' . $modalidade->nome . '</option>';
                }
            ?>
        </select> 
    </div> 
    
    
    <hr align="center" width="400" size="1">
    <span style="padding-left:20px"></span>
    <center><p><b><h5>Escolha um curso:</h5></b></p></center>
    <div class="escolha-modalidade">
        <select name="curso">
            <option value="0">Todos</option>
            <?php
                $cursoModal = new ChapaController('curso');
                $cursos = $cursoModal->getAllChapas();

                foreach($cursos as $curso){
                   echo '<option value="' . $curso->id . '">' . $curso->nome . '</option>';
                }
                ?>
        </select>
    </div>
    <hr align="center" width="400" size="1">
    <span style="padding-left:20px"></span>
    <input type="hidden" name="r" value="relatorio/print" />
    
    <div>
        <center><button type="submit" name="submit-relatorio" class="btn btn-primary">Enviar</button></center>
    </div>
</form>