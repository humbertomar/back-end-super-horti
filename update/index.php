<?php

$id = $_POST['id'];
$status_pagamento = $_POST['status_pagamento'];
$status_pedido = $_POST['status_pedido'];

$data = $_POST['data'];

//echo $id.'|'.$status_pagamento.'|'.$status_pedido;

require_once("../../ws/sys/Config.php");

require_once("../../ws/sys/DB.class.php");
require_once("../../ws/sys/DAO.class.php");
require_once("../../ws/sys/Modal.class.php");

require_once ("../../ws/models/Pedidos.class.php");

$upd = new UpdPedido();
$upd->valorpk = $id;
$upd->setValor('status_pagamento',$status_pagamento);
$upd->setValor('status_pedido',$status_pedido);
$result = $upd->update($upd);

//echo $resut;

//header("Location: https://superhorti.com.br/appAdmin/orders/");
header("Location: https://superhorti.com.br/appAdmin/orders?data=".$data);

?>