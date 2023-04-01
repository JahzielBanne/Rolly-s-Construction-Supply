<h3 style="text-align:center;">Add a Product</h3>
<div id="form-block-product">
    <form method="POST" action="processes/process.product.php?action=new">
            <label for="pname">Product Name</label>
            <input type="text" id="pname" class="input" name="pname" placeholder="Your name..">

            <label for="category">Category</label>
            <select id="category" name="category">
              <option value="sand">Sand</option>
              <option value="metal">Metal</option>
              <option value="stone">Stone</option>
            <option value="wood">Wood</option>    
            </select>
            <label for="price">Price</label>
            <input type="number" id="price" class="input" name="price" placeholder="Enter Price"> 
        <div id="button-block">
        <input type="submit" value="Save">
        </div>
  </form>
</div>