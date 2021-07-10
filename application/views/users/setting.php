

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Usuário
        <small>Configuração</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Configuração</li>
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

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Atualizar Informação</h3>
            </div>
            
            <!--Quantidade de Pedidos Diária: <button><div id="qtdade_pedidos_dia"></div></button>
            
            <form name="pesquisar" id="pesquisar" method="POST">
                <legend>Quantidade de Pedidos Diária</legend>
                <input type="number" name="qtdade_pedidos_dia" id="qtdade_pedidos_dia" value='<div id="qtdade_pedidos_dia"></div>'/>
                <input type="button" id="click" name="click" />
            </form>
            
            <script>
            $(document).ready(function(){
              $("button").click(function(){
                $.post("https://superhorti.com.br/ws/controllers/_WS_/testesPOST",
                {
                  name: "Donald Duck",
                  city: "Duckburg"
                },
                function(data,status){
                  alert("Data: " + data + "\nStatus: " + status);
                });
              });
            });
            </script>-->

	
            <!-- /.box-header -->
            <form role="form" action="<?php base_url('users/setting') ?>" method="post">
              <div class="box-body">

                <?php echo validation_errors(); ?>


                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $user_data['username'] ?>" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $user_data['email'] ?>" autocomplete="off">
                </div>                

                <div class="form-group">
                  <label for="fname">Primeiro Nome</label>
                  <input type="text" class="form-control" id="fname" name="fname" placeholder="First name" value="<?php echo $user_data['firstname'] ?>" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="lname">Último Nome</label>
                  <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" value="<?php echo $user_data['lastname'] ?>" autocomplete="off">
                </div>
                <!--
                <div class="form-group">
                  <label for="phone">Telefone</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="<?php echo $user_data['phone'] ?>" autocomplete="off">
                </div>
                
                <div class="form-group">
                  <label for="gender">Gênero</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="gender" id="male" value="1" <?php if($user_data['gender'] == 1) {
                        echo "checked";
                      } ?>>
                      Masculino
                    </label>
                    <label>
                      <input type="radio" name="gender" id="female" value="2" <?php if($user_data['gender'] == 2) {
                        echo "checked";
                      } ?>>
                      Feminino
                    </label>
                  </div>
				  -->
                </div>

                <div class="form-group">
                  <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      Deixe o campo do Password em branco se não desejar alterar.
                  </div>
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="text" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="cpassword">Confirmar o Password</label>
                  <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off">
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Salvar alterações</button>
                <!--<a href="<?php echo base_url('users/') ?>" class="btn btn-warning">Back</a>-->
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
       
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
    $(document).ready(function() {
      $("#settingMainNav").addClass('active');
    });
  </script>
 
 
    <!--<script type="text/javascript">
    $.get("https://superhorti.com.br/ws/controllers/_WS_/settings", function(resultado){
        console.log(resultado[0].qtdade_pedidos_dia);
         $("#qtdade_pedidos_dia").html(resultado[0].qtdade_pedidos_dia);
    })
    </script>-->
