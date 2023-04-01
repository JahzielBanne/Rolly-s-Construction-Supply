<?php
include '../classes/class.client.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
	case 'new':
        create_new_client();
	break;
    case 'update':
        update_client();
	break;
    case 'deactivate':
        deactivate_client();
	break;
}
/* Create a new Customoer */ 
function create_new_client(){
	$client = new Client();
    $address = $_POST['address'];
    $name = ucwords($_POST['name']);
    $number = ucwords($_POST['number']);
    $access = ucwords($_POST['access']);
    
    $result = $client->new_client($name,$address,$number,$access);
    if($result){
        $cid = $client->get_client_id($address);
        header('location: ../index.php?page=operations&action=clientlist'.$cid);
    }
}
/* Updates a Customoer */ 
function update_client(){
	$client = new Client();
    $name = ucwords($_POST['name']);
    $number = ucwords($_POST['number']);
    $address = ucwords($_POST['address']);
    $access = ucwords($_POST['access']);
    $client_id = $_POST['clientid'];
    $result = $client->update_client($name,$number,$address,$access,$client_id);
    if($result){
        header('location: ../index.php?page=operations&action=clientprofile&id='.$client_id);
    }
}
/* Deactivates a Customoer */ 
function deactivate_client(){
	$client = new User();
    $client_id = $_POST['clientid']; 
    $result = $client->deactivate_client($client_id);
    if($result){
        header('location: ../index.php?page=settings&subpage=users&action=profile&id='.$client_id);
    }
}
/* Changes Customoer Status */ 
function change_client_status(){
	$client = new Client();
    $cid= isset($_GET['cid']) ? $_GET['cid'] : '';
    $status= isset($_GET['status']) ? $_GET['status'] : '';
    $result = $client->change_user_status($cid,$status);
    if($result){
        header('location: ../index.php?page=settings&subpage=users&action=profile&id='.$cid);
    }
}