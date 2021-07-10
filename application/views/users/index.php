

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gerenciar
        <small>Clientes</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Clientes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>
          <!--
          <?php if(in_array('createUser', $user_permission)): ?>
            <a href="<?php echo base_url('users/create') ?>" class="btn btn-primary">Add User</a>
            <br /> <br />
          <?php endif; ?>
		  -->


          <div class="box">
              
            <div class="box-header">
              <h3 class="box-title">Gerenciar Clientes</h3>
            </div>
            <!-- /.box-header -->
          <div class="box-body" style="overflow-x:auto;">
            
            <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Contato</th>
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

  <script type="text/javascript">
    var manageTable;
    var base_url = "<?php echo base_url(); ?>";
    
    $(document).ready(function() {
    
      $("#OrderMainNav").addClass('active');
      $("#manageOrderSubMenu").addClass('active');
    
      // initialize the datatable 
      manageTable = $('#example2').DataTable({
        'ajax': 'https://superhorti.com.br/ws/controllers/_WS_/clientes',
        'order': []
      });
    
    });
    </script>

