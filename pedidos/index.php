<?php

   require_once("../../ws/sys/Config.php");
   
   require_once("../../ws/sys/DB.class.php");
   require_once("../../ws/sys/DAO.class.php");
   require_once("../../ws/sys/Modal.class.php");
   
   require_once ("../../ws/models/Pedidos.class.php");
   
   $param = $_GET['printDiv'];
   
   $pedido = new Pedidos();
   $pedido->campos = 'pedido_id, orderId, grandTotal, subTotal, tax, tipo_pagamento, troco, email, name, userid, mobileNo, shippingAddress, observacoes, createdAt, status_pagamento, status_pedido, log_pedidos';
   $pedido->extras_select = 'WHERE pedido_id = '.$param;
   	$pedidoJson = Json_encode($pedido->findAll($pedido));
   	$arrayPedido = json_decode($pedidoJson,true);
   
   $itenspedido = new PedidoItems2();
   $itenspedido->extras_select = 'WHERE pedido_id = '.$param;
   $itenspedidoJson = json_encode($itenspedido->findAll($itenspedido));
   $arrayItensPedido = json_decode($itenspedidoJson,true);
   
   $arItensPedido = json_decode($arrayPedido[0]['log_pedidos'], true);
   
   $url = 'https://superhorti.com.br/appAdmin/';
   
?>
<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="content-type" content="text/html;charset=utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>SH Delivery</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.7
         <link rel="stylesheet" href="https://superhorti.com.br/appAdmin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css"> -->
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://superhorti.com.br/appAdmin/assets/bower_components/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://superhorti.com.br/appAdmin/assets/dist/css/AdminLTE.min.css">
      <style>
         .aligncenter {
         text-align: center;
         }
         /*.container-fluid {
         width: 1024px;
         }*/
      </style>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.min.js"></script> 
      <script src="https://cdn.jsdelivr.net/npm/canvas2image@1.0.5/canvas2image.min.js"></script>
      <script>
         (function($){
         $.fn.createPdf = function(parametros) {
         
         var config = {              
         'fileName':'html-to-pdf'
         };
         
         if (parametros){
         $.extend(config, parametros);
         }                            
         
         var quotes = document.getElementById($(this).attr('id'));
         
         html2canvas(quotes, {
         onrendered: function(canvas) {
             var pdf = new jsPDF('p', 'pt', 'a4');
         
             for (var i = 0; i <= quotes.clientHeight/980; i++) {
                 var srcImg  = canvas;
                 var sX      = 0;
                 var sY      = 980*i;
                 var sWidth  = 900;
                 var sHeight = 980;
                 var dX      = 0;
                 var dY      = 0;
                 var dWidth  = 900;
                 var dHeight = 980;
         
                 window.onePageCanvas = document.createElement("canvas");
                 onePageCanvas.setAttribute('width', 900);
                 onePageCanvas.setAttribute('height', 980);
                 var ctx = onePageCanvas.getContext('2d');
                 ctx.drawImage(srcImg,sX,sY,sWidth,sHeight,dX,dY,dWidth,dHeight);
         
                 var canvasDataURL = onePageCanvas.toDataURL("image/png", 1.0);
                 var width         = onePageCanvas.width;
                 var height        = onePageCanvas.clientHeight;
         
                 if (i > 0) {
                     pdf.addPage(612, 791);
                 }
         
                 pdf.setPage(i+1);
                 pdf.addImage(canvasDataURL, 'PNG', 20, 40, (width*.62), (height*.62));
             }
         
             pdf.save(config.fileName);
         }
         });
         };
         })(jQuery);
         
         
         function createPDF() {
         $('#renderPDF').createPdf({
         'fileName' : 'pedido.pdf'
         });
         }
      </script>
   </head>
   <body>
      <br />
      <div class="container-fluid">
         <p class="aligncenter">
            <button type="button" class="btn btn-success" onclick="createPDF();">PDF</button>
         </p>
         <p class="aligncenter">Espere carregar todos os produtos, clique uma vez e aguarde gerar o pdf!</p>
      </div>
      <br />
      <div id="renderPDF">
         <div class="container-fluid">
            <div class="wrapper">
               <section class="invoice">
                  <p class="aligncenter">
                     <img aign="center" src="http://superhorti.com.br/ws/assets/img/logo.jpg" alt="SHDelivery" height="80">
                  </p>
                  <!-- title row -->
                  <div class="row">
                     <div class="col-xs-12">
                        <b>Cliente</b>
                        <h2 class="page-header">
                           <?php echo utf8_decode($arrayPedido[0]["name"]); ?>
                           <small class="pull-right">
                              <b>Data e Hora do Pedido</b><br />
                              <p><?php
                                 $data = new DateTime($arrayPedido[0]["createdAt"]);
                                 echo $data->format("d/m/Y H:i:s"); 
                                 ?></p>
                           </small>
                           <br />
                        </h2>
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- info row -->
                  <div class="row invoice-info">
                     <div class="col-sm-4 invoice-col">
                        <b>C??d. do Pedido:</b> <?php echo $arrayPedido[0]["orderId"]; ?> <br>
                        
                        <b>Contato:</b> <?php echo $arItensPedido['shippingAddress']['contato']; ?> <br>
                        <b>Endere??o:</b> <?php echo utf8_decode($arItensPedido['shippingAddress']['endereco']); ?> <br>
                        <b>Complemento:</b> <?php echo $arItensPedido['shippingAddress']['complemento']; ?> <br>
                        <b>Bairro:</b> <?php echo $arItensPedido['shippingAddress']['bairro']; ?></b> <br>
                        <b>CEP:</b> <?php echo $arItensPedido['shippingAddress']['cep']; ?><br>
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  <!-- Table row -->
                  <div class="row">
                     <div class="col-xs-12 table-responsive">
                        <table class="table table-striped">
                           <thead>
                              <tr>
                                 <th>Imagem</th>
                                 <!--<th>ID</th>-->
                                 <th>Produto</th>
                                 <th>Valor</th>
                                 <th>Quantidade</th>
                                 <th>Valor Total</th>
                              </tr>
                           </thead>
                           <tbody>
                               
                               <?php
                                if(count($arItensPedido['cart'])>0){
                                ?>
                                    
                                <?php
                                 foreach ($arItensPedido['cart'] as $value) {
                                     
                                     if($value["itemTotalPrice"] >0){
                                ?>
                              <tr>
                                 <th><img src="<?php echo $url.$value["item"]["image"]; ?>" alt="<?php echo utf8_decode($value["item"]["name"]); ?>" class="img-circle" width="50" height="50"></th>
                                 <!--<th><?php echo $value["item"]["id"]; ?></th>-->
                                 <th><?php echo ($value["item"]["name"]); ?></th>
                                 <th><?php echo $value["item"]["price"]; ?></th>
                                 <th><?php echo $value["item"]["itemQunatity"]; ?></th>
                                 <th><?php echo $value["itemTotalPrice"]; ?></th>
                              </tr>
                              <?php }  }?>
                                    
                                <?php  
                                }else{
                                ?>
                                
                                <?php
                                 foreach ($arrayItensPedido as $value) {
                                 ?>
                              <tr>
                                 <th><img src="<?php echo $url.$value["image"]; ?>" alt="<?php echo utf8_decode($value["name"]); ?>" class="img-circle" width="50" height="50"></th>
                                 <!--<th><?php echo $value["id"]; ?></th>-->
                                 <th><?php echo utf8_decode($value["name"]); ?></th>
                                 <th><?php echo $value["price"]; ?></th>
                                 <th><?php echo $value["itemQunatity"]; ?></th>
                                 <th><?php echo $value["itemTotalPrice"]; ?></th>
                              </tr>
                              <?php } ?>
                                
                                <?php }//fim if/else ?>
                              
                           </tbody>
                        </table>
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  <div class="row invoice-info">
                     <div class="col-sm-4 invoice-col">
                        <b>Status do Pedido:</b> <?php 
                           switch($arrayPedido[0]["status_pedido"]){
                                case 1:
                                    echo "Pendente";
                                break;
                                case 2:
                                    echo "Finalizado";
                                break;
                                case 0:
                                    echo "Cancelado";
                                break;
                                default: "Pendente";
                            }
                           ?><br>
                        <b>Sub Total do Pedido:</b> <?php echo $arrayPedido[0]["subTotal"]; ?> <br>
                        <b>Taxa de Entrega:</b> <?php echo $arrayPedido[0]["tax"]; ?> <br>
                        <b>Valor Total do Pedido:</b> <?php echo $arrayPedido[0]["grandTotal"]; ?> <br>
                        <b>Status do Pagamento:</b> <?php 
                           switch($arrayPedido[0]["status_pagamento"]){
                                case 1:
                                    echo "Pendente";
                                break;
                                case 2:
                                    echo "Pago";
                                break;
                                case 0:
                                    echo "Cancelado";
                                break;
                                default: "Pendente";
                            }
                           ?></b> <br>
                        <b>Forma do Pagamento:</b> <?php 
                           switch($arrayPedido[0]["tipo_pagamento"]){
                               case "dinheiro" :
                                   echo "Dinheiro";
                               break;
                               case "cartao_credito" :
                                   echo "Cart??o de Cr??dito";
                               break;
                               case "cartao_debito" :
                                   echo "Cart??o de D??bito";
                               break;
                               case "transferencia_bancaria" :
                                   echo "Tranfer??ncia Bac??ria";
                               break;
                               default: "Dinheiro";
                           }
                           ?><br>
                        <b>Troco:</b> <?php
                           echo $arrayPedido[0]["troco"];
                           ?><br>
                           
                        <b>Observa????es:</b> <?php
                           echo $arrayPedido[0]["observacoes"];
                           ?>
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->
               </section>
               <!-- /.content -->
            </div>
         </div>
      </div>
   </body>
</html>