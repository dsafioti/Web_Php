
<div class="row">
                  
    <div class="col-lg-12">
      <div class="p-5">

        <h3>Cadastro de Usuário</h3>
        
        <form id="cadUsuario" class="user" method="POST" class="needs-validation" novalidate>

          <div class="row"> 

            <div class="form-group col-md-6">
            <label for="idrazaosocial">Nome Usuario</label>
            <input type="text" class="form-control form-control-user" id="idnomeusuario" placeholder="Nome do usuário" name="nomeusuario" required>
            <div class="valid-feedback">Válido</div>
            <div class="invalid-feedback">Campo obrigatório.</div>
            </div>

            <div class="form-group col-md-6">
            <label for="idnlogin">Login</label>
            <input type="text" class="form-control form-control-user" id="idlogin" placeholder="Login" name="login" required="">
            <div class="valid-feedback">Válido</div>
            <div class="invalid-feedback">Campo obrigatório.</div>
            </div>            

          </div>
          
          <div class="row">  
            
            <div class="form-group col-md-6">
              <label for="idsenha">Senha</label>
              <input type="password"  class="form-control form-control-user" id="idsenha" placeholder="Senha" name="senha" required="">
              <div class="valid-feedback">Válido</div>
              <div class="invalid-feedback">Campo obrigatório.</div>
            </div>      

            
            <div class="form-group col-md-6">
              <label for="idemail"> Email</label>
              <input type="text" class="form-control form-control-user " id="idemail" placeholder="Endereço de Email" name="email">
            </div>

          </div> 

          <div class="row">

              <div class="form-group col-md-6">
               <label for="idnivelusuario">Nivel Usuário</label>
               <select class="form-control" id="idnivelusuario" name="idnivelusuario" required>
                
                <option value="">Selecione o nível de usuário</option> 
                <?php
                    
                    include '../../conexao.php';

                    $select_nivel = "SELECT idnivelusuario, descrnivel
                                       FROM nivelusuario";
                    $result_select_nivel = mysqli_query($conexao, $select_nivel);

                    while ($row = mysqli_fetch_assoc($result_select_nivel)) { 

                      echo "<option value='".$row['idnivelusuario']."'>".$row['descrnivel']."</option>";
                                                   
                    }                          
                ?>
                </select>
                <div class="valid-feedback">Válido</div>
                <div class="invalid-feedback">Campo obrigatório.</div> 
              </div>  

            <div class="form-group col-md-6">
               <label for="empresa">Empresa</label>
               <select class="form-control" id="tipousr" name="empresa" required>
                 <option value="">Selecione a Empresa</option> 
                <?php
                    
                    $select_empresa = "SELECT idempresa, nomefantasia, cnpj, cidade, estado FROM empresa;";

                    $result_select_empresa = mysqli_query($conexao, $select_empresa);
                    
                    while ($row = mysqli_fetch_assoc($result_select_empresa)) { 
                      
                      $nome_empresa = $row['nomefantasia'].' - CNPJ : '.$row['cnpj'].' - '.$row['cidade'].'-'.$row['estado'];

                      echo "<option value='".$row['idempresa']."'>".$nome_empresa."</option>";
                                            
                    }

                    /* free result set */
                    mysqli_free_result($result_select_empresa);    

                ?>            
                </select>
                <div class="valid-feedback">Válido</div>
                <div class="invalid-feedback">Campo obrigatório.</div>
            </div>   
          </div>
          
          <div class="row">
             <div class="form-group col-md-4">
               <label for="idtelefone">Telefone</label>
                <input type="text" class="form-control form-control-user" id="idtelefone" placeholder="Número do Telefone" name="telefone">
             </div>
             

             <div class="form-group col-md-4">
              <label for="idcelular">Celular</label>
                <input type="text" class="form-control form-control-user" id="idcelular" placeholder="Número do Celular" name="celular">
             </div> 

          </div>                 

          <div class="form-group form-check">
             <input type="checkbox" class="form-check-input" id="idinativo" name="inativo" value="1">
             <label class="form-check-label" for="idinativo">Inativo</label>
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

      $('#cadUsuario').submit(function (event) {
        event.preventDefault();
        if ($('#cadUsuario')[0].checkValidity() === false) {
            event.stopPropagation();
        } else {
    
              var cadUsuario = document.querySelector('#cadUsuario');
              
              cadUsuario.onsubmit = function(event) {               
                
            
                var dados = $('#cadUsuario').serialize();

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: 'cadastro/cadastro_usuario.php',
                    async: true,
                    data: dados,
                    success: function(response) {
                      
                      if(response[0].msg == 1) {
                        alert("Cadastro realizado com sucesso!");
                        $('#cadUsuario')[0].reset();  
                      } else if(response[0].msg == 2) {
                        alert("Erro ao cadastrar o usuario! ");
                        $('#idnomeusuario').focus();
                      } else if (response[0].msg == 3) {
                        alert('O campo Login é obrigatório');
                        $('#idlogin').focus();
                      }
                    }
                });
              }  

          return false;      
          }
          $('#cadUsuario').addClass('was-validated');
     });
  });

</script>    

