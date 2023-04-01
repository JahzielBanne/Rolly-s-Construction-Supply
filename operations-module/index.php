<?php
include_once 'classes/class.release.php';
include_once 'classes/class.client.php';        
$order = new Order(); 
$client = new Client();   
?>

<div id="third-submenu">
    <a href="index.php?page=operations">Order Ongoing</a> | 
    <a href="index.php?page=operations&action=completeorder">Order Delivered</a> | 
    <a href="index.php?page=operations&action=create">New Order</a> | 
    <a href="index.php?page=operations&action=clientlist">Customer List</a> | 
    <a href="index.php?page=operations&action=client">New Customer</a> | 

    Search <input type="text"/>
</div>
<div id="subcontent">
    <?php
      switch($action){
                case 'create':
                    require_once 'operations-module/create-transaction.php';
                break; 
                case 'clientlist':
                    require_once 'operations-module/client-list.php';
                break;
                 case 'clientprofile':
                    require_once 'operations-module/view-profile.php';
                break;
                case 'client':
                    require_once 'operations-module/createclient.php';
                break; 
              case 'order':
                    require_once 'operations-module/order-list.php';
                break;
              case 'addorder':
                    require_once 'operations-module/order-additems.php';
                break;
              case 'completeorder':
                    require_once 'operations-module/completedorders.php';
                break;
                default:
                    require_once 'operations-module/main.php';
                break; 
            }
    ?>
  </div>