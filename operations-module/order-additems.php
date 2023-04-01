<?php
include_once 'classes/class.product.php';
$product = new Product();
$order = new Order();
$client = new Client();
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';
?>
<h3>Order</h3>
<div id="orderdetails">
  <h6>Order #: <?php echo $id;?></h6>        
      <h6>Client Name: <?php echo $client->get_client_name($order->get_client_id($id));?></h6>
      <h6>Client Address: <?php echo $client->get_client_address($order->get_client_id($id));?></h6>
      <h6>Client Number: <?php echo $client->get_client_number($order->get_client_id($id));?></h6>
    <h6>Order Date Created: <?php echo $order-> get_order_dateadded($id);?> </h6>
</div>

<div class="btn-box">
  <?php
    if($order->get_order_save($id) == 0){
  ?>
<a class="btn-jsactive" onclick="document.getElementById('id01').style.display='block'">Add Product</a> | 
<a class="btn-jsactive" onclick="document.getElementById('id02').style.display='block'">Save</a>
      <?php
    }
    ?>
</div>
<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>#</th>
        <th>Product</th>
        <th>Quantity</th>
        <th>Amount</th>  
      </tr>
<?php
$count = 1;
if($order->list_order_items($id) != false){
foreach($order->list_order_items($id) as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $count;?></td>
        <td><?php echo $product->get_product_name($product_id);?></td>
        <td><?php echo $order->get_order_qty($id, $product_id, $amount);?></td>
        <td><?php echo $amount;?></td>  
      </tr>
<?php
 $count++;
}
}else{
  echo "No Record Found.";
}
?>
    </table>
    <div class="totalamount"><h4 style="float:right;">Total Amount: <?php echo $order->get_sum($id);?></h4></div>
</div>
<div id="id01" class="modal">
  <div #id="form-update" class="modal-content">
    <div class="container">
   
      <h2>Select Product</h2>
      <p>Provide required...</p>

      <form method="POST" id="itemForm" action="processes/process.release.php?action=addorder&id=">
      <input type="hidden" id="orderid" name="orderid" value="<?php echo $id;?>"/>
        <label for="prodid">Product</label>
            <select name="productid" id="productid">
            <?php
            $count = 1;
            $count = 1;
            if($product->list_product() != false){
            foreach($product->list_product() as $value){
            extract($value);
            
            ?>
                <option value="<?php echo $product_id;?>"><?php echo $product_name;?></option>
            <?php
            }
          }
            ?>
            </select>
            <label for="qty">Received Quantity</label>
            <input type="number" id="qty" class="input" name="qty" placeholder="Quantity..">
       </form> 
      <div class="clearfix">
      <button class="submitbtn" onclick="itemSubmit()">Add</button>
        <button class="cancelbtn" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
        
      </div>
      </div>
    </div>
  </div>
<div id="id02" class="modal">
<form method="POST" id="itemSave" action="processes/process.release.php?action=saveitem">
      <input type="hidden" id="orderid" name="orderid" value="<?php echo $id;?>"/>
      </form>
      <div #id="form-update" class="modal-content">
    <div class="container">
      <h2>Order Complete</h2>
      <p>Are you sure that this order is completed?</p>
      <div class="clearfix">
        <button class="confirmbtn" onclick="saveSubmit()">Confirm</button>
        <button class="cancelbtn" onclick="document.getElementById('id02').style.display='none'">Cancel</button>
      </div>
    </div>
    </div>
       
</div>
<script>
// Get the modal
var modal = document.getElementById('id01');
var modal_save = document.getElementById('id02');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }else if(event.target == modal_save){
    modal_save.style.display = "none";
  }
}
function saveSubmit() {
    //;window.location.href = "processes/process.receive.php?action=save&id=<?php echo $id;?>";
    document.getElementById("itemSave").submit();
  }

function itemSubmit() {
  document.getElementById("itemForm").submit();
}
</script>