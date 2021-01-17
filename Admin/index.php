<?php
  if (!isset($_SESSION)) session_start();
  
  if(!isset($_SESSION['usuario']) || !isset($_SESSION['idempresa'])) {
   
    header('Location:../index.php');
    exit();

  }

  $idempresa = $_SESSION['idempresa'];

  include('../conexao.php');
  
  $idusuario = $_SESSION['idusuario'];
  
  $sql1 = "SELECT idpagina, permissao FROM nivelacesso WHERE idusuario = '$idusuario';";  
  $result1 = mysqli_query($conexao, $sql1);   


  while ($row1 = mysqli_fetch_assoc($result1)) {          


    $acesso = 'acesso'.$row1['idpagina'];

    $_SESSION[$acesso] = $row1['permissao'];


  }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- jQuery UI -->
  <link href="vendor/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet">

  <style>
    .ui-datepicker {
      width: 14em;
    }

    .form-control.is-valid, .was-validated .form-control:valid {
      border-color: #1cc88a;
      padding-right: calc(1.5em + .75rem);
      background-image: none;
      background-repeat: no-repeat;
      background-position: center right calc(.375em + .1875rem);
      background-size: calc(.75em + .375rem) calc(.75em + .375rem);
    }


  </style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">DSoft  <sup>25</sup>
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Cadastro</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pessoa:</h6>
            <a class="collapse-item" href="view_model.php">Modelo</a> 
            <a class="collapse-item" href="view_cliente.php">Cliente</a> 
            <a class="collapse-item" href="view_entregador.php">Entregador</a>
            <a class="collapse-item" href="view_cidade.php">Cidade</a>
            <a class="collapse-item" href="view_padraodevalor.php">Padrão de Valor</a>

            <!-- Controle de acesso ao menu  -->
            
            <a class="collapse-item" href="view_bairro.php">Bairro</a>           
            <a class="collapse-item" href="view_usuario.php">Usuário</a> 
            <a class="collapse-item" href="view_logradouro.php">Logradouro</a> 
          </div>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesEntregador" aria-expanded="true" aria-controls="collapsePagesEntregador">
          <i class="fas fa-fw fa-folder"></i>
          <span>Consulta</span>
        </a>
        <div id="collapsePagesEntregador" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pessoa:</h6>            
            <a class="collapse-item" href="view_consulta_entregador.php">Entregador</a> 
            <a class="collapse-item" href="view_consulta_empresa.php">Empresa</a>           
            <a class="collapse-item" href="view_consulta_bairro.php">Bairro</a>  
            <a class="collapse-item" href="view_consulta_usuario.php">Usuário</a>
            <a class="collapse-item" href="view_consulta_cidade.php">Cidade</a>      
            <a class="collapse-item" href="view_consulta_padraodevalor.php">Padrao de Valores</a>  
            <a class="collapse-item" href="view_consulta_historicopadraodevalor.php">Histórico de Padrao</a>         
          </div>
        </div>
      </li>

      
    

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseControle" aria-expanded="true" aria-controls="collapseControle">
          <i class="fas fa-fw fa-cog"></i>
          <span>Controle</span>
        </a>
        <div id="collapseControle" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="controle_permissao.php">Permissão do Usuário</a>                        
          </div>
        </div>
      </li>

     

      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">        
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
                    
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?php echo $_SESSION['usuario']; ?> </span> 

                <img class="img-profile rounded-circle" src="https://secure.gravatar.com/avatar/3583481ab5f14efa4e68ff543660a54e?s=24&d=&r=G">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid" id="conteudo-principal">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> <?php echo 'Olá ' .$_SESSION['usuario']; ?></h1>
          </div>

          <?php
                                    
              //include '../conexao.php';
              $select_empresa = "SELECT idempresa, nomefantasia, cnpj, cidade, estado FROM empresa where idempresa = '$idempresa' ";
              $result_select_empresa = mysqli_query($conexao, $select_empresa);
              
              while ($row = mysqli_fetch_assoc($result_select_empresa)) { 
                
                $nome_empresa = $row['nomefantasia'].' - CNPJ : '.$row['cnpj'].' - '.$row['cidade'].'-'.$row['estado'];

                echo "<option value='".$row['idempresa']."'>".$nome_empresa."</option>";
                                             
              }                     
              /* free result set */
              mysqli_free_result($result_select_empresa);       
          ?>

          <!--
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Office</th>
                  <th>Age</th>
                  <th>Start date</th>
                  <th>Salary</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Office</th>
                  <th>Age</th>
                  <th>Start date</th>
                  <th>Salary</th>
                </tr>
              </tfoot>
              <tbody>
                <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                </tr>
                <tr>
                  <td>Garrett Winters</td>
                  <td>Accountant</td>
                  <td>Tokyo</td>
                  <td>63</td>
                  <td>2011/07/25</td>
                  <td>$170,750</td>
                </tr>
                <tr>
                  <td>Ashton Cox</td>
                  <td>Junior Technical Author</td>
                  <td>San Francisco</td>
                  <td>66</td>
                  <td>2009/01/12</td>
                  <td>$86,000</td>
                </tr>
              </tbody>
            </table>
          </div>
          -->
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Desenvolvido por &copy; DSoft</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pronto para Partir ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            Selecione "Logout" abaixo se você estiver pronto para encerrar sua sessão atual..</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/scripts.js"></script>
  <script src="js/sb-admin-2.min.js"></script>  
  <script src="js/jquery.maskedinput.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <!-- jQuery UI -->
  <script src="vendor/jquery-ui-1.12.1/jquery-ui.min.js"></script>

</body>

</html>

<script type="text/javascript" language="javascript">

    function TestaCPF(strCPF) {
        var Soma;
        var Resto;
        Soma = 0;
    
        if (strCPF == "00000000000") return false;
         
        for (i=1; i<=9; i++) 
            Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
      
        Resto = (Soma * 10) % 11;
     
        if ((Resto == 10) || (Resto == 11))  
            Resto = 0;
      
        if (Resto != parseInt(strCPF.substring(9, 10)) ) 
            return false;
     
        Soma = 0;
     
        for (i = 1; i <= 10; i++) 
            Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
      
        Resto = (Soma * 10) % 11;
     
        if ((Resto == 10) || (Resto == 11))  
            Resto = 0;

        if (Resto != parseInt(strCPF.substring(10, 11) ) ) 
            return false;

        return true;
  }
  
</script>