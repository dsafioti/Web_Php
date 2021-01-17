<?php
	if (!isset($_SESSION)) session_start();
	include('../../conexao.php');
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Permissão do usuário</h1>
<!-- <p>- listagem de usuário com checkbox para informar qual item do sistema poderá ser acessado</p> -->

<div class="card shadow mb-4">
	<div class="card-header py-3">
	  <h6 class="m-0 font-weight-bold text-primary">Usuários e clientes</h6>
	</div>
	<div class="card-body">              
			  	
	  	<nav>
			<div class="nav nav-tabs" id="nav-tab" role="tablist">
				<a class="nav-item nav-link active" id="nav-permissao-tab-adm" data-toggle="tab" href="#nav-permissao_adm" role="tab" aria-controls="nav-permissao_adm" aria-selected="true">
					Administrador
				</a>
				<a class="nav-item nav-link" id="nav-permissao-tab-func" data-toggle="tab" href="#nav-permissao_func" role="tab" aria-controls="nav-permissao_func" aria-selected="false">
					Funcionário
				</a>   
			</div>
	    </nav>
		
	  <div class="tab-content" id="nav-tabContentPermissao">
	  	<div class="tab-pane fade show active" id="nav-permissao_adm" role="tabpanel" aria-labelledby="nav-adm-tab">	  				    		
		
		  <!-- id dataTable deve ser revisto -->
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="dataTablePermissaoAdm" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>E-MAIL</th>
                  <th>Permissões</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nome</th>
                  <th>E-MAIL</th>
                  <th>Permissões</th>
                </tr>
              </tfoot>
              <tbody>
              	
              	<?php
		
					$sql1 = "SELECT * FROM usuario WHERE idnivelusuario = 1 ORDER BY nomeusuario ASC;";
					
					if ($result1 = mysqli_query($conexao, $sql1)) {
												
					    while ($row1 = mysqli_fetch_assoc($result1)) {
					    	echo "<tr><td>".$row1['nomeusuario']."</td>";
                   	 		echo "<td>".$row1['email']."</td>";
							$id_adm = $row1['idusuario'];
							echo '
								<td style="text-align: center"><button type="button" class="btn btn-success btn-sm" onclick="openModalUpdateAdm('.$id_adm.')" id="alterarAdm'.$id_adm.'">
					  				 <i class="fa fa-edit"></i>
								</button></td>
							';  
					    }
					
					    /* free result set */
					    mysqli_free_result($result1);
					}
					
				?>
                  
              </tbody>
            </table>
          </div>
			
			<div class="modal fade" id="myModalUpdatePermissaoAdm" tabindex="-1" role="dialog" aria-labelledby="modalLabelAlterarPermissaoAdm" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="modalLabelAlterarPermissaoAdm">Alterar Administrador</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      
			      <div class="modal-body">
			        
			        <form action="" method="POST" id="form_update_permisao_adm">
			        
			          <div class="form-group">
			            <label for="up_alterar_permissao_nome" class="col-form-label">Nome</label>
			            <input type="text" class="form-control" name="up_nome_adm" id="up_alterar_permissao_nome">
			            <input type="text" class="form-control sr-only" name="up_id_adm" id="up_alterar_permissao_id">
			          </div>
			          
			          <div class="form-group">
			            <label for="up_alterar_permissao_cpf" class="col-form-label">CPF</label>
			            <input type="text" class="form-control" name="up_cpf_adm" id="up_alterar_permissao_cpf">
			          </div>
			          
			          <div class="form-group" id="checkBoxList">
			          		<label for="up_alterar_permissao_adm" class="col-form-label">Permissões</label>
			          	</div>
			          	
			          	<div class="form-group">
			            	<table class="table table-bordered">
							  <thead>
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">Página</th>
							      <th scope="col">Permissão</th>
							    </tr>
							  </thead>
							  <tbody>
							    <tr>
								  <th scope="row">1</th>
								  <td>Cadastro Entregador</td>
								  <td style="text-align: center">
									<div class="custom-control custom-checkbox">
									  <input type="checkbox" class="custom-control-input" id="p_adm1" name="permissao_adm[1]" value="1">
									  <label class="custom-control-label" for="p_adm1"></label>
									</div>
								  </td>
								</tr>
								<tr>
								  <th scope="row">1</th>
								  <td>Permissões do Usuário</td>
								  <td style="text-align: center">
									<div class="custom-control custom-checkbox">
									  <input type="checkbox" class="custom-control-input" id="p_adm2" name="permissao_adm[2]" value="1">
									  <label class="custom-control-label" for="p_adm2"></label>
									</div>
								  </td>
								</tr>
							  </tbody>
							</table>
			          	</div>
			        
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fechar</button>
				        <button type="submit" class="btn btn-primary  btn-sm btn-danger" id="submit_update_adm">Alterar</button>
				      </div>
				      
			      	</form>
			      
			      </div>
			    </div>
			  </div>
			</div>					
	    
		</div>
		
		<div class="tab-pane fade" id="nav-permissao_func" role="tabpanel" aria-labelledby="nav-func-tab">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="dataTableFunc" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>CPF</th>
                  <th>Permissões</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nome</th>
                  <th>CPF</th>
                  <th>Permissões</th>
                </tr>
              </tfoot>
              <tbody>
              	
              	<?php
		
					$sql1 = "SELECT * FROM usuario WHERE tipo = 'funcionario' ORDER BY nome_usuario ASC;";
					
					if ($result1 = mysqli_query($conexao, $sql1)) {
												
					    while ($row1 = mysqli_fetch_assoc($result1)) {
					    	echo "<tr><td>".$row1['nome_usuario']."</td>";
                   	 		echo "<td>".$row1['cpf_usuario']."</td>";
							$id_func = $row1['id_usuario'];
							echo '
								<td style="text-align: center"><button type="button" class="btn btn-success btn-sm" onclick="openModalUpdateFunc('.$id_func.')" id="alterarFunc'.$id_func.'">
					  				 <i class="fa fa-edit"></i>
								</button></td>
							'; 
					    }
					
					    /* free result set */
					    mysqli_free_result($result1);
					}
					
				?>
                  
              </tbody>
            </table>
          </div>
          
         		<!-- Modal -->				
				<div class="modal fade" id="myModalUpdatePermissaoFunc" tabindex="-1" role="dialog" aria-labelledby="modalLabelAlterarPermissaoFunc" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="modalLabelAlterarPermissaoFunc">Alterar Funcionário</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <form action="" method="POST" id="form_update_permissao_func">
				          <div class="form-group">
				            <label for="up_alterar_permissao_id_nome" class="col-form-label">Nome</label>
				            <input type="text" class="form-control" name="up_nome_func" id="up_alterar_permissao_nome_func">
				            <input type="text" class="form-control sr-only" name="up_id_func" id="up_alterar_permissao_id_func">
				          </div>

						  <div class="form-group">
			            	<label for="up_alterar_permissao_cpf_func" class="col-form-label">CPF</label>
			            	<input type="text" class="form-control" name="up_cpf_func" id="up_alterar_permissao_cpf_func">
			          	  </div>
			          	
			          	  <div class="form-group" id="checkBoxList">
			          		<label for="up_alterar_permissao_func" class="col-form-label">Permissões</label>
			          	  </div>
			          	
			          	  <div class="form-group">
			            	<table class="table table-bordered">
							  <thead>
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">Página</th>
							      <th scope="col">Permissão</th>
							    </tr>
							  </thead>
							  <tbody>


							    <tr>
							      <th scope="row">1</th>
							      <td>Cadastro Entregador</td>
							      <td style="text-align: center">
							      	<div class="custom-control custom-checkbox">
									  <input type="checkbox" class="custom-control-input" id="p1" name="permissao[1]" value="1">
									  <label class="custom-control-label" for="p1"></label>
									</div>
							      </td>
							    </tr>


							  </tbody>
							</table>
			          	  </div>			          				          

				          <div class="modal-footer">
					        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fechar</button>
					        <button type="submit" class="btn btn-primary  btn-sm btn-danger" id="submit_update_func">Alterar</button>
					      </div>
				        </form>
				      </div>				      
				    </div>
				  </div>
				</div>							
			
		</div> 
		
		 
      </div>
	  
	  			  			  			            
	</div>
	
	
</div>

<script>	
	
	function carregaDadosJSonUpdatePermissaoAdm(id) {
		
   		$.ajax({
            type: 'POST',
            data: ({id : id}),
            dataType: 'json',      
            url: 'load/loadPermissao.php',
            success: function(data) {
            	            	            	                  	          		            
        		$('#up_alterar_permissao_id').val(data.usuario[0].idusuario);
            	$('#up_alterar_permissao_nome').val(data.usuario[0].nomeusuario);            	
				$('#up_alterar_permissao_cpf').val(data.usuario[0].email);		
            	
            	$("input[name='permissao_adm[]']").each(function() {
					$(this).removeAttr("checked");
				});
				
				for(i = 0; i < data.nivel.length; i++) {
					
						var id = Number(data.nivel[i].idpagina);
						var permissao = Number(data.nivel[i].permissao);
						
						if (permissao == 1) {
							$("input[name='permissao_adm["+id+"]']").attr("checked","checked");
						} else {
							$("input[name='permissao_adm["+id+"]']").removeAttr("checked");
						}
						
				}
            	
            	$('#myModalUpdatePermissaoAdm').modal('show'); 		
            	           	                        	
            	return 1;
            	
			}
		});
		
	}
		
   	function openModalUpdateAdm(id) {   		
   		carregaDadosJSonUpdatePermissaoAdm(id);
	}
	
	function carregaDadosJSonUpdatePermissaoFunc(id) {
		
   		$.ajax({
            type: 'POST',
            data: ({id : id}),
            dataType: 'json',      
            url: 'load/loadPermissao.php',
            success: function(data) {
            	            	            	                  	          		            
        		$('#up_alterar_permissao_id_func').val(data.id_usuario);
            	$('#up_alterar_permissao_nome_func').val(data.nome_usuario);            	
				$('#up_alterar_permissao_cpf_func').val(data.cpf_usuario);				
				
				$("input[name='permissao[]']").each(function() {
					$(this).removeAttr("checked");
				});
				
				for(i = 0; i < data.nivel.length; i++) {
					
						var id = Number(data.nivel[i].id_pagina);
						var permissao = Number(data.nivel[i].permissao);
						
						if (permissao == 1) {
							$("input[name='permissao["+id+"]']").attr("checked","checked");
						} else {
							$("input[name='permissao["+id+"]']").removeAttr("checked");
						}
						
				}
				
            	$('#myModalUpdatePermissaoFunc').modal('show'); 		
            	           	                        	
            	return 1;
            	
			}
		});
		
	}
		
   	function openModalUpdateFunc(id) {   		
   		carregaDadosJSonUpdatePermissaoFunc(id);
	}
		
	
	$(document).ready( function() {
		
		var permissaoFunc = document.querySelector('#form_update_permissao_func');
		
		form_update_permissao_func.onsubmit = function(event) {
			
			event.preventDefault();
			
			var dados = $('#form_update_permissao_func').serialize();
 
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'update/update_permissao_func.php',
                async: true,
                data: dados,
                success: function(response) {
                	
                	alert(response.msg);
                	$('#myModalUpdatePermissaoFunc').modal('hide');
                	  
                }
            });
 
            return false;
			
		}
       
     });
     
     
     
     $(document).ready( function() {
		
		var permissaoFunc = document.querySelector('#form_update_permisao_adm');
		
		form_update_permisao_adm.onsubmit = function(event) {
			
			event.preventDefault();
			
			var dados = $('#form_update_permisao_adm').serialize();
 
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'update/update_permissao_adm.php',
                async: true,
                data: dados,
                success: function(response) {
                	
                	alert(response.msg);
                	$('#myModalUpdatePermissaoAdm').modal('hide');
                	  
                }
            });
 
            return false;
			
		}
       
     });

</script>