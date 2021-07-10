<?php

$id = $_POST['id'];

//echo $id.'|'.$status_pagamento.'|'.$status_pedido;

require_once("../../ws/sys/Config.php");

require_once("../../ws/sys/DB.class.php");
require_once("../../ws/sys/DAO.class.php");
require_once("../../ws/sys/Modal.class.php");

require_once ("../../ws/models/Pedidos.class.php");

$del = new DeletePedido();
$del->valorpk = $id;
$del->setValor('status',0);
$result = $del->update($del);

//echo $resut;

//header("Location: https://superhorti.com.br/appAdmin/orders/");
header("Location: https://superhorti.com.br/appAdmin/orders?data=".$data);

?>