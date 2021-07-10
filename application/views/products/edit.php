<style>
#show{
  display:none;
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Gerenciar
      <small>Produtos</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Produtos</li>
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
        <?php elseif($this->session->flashdata('error')): ?>
          <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>


        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Alterar Produto</h3>
          </div>
          <!-- /.box-header -->
          <form role="form" action="" method="post" enctype="multipart/form-data">
              <div class="box-body">

                <?php echo validation_errors(); ?>

                <div class="form-group">
                  <label>Prévia da imagem: </label>
                  <img src="<?php echo base_url() . $product_data['image'] ?>" width="150" height="150" class="img-circle">
                </div>

                <div class="form-group">

                  <label for="product_image">Imagem</label>
                  <div class="kv-avatar">
                      <div class="file-loading">
                          <input id="product_image" name="product_image" type="file">
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="product_name">Nome do produto</label>
                  <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Digite o nome do produto" autocomplete="off" value="<?php echo !empty($this->input->post('product_name')) ?:$product_data['name'] ?>" />
                </div>

                <div class="form-group">
                  <label for="price">Preço</label>
                  <input type="text" class="price form-control" id="price" name="price" placeholder="Digite o preço" autocomplete="off" value="<?php echo !empty($this->input->post('price')) ?:$product_data['price'] ?>"/>
                </div>

                <div class="form-group">
                  <label for="description">Descrição</label>
                  <textarea type="text" class="form-control" id="description" name="description" placeholder="Digite a descrição" autocomplete="off">
                  <?php echo !empty($this->input->post('description')) ?:$product_data['description'] ?>
                  </textarea>
                </div>

                <div class="form-group">
                  <label for="category">Categoria</label>
                  <?php $category_data = json_decode($product_data['category_id']); ?>
                  <select class="form-control select_group" id="category" name="category[]">
                    <?php foreach ($category as $k => $v): ?>
                      <option value="<?php echo $v['id'] ?>" <?php if(in_array($v['id'], $category_data)) { echo 'selected="selected"'; } ?>><?php echo $v['name'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div id="show" class="form-group">
                  <label for="store">Loja</label>
                  <?php $store_data = json_decode($product_data['store_id']); ?>
                  <select class="form-control select_group" id="store" name="store[]" >
                    <?php foreach ($stores as $k => $v): ?>
                      <option value="<?php echo $v['id'] ?>" <?php if(in_array($v['id'], $store_data)) { echo 'selected="selected"'; } ?>><?php echo $v['name'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="store">Ativo</label>
                  <select class="form-control" id="active" name="active"> 
                    <option value="1" <?php if($product_data['active'] == 1) { echo 'selected="selected"'; } ?>>Sim</option>
                    <option value="2" <?php if($product_data['active'] == 2) { echo 'selected="selected"'; } ?>>Não</option>
                  </select>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Salvar alterações</button>
                <a href="<?php echo base_url('products/') ?>" class="btn btn-warning">Cancelar</a>
              </div>
            </form>
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
  $(document).ready(function() {
    $(".select_group").select2();
    $("#description").wysihtml5();

    $("#productMainNav").addClass('active');
    $("#createProductSubMenu").addClass('active');
    
    var btnCust = "";/*'<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
        'onclick="alert(\'Call your custom code here.\')">' +
        '<i class="glyphicon glyphicon-tag"></i>' +
        '</button>';*/
    $("#product_image").fileinput({
        overwriteInitial: true,
        maxFileSize: 1500,
        showClose: false,
        showCaption: false,
        browseLabel: '',
        removeLabel: '',
        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-1',
        msgErrorClass: 'alert alert-block alert-danger',
        // defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar">',
        layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif"]
    });

  });
</script>

<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
<script type="text/javascript">
$('.price').mask('#.##0,00', {reverse: true});
$('.telefone').mask('(00) 0 0000-0000');
$('.estado').mask('AA');
$('.cpf').mask('000-000.000-00');
$('.cnpj').mask('00.000.000/0000-00');
$('.rg').mask('00.000.000-0');
$('.cep').mask('00000-000');
$('.dataNascimento').mask('00/00/0000');
$('.placaCarro').mask('AAA-0000');
$('.horasMinutos').mask('00:00');
$('.cartaoCredito').mask('0000 0000 0000 0000');
</script>