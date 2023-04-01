<?php
include_once 'classes/class.user.php';
include 'config/config.php';


$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';
$pid = (isset($_GET['pid']) && $_GET['pid'] != '') ? $_GET['pid'] : '';


$user = new User();
if(!$user->get_session()){
	header("location: login.php");
}
$user_id = $user->get_user_id($_SESSION['user_email']);
?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Home</title>
    <link rel="stylesheet" href="css/stylepage.css" media="screen">
<link rel="stylesheet" href="/css/style.css" media="screen">
<link rel="stylesheet" href="css/custom.css" media="screen">
    <script class="u-script" type="text/javascript" src="jscript/jquery-3.3.1.min.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="jscript/page.js" defer=""></script>
      <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:200,200i,300,300i,400,400i,600,600i,700,700i,900">
    
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Home">
    <meta property="og:type" content="website">
  </head>
  <body data-home-page="Home.html" data-home-page-title="Home" class="u-body u-xl-mode" data-lang="en"><header class="u-clearfix u-custom-color-1 u-header u-header" id="sec-4cfb"><div class="u-clearfix u-sheet u-sheet-1">
        <a  class="u-image u-logo u-image-1" data-image-width="500" data-image-height="500">
          <img src="images/logo.png" class="u-logo-image u-logo-image-1">
        </a>
        <p class="u-custom-font u-font-titillium-web u-text u-text-default u-text-1">Rolly's Construction Supply </p>
        <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px; font-weight: 700; text-transform: uppercase;">
            <a class="u-button-style u-custom-active-border-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</g></svg>
            </a>
          </div>
                
          <div class="u-custom-menu u-nav-container" >
            <ul class="u-nav u-spacing-30 u-unstyled u-nav-1" style="border-radius: 25px;">
	<li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-grey-90 u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-3 u-text-custom-color-2 u-text-hover-palette-1-base" href="index.php?page=home" style="padding: 10px 0px;">Home</a>
</li><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-grey-90 u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-3 u-text-custom-color-2 u-text-hover-palette-1-base" href="index.php?page=products" style="padding: 10px 0px;">Product</a>
</li><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-grey-90 u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-3 u-text-custom-color-2 u-text-hover-palette-1-base" href="index.php?page=operations" style="padding: 10px 0px;">Orders</a>
</li><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-grey-90 u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-3 u-text-custom-color-2 u-text-hover-palette-1-base" href="index.php?page=settings" style="padding: 10px 0px;">Users</a>
</li><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-grey-90 u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-3 u-text-custom-color-2 u-text-hover-palette-1-base" href="logout.php" style="padding: 10px 0px;" class="move-right">Log Out</a></li>
                <li><span class="move-right"><?php echo $user->get_user_lastname($user_id).', '.$user->get_user_firstname($user_id);?>&nbsp;&nbsp; &nbsp;&nbsp;</span> </li>		
</ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
	<li class="u-nav-item"><a class="u-button-style u-nav-link" href="index.php?page=home">Home</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="index.php?page=products">Product</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="index.php?page=operations">Release</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="index.php?page=settings">Settings</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="logout.php">Log Out</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
    <section class="u-clearfix u-section-1" id="sec-1587">
      <div class="u-clearfix u-sheet u-sheet-1"></div>
    </section>
    
    <div id="content">
      <h1 style="text-align:center; color: #FB8500;">Welcome to Rolly's Construction Supply!</h1>
    <?php
      switch($page){
                case 'settings':
                    require_once 'users-module/index.php';
                break; 
                case 'products':
                    require_once 'products-module/index.php';
                break; 
                case 'operations':
                    require_once 'operations-module/index.php';
                break; 
                default:
                    require_once 'main.php';
                break; 
            }
    ?>
  </div>
</body>
</html>