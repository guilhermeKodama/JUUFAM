<h1>Relatórios</h1>
<form method="post" action="http://localhost/juufam/relatorioinscritocurso.php">
    
    <center><p>Escolha uma modalidade:</p></center>
    <div class="escolha-modalidade">
        <select name="modalidade">
         <option value="0">Todos</option>;
        <?php
               // $userModal = new UsuarioController('usuario');
                //$users = $userModal->getAllUsers();
               
                $modalidadeModal = new ModalidadeController('modalidade');
                $modalidades = $modalidadeModal->getAllModality();
                
               // if($users == 'admin'){
                    foreach ($modalidades as $modalidade) {
                        echo '<option value="' . $modalidade->id . '">' . $modalidade->nome . '</option>';
                 //   }
                }
                
                  //  foreach ($modalidades as $modalidade) {
                    //        echo '<option value="' . $modalidade->id . '">' . $modalidade->nome . '</option>';
                    //}
                
                
        ?>
          
        </select> 
    </div>
    
    <hr align="center" width="400" size="1">
    <span style="padding-left:20px"></span>
    <center> <p>Escolha um curso:</p></center>
    <div class="escolha-curso">
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
    <span style="padding-left:20px"></span>

    <center><input type="submit" name="submit-relatorio"></input></center>
   <span style="padding-left:10px"></span>
</form>