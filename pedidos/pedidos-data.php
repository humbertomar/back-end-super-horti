<?php

date_default_timezone_set('America/Sao_Paulo');
$dataLocal = date('Y-m-d', time());//2020-06-08 10:50:16
//echo $dataLocal;

if(isset($_POST['data-hj']) && !empty(isset($_POST['data-hj']))){
	$param = $_POST['data-hj'];
}else{
	$param = $dataLocal;
}

//echo $param;

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
                        
                        <li id="manageOrderSubMenu"><a href="https://superhorti.com.br/appAdmin/pedidos/pedidos-data.php" target="_self"><i class="fa fa-circle-o"></i> Gerenciar Pedidos Agendados</a></li>
                        
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
                        <li id="storeReportSubMenu"><a href="https://superhorti.com.br/appAdmin/relatorios/" target="_blank"><i class="fa fa-circle-o"></i>Relação de Produtos Diários</a></li>
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
                  <small>Pedidos Agendados</small>
               </h1>
               <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li class="active">Pedidos Agendados</li>
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
                           <h3 class="box-title">Gerenciar Pedidos Agendados</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            
                            <!--<form id="selecionar" class="aligncenter" method="post" action="pedidos-data.php">
					<input id="data-hj" name="data-hj" type="date" value="<?php echo $param; ?>">
					
					<input type="submit" name="enviar" value="Enviar" />
				</form>-->
				
                           <table id="example2" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th>Cód. Pedido</th>
                                    <th>Nome</th>
                                    <th>Data Entrega</th>
                                    <th>Valor total</th>
                                    <th>Tipo de pagamento</th>
                                    <th>Status do pagamento</th>
                                    <th>Status do pedido</th>
                                    <th>Ação</th>
                                 </tr>
                              </thead>
                           </table>
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
         <!-- remove brand modal -->
         <div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title">Excluir pedido</h4>
                  </div>
                  <form role="form" action="https://superhorti.com.br/appAdmin/orders/remove" method="post" id="removeForm">
                     <div class="modal-body">
                        <p>Deseja mesmo excluir esse pedido?</p>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Salvar alterações</button>
                     </div>
                  </form>
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>
         <!-- /.modal -->
         <script type="text/javascript">
            var manageTable;
            var base_url = "https://superhorti.com.br/appAdmin/";
            
            $(document).ready(function() {
            
              $("#OrderMainNav").addClass('active');
              $("#manageOrderSubMenu").addClass('active');
              
              var frm = $('#selecionar');
              //console.log(frm.serialize());
              
              stringExemplo = frm.serialize();
                resultado = stringExemplo.split("=");
                
                //console.log(resultado[1]);
            
                console.log(resultado[1]);
            
              // initialize the datatable 
              manageTable = $('#example2').DataTable({
                /*'ajax': 'https://superhorti.com.br/ws/controllers/_WS_/listarpedidosdiacorrenteData/'+resultado[1],*/
                'ajax': 'https://superhorti.com.br/ws/controllers/_WS_/pedidosAgendados/'+resultado[1],
                'order': []
              });
            
            });
            
         </script>
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