<?php
	if(!isset($_SESSION)) session_start();
?>
	<!-- Modal Visualização -->
	<div class="modal fade" id="myModalVisualizarEntregador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Consulta Entregador</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form id="formEntregador">

	          <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Nome</label>
	            <input type="text" class="form-control" id="identificador1" name="name1" readonly>
	          </div>

	           <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Sexo</label>
	            <input type="text" class="form-control" id="identificador2" name="name2" readonly>
	          </div>

			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">CPF</label>
	            <input type="text" class="form-control" id="identificador3" name="name3" readonly>
	          </div>

			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Data Nascimento</label>
	            <input type="text" class="form-control" id="identificador4" name="name4" readonly>
	          </div>

	          <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Nunero da Identidade</label>
	            <input type="text" class="form-control" id="identificador5" name="name5" readonly>
	          </div>	          

   	          <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Sigla do Orgao Expeditor</label>
	            <input type="text" class="form-control" id="identificador6" name="name6" readonly>
	          </div>	  

   	          <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Número da carteira de Habilitação</label>
	            <input type="text" class="form-control" id="identificador7" name="name7" readonly>
	          </div>	          
        
        	  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Data de Validade da Carteira de Habilitação</label>
	            <input type="text" class="form-control" id="identificador8" name="name8" readonly>
	          </div>

	          <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Categoria</label>
	            <input type="text" class="form-control" id="identificador9" name="name9" readonly>
	          </div>

 			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Endereço</label>
	            <input type="text" class="form-control" id="identificador10" name="name10" readonly>
	          </div>

 			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Número</label>
	            <input type="text" class="form-control" id="identificador11" name="name11" readonly>
	          </div>

 			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Bairro</label>
	            <input type="text" class="form-control" id="identificador12" name="name12" readonly>
	          </div>	          	          	          

 			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Complemento</label>
	            <input type="text" class="form-control" id="identificador13" name="name13" readonly>
	          </div>

 			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Cep</label>
	            <input type="text" class="form-control" id="identificador14" name="name14" readonly>
	          </div>

 			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Cidade</label>
	            <input type="text" class="form-control" id="identificador15" name="name15" readonly>
	          </div>

 			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Estado</label>
	            <input type="text" class="form-control" id="identificador16" name="name16" readonly>
	          </div>

 			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Celular</label>
	            <input type="text" class="form-control" id="identificador17" name="name17" readonly>
	          </div>

 			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Inativo</label>
	            <input type="text" class="form-control" id="identificador18" name="name18" readonly>
	          </div>	          	          	          

	        </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Modal Alteração -->
	<div class="modal fade" id="myModalAlterarEntregador" tabindex="-1" role="dialog" aria-labelledby="alterarModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="alterarModalLabel">Alterar Cadastro do Entregador</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">

			<form id="formAlterarEntregador" method="POST" class="needs-validation" novalidate>

			  <div class="form-group">

			  	<input type="text" class="form-control sr-only" id="alt_identificador0" name="alt_name0">
				<label for="alt_identificador1" class="col-form-label">Nome</label>
				<input type="text" class="form-control" id="alt_identificador1" name="alt_name1">

			  </div>

			  <div class="form-group">
            	<label for="alt_identificador2">Sexo</label>
            	<select class="form-control" id= "alt_identificador2" name="alt_name2">
              	<option value="">Selecione o Sexo</option> 
              	<option value="M">Masculino</option> 
              	<option value="F">Feminino</option>               
            	</select>
              </div>

              <div class="form-group">
				<label for="alt_identificador3" class="col-form-label ">CPF</label>
				<input type="text" class="form-control cpf" id="alt_identificador3" name="alt_name3">
			  </div>
			  
			  <div class="form-group">
				<label for="alt_identificador4" class="col-form-label">Data Nascimento</label>
				<input type="text" class="form-control dateformat" id="alt_identificador4" name="alt_name4">
			  </div>

			  <div class="form-group">
				<label for="alt_identificador5" class="col-form-label">Número da Identidade</label>
				<input type="text" class="form-control" id="alt_identificador5" name="alt_name5">
			  </div>	          

			  <div class="form-group">
				<label for="alt_identificador6" class="col-form-label">Sigla do Orgao Expeditor</label>
				<input type="text" class="form-control" id="alt_identificador6" name="alt_name6">
			  </div>	  

			  <div class="form-group">
				<label for="alt_identificador7" class="col-form-label">Número da carteira de Habilitação</label>
				<input type="text" class="form-control" id="alt_identificador7" name="alt_name7">
			  </div>	          

			  <div class="form-group">
				<label for="alt_identificador8" class="col-form-label ">Data de Validade da Carteira de Habilitação</label>
				<input type="text" class="form-control dateformat" id="alt_identificador8" name="alt_name8">
			  </div>

			  <div class="form-group">
				<label for="alt_identificador9" class="col-form-label">Categoria</label>
			
				<select class="form-control" id="alt_identificador9" name="alt_name9">
                  <option value="">Selecione a Categoria</option> 
                  <option value="A">A</option> 
                  <option value="B">B</option> 
                  <option value="C">C</option> 
                  <option value="D">D</option> 
                  <option value="E">E</option>                 
              </select>
			  </div>

			  <div class="form-group">
				<label for="alt_identificador10" class="col-form-label">Endereço</label>
				<input type="text" class="form-control" id="alt_identificador10" name="alt_name10">
			  </div>

			  <div class="form-group">
				<label for="alt_identificador11" class="col-form-label">Número</label>
				<input type="text" class="form-control" id="alt_identificador11" name="alt_name11">
			  </div>

			  
              <div class="form-group">
				<label for="alt_identificador12" class="col-form-label">Bairro</label>
				<select class="form-control required-select" id="alt_identificador12" name="alt_name12" required>

				<option value="">Selecione Bairro</option> 
				<?php
                    
                    include '../../conexao.php';

                     $select_bairro = "SELECT idbairro, nomebairro FROM bairro order by nomebairro;";

                    $result_select_bairro = mysqli_query($conexao, $select_bairro);
                    
                    while ($row = mysqli_fetch_assoc($result_select_bairro)) { 
                      
                      $nome_bairro = $row['nomebairro'];

                      echo "<option value='".$row['idbairro']."'>".$nome_bairro."</option>";
                                                   
                    }                     
                    /* free result set */
                    mysqli_free_result($result_select_bairro);          
                ?>
                </select>
                <div class="valid-feedback">Válido</div>
				<div class="invalid-feedback">Campo obrigatório.</div>

			  </div>				  	          	          	          


			  <div class="form-group">
				<label for="alt_identificador13" class="col-form-label">Complemento</label>
				<input type="text" class="form-control" id="alt_identificador13" name="alt_name13">
			  </div>

			  <div class="form-group">
				<label for="alt_identificador14" class="col-form-label">Cep</label>
				<input type="text" class="form-control format_cep" id="alt_identificador14" name="alt_name14">
			  </div>

			  <div class="form-group">
				<label for="alt_identificador15" class="col-form-label">Cidade</label>
				<input type="text" class="form-control" id="alt_identificador15" name="alt_name15">
			  </div>

			  <div class="form-group">
				<label for="alt_identificador16" class="col-form-label">Estado</label>
				<select class="form-control" id="alt_identificador16" name="alt_name16">
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

			  <div class="form-group">
				<label for="alt_identificador17" class="col-form-label">Celular</label>
				<input type="text" class="form-control" id="alt_identificador17" name="alt_name17">
			  </div>

			  <div class="form-group form-check">			  		
				<input type="checkbox" class="form-check-input" id="alt_identificador18" name="alt_name18">
				<label for="alt_identificador18" class="form-check-label">Inativo</label>
			  </div>

			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
				<button type="submit" class="btn btn-primary">Alterar</button>
			  </div>

			</form>
		  </div>		  
		</div>
	  </div>
	</div>

	<h3>Consulta de Entregadores</h3>

	<div class="jumbotron jumbotron-fluid">
	  <div class="container">	   	

	   	 <form action="" id="form_entregador" method="POST">

	   	 	<div class="form-row">

	   	 		<div class="form-group col-md-6">
	   	 			
	   	 			<label for="nome_entregador">Nome</label>
	   	 			<input type="text" class="form-control" name="nome_entregador" id="nome_entregador" placeholder="Nome do entregador">
	   	 		</div>

	   	 		<div class="form-group col-md-6">

	   	 			<label for="cpf_entregador">CPF</label>
	   	 			<input type="text" class="form-control cpf" name="cpf_entregador" id="cpf_entregador" placeholder="CPF do entregador">

	   	 		</div>

	   	 	</div>

	   	 	<button type="submit" class="btn btn-primary">Pesquisar</button>

	   	 </form>
	    
	  </div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered" id="dataTableEntregador" width="100%" cellspacing="0">
		  <thead> 
			<tr> 
			    <th>Nome</th> 
				<th>Data Nasci</th> 
				<th>Cpf</th>	
				<th>Ação 1</th>
				<th>Ação 2</th>
				<th>Ação 3</th>
			</tr> 
		   </thead>
		   <tbody id="tbentregadores">
		   	
		   </tbody>
		</table>
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


	function formata_data(data) { // yyyy-mm-dd -> dd/mm/yyyy  
    var data_formatada = data.substr(8,2) + '/' + data.substr(5,2) + '/' + data.substr(0,4) ;
    return data_formatada;
    }

	function carregaDadosJSonVisualizarEntregador(id) {

		$('#formEntregador').each (function() {
			this.reset();
		});		

		$.ajax({

            type: 'POST',
            data: ({id : id}),
            dataType: 'json',      
            url: 'load/loadEntregador.php',
            success: function(data) {
            	            	            	                  	          		            
        		if(data[0].msg == 0) {
        			alert("Identificador do entregador não informado!");
        		} else if (data[0].msg == 1) {
        			alert("Entregador não localizado");
        		} else {    

        			var datanasc     = formata_data(data[0].dtnascimento); 
        			var datavalidade = formata_data(data[0].datavalidadehabilit);

        			if(data[0].inativo==0){
        				inativo = "Não";
        			}else{
						inativo = "Sim";
        			}

        			var sexo = data[0].sexo;
        			if(sexo == "M"){
        			  sexo = "Masculino";	
        			} else if(sexo == "F"){
        			  sexo = "Feminino";	
        			}

        			$('#identificador1').val(data[0].nomepessoa);
        			$('#identificador2').val(sexo);
        			$('#identificador3').val(data[0].cpf);
        			$('#identificador4').val(datanasc);
        			$('#identificador5').val(data[0].nroidentidade);
        			$('#identificador6').val(data[0].orgexped);
        			$('#identificador7').val(data[0].nrocarteirahabilit);
        			$('#identificador8').val(datavalidade);
        			$('#identificador9').val(data[0].categoria);
        			$('#identificador10').val(data[0].endereco);
        			$('#identificador11').val(data[0].nroend);
        			$('#identificador12').val(data[0].Nomebairro);
        			$('#identificador13').val(data[0].complemento);
        			$('#identificador14').val(data[0].cep);
        			$('#identificador15').val(data[0].cidade);
        			$('#identificador16').val(data[0].estado);
        			$('#identificador17').val(data[0].celular);
        			$('#identificador18').val(inativo);
        			        			
        		}            	
			}

		});
  	}

  	function openModalVisualizarEntregador(id) {   

    	carregaDadosJSonVisualizarEntregador(id);      

      	$('#myModalVisualizarEntregador').modal('show');

  	}

  	function carregaDadosJSonAlterarEntregador(id) {
		
		$('#formEntregador').each (function() {
		  this.reset();
		});
		
		$.ajax({

            type: 'POST',
            data: ({id : id}),
            dataType: 'json',      
            url: 'load/loadEntregador.php',
            success: function(data) {
            	            	            	                  	          		            
        		if(data[0].msg == 0) {
        			alert("Identificador do entregador não informado!");
        		} else if (data[0].msg == 1) {
        			alert("Entregador não localizado");
        		} else {

        			var datanasc     = formata_data(data[0].dtnascimento); 
        			var datavalidade = formata_data(data[0].datavalidadehabilit);

        		
					$('#alt_identificador0').val(data[0].idpessoa);
					$('#alt_identificador1').val(data[0].nomepessoa);
					$('#alt_identificador2').val(data[0].sexo);
					$('#alt_identificador3').val(data[0].cpf);
					$('#alt_identificador4').val(datanasc);
					$('#alt_identificador5').val(data[0].nroidentidade);
					$('#alt_identificador6').val(data[0].orgexped);
					$('#alt_identificador7').val(data[0].nrocarteirahabilit);
					$('#alt_identificador8').val(datavalidade);     
					$('#alt_identificador9').val(data[0].categoria);
					$('#alt_identificador10').val(data[0].endereco);
					$('#alt_identificador11').val(data[0].nroend);
					$('#alt_identificador12').val(data[0].Nomebairro); 
					$('#alt_identificador13').val(data[0].complemento); 
					$('#alt_identificador14').val(data[0].cep);
					$('#alt_identificador15').val(data[0].cidade);
					$('#alt_identificador16').val(data[0].estado);        
					$('#alt_identificador17').val(data[0].celular);
					
					var inativo = data[0].inativo;
        		
	            	if (inativo == 0) {
	            		$("#alt_identificador18")[0].checked = false;
	            	} else if (inativo == 1) {
	            		$("#alt_identificador18")[0].checked = true;
	            	} else {
	            		alert("Erro na atualização do campo 'inativo'");
	            	}            
        			
        		}            	
			}

		});
  	}

  	function openModalAlterarEntregador(id) {   

    	carregaDadosJSonAlterarEntregador(id);      

      	$('#myModalAlterarEntregador').modal('show');

  	}

  	$(document).ready( function() {
		
  		var altEntregador = document.querySelector('#formAlterarEntregador');
    
	    altEntregador.onsubmit = function(event) {
	      
	    	event.preventDefault();
	      
	      	var dados = $('#formAlterarEntregador').serialize();

	      	$.ajax({
	          	type: 'POST',
	          	dataType: 'json',
	          	url: 'update/update_entregador.php',
	          	async: true,
	          	data: dados,
	          	success: function(data) {
	           
	           	  	if(data[0].msg == 0) {
	
						alert("O CPF não foi informado");
						
					} else if (data[0].msg == 1) {
						
						alert("Erro ao atualizar dados");
						
					} else if (data[0].msg == 2) {

						alert("Nenhum dado foi alterado");

					} else if (data[0].msg == 3) {
						alert("Entregador alterado com sucesso !");
						$('#myModalAlterarEntregador').modal('hide');
												
					} else {
						
						alert("Erro inesperado");

					}      
        			
        		} 
	            
	        });

	    }

	    return false;
	
	});      
	

  	function excluiEntregador(id) {

  		if (confirm("Tem certeza que deseja excluir este registro?")) {

	  	  	$.ajax({
	            type: 'POST',
	            dataType: 'json',
	            url: 'delete/delete_entregador.php',
	            data: ({id: id}),
	            success: function(response) {
	            	
	            	if (response[0].msg == 2) {
	            		alert('Registro excluído com sucesso');	        
	            	} else if (response[0].msg == 1) {
	            		alert('Erro ao excluir registro')
	            	} else if (response[0].msg == 0) {
	            		alert('Identificador não informado')	
	            	} else {
	            		alert('Erro Inesperado');
	            	}   	            
	            	 
	            }
	        });

	    }

  	}


function LoadDataTable(idtabela) {

	$("#"+idtabela).DataTable({
	    "language": {
	        "sEmptyTable": "Nenhum registro encontrado",
	        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
	        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
	        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
	        "sInfoPostFix": "",
	        "sInfoThousands": ".",
	        "sLengthMenu": "Mostrar _MENU_ resultados por página",
	        "sLoadingRecords": "Carregando...",
	        "sProcessing": "Processando...",
	        "sZeroRecords": "Nenhum registro encontrado",
	        "sSearch": "Pesquisar:",
	        "searchPlaceholder": "",
	        "oPaginate": {
	            "sNext": "Próximo",
	            "sPrevious": "Anterior",
	            "sFirst": "Primeiro",
	            "sLast": "Último"
	        },
	        "oAria": {
	            "sSortAscending": ": Ordenar colunas de forma ascendente",
	            "sSortDescending": ": Ordenar colunas de forma descendente"
	        }
	    }
	});

}

$(document).ready( function() {
		
	var form_entregador = document.querySelector('#form_entregador');
	
	form_entregador.onsubmit = function(event) {
		
		event.preventDefault();
		
		var dados = $('#form_entregador').serialize();

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'search/pesquisa_entregador.php',
            async: true,
            data: dados,
            statusCode: {
    			404: function() {
      				alert("Página de pesquisa não localizada");
   				}
  			},
            success: function(data) { 
             
            	$('#tbentregadores').html("");

            	var table = $('#dataTableEntregador').DataTable();

			    table.clear();    
			    table.destroy();
            	     
            	if(data[0].msg == 0) {
                	alert("Erro no envio de dados");
               	} else if(data[0].msg == 1) {
               		alert("Informe Nome ou CPF");
               	} else if(data[0].msg == 2) {
               		alert("Nenhum registro encontrado");
               	} else {

	            	for(i = 0; i < data.length; i++) {

	            		$('#tbentregadores').append("<tr><td>"+data[i].nomepessoa+"</td><td>"+data[i].dtnascimento+"</td><td>"+data[i].cpf+"</td><td style='text-align: center'><button type='button' class='btn btn-outline-primary' onclick='openModalVisualizarEntregador("+data[i].idpessoa+")'>Visualizar</button></td><td style='text-align: center'><button type='button' class='btn btn-outline-success' onclick='openModalAlterarEntregador("+data[i].idpessoa+")'>Alterar</button></td><td style='text-align: center'><button type='button' class='btn btn-outline-danger' onclick='excluiEntregador("+data[i].idpessoa+")'>Excluir</button></td>");

	            		
	            	}  

	            }  	

	            LoadDataTable('dataTableEntregador');
            }
        });           

        return false;
		
	}
   
});



</script> 
