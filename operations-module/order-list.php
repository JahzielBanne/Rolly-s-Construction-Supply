<h3>Order List</h3>
<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>#</th>
        <th>ID</th>
        <th>Customer Name</th>
        <th>Customer Address</th>
        <th>Customer Number</th>
        <th>Order Created</th>  
      </tr>
<?php
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';
include_once 'classes/class.release.php';
include_once 'classes/class.client.php';        
$order = new Order(); 
$client = new Client();        
$count = 1;
if($order->list_order() != false){
foreach($order->list_order() as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $count;?></td>
        <td><a href="index.php?page=operations&action=addorder&id=<?php echo $order_id;?>"><?php echo $order_id;?></a></td>
        <td><?php echo $client->get_client_name($client_id);?></td>
        <td><?php echo $client->get_client_address($client_id);?></td>
        <td><?php echo $client->get_client_number($client_id);?></td>
        <td><?php echo $order->get_order_dateadded($order_id)?></td>  
      </tr>
      <tr>
<?php
 $count++;
}
}else{
  echo "No Record Found.";
}
?>
    </table>
</div>