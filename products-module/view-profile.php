<h3 style="text-align:center;">Provide the Required Information</h3>
<div class="btn-box">
<?php
            if($product->get_product_status($id) == "1"){
              ?>
                <a class="btn-jsactive" onclick="document.getElementById('id01').style.display='block'">Disable Account</a>
              <?php
            }else{ 
            ?>
                <a class="btn-jsactive" onclick="document.getElementById('id01').style.display='block'">Activate Account</a>
            <?php
            }
            ?>
</div>
<div id="form-block">
<form method="POST" action="processes/process.product.php?action=update">
        <div id="form-block-half">
            <label for="pname">Product name</label>
            <input type="text" id="pname" class="input" name="pname" value="<?php echo $product->get_product_name($id);?>" placeholder="<?php echo $product->get_product_name($id);?>">

            <label for="category">Category</label>
            <select id="category" name="category">
              <option value="sand" <?php if($product->get_product_category($id) == "Sand"){ echo "selected";};?>>Sand</option>
              <option value="metal" <?php if($product->get_product_category($id) == "Metal"){ echo "selected";};?>>Metal</option>
              <option value="stone" <?php if($product->get_product_category($id) == "Stone"){ echo "selected";};?>>Stone</option>
             <option value="wood" <?php if($product->get_product_category($id) == "Wood"){ echo "selected";};?>>Wood</option>    
            </select>
    </div>
            <div id="form-block-half">
            <label for="status">Account Status</label>
            <select id="status" name="status" disabled>
              <option <?php if($product->get_product_status($id) == "0"){ echo "selected";};?>>Deactivated</option>
              <option <?php if($product->get_product_status($id) == "1"){ echo "selected";};?>>Active</option>
            </select>
            <label for="price">Price</label>
            <input type="number" id="price" class="input" name="price"  value="<?php echo $product->get_product_price($id);?>" placeholder="Enter Price...">
            </div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <div id="button-block">
        <input type="submit" value="Update">
        </div>
</form>
    <div id="id01" class="modal">
  <div id="form-update" class="modal-content">
    <div class="container">
      <h2>Change Product Status</h2>
      <p>Are you sure you want to change product status?</p>
      <div class="clearfix">    
        <?php
         if($product->get_product_status($id) == "1"){  
         ?>
           <button class="confirmbtn" onclick="disableSubmit()">Confirm</button>
        <?php }else {?>
           <button class="confirmbtn" onclick="enableSubmit()">Confirm</button>
        <?php };?>
        <button class="cancelbtn" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
      </div>
    </div>
    </div>
</div>
</div>
<script>
    
var modal = document.getElementById('id01');\
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }else if(event.target == modal_password){
    modal_password.style.display = "none";
  }else if(event.target == modal_email){
    modal_email.style.display = "none";
  }
}
function enableSubmit() {
    window.location.href = "processes/process.product.php?prodprofile&id=<?php echo $id;?>&status=1";
}
function disableSubmit() {
    window.location.href = "processes/process.product.php?action=status&id=<?php echo $id;?>&status=0";
}
</script>