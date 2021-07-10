<?php

//page orders

date_default_timezone_set('America/Sao_Paulo');
$dataLocal = date('Y-m-d', time());//2020-06-08 10:50:16
echo $dataLocal;

if(isset($_POST['data-hj']) && !empty(isset($_POST['data-hj']))){
	$param = $_POST['data-hj'];
}else{
	if(isset($_GET['data']) && !empty($_GET['data'])){
       $param = $_GET['data']; 
    }else{
	    $param = $dataLocal;
    }
}

//echo $param;

?>

<style>
    .aligncenter {
        text-align: center;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Gerenciar
         <small>Pedidos</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Pedidos</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
         <div class="col-md-12 col-xs-12">
            <div id="messages"></div>
            <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <?php echo $this->session->flashdata('success'); ?>
            </div>
            <?php elseif($this->session->flashdata('errors')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <?php echo $this->session->flashdata('errors'); ?>
            </div>
            <?php endif; ?>
            <!--<?php if(in_array('createOrder', $user_permission)): ?>
               <a href="<?php echo base_url('orders/create') ?>" class="btn btn-primary">Add Order</a>
               <br /> <br />
               <?php endif; ?>-->
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">Gerenciar Pedidos</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body" style="overflow-x:auto;">
                  <form id="selecionar" class="aligncenter" method="post" action="https://superhorti.com.br/appAdmin/orders">
                     <label>Escolha uma data:</label><br /><input id="data-hj" name="data-hj" type="date" value="<?php echo $param; ?>">
                     <input type="submit" name="enviar" value="Selecionar" />
                  </form>
                  <table id="example2" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           
                           <th>Ação</th>
                           <th>Cód. Pedido</th>
                           <th>Nome</th>
                           <th>Data Entrega</th>
                           <th>Valor total</th>
                           <th>Tipo de pagamento</th>
                           <th>Status do pagamento</th>
                           <th>Status do pedido</th>
                           
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
<?php if(in_array('deleteOrder', $user_permission)): ?>
<!-- remove brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Excluir pedido</h4>
         </div>
         <form role="form" action="<?php echo base_url('orders/remove') ?>" method="post" id="removeForm">
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

<?php endif; ?>

<script type="text/javascript">

   var manageTable;
   var base_url = "https://superhorti.com.br/appAdmin/";
   
   $(document).ready(function() {
   
     $("#OrderMainNav").addClass('active');
     $("#manageOrderSubMenu").addClass('active');
     
     var frm = $('#selecionar');
     //console.log(frm.serialize());
     
     var now = new Date();
     var dateTime = now.toLocaleString();
     
     var resultado1 = dateTime.split("/");
     console.log(resultado1);
     
     console.log(resultado1[2].substring(0, 4)+"-"+resultado1[1]+"-"+resultado1[0]);
     
     stringExemplo = frm.serialize();
       resultado = stringExemplo.split("=");
       
       if(resultado[1] != ""){
           var saida = resultado[1];
       }else{
           var saida = resultado1[2].substring(0, 4)+"-"+resultado1[1]+"-"+resultado1[0];
       }
       
       //console.log(saida);
       
       //localStorage.setItem('dataP', saida);
       //console.log(localStorage.getItem('dataP'));
   
     // initialize the datatable 
     manageTable = $('#example2').DataTable({
         
         "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "Todos"]],
         
       'ajax': 'https://superhorti.com.br/ws/controllers/_WS_/listarpedidosdiacorrenteData/'+saida,
       'order': []
     });
   
   });
   
</script>
