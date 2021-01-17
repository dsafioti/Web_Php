<?php
  
  if(!isset($_SESSION)) { 
    session_start(); //função session_start é para mencionar q queremos trabalhar com sessao 
  }
  
  if($_SESSION['acesso1'] != 1) { 
    header('Location:../../index.php');
    exit();
  }

  $idempresa = $_SESSION['idempresa'];
  
?>   

<div class="row">
                  
    <div class="col-lg-12">
      <div class="p-5">

      	<h3>Cadastro de Entregadores</h3>

        <form id="cadEntregador" class="user" method="POST">

          <div class="row"> 

            <div class="form-group col-md-9">
            <label for="idnomeentreg">Nome Completo</label>
            <input type="text" class="form-control form-control-user" id="idnomeentreg" placeholder="Nome Completo" name="nomeentreg" required>
            </div>

            <div class="form-group col-md-3">
            <label for="idsexo">Sexo</label>
            <select class="form-control " id="idsexo" name="sexo">
              <option value="">Selecione o Sexo</option> 
              <option value="M">Masculino</option> 
              <option value="F">Feminino</option>               
            </select>
            </div>

          </div>
         
          
          <div class="row">  
            
            <div class="form-group col-md-6">
              <label for="idcpf">CPF</label>
              <input type="text" class="form-control form-control-user cpf" id="idcpf" placeholder="Número do CPF" name="cpf" required>
            </div>

            <div class="form-group col-md-3"></div>

            <div class="form-group col-md-3">
              <label for="iddtnascimento"> Data Nascimento</label>
              <input type="text" class="form-control form-control-user dateformat" id="iddtnascimento" placeholder="Data de Nascimento" name="dtnascimento" required>
            </div>
            
          </div>

          <div class="row"> 

            <div class="form-group col-md-6">
              <label for="idnroidentidade">Nº da Identidade</label>
              <input type="text" class="form-control form-control-user" id="idnroidentidade" placeholder="Número da Identidade" name="nroidentidade" >
            </div>

            <div class="form-group col-md-3"></div>            

            <div class="form-group col-md-3">
              <label for="idorgexped"> Sigla do Orgão Expedidor</label>
              <input type="text" class="form-control form-control-user" id="idorgexped" placeholder="Orgão Expedidor" name="orgexped">
            </div>

          </div>
          
          <div class="row">   
            <div class="form-group col-md-5">
              <label for="idnrocarteirahabilit">Nº Carteira Habilitação</label>
              <input type="text" class="form-control form-control-user" id="idnrocarteirahabilit" placeholder="Número da Cateira de Habilitação" name="nrocarteirahabilit" required>
            </div>

            <div class="form-group col-md-4">
              <label for="datavalidadehabilit">Validade</label>
              <input type="text" class="form-control form-control-user dateformat"  id="iddatavalidadehabilit" placeholder="Data da Validade da Habilitação" name="datavalidadehabilit">
            </div>


            <div class="form-group col-md-3">
              <label for="idcategoria">Categoria</label>
              <select class="form-control" id="idcategoria" name="categoria">
                <option value="">Selecione a Categoria</option> 
                <option value="A">A</option> 
                <option value="B">B</option> 
                <option value="C">C</option> 
                <option value="D">D</option> 
                <option value="E">E</option>                 
              </select>
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
            <div class="form-group col-md-7">
               <label for="idempresa">Bairro</label>
               <select class="form-control" id="idbairro" name="bairro" required>
                
                <option value="">Selecione o Bairro</option> 
                <?php
                    
                    include '../../conexao.php';


                    $select_bairro = "SELECT idbairro, nomebairro FROM bairro where idempresa = '$idempresa' order by nomebairro;";

                    $result_select_bairro = mysqli_query($conexao, $select_bairro);
                    
                    while ($row = mysqli_fetch_assoc($result_select_bairro)) { 
                      
                      $nome_bairro = $row['nomebairro'];

                      echo "<option value='".$row['idbairro']."'>".$nome_bairro."</option>";
                                                   
                    }                     
                    /* free result set */
                    mysqli_free_result($result_select_bairro);       
                ?>

                </select>
                
            </div>  
            <div class="form-group col-md-5">
              <label for="idcidade">Cidade</label>
              <input type="text" class="form-control form-control-user " id="idcidade" placeholder="Cidade" name="cidade">
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
                <input type="text" class="form-control form-control-user" id="idcelular" placeholder="Celular" name="celular">
             </div>

             <div class="form-group col-md-8"></div>             
             
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
    $(".cpf").mask("999.999.999-99");
    $(".format_cep").mask("99999-999");
    
    $(".dateformat").mask("99/99/9999");

    $(".dateformat").datepicker({
      autoSize: false,
      dateFormat: 'dd/mm/yy',
      changeMonth: true,
      changeYear: true,
      showOtherMonths: true,
      selectOtherMonths: true,
      dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
      dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
      dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
      monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
      monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
      yearRange: 'c-100:c+0'
    });

  });

  $(document).ready( function() {
    
     /* Executa a requisição quando o campo CPF perder o foco */
     $('#idcpf').blur(function() {
        
        /* Nova variável "cpf" somente com dígitos */
        var cpf = $(this).val().replace(/\D/g, '');
        
        if (cpf != "") {        

          if (!TestaCPF(cpf)) {
            alert('CPF Inválido!');
          }
          
        } else {
          
          alert('O CPF deve ser preenchido!');
          
        }                   
           
     })
     
  });

  $(document).ready( function() {
    
    var cadEntregador = document.querySelector('#cadEntregador');
    
    cadEntregador.onsubmit = function(event) {
      
      event.preventDefault();
      
      var dados = $('#cadEntregador').serialize();

      $.ajax({
          type: 'POST',
          dataType: 'json',
          url: 'cadastro/cadastro_entregador.php',
          async: true,
          data: dados,
          success: function(response) {
            
            if(response[0].msg == 1) {
              alert("Cadastro realizado com sucesso!");
              $('#cadEntregador')[0].reset();  
            }
            else if(response[0].msg == 0) {
              alert("Cpf não foi informado ! ");
            }
          }
      });

      return false;
      
    }
     
  });

</script>    



