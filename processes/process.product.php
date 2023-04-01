<?php
include '../classes/class.product.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
	case 'new':
        create_new_product();
	break;
    case 'update':
        update_product();
	break;
    case 'deactivate':
        deactivate_product();
	break;
       case 'status':
        change_product_status();
	break;
}
/* Create a New Product */ 
function create_new_product(){
	$product = new Product();
    $pname = ucwords($_POST['pname']);
    $category = ucwords($_POST['category']);
    $price = $_POST['price'];
    
    $result = $product->new_product($pname,$category,$price);
    if($result){
        $product_id = $product->get_product_id($pname);
        header('location: ../index.php?page=products&subpage=users&action=profile&id='.$product_id);
    }
}

/* Updates a Product */ 
function update_product(){
	$product = new Product();
    $pname = ucwords($_POST['pname']);
    $category = ucwords($_POST['category']);
    $price = $_POST['price'];
    $result = $product->update_product($pname,$category,$price);
    if($result){
        header('location: ../index.php?page=products&subpage=prodprofile&id='.$pid);
    }
}
/* Deactivates a Product */ 
function deactivate_product(){
	$product = new Product();
    $pid = $_POST['product_id']; 
    $result = $product->deactivate_product($product_id);
    if($result){
        header('location: ../index.php?page=products&subpage=prodprofile&id='.$product_id);
    }
}
/* Changes Product Status */ 
function change_product_status(){
	$product = new Product();
    $product_id= isset($_GET['product_id']) ? $_GET['product_id'] : '';
    $status= isset($_GET['status']) ? $_GET['status'] : '';
    $result = $product->change_product_status($id,$status);
    if($result){
        header('location: ../index.php?page=settings&subpage=users&action=profile&id='.$id);
    }
}
?>