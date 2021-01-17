<?php
	if(!isset($_SESSION)) session_start();
?>
	<!-- Modal Visualização -->
	<div class="modal fade" id="myModalVisualizarHistorico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Consulta Historico de Padrao de Valor</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form id="formHistorico">

	          <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Data Inicial</label>
	            <input type="text" class="form-control" id="identificador1" readonly>
	          </div>	          	 

 			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Data Final</label>
	            <input type="text" class="form-control" id="identificador2" readonly>
	          </div>	                   	          	          

 			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Valor</label>
	            <input type="text" class="form-control" id="identificador3" readonly>
	          </div>	                   	          	          

 			   <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Inativo</label>
	            <input type="text" class="form-control" id="identificador4" readonly>
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
	<div class="modal fade" id="myModalAlterarHistorico" tabindex="-1" role="dialog" aria-labelledby="alterarModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="alterarModalLabel">Alterar Cadastro Historico de Padrão de Valor</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form id="formAlterarHistorico" method="POST">

			  <div class="form-group">
			  	<input type="text" class="form-control sr-only" id="alt_identificador0" name="alt_name0">
			  	<label for="alt_identificador1" class="col-form-label">Data Inicial</label>
				<input type="text" class="form-control dateformat" id="alt_identificador1" name="alt_name1" required>
			  </div>	

			  <div class="form-group">
			  	<label for="alt_identificador2" class="col-form-label">Data Final</label>
				<input type="text" class="form-control dateformat" id="alt_identificador2" name="alt_name2" required>
			  </div>			  

			  <div class="form-group">
			  	<label for="alt_identificador2" class="col-form-label">Valor</label>
				<input type="text" class="form-control money" id="alt_identificador3" name="alt_name3" required>
			  </div>	

			  <div class="form-group form-check">			  		
				<input type="checkbox" class="form-check-input" id="alt_identificador4" name="alt_name4">
				<label for="alt_identificador4" class="form-check-label">Inativo</label>
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

	<h3>Consulta Histórico de Padrao de Valor</h3>

	<div class="jumbotron jumbotron-fluid">
	  <div class="container">	   	

	   	 <form id="form_historico" method="POST">

	   	 	<div class="form-row">
	   	 		<div class="form-group col-md-6">	   	 			
	   	 			<label for="nomepadrao">Nome Padrao</label>
	   	 			<input type="text" class="form-control" name="nomepadrao" id="nomepadrao" placeholder="Padrao de Valor">
	   	 		</div>
	   	 	</div>

	   	 	<button type="submit" class="btn btn-primary">Pesquisar</button>

	   	 </form>
	    
	  </div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered sr-only" id="dataTableHistorico" width="100%" cellspacing="0">
		  <thead> 
			<tr> 
			    <th>Nome Padrao</th> 
			    <th>Nomenclatura</th>
			    <th>Data Inicial</th>			    
			    <th>Data Final</th>
			    <th>Valor</th>
			    <th>Inativo</th>
				<th>Ação 1</th>
				<th>Ação 2</th>
				<th>Ação 3</th>
			</tr> 
		   </thead>
		   <tbody id="tbhistorico">
		   	
		   </tbody>
		</table>
		<div id="naoencontrado" class="sr-only">
			<button type="button" class="btn btn-primary btn-lg btn-block" onclick="openModalIncluirHistorico()">Incluir</button>
		</div>
	</div>

<script>
	
   function formata_data(data) { // yyyy-mm-dd -> dd/mm/yyyy  
      var data_formatada = data.substr(8,2) + '/' + data.substr(5,2) + '/' + data.substr(0,4) ;
    return data_formatada;
    }

	jQuery(function($) {

    $('.money').mask('#.##0,00', {reverse: true});
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

    function carregaDadosJSonVisualizarHistorico(id) {

		$('#formHistorico').each (function() {
			this.reset();
		});	

	}	

	function carregaDadosJSonVisualizarHistorico(id) {

		$('#formHistorico').each (function() {
			this.reset();
		});		

		$.ajax({

            type: 'POST',
            data: ({id : id}),
            dataType: 'json',      
            url: 'load/loadHistorico.php',
            success: function(data) {
            	            	            	                  	          		            
        		if(data[0].msg == 0) {
        			alert("Identificador do Histórico Padrão de Valor não informado!");
        		} else if (data[0].msg == 1) {
        			alert("Histórico Padrão de Valor não localizado");
        		} else {    

        			var dtini = formata_data(data[0].dtinicial); 
        			var dtfim = formata_data(data[0].dtfinal); 

        			if(data[0].inativo==0){
        				inativo = "Não";
        			}else{
						inativo = "Sim";
        			}

        			$('#identificador1').val(dtini);        			        			
        			$('#identificador2').val(dtfim);  
        			$('#identificador3').val(data[0].valor);  
        			$('#identificador4').val(inativo);  

        		}            	
			}

		});
  	}

  	function openModalVisualizarHistorico(id) {   

    	carregaDadosJSonVisualizarHistorico(id);      

      	$('#myModalVisualizarHistorico').modal('show');

  	}

  	function carregaDadosJSonAlterarHistorico(id) {
		
		$('#formAlterarHistorico').each (function() {
		  this.reset();
		});
		
		$.ajax({

            type: 'POST',
            data: ({id : id}),
            dataType: 'json',      
            url: 'load/loadHistorico.php',
            success: function(data) {

                
            	            	            	                  	          		            
        		if(data[0].msg == 0) {
        			alert("Identificador do registro não informado!");
        		} else if (data[0].msg == 1) {
        			alert("Registro não localizado");
        		} else {	

					var inativo = data[0].inativo;	
				    var dtini = formata_data(data[0].dtinicial); 
        			var dtfim = formata_data(data[0].dtfinal); 


					$('#alt_identificador0').val(data[0].idhistoricopadrao );
					$('#alt_identificador1').val(dtini);
					$('#alt_identificador2').val(dtfim);
					$('#alt_identificador3').val(data[0].valor);

					if (inativo == 0) {
	            		$("#alt_identificador4")[0].checked = false;
	            	} else if (inativo == 1) {
	            		$("#alt_identificador4")[0].checked = true;
	            	} else {
	            		alert("Erro na atualização do campo 'inativo'");
	            	}

        		}            	
			}

		});
  	}

  	function openModalAlterarHistorico(id) {   

    	carregaDadosJSonAlterarHistorico(id);      

      	$('#myModalAlterarHistorico').modal('show');

  	}    

  	function openModalIncluirHistorico() { 

  		var r = confirm("Você será redirecionado para a página de inclusão de Histórico Padrao de Valor, deseja continuar?");
		
		if (r == true) {
			var pagina = "views/view_historico.php";
			$("#conteudo-principal").load(pagina);
		}

  	}

  	$(document).ready( function() {
		
  		var altHistorico = document.querySelector('#formAlterarHistorico');
    
	    altHistorico.onsubmit = function(event) {
	      
	    	event.preventDefault();
	      
	      	var dados = $('#formAlterarHistorico').serialize();

	      	$.ajax({
	          	type: 'POST',
	          	dataType: 'json',
	          	url: 'update/update_historico.php',
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
						$('#myModalAlterarHistorico').modal('hide');
												
					} else {
						
						alert("Erro inesperado");

					}      
        			
        		} 
	            
	        });

	    }

	    return false;
	
	});      
	

  	function excluiHistorico(id) {

  		if (confirm("Tem certeza que deseja excluir este registro?")) {

	  	  	$.ajax({
	            type: 'POST',
	            dataType: 'json',
	            url: 'delete/delete_historico.php',
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
	
	var form_historico = document.querySelector('#form_historico');
	
	form_historico.onsubmit = function(event) {
		
		event.preventDefault();
		
		var dados = $('#form_historico').serialize();

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'search/pesquisa_historico.php',
            async: true,
            data: dados,
            statusCode: {
    			404: function() {
      				alert("Página de pesquisa não localizada");
   				}
  			},
            success: function(data) { 
             
            	$('#tbhistorico').html("");

            	var table = $('#dataTableHistorico').DataTable();

			    table.clear();    
			    table.destroy();
            	     
            	if(data[0].msg == 0) {
                	alert("Erro no envio de dados");
               	} else if(data[0].msg == 1) {
               		alert("Informe o Histórico Padrao de Valor");
               	} else if(data[0].msg == 2) {
               		
               		alert("Nenhum registro encontrado");

               		$('#dataTableHistorico').addClass('sr-only');               	
               		$('#naoencontrado').removeClass('sr-only');
               		
               	} else {


               		$('#dataTableHistorico').removeClass('sr-only'); 
               		$('#naoencontrado').addClass('sr-only');               	

	            	for(i = 0; i < data.length; i++) {

	            		var id = Number(data[i].idhistoricopadrao);
	            		var inativo = Number(data[i].inativo);	    

	            		//tratando as datas        	
	            		var F_dtinicial = formata_data(data[i].dtinicial);
	            		var F_dtfinal = formata_data(data[i].dtfinal);
					        
						$('#tbhistorico').append("<tr><td>"+data[i].nomepadrao + "</td><td>" + data[i].nomenclatura + "</td><td>" + F_dtinicial + "</td><td>" + F_dtfinal + "</td><td>" +  data[i].valor + "</td><td class='text-center'>" + "<input type='checkbox' name='inativo"+data[i].idhistoricopadrao+"' value='"+data[i].inativo+"' disabled></td> <td style='text-align: center'><button type='button' class='btn btn-outline-primary' onclick='openModalVisualizarHistorico("+data[i].idhistoricopadrao+")'>Visualizar</button></td><td style='text-align: center'><button type='button' class='btn btn-outline-success' onclick='openModalAlterarHistorico("+data[i].idhistoricopadrao+")'>Alterar</button></td><td style='text-align: center'><button type='button' class='btn btn-outline-danger' onclick='excluiHistorico("+data[i].idhistoricopadrao+")'>Excluir</button></td></tr>");

						if (inativo == 1) {
							$("input[name='inativo"+id+"']").attr("checked","checked");
						} else {
							$("input[name='inativo"+id+"']").removeAttr("checked");
						} 	
	            	} 

	            	LoadDataTable('dataTableHistorico');

	            }  	
	            
            }
        });           

        return false;
		
	}
   
});



</script> 
