<?php
require_once("../../ws/sys/Config.php");

require_once("../../ws/sys/DB.class.php");
require_once("../../ws/sys/DAO.class.php");
require_once("../../ws/sys/Modal.class.php");

require_once ("../../ws/models/Pedidos.class.php");

date_default_timezone_set('America/Sao_Paulo');
$dataLocal = date('Y-m-d', time());//2020-06-08 10:50:16
//echo $dataLocal;

if(isset($_POST['data-hj']) && !empty(isset($_POST['data-hj']))){
	$param = $_POST['data-hj'];
}else{
	$param = $dataLocal;
}

$data = new DateTime($param);
//echo $data->format('d/m/Y');

//$param = '2020-06-23';

//echo $param;
$pedidos = new Pedidos();
//$pedidos->campos = 'pedidos.pedido_id,	pedidos.orderId, email, pedidos.name AS cliente, pedido_items2.name AS produto, itemId, image, itemQunatity, mobileNo, shippingAddress, observacoes, createdAt, status_pagamento, status_pedido, count(*) as total';
$pedidos->campos = 'pedidos.orderId, pedido_items2.name AS produto, itemId, image, count(*) as total, SUM(itemQunatity) as itemQunatitySoma';
//$pedidos->campos = 'pedidos.pedido_id, itemId, itemQunatity, createdAt, status_pagamento, status_pedido, count(*) as total';
//$pedidos->extras_select = 'INNER JOIN pedido_items2 ON pedidos.pedido_id = pedido_items2.pedido_id WHERE DATE(createdAt) = "2020-06-08" GROUP BY itemId ORDER BY createdAt DESC';
$pedidos->extras_select = 'INNER JOIN pedido_items2 ON pedidos.pedido_id = pedido_items2.pedido_id WHERE DATE(data_entrega) = "'.$param.'" AND pedidos.status != 0 GROUP BY itemId ORDER BY pedido_items2.name ASC';
$pedidos = $pedidos->findAll($pedidos);
$pedidosJson = json_encode($pedidos);
$pedidosArray = json_decode($pedidosJson,true);

//echo count($pedidosArray);
//print_r($pedidosArray);
//echo $pedidosJson;

$url = 'http://superhorti.com.br/appAdmin/';

?>

<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="content-type" content="text/html;charset=utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>SH Delivery</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.7 -->
      <link rel="stylesheet" href="https://superhorti.com.br/appAdmin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://superhorti.com.br/appAdmin/assets/bower_components/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://superhorti.com.br/appAdmin/assets/dist/css/AdminLTE.min.css">
      <style>
        .aligncenter {
            text-align: center;
        }
		.ocultar{
		  display:none;
		}
        </style>
		
		<script src="https://superhorti.com.br/appAdmin/relatorios/excellentexport.js"></script>
   </head>
   <!--<body onload="window.print();">-->
   <body>
      <div class="wrapper">
         <section class="invoice">
		 
			<p class="aligncenter">
                <img src="http://superhorti.com.br/ws/assets/img/logo.jpg" alt="SSHDelivery" height="150">
             </p>
             
            <div class="row">
			
			<h3 class="aligncenter"><strong>Relatório - <?php echo $data->format('d/m/Y'); ?></strong></h3>
			<br />
               
			   <div class="col-xs-12 table-responsive">
			   
				<form class="aligncenter" method="post" action="index.php">
					<input id="data-hj" name="data-hj" type="date" value="<?php echo $param; ?>">
					
					<input type="submit" name="enviar" value="Enviar" />
				</form>
				
				<br />
			   
				<?php
					if(count($pedidosArray) > 0){
				?>
                  
				  <table class="table table-striped aligncenter">
				  
                     <thead>
                        <tr>
                           <th><h4><strong>Imagem</strong></h4></th>
                            <th><h4><strong>Produto</strong></h4></th>
                            <th><h4><strong>Quantidade</strong></h4></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        foreach ($pedidosArray as $value) {
                        ?>
                        <tr>
                        <th><img src="<?php echo $url.$value['image']; ?>" alt="<?php echo utf8_decode($value['produto']); ?>" class="img-circle" width="50" height="50"></th>
                        <th><?php echo utf8_decode($value['produto']); ?></th>
                        <th><?php echo $value['itemQunatitySoma']; ?></th>
                        </tr>
                        <?php } ?>
                    </tbody>
                  </table>
				  
				  <br/>

				<div class="ocultar">
        		  <table id="datatable" class="table table-striped">
					
					<thead>
						<tr><th>Relatório - <?php echo $data->format('d/m/Y'); ?></th></tr>
					</thead>
					
                     <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        foreach ($pedidosArray as $value) {
                        ?>
                        <tr>
                        <th><?php echo $value['produto']; ?></th>
                        <th><?php echo $value['itemQunatitySoma']; ?></th>
                        </tr>
                        <?php } ?>
                    </tbody>
                  </table>
				  </div>
				  
				  <a download="data_123.xls" href="#" id="anchorNewApi-xls" onclick="return newApi('xls');">Exportar para Excel</a>
				  
					<?php }else{ ?>
						<h4 class="aligncenter"><strong>Não existem lançamentos para essa data selecionada!</strong></h4>
					<?php } ?>
				  
               </div>
			   
            </div>
            
         </section>
         <!-- /.content -->
      </div>
   </body>
   
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
	
	<script type="text/javascript">
	
	/*var data = new Date();
	var dataHJ = data.getDate()+'/'+data.getMonth()+'/'+data.getFullYear();
	console.log(dataHJ);*/
	
	jQuery(document).ready(function(){
		jQuery('#ajax_form').submit(function(){
			/*var dados = jQuery(this).serialize();
			console.log(dados);*/			
			var dateControl = document.querySelector('input[type="date"]');
			//console.log(dateControl.value);
			jQuery.ajax({
				type: "POST",
				url: "http://localhost/douglas/superhorti.com.br/ws/controllers/_WS_/relatorioProdutosDoDia",
				dataType: "json",
				data: 'date='+dateControl.value,
				success: function(data){
					console.log(data);
				}
			});
			return false;
		});
	});
	</script>
	
	<script>
            function newApi(format) {
                return ExcellentExport.convert({
                    anchor: 'anchorNewApi-' + format,
                    filename: 'relatorio-diario.' + format,
                    format: format
                }, [{
                    name: 'Relatório',
                    from: {
                        table: 'datatable'
                    }
                }]);
            }

            function newApiArray(format) {
                return ExcellentExport.convert({
                    anchor: 'anchorNewApi-' + format + '-array',
                    filename: 'data_123.array',
                    format: format
                }, [{
                    name: 'Sheet Name Here 1',
                    from: {
                        array: [['line 1', 1234 , 'CN 你好'],
                                ['line 2', 1234.56 , 'JP こんにちは']
                        ]
                    }
                }]);
            }

            function exportSome() {
                return ExcellentExport.convert({
                    anchor: "anchorNewApi-xlsx-some",
                    filename: "somedata",
                    format: "xlsx"
                }, [{
                    name: 'Sheet number 1',
                    from: {
                        table: 'datatable'
                    },
                    filterRowFn: function(row) {
                        if (row[1] == 200) {
                            return false;
                        }
                        return true;
                    },
                    removeColumns: [1],

                }])
            }
        </script>
</html>
