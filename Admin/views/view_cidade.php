
<div class="row">
                  
    <div class="col-lg-12">
      <div class="p-5">

        <h3>Cadastro de Cidade</h3>
        
        <form id="cadCidade" class="user" method="POST" class="needs-validation" novalidate>

          <div class="row"> 

            <div class="form-group col-md-6">
            <label for="idnomecidade">Nome Cidade</label>
            <input type="text" class="form-control form-control-user" id="idnomecidade" placeholder="Nome da Cidade" name="nomecidade" required>
            <div class="valid-feedback">Válido</div>
            <div class="invalid-feedback">Campo obrigatório.</div>
            </div>

            <div class="form-group col-md-4">
              <label for="estadoCli">Estado</label>
              <select class="form-control" id="idestado" name="estado" required>
           
                <option value="">Selecione o Estado</option> 
                <option value="AC">Acre</option> 
                <option value="AL">Alagoas</option> 
                <option value="AM">Amazonas</option> 
                <option value="AP">Amapá</option> 
                <option value="BA">Bahia</option> 
                <option value="CE">Ceará</option> 
                <option value="DF">Distrito Federal</option> 
                <option value="ES">Espírito Santo</option> 
                <option value="GO">Goiás</option> 
                <option value="MA">Maranhão</option> 
                <option value="MT">Mato Grosso</option> 
                <option value="MS">Mato Grosso do Sul</option> 
                <option value="MG">Minas Gerais</option> 
                <option value="PA">Pará</option> 
                <option value="PB">Paraíba</option> 
                <option value="PR">Paraná</option> 
                <option value="PE">Pernambuco</option> 
                <option value="PI">Piauí</option> 
                <option value="RJ">Rio de Janeiro</option> 
                <option value="RN">Rio Grande do Norte</option> 
                <option value="RO">Rondônia</option> 
                <option value="RS">Rio Grande do Sul</option> 
                <option value="RR">Roraima</option> 
                <option value="SC">Santa Catarina</option> 
                <option value="SE">Sergipe</option> 
                <option value="SP">São Paulo</option> 
                <option value="TO">Tocantins</option>
              </select>
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

      $('#cadCidade').submit(function (event) {
        event.preventDefault();
        if ($('#cadCidade')[0].checkValidity() === false) {
            event.stopPropagation();
        } else {
    
              var cadCidade = document.querySelector('#cadCidade');
              
              cadCidade.onsubmit = function(event) {               
                
            
                var dados = $('#cadCidade').serialize();

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: 'cadastro/cadastro_cidade.php',
                    async: true,
                    data: dados,
                    success: function(response) {
                      
                      if(response[0].msg == 1) {
                        alert("Cadastro realizado com sucesso!");
                        $('#cadCidade')[0].reset();  
                      } else if(response[0].msg == 2) {
                        alert("Erro ao cadastrar a Cidade! ");
                        $('#idnomecidade').focus();
                      } else if (response[0].msg == 3) {
                        alert('O campo Cidade é obrigatório');
                        $('#idlogin').focus();
                      }
                    }
                });
              }  

          return false;      
          }
          $('#cadCidade').addClass('was-validated');
     });
  });

</script>    

