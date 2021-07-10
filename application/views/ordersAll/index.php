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
          <div class="box-body">
            
            <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Cód. Pedido</th>
                        <th>Nome</th>
                        <th>Data e Hora</th>
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


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endif; ?>

  <script type="text/javascript">
    var manageTable;
    var base_url = "<?php echo base_url(); ?>";
    
    $(document).ready(function() {
    
      $("#OrderMainNav").addClass('active');
      $("#manageOrderSubMenu").addClass('active');
    
      // initialize the datatable 
      manageTable = $('#example2').DataTable({
        'ajax': 'https://superhorti.com.br/ws/controllers/_WS_/listarpedidosdiacorrente',
        'order': []
      });
    
    });
    </script>
