<div class="row">
                  
    <div class="col-lg-12">
      <div class="p-5">

        <h3>Cadastro de Empresa</h3>

        <form id="cadEmpresa" class="user" method="POST">

          <div class="row"> 

            <div class="form-group col-md-6">
            <label for="idrazaosocial">Razão Social</label>
            <input type="text" class="form-control form-control-user" id="idrazaosocial" placeholder="Nome da Razão Social" name="razaosocial">
            </div>

            <div class="form-group col-md-6">
            <label for="idnomefantasia">Nome Fantasia</label>
            <input type="text" class="form-control form-control-user" id="idnomefantasia" placeholder="Nome Fantasia" name="nomefantasia">
            </div>            

          </div>
          
          <div class="row">  
            
            <div class="form-group col-md-6">
              <label for="idcnpj">CNPJ</label>
              <input type="text" class="form-control form-control-user" id="idcnpj" placeholder="Número do CNPJ" name="cnpj">
            </div>
            
            <div class="form-group col-md-6">
              <label for="idinscrestadual"> Inscrição Estadual</label>
              <input type="text" class="form-control form-control-user " id="idinscrestadual" placeholder="Número da Inscrição Estadual" name="inscrestadual">
            </div>
            
          </div>

          <div class="row">
            <div class="form-group col-md-5">
              <label for="idendereco">Endereço</label>
              <input type="text" class="form-control form-control-user" id="idendereco" placeholder="Endereço Completo" name="endereco">
            </div>

            <div class="form-group col-md-3">
              <label for="idnroend">Nº Endereço</label>
              <input type="text" class="form-control form-control-user" id="idnroend" placeholder="Número do Endereço" name="nroend">
            </div>

            <div class="form-group col-md-4">
              <label for="idcomplemento">Complemento</label>
              <input type="text" class="form-control form-control-user" id="idcomplemento" placeholder="Complemento de Endereço" name="complemento">
            </div>

          </div>          

          <div class="row"> 


          </div>

          <div class="row">
            <div class="form-group col-md-6">
            <label for="idbairro">Bairro</label>
            <input type="text" class="form-control form-control-user" id="idbairro" placeholder="Nome do Bairro" name="bairro">
            </div>

            <div class="form-group col-md-6">
            <label for="idcidade">Cidade</label>
            <input type="text" class="form-control form-control-user" id="idcidade" placeholder="Nome da Cidade" name="cidade">
            </div>            
          </div>

          <div class="row">
            <div class="form-group col-md-3">
              <label for="idcep">CEP</label>
              <input type="text" class="form-control form-control-user format_cep" id="idcep" placeholder="Código de endereço postal" name="cep">
            </div>

            <div class="form-group col-md-5"></div>

            <div class="form-group col-md-4">
              <label for="estadoCli">Estado</label>
              <select class="form-control" id="idestado" name="estado">
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
          
          <div class="row">
             <div class="form-group col-md-4">
               <label for="idtelefone">Telefone</label>
                <input type="text" class="form-control form-control-user" id="idtelefone" placeholder="Número do Telefone" name="telefone">
             </div>

             <div class="form-group col-md-4"></div>

             <div class="form-group col-md-4">
              <label for="idcelular">Celular</label>
                <input type="text" class="form-control form-control-user" id="idcelular" placeholder="Número do Celular" name="celular">
             </div> 
          </div>

          <div class="row">
             <div class="form-group col-md-6">
               <label for="idemail">Email</label>
                <input type="text" class="form-control form-control-user" id="idemail" placeholder="Endereço de email" name="email">
             </div>

             <div class="form-group col-md-6">
              <label for="idsite">Site</label>
                <input type="text" class="form-control form-control-user" id="idsite" placeholder="Site da Empresa" name="site">
             </div> 
          </div>   


          <div class="row"> 

            <div class="form-group col-md-8">
            <label for="idslogan">Slogan</label>
            <input type="text" class="form-control form-control-user" id="idslogan" placeholder="Slogan" name="slogan">
            </div>        

            <div class="form-group col-md-4"></div>     
            
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

<script>

  jQuery(function($) {

    $('.money').mask('#.##0,00', {reverse: true});
    $("#idcnpj").mask("99.999.999/9999-99");
    $(".format_cep").mask("99999-999");

  });

  

  $(document).ready( function() {
    
    var cadEmpresa = document.querySelector('#cadEmpresa');
    
    cadEmpresa.onsubmit = function(event) {
      
      event.preventDefault();
      
      var dados = $('#cadEmpresa').serialize();

      $.ajax({
          type: 'POST',
          dataType: 'json',
          url: 'cadastro/cadastro_empresa.php',
          async: true,
          data: dados,
          success: function(response) {
            
            if(response[0].msg == 1) {
              alert("Cadastro realizado com sucesso!");
              $('#cadEmpresa')[0].reset();  
            } else if(response[0].msg == 0) {
              alert("CNPJ inválido! ");
              $('#idcnpj').focus();
            } else if (response[0].msg == 3) {
              alert('O campo CNPJ é obrigatório');
              $('#idcnpj').focus();
            }
          }
      });

      return false;
      
    }
     
  });

</script>    
