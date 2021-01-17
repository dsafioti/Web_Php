<?php
	if(!isset($_SESSION)) session_start();
?>
	<!-- Modal Visualização -->
	<div class="modal fade" id="myModalVisualizarCidade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Consulta Cidade</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form id="formCidade">

	          <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Cidade</label>
	            <input type="text" class="form-control" id="identificador1" readonly>
	          </div>	          	 

 			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Estado</label>
	            <input type="text" class="form-control" id="identificador2" readonly>
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
	<div class="modal fade" id="myModalAlterarBairro" tabindex="-1" role="dialog" aria-labelledby="alterarModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="alterarModalLabel">Alterar Cadastro de Cidade</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form id="formAlterarCidade" method="POST">

			  <div class="form-group">
			  	<input type="text" class="form-control sr-only" id="alt_identificador0" name="alt_name0">
			  	<label for="alt_identificador1" class="col-form-label">Cidade</label>
				<input type="text" class="form-control" id="alt_identificador1" name="alt_name1">
			  </div>	

			  <div class="form-group">
				<label for="alt_identificador2" class="col-form-label">Cidade</label>
				<select class="form-control" id="alt_identificador2">
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

			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
				<button type="submit" id="btnAlterar" class="btn btn-primary">Alterar</button>
			  </div>

			</form>
		  </div>		  
		</div>
	  </div>
	</div>

	<h3>Consulta de Cidade</h3>

	<div class="jumbotron jumbotron-fluid">
	  <div class="container">	   	

	   	 <form action="" id="form_cidade" method="POST">

	   	 	<div class="form-row">

	   	 		<div class="form-group col-md-6">
	   	 			
	   	 			<label for="nomecidade">Cidade</label>
	   	 			<input type="text" class="form-control" name="nomecidade" id="nomecidade" placeholder="Nome da Cidade">
	   	 		</div>

	   	 		<div class="form-group col-md-6">

	   	 		</div>

	   	 	</div>

	   	 	<button type="submit" class="btn btn-primary">Pesquisar</button>

	   	 </form>
	    
	  </div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered sr-only" id="dataTableCidade" width="100%" cellspacing="0">
		  <thead> 
			<tr> 
			    <th>Cidade</th> 
				<th>Ação 1</th>
				<th>Ação 2</th>
				<th>Ação 3</th>
			</tr> 
		   </thead>
		   <tbody id="tbcidade">
		   	
		   </tbody>
		</table>
		<div id="naoencontrado" class="sr-only">
			<button type="button" class="btn btn-primary btn-lg btn-block" onclick="openModalIncluirCidade()">Incluir</button>
		</div>
	</div>

<script>


	function carregaDadosJSonVisualizarCidade(id) {

		$('#formCidade').each (function() {
			this.reset();
		});		

		$.ajax({

            type: 'POST',
            data: ({id : id}),
            dataType: 'json',      
            url: 'load/loadCidade.php',
            success: function(data) {
            	            	            	                  	          		            
        		if(data[0].msg == 0) {
        			alert("Identificador do Cidade não informado!");
        		} else if (data[0].msg == 1) {
        			alert("Cidade não localizada");
        		} else {    

        			$('#identificador1').val(data[0].nomecidade);        			        			
        		}            	
			}

		});
  	}

  	function openModalVisualizarCidade(id) {   

    	carregaDadosJSonVisualizarCidade(id);      

      	$('#myModalVisualizarCidade').modal('show');

  	}

  	function carregaDadosJSonAlterarCidade(id) {
		
		$('#formAlterarCidade').each (function() {
		  this.reset();
		});
		
		$.ajax({

            type: 'POST',
            data: ({id : id}),
            dataType: 'json',      
            url: 'load/loadCidade.php',
            success: function(data) {
            	            	            	                  	          		            
        		if(data[0].msg == 0) {
        			alert("Identificador do registro não informado!");
        		} else if (data[0].msg == 1) {
        			alert("Registro não localizado");
        		} else {							
					$('#alt_identificador0').val(data[0].idcidade);
					$('#alt_identificador1').val(data[0].cidade);
        		}            	
			}

		});
  	}

  	function openModalAlterarCidade(id) {   

    	carregaDadosJSonAlterarCidade(id);      

      	$('#myModalAlterarCidade').modal('show');

  	}

  	function openModalIncluirCidade() { 

  		var r = confirm("Você será redirecionado para a página de inclusão de Cidade, deseja continuar?");
		
		if (r == true) {
			var pagina = "views/view_cidade.php";
			$("#conteudo-principal").load(pagina);
		}

  	}

  	$(document).ready( function() {
		
  		var altCidade = document.querySelector('#formAlterarCidade');
    
	    altCidade.onsubmit = function(event) {
	      
	    	event.preventDefault();
	      
	      	var dados = $('#formAlterarCidade').serialize();

	      	$.ajax({
	          	type: 'POST',
	          	dataType: 'json',
	          	url: 'update/update_cidade.php',
	          	async: true,
	          	data: dados,
	          	success: function(data) {
	           
	           	  	if(data[0].msg == 0) {
	
						alert("O Cidade não foi informado");
						
					} else if (data[0].msg == 1) {
						
						alert("Erro ao atualizar dados");
						
					} else if (data[0].msg == 2) {

						alert("Nenhum dado foi alterado");

					} else if (data[0].msg == 3) {
						alert("Cidade alterada com sucesso !");
						$('#myModalAlterarCidade').modal('hide');
												
					} else {
						
						alert("Erro inesperado");

					}      
        			
        		} 
	            
	        });

	    }

	    return false;
	
	});      
	

  	function excluiCidade(id) {

  		if (confirm("Tem certeza que deseja excluir este registro?")) {

	  	  	$.ajax({
	            type: 'POST',
	            dataType: 'json',
	            url: 'delete/delete_cidade.php',
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
	
	var form_cidade = document.querySelector('#form_cidade');
	
	form_cidade.onsubmit = function(event) {
		
		event.preventDefault();
		
		var dados = $('#form_cidade').serialize();

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'search/pesquisa_cidade.php',
            async: true,
            data: dados,
            statusCode: {
    			404: function() {
      				alert("Página de pesquisa não localizada");
   				}
  			},
            success: function(data) { 
             
            	$('#tbcidade').html("");

            	var table = $('#dataTablecidade').DataTable();

			    table.clear();    
			    table.destroy();
            	     
            	if(data[0].msg == 0) {
                	alert("Erro no envio de dados");
               	} else if(data[0].msg == 1) {
               		alert("Informe o Cidade");
               	} else if(data[0].msg == 2) {
               		
               		alert("Nenhum registro encontrado");

               		$('#dataTableCidade').addClass('sr-only');               	
               		$('#naoencontrado').removeClass('sr-only');
               		
               	} else {


               		$('#dataTableCidade').removeClass('sr-only'); 
               		$('#naoencontrado').addClass('sr-only');           		
	            
	            	for(i = 0; i < data.length; i++) {

	            		$('#tbcidade').append("<tr><td>"+data[i].cidade + "</td><td style='text-align: center'><button type='button' class='btn btn-outline-primary' onclick='openModalVisualizarCidade("+data[i].idcidade+")'>Visualizar</button></td><td style='text-align: center'><button type='button' class='btn btn-outline-success' onclick='openModalAlterarCidade("+data[i].idcidade+")'>Alterar</button></td><td style='text-align: center'><button type='button' class='btn btn-outline-danger' onclick='excluiCidade("+data[i].idcidade+")'>Excluir</button></td>");	            		
	            	} 

	            	LoadDataTable('dataTableCidade');

	            }  	
	            
            }
        });           

        return false;
		
	}
   
});



</script> 
