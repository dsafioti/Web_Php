
<div class="row">
                  
    <div class="col-lg-12">
      <div class="p-5">

        <h3>Cadastro de Padrao de Valores</h3>
        
        <form id="cadPadrao" class="user" method="POST" class="needs-validation" novalidate>

          <div class="row"> 

            <div class="form-group col-md-6">
            <label for="idnomepadrao">Nome Padrão</label>
            <input type="text" class="form-control form-control-user" id="idnomepadrao" placeholder="Nome Padrão" name="nomepadrao" required>
            <div class="valid-feedback">Válido</div>
            <div class="invalid-feedback">Campo obrigatório.</div>
            </div>
          </div>  
            
          <div class="row"> 
            <div class="form-group col-md-4">
            <label for="idnomenclatura">Nomenclatura</label>
            <input type="text" class="form-control form-control-user" id="idnomenclatura" placeholder="Nomenclatura" name="nomenclatura" required>
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

  

<script>


  $(document).ready( function() {

      $('#cadPadrao').submit(function (event) {
        event.preventDefault();
        if ($('#cadPadrao')[0].checkValidity() === false) {
            event.stopPropagation();
        } else {
    
              var cadPadrao = document.querySelector('#cadPadrao');
              
              cadPadrao.onsubmit = function(event) {               
                
            
                var dados = $('#cadPadrao').serialize();

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: 'cadastro/cadastro_padraovalor.php',
                    async: true,
                    data: dados,
                    success: function(response) {
                      
                      if(response[0].msg == 0) {
                        alert("Cadastro realizado com sucesso!");
                        $('#cadPadrao')[0].reset();  
                      } else if(response[0].msg == 1) {
                        alert("Erro ao cadastrar o Padrao de Valor! ");
                        $('#idnomepadrao').focus();
                      } else if (response[0].msg == 3) {
                        alert('O campo Nome Padrão é obrigatório');
                        $('#idnomepadrao').focus();
                      }
                    }
                });
              }  

          return false;      
          }
          $('#cadPadrao').addClass('was-validated');
     });
  });

</script>    

