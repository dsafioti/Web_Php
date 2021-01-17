<?php
	if(!isset($_SESSION)) session_start();
?>
	<!-- Modal Visualização -->
	<div class="modal fade" id="myModalVisualizarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Consulta Usuário</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form id="formUsuario">

	          <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Nome Usuário</label>
	            <input type="text" class="form-control" id="identificador1" readonly>
	          </div>

	           <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Login</label>
	            <input type="text" class="form-control" id="identificador2" readonly>
	          </div>

			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Email</label>
	            <input type="text" class="form-control" id="identificador3" readonly>
	          </div>

			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Nivel Usuario</label>
	            <input type="text" class="form-control" id="identificador4"  readonly>
	          </div>

	          <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Empresa</label>
	            <input type="text" class="form-control" id="identificador5"  readonly>
	          </div>	          

   	          
 			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Telefone</label>
	            <input type="text" class="form-control" id="identificador6"  readonly>
	          </div>	          	          	          

 			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Celular</label>
	            <input type="text" class="form-control" id="identificador7"  readonly>
	          </div> 			  

 			  <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Inativo</label>
	            <input type="text" class="form-control" id="identificador8" readonly>
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
	<div class="modal fade" id="myModalAlterarUsuario" tabindex="-1" role="dialog" aria-labelledby="alterarModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="alterarModalLabel">Alterar Cadastro de Usuario</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">

			<form id="formAlterarUsuario" method="POST" class="needs-validation" novalidate>

			  <div class="form-group">
			  	<input type="text" class="form-control sr-only" id="alt_identificador0" name="alt_name0">
				<label for="alt_identificador1" class="col-form-label">Nome Usuário</label>
				<input type="text" class="form-control" id="alt_identificador1" name="alt_name1" required>
				<div class="valid-feedback">Válido</div>
				<div class="invalid-feedback">Campo obrigatório.</div>
			  </div>	

			  <div class="form-group">
			  	<label for="alt_identificador2" class="col-form-label">Login</label>
				<input type="text" class="form-control" id="alt_identificador2" name="alt_name2" required="">
				<div class="valid-feedback">Válido</div>
				<div class="invalid-feedback">Campo obrigatório.</div>
			  </div>	

              <div class="form-group">
			  	<label for="alt_identificador3" class="col-form-label">Senha</label>
				<input type="password" class="form-control" id="alt_identificador3" name="alt_name3" required="">
				<div class="valid-feedback">Válido</div>
				<div class="invalid-feedback">Campo obrigatório.</div>
			  </div>

              <div class="form-group">
			  	<label for="alt_identificador4" class="col-form-label">Confimação da Senha</label>
				<input type="password" class="form-control" id="alt_identificador4" name="alt_name4" required="">
				<div class="valid-feedback">Válido</div>
				<div class="invalid-feedback">Campo obrigatório.</div>
			  </div>			  				  	  

              <div class="form-group">
				<label for="alt_identificador5" class="col-form-label ">Email</label>
				<input type="text" class="form-control cnpj" id="alt_identificador5" name="alt_name5">
			  </div>

			  <div class="form-group">
				<label for="alt_identificador6" class="col-form-label">Nivel Usuário</label>
				<select class="form-control required-select" id="alt_identificador6" name="alt_name6" required>

				<option value="">Selecione o Nível do Usuário</option> 
				<?php
                    
                    include '../../conexao.php';

                    $select_nivel = "SELECT idnivelusuario, descrnivel
                                     FROM nivelusuario";
                    $result_select_nivel = mysqli_query($conexao, $select_nivel);

                    while ($row = mysqli_fetch_assoc($result_select_nivel)) { 

                      echo "<option value='".$row['idnivelusuario']."'>".$row['descrnivel']."</option>";
                                                   
                    }                
                    mysqli_free_result($result_select_nivel);          
                ?>
                </select>
                <div class="valid-feedback">Válido</div>
				<div class="invalid-feedback">Campo obrigatório.</div>

			  </div>	          	          	          

			  <div class="form-group">
				<label for="alt_identificador7" class="col-form-label">Empresa</label>
				<select class="form-control" id="alt_identificador7" name="alt_name7" required>

				<option value="">Selecione a Empresa</option> 
				<?php
                    
                    $select_empresa = "SELECT idempresa, nomefantasia, cnpj, cidade, estado FROM empresa;";

                    $result_select_empresa = mysqli_query($conexao, $select_empresa);
                    
                    while ($row = mysqli_fetch_assoc($result_select_empresa)) { 
                      
                      $nome_empresa = $row['nomefantasia'].' - CNPJ : '.$row['cnpj'].' - '.$row['cidade'].'-'.$row['estado'];

                      echo "<option value='".$row['idempresa']."'>".$nome_empresa."</option>";
                                            
                    }
                    /* free result set */
                    mysqli_free_result($result_select_empresa);    
                ?> 
                </select>
                <div class="valid-feedback">Válido</div>
				<div class="invalid-feedback">Campo obrigatório.</div>

			  </div>


			  <div class="form-group">
				<label for="alt_identificador8" class="col-form-label">Telefone</label>
				<input type="text" class="form-control" id="alt_identificador8" name="alt_name8">
			  </div>	          	          	          

			  <div class="form-group">
				<label for="alt_identificador9" class="col-form-label">Celular</label>
				<input type="text" class="form-control" id="alt_identificador9" name="alt_name9">
			  </div>
			  

			  <div class="form-group form-check">			  		
				<input type="checkbox" class="form-check-input" id="alt_identificador10" name="alt_name10">
				<label for="alt_identificador10" class="form-check-label">Inativo</label>
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

	<h3>Consulta de Usuário</h3>

	<div class="jumbotron jumbotron-fluid">
	  <div class="container">	   	

	   	 <form action="" id="form_usuario" method="POST">

	   	 	<div class="form-row">

	   	 		<div class="form-group col-md-6">
	   	 			
	   	 			<label for="nomeusuario">Nome Usuário</label>
	   	 			<input type="text" class="form-control" name="nomeusuario" id="nomeusuario" placeholder="Nome do Usuário">
	   	 		</div>

	   	 		<div class="form-group col-md-6">

	   	 			<label for="descrnivel">Nível usuário</label>
	   	 			<!-- <input type="text" class="form-control" name="descrnivel" id="descrnivel" placeholder="Nível do Usuário"> -->

	   	 			<select class="form-control" id="iddescrnivel" name="descrnivel" >
                
                    <option value="">Selecione o nível de usuário</option> 
	                <?php
	                    
	                    $select_nivel = "SELECT idnivelusuario, descrnivel
	                                     FROM nivelusuario";
	                    $result_select_nivel = mysqli_query($conexao, $select_nivel);

	                    while ($row = mysqli_fetch_assoc($result_select_nivel)) { 

	                      echo "<option value='".$row['descrnivel']."'>".$row['descrnivel']."</option>";
	                                                   
	                    }                          
	                ?>
	                </select>

	   	 		</div>

	   	 	</div>

	   	 	<button type="submit" class="btn btn-primary">Pesquisar</button>

	   	 </form>
	    
	  </div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered sr-only" id="dataTableUsuario" width="100%" cellspacing="0">
		  <thead> 
			<tr> 
			    <th>Nome</th> 
				<th>Nível do usuário</th> 
				<th>Empresa</th>	
				<th>Ação 1</th>
				<th>Ação 2</th>
				<th>Ação 3</th>
			</tr> 
		   </thead>
		   <tbody id="tbusuario">
		   	
		   </tbody>
		</table>
		<div id="naoencontrado" class="sr-only">
			<button type="button" class="btn btn-primary btn-lg btn-block" onclick="openModalIncluirUsuario()">Incluir</button>
		</div>
	</div>

<script>



	function carregaDadosJSonVisualizarUsuario(id) {

		$('#formUsuario').each (function() {
			this.reset();
		});		

		$.ajax({

            type: 'POST',
            data: ({id : id}),
            dataType: 'json',      
            url: 'load/loadUsuario.php',
            success: function(data) {
            	            	            	                  	          		            
        		if(data[0].msg == 0) {
        			alert("Identificador da Usuario não informado!");
        		} else if (data[0].msg == 1) {
        			alert("Usuario não localizado");
        		} else {        			
        			if(data[0].inativo==0){
        				inativo = "Não";
        			}else{
						inativo = "Sim";
        			}
				
        			$('#identificador1').val(data[0].nomeusuario);
					$('#identificador2').val(data[0].login);
					$('#identificador3').val(data[0].email);
					$('#identificador4').val(data[0].descrnivel);
					$('#identificador5').val(data[0].razaosocial);
					$('#identificador6').val(data[0].telefone);
					$('#identificador7').val(data[0].celular);
					$('#identificador8').val(inativo);
        			        			
        		}            	
			}

		});
  	}

  	function openModalVisualizarUsuario(id) {   

    	carregaDadosJSonVisualizarUsuario(id);      

      	$('#myModalVisualizarUsuario').modal('show');

  	}

  	function carregaDadosJSonAlterarUsuario(id) {
		
		$('#formAlterarUsuario').each (function() {
		  this.reset();
		});
		
		$.ajax({

            type: 'POST',
            data: ({id : id}),
            dataType: 'json',      
            url: 'load/loadUsuario.php',
            success: function(data) {
            	            	            	                  	          		            
        		if(data[0].msg == 0) {
        			alert("Identificador do registro não informado!");
        		} else if (data[0].msg == 1) {
        			alert("Registro não localizado");
        		} else {

        			var inativo = data[0].inativo;
        			      		
					$('#alt_identificador0').val(data[0].idusuario);
					$('#alt_identificador1').val(data[0].nomeusuario);
					$('#alt_identificador2').val(data[0].login);
					$('#alt_identificador3').val(data[0].senha);
					$('#alt_identificador4').val(data[0].senha);
					$('#alt_identificador5').val(data[0].email);
					$('#alt_identificador6').val(data[0].idnivelusuario);
					$('#alt_identificador7').val(data[0].idempresa);
					$('#alt_identificador8').val(data[0].telefone);
					$('#alt_identificador9').val(data[0].celular);
        		
	            	if (inativo == 0) {
	            		$("#alt_identificador10")[0].checked = false;
	            	} else if (inativo == 1) {
	            		$("#alt_identificador10")[0].checked = true;
	            	} else {
	            		alert("Erro na atualização do campo 'inativo'");
	            	}      
        			
        		}            	
			}

		});
  	}

  	function openModalAlterarUsuario(id) {   

    	carregaDadosJSonAlterarUsuario(id);      

      	$('#myModalAlterarUsuario').modal('show');

  	}

  	function openModalIncluirUsuario() { 

  		var r = confirm("Você será redirecionado para a página de inclusão de usuario, deseja continuar?");
		
		if (r == true) {
			var pagina = "views/view_usuario.php";
			$("#conteudo-principal").load(pagina);
		}

  	}

  	$(document).ready( function() {

	  	$('#formAlterarUsuario').submit(function (event) {
		    event.preventDefault();
		    if ($('#formAlterarUsuario')[0].checkValidity() === false) {
		        event.stopPropagation();
		    } else {
		        
		    	var altUsuario = document.querySelector('#formAlterarUsuario');
	    
			    altUsuario.onsubmit = function(event) {
			      
			    	// event.preventDefault();
			      
			      	var dados = $('#formAlterarUsuario').serialize();	      

			      	$.ajax({
			          	type: 'POST',
			          	dataType: 'json',
			          	url: 'update/update_usuario.php',
			          	async: true,
			          	data: dados,
			          	success: function(data) {
			           
			           	  	if(data[0].msg == 0) {
			
								alert("O Nivel do usuario não foi informado");
								
							} else if (data[0].msg == 1) {
								
								alert("Erro ao atualizar dados");
								
							} else if (data[0].msg == 2) {

								alert("Nenhum dado foi alterado");

							} else if (data[0].msg == 3) {
								alert("Usuario alterado com sucesso !");
								$('#myModalAlterarUsuario').modal('hide');
							}
							  else if (data[0].msg == 4) {
								alert("Senha não foi informada !");
							}
							 else if (data[0].msg == 5) {
								alert("Nome de Usuário não foi informado !");
							}
							 else if (data[0].msg == 6) {
								alert("Login não foi informado!");																			
							}
							 else if (data[0].msg == 7) {
								alert("Nível de usuário não foi informado!");
							}
							 else if (data[0].msg == 8) {
								alert("Empresa não foi informado!");	
														
							}
							 else if (data[0].msg == 9) {
								alert("Confirmação de senhas estão diferentes");	
							}
							  else {						
								alert("Erro inesperado");
							}         			
		        		} 			            
			        });

			    }

			    return false;
		    }
		    $('#formAlterarUsuario').addClass('was-validated');
		});

	});      
	

  	function excluiUsuario(id) {

  		if (confirm("Tem certeza que deseja excluir este registro?")) {

	  	  	$.ajax({
	            type: 'POST',
	            dataType: 'json',
	            url: 'delete/delete_usuario.php',
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
		
	var form_usuario = document.querySelector('#form_usuario');								    
	
	form_usuario.onsubmit = function(event) {	

		event.preventDefault();
		
		var dados = $('#form_usuario').serialize();

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'search/pesquisa_usuario.php',
            async: true,
            data: dados,
            statusCode: {
    			404: function() {
      				alert("Página de pesquisa não localizada");
   				}
  			},
            success: function(data) { 
             
            	$('#tbusuario').html("");

            	var table = $('#dataTableUsuario').DataTable();

			    table.clear();    
			    table.destroy();
            	     
            	if(data[0].msg == 0) {
                	alert("Erro no envio de dados");
               	} else if(data[0].msg == 1) {
               		alert("Informe Nome ou Nivel do usuário");
               	} else if(data[0].msg == 2) {
               		
               		alert("Nenhum registro encontrado");

               		$('#dataTableusuario').addClass('sr-only');               	
               		$('#naoencontrado').removeClass('sr-only');
               		
               	} else {

               		$('#dataTableUsuario').removeClass('sr-only');               	
               		$('#naoencontrado').addClass('sr-only');              		
	            
	            	for(i = 0; i < data.length; i++) {

	            		$('#tbusuario').append("<tr><td>"+data[i].nomeusuario+"</td><td>"+data[i].descrnivel+"</td><td>"+data[i].razaosocial+"</td><td style='text-align: center'><button type='button' class='btn btn-outline-primary' onclick='openModalVisualizarUsuario("+data[i].idusuario+")'>Visualizar</button></td><td style='text-align: center'><button type='button' class='btn btn-outline-success' onclick='openModalAlterarUsuario("+data[i].idusuario+")'>Alterar</button></td><td style='text-align: center'><button type='button' class='btn btn-outline-danger' onclick='excluiUsuario("+data[i].idusuario+")'>Excluir</button></td>");	            		
	            	} 

	            	LoadDataTable('dataTableUsuario');

	            }  	
	            
            }
        });           

        return false;
		
	}
   
});

</script> 
