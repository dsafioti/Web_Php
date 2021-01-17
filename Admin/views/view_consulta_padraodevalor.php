<?php
	if(!isset($_SESSION)) session_start();
?>
	<!-- Modal Visualização -->
	<div class="modal fade" id="myModalVisualizarPadrao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Consulta Padrao de Valor</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form id="formPadrao">

	          <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Nome Padrão</label>
	            <input type="text" class="form-control" id="identificador1" readonly>
	          </div>	          	 

 			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Nomenclatura</label>
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
	<div class="modal fade" id="myModalGerarHistorico" tabindex="-1" role="dialog" aria-labelledby="gerarModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="gerarModalLabel">Incluir Histórico Padrão de Valor</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form id="formGerarHistorico" method="POST">

			  <div class="form-group">
			  	<input type="text" class="form-control sr-only" id="ger_identificador0" name="ger_name0">
			  	<label for="ger_identificador1" class="col-form-label">Data Inicial</label>
				<input type="text" class="form-control dateformat" id="ger_identificador1" name="ger_name1" required="">
			  </div>	

			  <div class="form-group">
			  	<label for="ger_identificador2" class="col-form-label">Data Final</label>
				<input type="text" class="form-control dateformat" id="ger_identificador2" name="ger_name2" required="">
			  </div>			  

			  <div class="form-group">
			  	<label for="ger_identificador3" class="col-form-label">Valor</label>
				<input type="text" class="form-control money" id="ger_identificador3" name="ger_name3" required="">
			  </div>		

			  <div class="form-group form-check">			     		
				<input type="checkbox" class="form-check-input" id="ger_identificador4" name="ger_name4">	
				<label for="ger_identificador4" class="form-check-label">Inativo</label>	 			
			  </div>

			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
				<button type="submit" id="btnGerar" class="btn btn-primary">Gerar</button>
			  </div>

			</form>
		  </div>		  
		</div>
	  </div>
	</div>

	<!-- Modal Alteração -->
	<div class="modal fade" id="myModalAlterarPadrao" tabindex="-1" role="dialog" aria-labelledby="alterarModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="alterarModalLabel">Alterar Cadastro de Padrão de Valor</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form id="formAlterarPadrao" method="POST">

			  <div class="form-group">
			  	<input type="text" class="form-control sr-only" id="alt_identificador0" name="alt_name0">
			  	<label for="alt_identificador1" class="col-form-label">Nome Padrão</label>
				<input type="text" class="form-control" id="alt_identificador1" name="alt_name1">
			  </div>	

			  <div class="form-group">
			  	<label for="alt_identificador2" class="col-form-label">Nomenclatura</label>
				<input type="text" class="form-control" id="alt_identificador2" name="alt_name2">
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

	<h3>Consulta de Padrao de Valor</h3>

	<div class="jumbotron jumbotron-fluid">
	  <div class="container">	   	

	   	 <form action="" id="form_padrao" method="POST">

	   	 	<div class="form-row">

	   	 		<div class="form-group col-md-6">
	   	 			
	   	 			<label for="nomepadrao">Nome Padrao</label>
	   	 			<input type="text" class="form-control" name="nomepadrao" id="nomepadrao" placeholder="Padrao de Valor">
	   	 		</div>

	   	 		<div class="form-group col-md-6">

	   	 		</div>

	   	 	</div>

	   	 	<button type="submit" class="btn btn-primary">Pesquisar</button>

	   	 </form>
	    
	  </div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered sr-only" id="dataTablePadrao" width="100%" cellspacing="0">
		  <thead> 
			<tr> 
			    <th>Nome Padrao</th> 
			    <th>Nomenclatura</th>
			    <th>Hitórico</th>			    
				<th>Ação 1</th>
				<th>Ação 2</th>
				<th>Ação 3</th>
			</tr> 
		   </thead>
		   <tbody id="tbpadrao">
		   	
		   </tbody>
		</table>
		<div id="naoencontrado" class="sr-only">
			<button type="button" class="btn btn-primary btn-lg btn-block" onclick="openModalIncluirPadrao()">Incluir</button>
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


	function carregaDadosJSonVisualizarPadrao(id) {

		$('#formPadrao').each (function() {
			this.reset();
		});		

		$.ajax({

            type: 'POST',
            data: ({id : id}),
            dataType: 'json',      
            url: 'load/loadPadraodevalor.php',
            success: function(data) {
            	            	            	                  	          		            
        		if(data[0].msg == 0) {
        			alert("Identificador do Padrão não informado!");
        		} else if (data[0].msg == 1) {
        			alert("Padrao de Valor não localizado");
        		} else {    

        			$('#identificador1').val(data[0].nomepadrao);        			        			
        			$('#identificador2').val(data[0].nomenclatura);  
        		}            	
			}

		});
  	}

  	function openModalVisualizarPadrao(id) {   

    	carregaDadosJSonVisualizarPadrao(id);      

      	$('#myModalVisualizarPadrao').modal('show');

  	}

  	function carregaDadosJSonAlterarPadrao(id) {
		
		$('#formAlterarPadrao').each (function() {
		  this.reset();
		});
		
		$.ajax({

            type: 'POST',
            data: ({id : id}),
            dataType: 'json',      
            url: 'load/loadPadraodevalor.php',
            success: function(data) {
            	            	            	                  	          		            
        		if(data[0].msg == 0) {
        			alert("Identificador do registro não informado!");
        		} else if (data[0].msg == 1) {
        			alert("Registro não localizado");
        		} else {							
					$('#alt_identificador0').val(data[0].idpadraodevalor);
					$('#alt_identificador1').val(data[0].nomepadrao);
					$('#alt_identificador2').val(data[0].nomenclatura);
        		}            	
			}

		});
  	}

  	function openModalAlterarPadrao(id) {   

    	carregaDadosJSonAlterarPadrao(id);      

      	$('#myModalAlterarPadrao').modal('show');

  	}

    

  	function openModalGerarHistorico(id) {  

  	    $('#ger_identificador0').val(id);

      	$('#myModalGerarHistorico').modal('show');

  	}


    	$(document).ready( function() {

	      $('#formGerarHistorico').submit(function (event) {
	        event.preventDefault();
	        if ($('#formGerarHistorico')[0].checkValidity() === false) {
	            event.stopPropagation();
	        } else {
	    
	              var formGerarHistorico = document.querySelector('#formGerarHistorico');
	              
	              formGerarHistorico.onsubmit = function(event) {               
	                
	            
	                var dados = $('#formGerarHistorico').serialize();

	                $.ajax({
	                    type: 'POST',
	                    dataType: 'json',
	                    url: 'cadastro/cadastro_historico.php',
	                    async: true,
	                    data: dados,
	                    success: function(response) {

						   if(response[0].msg == 0) {
	                        alert("Cadastro realizado com sucesso!");
	                        $('#formGerarHistorico')[0].reset();  
	                      } else if(response[0].msg == 1) {
	                        alert("Erro ao cadastrar o Historico de Padrao! ");
	                        $('#ger_identificador1').focus();
	                        $('#formGerarHistorico')[0].reset();  
	                      } else if (response[0].msg == 3) {
	                        alert('Referência do registro Padrao de Valor não identificado!');
	                        $('#formGerarHistorico')[0].reset();  
						  } else if (response[0].msg == 4) {        					 
        		  			alert("Já existe um padrao de valor ativo");
        		  			$('#formGerarHistorico')[0].reset();  
							//$('#ger_identificador1').focus();
	                      }
	                    }
	                });
	              }  

	          return false;      
	          }
	          $('#formGerarHistorico').addClass('was-validated');
	     });
	  });


  	function openModalIncluirPadrao() { 

  		var r = confirm("Você será redirecionado para a página de inclusão de Padrao de Valor, deseja continuar?");
		
		if (r == true) {
			var pagina = "views/view_padraodevalor.php";
			$("#conteudo-principal").load(pagina);
		}

  	}

  	$(document).ready( function() {
		
  		var altPadrao = document.querySelector('#formAlterarPadrao');
    
	    altPadrao.onsubmit = function(event) {
	      
	    	event.preventDefault();
	      
	      	var dados = $('#formAlterarPadrao').serialize();

	      	$.ajax({
	          	type: 'POST',
	          	dataType: 'json',
	          	url: 'update/update_padraodevalor.php',
	          	async: true,
	          	data: dados,
	          	success: function(data) {
	           
	           	  	if(data[0].msg == 0) {
	
						alert("O Padrao de Valor não foi informado");
						
					} else if (data[0].msg == 1) {
						
						alert("Erro ao atualizar dados");
						
					} else if (data[0].msg == 2) {

						alert("Nenhum dado foi alterado");

					} else if (data[0].msg == 3) {
						alert("Padrao de Valor alterada com sucesso !");
						$('#myModalAlterarPadrao').modal('hide');
												
					} else {
						
						alert("Erro inesperado");

					}      
        			
        		} 
	            
	        });

	    }

	    return false;
	
	});      
	

  	function excluiPadrao(id) {

  		if (confirm("Tem certeza que deseja excluir este registro?")) {

	  	  	$.ajax({
	            type: 'POST',
	            dataType: 'json',
	            url: 'delete/delete_padraodevalor.php',
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
	
	var form_padrao = document.querySelector('#form_padrao');
	
	form_padrao.onsubmit = function(event) {
		
		event.preventDefault();
		
		var dados = $('#form_padrao').serialize();

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'search/pesquisa_padraodevalor.php',
            async: true,
            data: dados,
            statusCode: {
    			404: function() {
      				alert("Página de pesquisa não localizada");
   				}
  			},
            success: function(data) { 
             
            	$('#tbpadrao').html("");

            	var table = $('#dataTablePadrao').DataTable();

			    table.clear();    
			    table.destroy();
            	     
            	if(data[0].msg == 0) {
                	alert("Erro no envio de dados");
               	} else if(data[0].msg == 1) {
               		alert("Informe o Padrao de Valor");
               	} else if(data[0].msg == 2) {
               		
               		alert("Nenhum registro encontrado");

               		$('#dataTablePadrao').addClass('sr-only');               	
               		$('#naoencontrado').removeClass('sr-only');
               		
               	} else {


               		$('#dataTablePadrao').removeClass('sr-only'); 
               		$('#naoencontrado').addClass('sr-only');           		
	            
	            	for(i = 0; i < data.length; i++) {

	            		$('#tbpadrao').append("<tr><td>"+data[i].nomepadrao + "</td><td>" + data[i].nomenclatura + "</td><td style='text-align: center'><button type='button' class='btn btn-outline-primary' onclick='openModalGerarHistorico("+data[i].idpadraodevalor+")'>Gerar</button></td><td style='text-align: center'><button type='button' class='btn btn-outline-primary' onclick='openModalVisualizarPadrao("+data[i].idpadraodevalor+")'>Visualizar</button></td><td style='text-align: center'><button type='button' class='btn btn-outline-success' onclick='openModalAlterarPadrao("+data[i].idpadraodevalor+")'>Alterar</button></td><td style='text-align: center'><button type='button' class='btn btn-outline-danger' onclick='excluiPadrao("+data[i].idpadraodevalor+")'>Excluir</button></td>");	            		
	            	} 

	            	LoadDataTable('dataTablePadrao');

	            }  	
	            
            }
        });           

        return false;
		
	}
   
});



</script> 
