<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Product Category</th>
        <th>Price</th>
      </tr>
<?php
include_once 'classes/class.product.php';
$count = 1;
if($product->list_product() != false){
foreach($product->list_product() as $value){
   extract($value);
    
?>
      <tr>
        <td><?php echo $count;?></td>
        <td><a href="index.php?page=products&subpage=prodprofile&id=<?php echo $product_id?>"><?php echo $product_name;?></a></td>
        <td><?php echo $category_name;?></td>
        <td><?php echo $product_price;?></td>
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
