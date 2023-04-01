<?php
include_once 'classes/class.client.php';
include_once 'classes/class.release.php';   
$client = new Client();
?>
<h3>Select Customer</h3>
<div id="form-block">
    <form method="POST" action="processes/process.release.php?action=create">
                <input type="hidden" value="<?php echo $order_id?>" name="orderid">
                    <select id="orderclient" name="clientid">
              <?php
              if($client->list_client() != false){
                foreach($client->list_client() as $value){
                   extract($value);
              ?>
              <option value="<?php echo $client_id;?>"><?php echo $client_name;?></option>
              <?php
                }
              }
              ?>
                </select>
        <div id="button-block">
        <input type="submit" value="Create">
        </div>
  </form>
</div>