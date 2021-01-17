
<div class="row">
                  
    <div class="col-lg-12">
      <div class="p-5">

        <h3>Cadastro de Logradouro</h3>
        
        <form id="cadLogradouro" class="user" method="POST" class="needs-validation" novalidate>

          <div class="row"> 

            <div class="form-group col-md-8">
            <label for="idlogradouro">Logradouro</label>
            <input type="text" class="form-control form-control-user" id="idlogradouro" placeholder="Logradouro" name="logradouro" required>
            <div class="valid-feedback">Válido</div>
            <div class="invalid-feedback">Campo obrigatório.</div>
            </div>            

          </div>          

          <div class="row">

              <div class="form-group col-md-6">
               <label for="idcidade">Cidade</label>
               <select class="form-control" id="idcidade" name="idcidade" required>
                
                <option value="">Selecione a Cidade</option> 
                <?php
                    
                    include '../../conexao.php';

                    $select_cidade        = "SELECT idcidade,cidade, uf
                                             FROM cidade";
                    $result_select_cidade = mysqli_query($conexao, $select_cidade);

                    while ($row = mysqli_fetch_assoc($result_select_cidade)) { 

                      echo "<option value='".$row['idcidade']."'>".$row['cidade']."</option>";
                                                   
                    }                          
                ?>
                </select>
                <div class="valid-feedback">Válido</div>
                <div class="invalid-feedback">Campo obrigatório.</div> 
              </div> 
           </div>    

          <div class="row">
              
            <div class="form-group col-md-6">
               <label for="bairro">Bairro</label>
               <select class="form-control" id="Bairro" name="idbairro" required>
                 <option value="">Selecione o Bairro</option> 
                <?php
                    if (!isset($_SESSION)) session_start();
                    $idempresa  = $_SESSION['idempresa'];

                    $select_bairro = "SELECT nomebairro,idbairro,setor 
                                      FROM bairro 
                                      where idempresa = ".$idempresa
                                      ." order by nomebairro" ;

                    $result_select_bairro = mysqli_query($conexao, $select_bairro);
                    
                    while ($row = mysqli_fetch_assoc($result_select_bairro)) { 
                      
                      $nome_bairro = $row['nomebairro'].' - Setor: '.$row['setor'] ;

                      echo "<option value='".$row['idbairro']."'>".$nome_bairro."</option>";
                                            
                    }

                    /* free result set */
                    mysqli_free_result($result_select_empresa);    

                ?>            
                </select>
                <div class="valid-feedback">Válido</div>
                <div class="invalid-feedback">Campo obrigatório.</div>
            </div>   
          </div>
          
          

          <button type="submit" class="btn btn-primary btn-user btn-block">
            Cadastrar
          </buton>

        </form>


      </div>
    </div>
  </div>

  <?php
    
    /* close connection */
    mysqli_close($conexao);

  ?>

<script>


  $(document).ready( function() {

      $('#cadLogradouro').submit(function (event) {
        event.preventDefault();
        if ($('#cadLogradouro')[0].checkValidity() === false) {
            event.stopPropagation();
        } else {
    
              var cadLogradouro = document.querySelector('#cadLogradouro');
              
              cadLogradouro.onsubmit = function(event) {               
                
            
                var dados = $('#cadLogradouro').serialize();

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: 'cadastro/cadastro_logradouro.php',
                    async: true,
                    data: dados,
                    success: function(response) {
                      
                      if(response[0].msg == 0) {
                        alert("Cadastro realizado com sucesso!");
                        $('#cadLogradouro')[0].reset();  
                      } else if(response[0].msg == 1) {
                        alert("Erro ao cadastrar o Logradouro! ");
                        $('#idlogradouro').focus();
                      } else if (response[0].msg == 3) {
                        alert('O campo Logradouro é obrigatório');
                        $('#idlogradouro').focus();
                      }
                    }
                });
              }  

          return false;      
          }
          $('#cadLogradouro').addClass('was-validated');
     });
  });

</script>    

