<h3>Order List</h3>
<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>#</th>
        <th>Order Date / ID</th>
        <th>Customer / Description</th>
        <th>Amount</th>
        <th>Status</th>
      </tr>
<?php
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
        <td><a href="index.php?page=operations&action=addorder&id=<?php echo $order_id;?>"><?php echo $orderdetails_date_added.' - '.$order_id;?></a></td>
        <td><?php echo $client->get_client_name($client_id);?></td>
        <td><?php echo $order->get_sum($order_id);?></td>
        <td><?php if($order->get_order_status($order_id) == 0){
            echo "Order Ongoing";
          }else{
            echo "Order Delivered";
          }
          ?>
          </td>
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