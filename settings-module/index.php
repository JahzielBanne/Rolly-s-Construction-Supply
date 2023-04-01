<div id="second-submenu">
    <a href="index.php?page=settings&subpage=users">Users</a> 
</div>
<div id="content">
    <?php
      switch($subpage){
                case 'users':
                    require_once 'users-module/index.php';
                break; 
                default:
                    require_once 'main.php';
                break; 
            }
    ?>
  </div>