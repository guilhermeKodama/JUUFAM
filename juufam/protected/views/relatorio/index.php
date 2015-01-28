<h1>Relatórios</h1>
<form method="get" action="<?php echo Yii::app()->createUrl('relatorio/print'); ?>">
    <center><p>Escolha uma modalidade:</p></center>
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
    <center> <p>Escolha um curso:</p></center>
    <div class="escolha-modalidade">
        <select name="curso">
            <option value="0">Todos</option>
            <?php
                $cursoModal = new CursoController('curso');
                $cursos = $cursoModal->getAllCursos();

                foreach($cursos as $curso){
                   echo '<option value="' . $curso->id . '">' . $curso->nome . '</option>';
                }
                ?>
        </select>
    </div>
    <hr align="center" width="400" size="1">
    <span style="padding-left:20px"></span>
    <input type="hidden" name="r" value="relatorio/print" />
    <center><input type="submit" name="submit-relatorio"></input></center>
</form>