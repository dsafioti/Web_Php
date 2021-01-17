<?php
	if(!isset($_SESSION)) session_start();
?>
	<!-- Modal Visualização -->
	<div class="modal fade" id="myModalVisualizarBairro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Consulta Bairro</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form id="formBairro">

	          <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Bairro</label>
	            <input type="text" class="form-control" id="identificador1" readonly>
	          </div>

	          <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Setor</label>
	            <input type="text" class="form-control" id="identificador2" name="name2" readonly>
	          </div>


	          <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Kilometragem</label>
	            <input type="text" class="form-control" id="identificador3" name="name3" readonly>
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
			<h5 class="modal-title" id="alterarModalLabel">Alterar Cadastro de Bairro</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form id="formAlterarBairro" method="POST">

			  <div class="form-group">
			  	<input type="text" class="form-control sr-only" id="alt_identificador0" name="alt_name0">
			  	<label for="alt_identificador1" class="col-form-label">Bairro</label>
				<input type="text" class="form-control" id="alt_identificador1" name="alt_name1">
			  </div>	

			 <div class="form-group">
            	<label for="alt_identificador2">Setor</label>
            	<select class="form-control" id= "alt_identificador2" name="alt_name2">
              	<option value="">Selecione o Setor</option> 
              	<option value="Norte">Norte</option> 
              	<option value="Sul">Sul</option>               
              	<option value="Leste">Leste</option>               
              	<option value="Oeste">Oeste</option>               
              	<option value="Centro">Centro</option>               
            	</select>
              </div> 	          	          	          	          


			  <div class="form-group">
			  	<label for="alt_identificador3" class="col-form-label">Kilometragem</label>
				<input type="number" class="form-control" id="alt_identificador3" min="0"  name="alt_name3">
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

	<h3>Consulta de Bairro</h3>

	<div class="jumbotron jumbotron-fluid">
	  <div class="container">	   	

	   	 <form action="" id="form_bairro" method="POST">

	   	 	<div class="form-row">

	   	 		<div class="form-group col-md-6">
	   	 			
	   	 			<label for="nomebairro">Bairro</label>
	   	 			<input type="text" class="form-control" name="nomebairro" id="nomebairro" placeholder="Nome do Bairro">
	   	 		</div>

	   	 		<div class="form-group col-md-6">

	   	 		</div>

	   	 	</div>

	   	 	<button type="submit" class="btn btn-primary">Pesquisar</button>

	   	 </form>
	    
	  </div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered sr-only" id="dataTableBairro" width="100%" cellspacing="0">
		  <thead> 
			<tr> 
			    <th>Bairro</th> 
			    <th>Setor</th> 
			    <th>Kilometragem</th>
				<th>Ação 1</th>
				<th>Ação 2</th>
				<th>Ação 3</th>
			</tr> 
		   </thead>
		   <tbody id="tbbairro">
		   	
		   </tbody>
		</table>
		<div id="naoencontrado" class="sr-only">
			<button type="button" class="btn btn-primary btn-lg btn-block" onclick="openModalIncluirBairro()">Incluir</button>
		</div>
	</div>

<script>


	function carregaDadosJSonVisualizarBairro(id) {

		$('#formBairro').each (function() {
			this.reset();
		});		

		$.ajax({

            type: 'POST',
            data: ({id : id}),
            dataType: 'json',      
            url: 'load/loadBairro.php',
            success: function(data) {
            	            	            	                  	          		            
        		if(data[0].msg == 0) {
        			alert("Identificador do Bairro não informado!");
        		} else if (data[0].msg == 1) {
        			alert("Bairro não localizada");
        		} else {    

        			$('#identificador1').val(data[0].nomebairro);        			        			
        			$('#identificador2').val(data[0].setor);   
        			$('#identificador3').val(data[0].kilometragem);   
        		}            	
			}

		});
  	}

  	function openModalVisualizarBairro(id) {   

    	carregaDadosJSonVisualizarBairro(id);      

      	$('#myModalVisualizarBairro').modal('show');

  	}

  	function carregaDadosJSonAlterarBairro(id) {
		
		$('#formAlterarBairro').each (function() {
		  this.reset();
		});
		
		$.ajax({

            type: 'POST',
            data: ({id : id}),
            dataType: 'json',      
            url: 'load/loadBairro.php',
            success: function(data) {
            	            	            	                  	          		            
        		if(data[0].msg == 0) {
        			alert("Identificador do registro não informado!");
        		} else if (data[0].msg == 1) {
        			alert("Registro não localizado");
        		} else {							
					$('#alt_identificador0').val(data[0].idbairro);
					$('#alt_identificador1').val(data[0].nomebairro);
					$('#alt_identificador2').val(data[0].setor);
					$('#alt_identificador3').val(data[0].kilometragem);
        		}            	
			}

		});
  	}

  	function openModalAlterarBairro(id) {   

    	carregaDadosJSonAlterarBairro(id);      

      	$('#myModalAlterarBairro').modal('show');

  	}

  	function openModalIncluirBairro() { 

  		var r = confirm("Você será redirecionado para a página de inclusão de Bairro, deseja continuar?");
		
		if (r == true) {
			var pagina = "views/view_bairro.php";
			$("#conteudo-principal").load(pagina);
		}

  	}

  	$(document).ready( function() {
		
  		var altBairro = document.querySelector('#formAlterarBairro');
    
	    altBairro.onsubmit = function(event) {
	      
	    	event.preventDefault();
	      
	      	var dados = $('#formAlterarBairro').serialize();

	      	$.ajax({
	          	type: 'POST',
	          	dataType: 'json',
	          	url: 'update/update_bairro.php',
	          	async: true,
	          	data: dados,
	          	success: function(data) {
	           
	           	  	if(data[0].msg == 0) {
	
						alert("O Bairro não foi informado");
						
					} else if (data[0].msg == 1) {
						
						alert("Erro ao atualizar dados");
						
					} else if (data[0].msg == 2) {

						alert("Nenhum dado foi alterado");

					} else if (data[0].msg == 3) {
						alert("Bairro alterada com sucesso !");
						$('#myModalAlterarBairro').modal('hide');
												
					} else {
						
						alert("Erro inesperado");

					}      
        			
        		} 
	            
	        });

	    }

	    return false;
	
	});      
	

  	function excluiBairro(id) {

  		if (confirm("Tem certeza que deseja excluir este registro?")) {

	  	  	$.ajax({
	            type: 'POST',
	            dataType: 'json',
	            url: 'delete/delete_bairro.php',
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
	
	var form_bairro = document.querySelector('#form_bairro');
	
	form_bairro.onsubmit = function(event) {
		
		event.preventDefault();
		
		var dados = $('#form_bairro').serialize();

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'search/pesquisa_bairro.php',
            async: true,
            data: dados,
            statusCode: {
    			404: function() {
      				alert("Página de pesquisa não localizada");
   				}
  			},
            success: function(data) { 
             
            	$('#tbbairro').html("");

            	var table = $('#dataTableBairro').DataTable();

			    table.clear();    
			    table.destroy();
            	     
            	if(data[0].msg == 0) {
                	alert("Erro no envio de dados");
               	} else if(data[0].msg == 1) {
               		alert("Informe o Bairro");
               	} else if(data[0].msg == 2) {
               		
               		alert("Nenhum registro encontrado");

               		$('#dataTableBairro').addClass('sr-only');               	
               		$('#naoencontrado').removeClass('sr-only');
               		
               	} else {


               		$('#dataTableBairro').removeClass('sr-only');               	
               		$('#naoencontrado').addClass('sr-only');              		
	            
	            	for(i = 0; i < data.length; i++) {

	            		$('#tbbairro').append("<tr><td>"+data[i].nomebairro+"</td><td>"+data[i].setor+"</td><td>"+data[i].kilometragem+"</td><td style='text-align: center'><button type='button' class='btn btn-outline-primary' onclick='openModalVisualizarBairro("+data[i].idbairro+")'>Visualizar</button></td><td style='text-align: center'><button type='button' class='btn btn-outline-success' onclick='openModalAlterarBairro("+data[i].idbairro+")'>Alterar</button></td><td style='text-align: center'><button type='button' class='btn btn-outline-danger' onclick='excluiBairro("+data[i].idbairro+")'>Excluir</button></td>");	            		
	            	} 

	            	LoadDataTable('dataTableBairro');

	            }  	
	            
            }
        });           

        return false;
		
	}
   
});



</script> 
