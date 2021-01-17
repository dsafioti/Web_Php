<?php
	if(!isset($_SESSION)) session_start();
?>
	<!-- Modal Visualização -->
	<div class="modal fade" id="myModalVisualizarEmpresa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Consulta Empresa</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form id="formEmpresa">

	          <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Razão Social</label>
	            <input type="text" class="form-control" id="identificador1" readonly>
	          </div>

	           <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Nome Fantasia</label>
	            <input type="text" class="form-control" id="identificador2" readonly>
	          </div>

			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">CNPJ</label>
	            <input type="text" class="form-control" id="identificador3" readonly>
	          </div>

			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Inscrição Estadual</label>
	            <input type="text" class="form-control" id="identificador4"  readonly>
	          </div>

	          <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Endereço</label>
	            <input type="text" class="form-control" id="identificador5"  readonly>
	          </div>	          

   	          <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Número do Endereço</label>
	            <input type="text" class="form-control" id="identificador6" readonly>
	          </div>	  

   	          <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Complemento</label>
	            <input type="text" class="form-control" id="identificador7" readonly>
	          </div>	          
        
        	  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Bairro</label>
	            <input type="text" class="form-control" id="identificador8" readonly>
	          </div>

	          <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Cidade</label>
	            <input type="text" class="form-control" id="identificador9" readonly>
	          </div>

 			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Cep</label>
	            <input type="text" class="form-control" id="identificador10"  readonly>
	          </div>

 			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Estado</label>
	            <input type="text" class="form-control" id="identificador11"  readonly>
	          </div>

 			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Telefone</label>
	            <input type="text" class="form-control" id="identificador12"  readonly>
	          </div>	          	          	          

 			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Celular</label>
	            <input type="text" class="form-control" id="identificador13"  readonly>
	          </div>

 			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Email</label>
	            <input type="text" class="form-control" id="identificador14"  readonly>
	          </div>

 			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Site</label>
	            <input type="text" class="form-control" id="identificador15"  readonly>
	          </div>

 			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Slogan</label>
	            <input type="text" class="form-control" id="identificador16" readonly>
	          </div>

	          <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Data de Cadastro</label>
	            <input type="text" class="form-control" id="identificador17" readonly>
	          </div>

 			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Inativo</label>
	            <input type="text" class="form-control" id="identificador18" readonly>
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
	<div class="modal fade" id="myModalAlterarEmpresa" tabindex="-1" role="dialog" aria-labelledby="alterarModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="alterarModalLabel">Alterar Cadastro de Empresa</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form id="formAlterarEmpresa" method="POST">

			  <div class="form-group">
			  	<input type="text" class="form-control sr-only" id="alt_identificador0" name="alt_name0">
				<label for="alt_identificador1" class="col-form-label">Razão Social</label>
				<input type="text" class="form-control" id="alt_identificador1" name="alt_name1">
			  </div>	

			  <div class="form-group">
			  	<label for="alt_identificador2" class="col-form-label">Nome Fantasia</label>
				<input type="text" class="form-control" id="alt_identificador2" name="alt_name2">
			  </div>		  

              <div class="form-group">
				<label for="alt_identificador3" class="col-form-label ">CNPJ</label>
				<input type="text" class="form-control cnpj" id="alt_identificador3" name="alt_name3">
			  </div>
			  
			  <div class="form-group">
				<label for="alt_identificador4" class="col-form-label">Inscrição Estadual</label>
				<input type="text" class="form-control dateformat" id="alt_identificador4" name="alt_name4">
			  </div>

			  <div class="form-group">
				<label for="alt_identificador5" class="col-form-label">Endereço</label>
				<input type="text" class="form-control" id="alt_identificador5" name="alt_name5">
			  </div>	          

			  <div class="form-group">
				<label for="alt_identificador6" class="col-form-label">Número</label>
				<input type="text" class="form-control" id="alt_identificador6" name="alt_name6">
			  </div>	  

			  <div class="form-group">
				<label for="alt_identificador7" class="col-form-label">Complemento</label>
				<input type="text" class="form-control" id="alt_identificador7" name="alt_name7">
			  </div>	          

			  <div class="form-group">
				<label for="alt_identificador8" class="col-form-label ">Bairro</label>
				<input type="text" class="form-control" id="alt_identificador8" name="alt_name8">
			  </div>

			  <div class="form-group">
				<label for="alt_identificador9" class="col-form-label">Cidade</label>
				<input type="text" class="form-control" id="alt_identificador9" name="alt_name9">
			  </div>

			  <div class="form-group">
				<label for="alt_identificador10" class="col-form-label">Cep</label>
				<input type="text" class="form-control format_cep" id="alt_identificador10" name="alt_name10">
			  </div>

			  <div class="form-group">
				<label for="alt_identificador11" class="col-form-label">Estado</label>
				<select class="form-control" id="alt_identificador11" name="alt_name11">
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

			  <div class="form-group">
				<label for="alt_identificador12" class="col-form-label">Telefone</label>
				<input type="text" class="form-control" id="alt_identificador12" name="alt_name12">
			  </div>	          	          	          

			  <div class="form-group">
				<label for="alt_identificador13" class="col-form-label">Celular</label>
				<input type="text" class="form-control" id="alt_identificador13" name="alt_name13">
			  </div>

			  <div class="form-group">
				<label for="alt_identificador14" class="col-form-label">Email</label>
				<input type="email" class="form-control " id="alt_identificador14" name="alt_name14">
			  </div>

			  <div class="form-group">
				<label for="alt_identificador15" class="col-form-label">Site</label>
				<input type="text" class="form-control" id="alt_identificador15" name="alt_name15">
			  </div>

			  </div>

			  <div class="form-group">
				<label for="alt_identificador16" class="col-form-label">Slogan</label>
				<input type="text" class="form-control" id="alt_identificador16" name="alt_name16">
			  </div>

			  <div class="form-group">
				<label for="alt_identificador17" class="col-form-label">Data de Cadastro</label>
				<input type="text" class="form-control" id="alt_identificador17" name="alt_name17" readonly>
			  </div>

			  <div class="form-group form-check">			  		
				<input type="checkbox" class="form-check-input" id="alt_identificador18" name="alt_name18">
				<label for="alt_identificador18" class="form-check-label">Inativo</label>
			  </div>

			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
				<button type="submit" id="btnAlterar" class="btn btn-primary">Alterar</button>
			  </div>

			</form>
		  </div>		  
		</div>
	  </div>
	</div>

	<h3>Consulta de Empresa</h3>

	<div class="jumbotron jumbotron-fluid">
	  <div class="container">	   	

	   	 <form action="" id="form_empresa" method="POST">

	   	 	<div class="form-row">

	   	 		<div class="form-group col-md-6">
	   	 			
	   	 			<label for="razao_social">Razao Social</label>
	   	 			<input type="text" class="form-control" name="razao_social" id="razao_social" placeholder="Razão Social">
	   	 		</div>

	   	 		<div class="form-group col-md-6">

	   	 			<label for="cnpj">CNPJ</label>
	   	 			<input type="text" class="form-control" name="cnpj" id="idcnpj" placeholder="CNPJ">

	   	 		</div>

	   	 	</div>

	   	 	<button type="submit" class="btn btn-primary">Pesquisar</button>

	   	 </form>
	    
	  </div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered sr-only" id="dataTableEmpresa" width="100%" cellspacing="0">
		  <thead> 
			<tr> 
			    <th>Razao Social</th> 
				<th>Cidade</th> 
				<th>CNPJ</th>	
				<th>Ação 1</th>
				<th>Ação 2</th>
				<th>Ação 3</th>
			</tr> 
		   </thead>
		   <tbody id="tbempresa">
		   	
		   </tbody>
		</table>
		<div id="naoencontrado" class="sr-only">
			<button type="button" class="btn btn-primary btn-lg btn-block" onclick="openModalIncluirEmpresa()">Incluir</button>
		</div>
	</div>

<script>

	jQuery(function($) {

    $('.money').mask('#.##0,00', {reverse: true});
    $(".cnpj").mask("99.999.999/9999-99");
    $(".format_cep").mask("99999-999");

  });


	function formata_data(data) { // yyyy-mm-dd -> dd/mm/yyyy  
    var data_formatada = data.substr(8,2) + '/' + data.substr(5,2) + '/' + data.substr(0,4) ;
    return data_formatada;
    }

	function carregaDadosJSonVisualizarEmpresa(id) {

		$('#formEmpresa').each (function() {
			this.reset();
		});		

		$.ajax({

            type: 'POST',
            data: ({id : id}),
            dataType: 'json',      
            url: 'load/loadEmpresa.php',
            success: function(data) {
            	            	            	                  	          		            
        		if(data[0].msg == 0) {
        			alert("Identificador da Empresa não informado!");
        		} else if (data[0].msg == 1) {
        			alert("Empresa não localizada");
        		} else {    

        			var datacadastro     = formata_data(data[0].datacadastro); 
        			
        			if(data[0].inativo==0){
        				inativo = "Não";
        			}else{
						inativo = "Sim";
        			}

        			$('#identificador1').val(data[0].razaosocial);
					$('#identificador2').val(data[0].nomefantasia);;
					$('#identificador3').val(data[0].cnpj);
					$('#identificador4').val(data[0].inscrestadual);
					$('#identificador5').val(data[0].endereco);
					$('#identificador6').val(data[0].nroend);
					$('#identificador7').val(data[0].complemento);
					$('#identificador8').val(data[0].bairro);
					$('#identificador9').val(data[0].cidade);
					$('#identificador10').val(data[0].cep);
					$('#identificador11').val(data[0].estado);
					$('#identificador12').val(data[0].telefone);
					$('#identificador13').val(data[0].celular);
					$('#identificador14').val(data[0].email);
					$('#identificador15').val(data[0].site);
					$('#identificador16').val(data[0].slogan);
					$('#identificador17').val(datacadastro);
					$('#identificador18').val(inativo);
        			        			
        		}            	
			}

		});
  	}

  	function openModalVisualizarEmpresa(id) {   

    	carregaDadosJSonVisualizarEmpresa(id);      

      	$('#myModalVisualizarEmpresa').modal('show');

  	}

  	function carregaDadosJSonAlterarEmpresa(id) {
		
		$('#formAlterarEmpresa').each (function() {
		  this.reset();
		});
		
		$.ajax({

            type: 'POST',
            data: ({id : id}),
            dataType: 'json',      
            url: 'load/loadEmpresa.php',
            success: function(data) {
            	            	            	                  	          		            
        		if(data[0].msg == 0) {
        			alert("Identificador do registro não informado!");
        		} else if (data[0].msg == 1) {
        			alert("Registro não localizado");
        		} else {

        			var datacadastro     = formata_data(data[0].datacadastro);         		
										
					$('#alt_identificador0').val(data[0].idempresa);
					$('#alt_identificador1').val(data[0].razaosocial);
					$('#alt_identificador2').val(data[0].nomefantasia);
					$('#alt_identificador3').val(data[0].cnpj);
					$('#alt_identificador4').val(data[0].inscrestadual);
					$('#alt_identificador5').val(data[0].endereco);
					$('#alt_identificador6').val(data[0].nroend);
					$('#alt_identificador7').val(data[0].complemento);
					$('#alt_identificador8').val(data[0].bairro);    
					$('#alt_identificador9').val(data[0].cidade);
					$('#alt_identificador10').val(data[0].cep);
					$('#alt_identificador11').val(data[0].estado);
					$('#alt_identificador12').val(data[0].telefone); 
					$('#alt_identificador13').val(data[0].celular); 
					$('#alt_identificador14').val(data[0].email);
					$('#alt_identificador15').val(data[0].site);
					$('#alt_identificador16').val(data[0].slogan);        
					$('#alt_identificador17').val(datacadastro);

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

  	function openModalAlterarEmpresa(id) {   

    	carregaDadosJSonAlterarEmpresa(id);      

      	$('#myModalAlterarEmpresa').modal('show');

  	}

  	function openModalIncluirEmpresa() { 

  		var r = confirm("Você será redirecionado para a página de inclusão de empresa, deseja continuar?");
		
		if (r == true) {
			var pagina = "views/view_empresa.php";
			$("#conteudo-principal").load(pagina);
		}

  	}

  	$(document).ready( function() {
		
  		var altEmpresa = document.querySelector('#formAlterarEmpresa');
    
	    altEmpresa.onsubmit = function(event) {
	      
	    	event.preventDefault();
	      
	      	var dados = $('#formAlterarEmpresa').serialize();

	      	$.ajax({
	          	type: 'POST',
	          	dataType: 'json',
	          	url: 'update/update_empresa.php',
	          	async: true,
	          	data: dados,
	          	success: function(data) {
	           
	           	  	if(data[0].msg == 0) {
	
						alert("O CNPJ não foi informado");
						
					} else if (data[0].msg == 1) {
						
						alert("Erro ao atualizar dados");
						
					} else if (data[0].msg == 2) {

						alert("Nenhum dado foi alterado");

					} else if (data[0].msg == 3) {
						alert("Empresa alterada com sucesso !");
						$('#myModalAlterarEmpresa').modal('hide');
												
					} else {
						
						alert("Erro inesperado");

					}      
        			
        		} 
	            
	        });

	    }

	    return false;
	
	});      
	

  	function excluiEmpresa(id) {

  		if (confirm("Tem certeza que deseja excluir este registro?")) {

	  	  	$.ajax({
	            type: 'POST',
	            dataType: 'json',
	            url: 'delete/delete_empresa.php',
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
		
	var form_empresa = document.querySelector('#form_empresa');
	
	form_empresa.onsubmit = function(event) {
		
		event.preventDefault();
		
		var dados = $('#form_empresa').serialize();

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'search/pesquisa_empresa.php',
            async: true,
            data: dados,
            statusCode: {
    			404: function() {
      				alert("Página de pesquisa não localizada");
   				}
  			},
            success: function(data) { 
             
            	$('#tbempresa').html("");

            	var table = $('#dataTableEmpresa').DataTable();

			    table.clear();    
			    table.destroy();
            	     
            	if(data[0].msg == 0) {
                	alert("Erro no envio de dados");
               	} else if(data[0].msg == 1) {
               		alert("Informe Razao Social ou CNPJ");
               	} else if(data[0].msg == 2) {
               		
               		alert("Nenhum registro encontrado");

               		$('#dataTableEmpresa').addClass('sr-only');               	
               		$('#naoencontrado').removeClass('sr-only');
               		
               	} else {

               		$('#dataTableEmpresa').removeClass('sr-only');               	
               		$('#naoencontrado').addClass('sr-only');              		
	            
	            	for(i = 0; i < data.length; i++) {

	            		$('#tbempresa').append("<tr><td>"+data[i].razaosocial+"</td><td>"+data[i].cidade+"</td><td>"+data[i].cnpj+"</td><td style='text-align: center'><button type='button' class='btn btn-outline-primary' onclick='openModalVisualizarEmpresa("+data[i].idempresa+")'>Visualizar</button></td><td style='text-align: center'><button type='button' class='btn btn-outline-success' onclick='openModalAlterarEmpresa("+data[i].idempresa+")'>Alterar</button></td><td style='text-align: center'><button type='button' class='btn btn-outline-danger' onclick='excluiEmpresa("+data[i].idempresa+")'>Excluir</button></td>");	            		
	            	} 

	            	LoadDataTable('dataTableEmpresa');

	            }  	
	            
            }
        });           

        return false;
		
	}
   
});



</script> 
