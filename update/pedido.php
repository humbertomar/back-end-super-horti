<?php

//update

require_once("../../ws/sys/Config.php");

require_once("../../ws/sys/DB.class.php");
require_once("../../ws/sys/DAO.class.php");
require_once("../../ws/sys/Modal.class.php");

require_once ("../../ws/models/Pedidos.class.php");

$param = $_GET['id'];

$param2 = $_GET['data'];


date_default_timezone_set('America/Sao_Paulo');
$dataH = date('Y-m-d', time());//2020-06-08 10:50:16


$pedidos = new Pedidos();
$pedidos->campos = 'pedido_id, orderId, grandTotal, status_pagamento, status_pedido, name, email, mobileNo';
$pedidos->extras_select = 'WHERE pedido_id = '.$param;
$pedido = json_encode($pedidos->findAll($pedidos));
$arrayItensPedido = json_decode($pedido,true);
//print_r($arrayItensPedido);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Manage Orders</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->  
  <link rel="stylesheet" href="https://superhorti.com.br/appAdmin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->  
  <link rel="stylesheet" href="https://superhorti.com.br/appAdmin/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://superhorti.com.br/appAdmin/assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://superhorti.com.br/appAdmin/assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="https://superhorti.com.br/appAdmin/assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="https://superhorti.com.br/appAdmin/assets/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="https://superhorti.com.br/appAdmin/assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="https://superhorti.com.br/appAdmin/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->  
  <link rel="stylesheet" href="https://superhorti.com.br/appAdmin/assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="https://superhorti.com.br/appAdmin/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://superhorti.com.br/appAdmin/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="https://superhorti.com.br/appAdmin/assets/bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="https://superhorti.com.br/appAdmin/assets/plugins/fileinput/fileinput.min.css">



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- jQuery 3 -->
  <script src="https://superhorti.com.br/appAdmin/assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="https://superhorti.com.br/appAdmin/assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="https://superhorti.com.br/appAdmin/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Morris.js charts -->
  <script src="https://superhorti.com.br/appAdmin/assets/bower_components/raphael/raphael.min.js"></script>
  <script src="https://superhorti.com.br/appAdmin/assets/bower_components/morris.js/morris.min.js"></script>
  <!-- Sparkline -->
  <script src="https://superhorti.com.br/appAdmin/assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="https://superhorti.com.br/appAdmin/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="https://superhorti.com.br/appAdmin/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="https://superhorti.com.br/appAdmin/assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="https://superhorti.com.br/appAdmin/assets/bower_components/moment/min/moment.min.js"></script>
  <script src="https://superhorti.com.br/appAdmin/assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="https://superhorti.com.br/appAdmin/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="https://superhorti.com.br/appAdmin/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="https://superhorti.com.br/appAdmin/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="https://superhorti.com.br/appAdmin/assets/bower_components/fastclick/lib/fastclick.js"></script>
  <script src="https://superhorti.com.br/appAdmin/assets/plugins/fileinput/fileinput.min.js"></script>
  <!-- Select2 -->
  <script src="https://superhorti.com.br/appAdmin/assets/bower_components/select2/dist/js/select2.full.min.js"></script>
  <!-- ChartJS -->
  <script src="https://superhorti.com.br/appAdmin/assets/bower_components/Chart.js/Chart.js"></script>
  <!-- AdminLTE App -->  
  <script src="https://superhorti.com.br/appAdmin/assets/dist/js/adminlte.min.js"></script>
  
  <!-- AdminLTE for demo purposes -->
  <script src="https://superhorti.com.br/appAdmin/assets/dist/js/demo.js"></script>



  <!-- DataTables -->
<script src="https://superhorti.com.br/appAdmin/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="https://superhorti.com.br/appAdmin/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>



</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>ADM</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li id="dashboardMainMenu">
          <a href="https://superhorti.com.br/appAdmin/dashboard">
            <i class="fa fa-dashboard"></i> <span>Painel de Controle</span>
          </a>
        </li>

                              <li class="treeview" id="userMainNav">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Clientes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <!--
				                <li id="createUserSubNav"><a href="https://superhorti.com.br/appAdmin/users/create"><i class="fa fa-circle-o"></i> Cadastrar Cliente</a></li>
                				-->

                                <li id="manageUserSubNav"><a href="https://superhorti.com.br/appAdmin/users"><i class="fa fa-circle-o"></i> Gerenciar Clientes</a></li>
                            </ul>
            </li>
          
          <!--
                      <li class="treeview" id="groupMainNav">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Groups</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                                  <li id="createGroupSubMenu"><a href="https://superhorti.com.br/appAdmin/groups/create"><i class="fa fa-circle-o"></i> Add Group</a></li>
                                                <li id="manageGroupSubMenu"><a href="https://superhorti.com.br/appAdmin/groups"><i class="fa fa-circle-o"></i> Manage Groups</a></li>
                              </ul>
            </li>
          		  -->
        

        <!-- <li class="header">Settings</li> -->
		<!-- 
                  <li id="storesMainNav"><a href="https://superhorti.com.br/appAdmin/stores/"><i class="fa fa-files-o"></i> <span>Lojas</span></a></li>
        
                  <li id="tablesMainNav"><a href="https://superhorti.com.br/appAdmin/tables/"><i class="fa fa-files-o"></i> <span>Tables</span></a></li>
        		-->

                  <li id="categoryMainNav"><a href="https://superhorti.com.br/appAdmin/category/"><i class="fa fa-files-o"></i> <span>Categorias</span></a></li>
        
        

                    <li class="treeview" id="productMainNav">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Produtos</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                                  <li id="createProductSubMenu"><a href="https://superhorti.com.br/appAdmin/products/create"><i class="fa fa-circle-o"></i> Cadastrar Produto</a></li>
                                                <li id="manageProductSubMenu"><a href="https://superhorti.com.br/appAdmin/products"><i class="fa fa-circle-o"></i> Gerenciar Produtos</a></li>
                              </ul>
            </li>
          
                      <li class="treeview" id="OrderMainNav">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Pedidos</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <!--                  <li id="createOrderSubMenu"><a href="https://superhorti.com.br/appAdmin/orders/create"><i class="fa fa-circle-o"></i> Cadastrar Pedido</a></li>
                -->
                                <li id="manageOrderSubMenu"><a href="https://superhorti.com.br/appAdmin/orders"><i class="fa fa-circle-o"></i> Gerenciar Pedidos do Dia</a></li>
                                
                                <li id="manageOrderSubMenu"><a href="https://superhorti.com.br/appAdmin/orders2"><i class="fa fa-circle-o"></i> Gerenciar Pedidos Agendados</a></li>
                
                <!--<li id="manageOrderSubMenu"><a href="https://superhorti.com.br/appAdmin/ordersAll"><i class="fa fa-circle-o"></i> Gerenciar Todos Pedidos</a></li>-->
                              </ul>
            </li>
                    <!--
                      <li class="treeview" id="ReportMainNav">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Reports</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                                  <li id="productReportSubMenu"><a href="https://superhorti.com.br/appAdmin/reports"><i class="fa fa-circle-o"></i> Product Wise</a></li>
                  <li id="storeReportSubMenu"><a href="https://superhorti.com.br/appAdmin/reports/storewise"><i class="fa fa-circle-o"></i> Total Store wise</a></li>
                              </ul>
            </li>
                    -->
		  <!--
                      <li id="companyMainNav"><a href="https://superhorti.com.br/appAdmin/company/"><i class="fa fa-files-o"></i> <span>Informação da Empresa</span></a></li>
                    -->
                      <li id="profileMainNav"><a href="https://superhorti.com.br/appAdmin/users/profile/"><i class="fa fa-files-o"></i> <span>Perfil</span></a></li>
                                <li id="settingMainNav"><a href="https://superhorti.com.br/appAdmin/users/setting/"><i class="fa fa-wrench"></i> <span>Configuração</span></a></li>
          
                
        <!--<li>
            <a href="https://superhorti.com.br/appAdmin/reports/storewise"><i class="fa fa-files-o"></i><span>Relatório</span></a>
        </li>-->
        
        <li class="treeview" id="ReportMainNav">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Relatórios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                                  <!--<li id="productReportSubMenu"><a href="https://superhorti.com.br/appAdmin/reports/storewise"><i class="fa fa-circle-o"></i> Todos Pedidos</a></li>-->
                  <li id="storeReportSubMenu"><a href="https://superhorti.com.br/appAdmin/relatorios/" target="_blank"><i class="fa fa-circle-o"></i>Produtos pedidos (dia)</a></li>
                              </ul>
        </li>

        <li><a href="https://superhorti.com.br/appAdmin/auth/logout"><i class="glyphicon glyphicon-log-out"></i> <span>Sair</span></a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Gerenciar
      <small>Pedido</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Pedido</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

        <div id="messages"></div>

        
        <!--          <a href="https://superhorti.com.br/appAdmin/orders/create" class="btn btn-primary">Add Order</a>
          <br /> <br />
        -->

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Gerenciar Pedido</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              
            <?php
                foreach ($arrayItensPedido as $value) {
                    echo "<strong>Cód. do Pedido:</strong> ".$value['orderId']."<br />";
                    echo "<strong>Valor Total do Pedido:</strong> ".$value['grandTotal']."<br />";
                    
                    echo "<strong>Cliente:</strong> ".$value['name']."<br />";
                    echo "<strong>E-mail do Cliente:</strong> ".$value['email']."<br />";
                    echo "<strong>Contato do Cliente:</strong> ".$value['mobileNo']."<br /><hr />";
            ?>
            
                <form class="aligncenter" method="post" action="index.php">
					<input id="id" name="id" type="hidden" value="<?php echo $param; ?>">
					<input id="data" name="data" type="hidden" value="<?php echo $param2; ?>">
					
					<label for="cars">Status do Pagamento</label>
					<select name="status_pagamento" id="status_pagamento">
                      <option value="1" <?php if($value['status_pagamento'] == 1){ echo selected; } ?>>Pendente</option>
                      <option value="2" <?php if($value['status_pagamento'] == 2){ echo selected; } ?>>Pago</option>
                      <!--<option value="3" <?php if($value['status_pagamento'] == 3){ echo selected; } ?>>Cancelado</option>-->
                    </select>
                    
                    <br />
                    
                    <label for="cars">Status do Pedido</label>
					<select name="status_pedido" id="status_pedido">
                      <option value="1" <?php if($value['status_pedido'] == 1){ echo selected; } ?>>Pendente</option>
                      <option value="2" <?php if($value['status_pedido'] == 2){ echo selected; } ?>>Entregue</option>
                      <!--<option value="3" <?php if($value['status_pedido'] == 3){ echo selected; } ?>>Cancelado</option>-->
                    </select>
                    
                    <br />
                    
                    <input type="submit" name="enviar" value="Enviar" />
				</form>
				
				<br />
				
				<form class="aligncenter" method="post" action="delete.php">
					<input id="id" name="id" type="hidden" value="<?php echo $param; ?>">
					<input id="data" name="data" type="hidden" value="<?php echo $param2; ?>">
					<input type="submit" name="enviar" value="Excluir Pedido" />
				</form>
				
				<br />
				
				<?php
				
				if($dataH == $param2){
				    
				?>
				
				<a href="https://superhorti.com.br/appAdmin/orders2?data=<?php echo $param2; ?>" target="_self">Voltar</a>
				
				<?php
				    
				}else{
				
				?>
				
				<a href="https://superhorti.com.br/appAdmin/orders?data=<?php echo $param2; ?>" target="_self">Voltar</a>
				
				<?php
				    }
				?>
            
            <?php
                }
            ?>
            
          </div>
          
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->
    

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->



  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 0.1.0
    </div>
    <strong>Copyright &copy; 2018 - 2020.</strong> All rights
    reserved.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

</body>
</html>