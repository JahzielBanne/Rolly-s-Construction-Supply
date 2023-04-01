<h1>PRODUCTS</h1>
<?php
include_once 'classes/class.product.php';
$product = new Product();
?>
<div id="third-submenu">
    <a href="index.php?page=products&subpage=view">List Product</a> | <a href="index.php?page=products&subpage=create">New Product</a> | Search <input type="text"/>
</div>
<div id="subcontent">
    <?php
      switch($subpage){
                case 'create':
                    require_once 'products-module/create-user.php';
                break; 
                case 'modify':
                    require_once 'products-module/modify-user.php';
                break; 
                case 'prodprofile':
                    require_once 'products-module/view-profile.php';
                break;
              case 'view':
                    require_once 'products-module/main.php';
                break;
                case 'result':
                    require_once 'products-module/search-user.php';
                break;
                default:
                    require_once 'products-module/main.php';
                break; 
            }
    ?>
  </div>