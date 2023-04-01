<?php
include '../classes/class.release.php';
include_once '../classes/class.client.php';
include '../classes/class.product.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
    case 'create':
        create_new_order();
	break;
         case 'addorder':
        new_order_item();
	break;
    case 'saveitem':
        save_order_items();
	break;
}
/* Create a New Order */ 
function create_new_order(){
	$order = new Order(); 
    $clientid= ($_POST['clientid']); 
    $id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';
    $orderid= ($_POST['orderid']); 
    $result = $order->new_order($clientid);
    if($result){
        header('location: ../index.php?page=operations&action=order');
    }
}
/* Create a New Order Item */ 
function new_order_item(){
	$order = new Order();
    $product = new Product();
    $id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';
    $orderid= $_POST['orderid'];
    $pid= $_POST['productid']; 
    $qty= $_POST['qty'];
    $amount = $qty*($product->get_product_price($pid));
    $rid = $order->new_order_item($orderid,$pid,$qty,$amount);
    if($rid){
        header('location: ../index.php?page=operations&action=addorder&id='.$orderid);
    }
}
/* Saves a Order Item */ 
function save_order_items(){
	$order = new Order();
    $orderid= $_POST['orderid'];
    $cid = $order->save_order_items($orderid);
    if($cid){
        header('location: ../index.php?page=operations&action=completeorder');
    }
}