<div class="row">
                  
    <div class="col-lg-12">
      <div class="p-5">

        <h3>Cadastro de Bairro</h3>

        <form id="cadBairro" class="user" method="POST">

          <div class="row"> 
            <div class="form-group col-md-3">
              <label for="idbairro">Cód_Bairro</label>
              <input type="text" class="form-control form-control-user" id="idbairro" placeholder="Código " name="bairro" readonly>
            </div>            
		       <div class="form-group col-md-9"> </div>            
          </div>             

          <div class="row"> 
            <div class="form-group col-md-6">
              <label for="idnomebairro">Nome Bairro</label>
              <input type="text" class="form-control form-control-user" id="idnomebairro" placeholder="Nome do Bairro" name="nomebairro">
            </div> 
            <div class="form-group col-md-3"> </div>   
            <div class="form-group col-md-3">
              <label for="setor">Setor</label>
              <select class="form-control" id="idsetor" name="setor">
                <option value="">Selecione o setor</option> 
                <option value="Norte">Norte</option> 
                <option value="Sul">Sul</option> 
                <option value="Leste">Leste</option> 
                <option value="Oeste">Oeste</option> 
                <option value="Centro">Centro</option> 
              </select>
            </div>   

          </div>
          

          <div class="row">    
              <div class="form-group col-md-3">
                <label for="idkilometragem">Kilometragem</label>
                <input type="number" class="form-control form-control-user" id="idkilometragem"  min="0"  placeholder="Kilometragem " name="kilometragem">
              </div>            
              <div class="form-group col-md-9"> </div>            
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
    
    var cadBairro = document.querySelector('#cadBairro');
    
    cadBairro.onsubmit = function(event) {
      
      event.preventDefault();
      
      var dados = $('#cadBairro').serialize();

      $.ajax({
          type: 'POST',
          dataType: 'json',
          url: 'cadastro/cadastro_bairro.php',
          async: true,
          data: dados,
          success: function(response) {
            
            if(response[0].msg == 0) {
              alert("Cadastro realizado com sucesso!");
              $('#cadBairro')[0].reset();  
            } else if(response[0].msg == 1) {
              alert("Erro ao cadastrar o Bairro ");
              $('#idnomebairro').focus();
            } else if (response[0].msg == 3) {
              alert('O campo nome do Bairro é obrigatório');
              $('#idnomebairro').focus();
            }
          }
      });

      return false;
      
    }
     
  });

</script>    
