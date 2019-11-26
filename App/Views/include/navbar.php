 <?php 
 use App\Config;
 $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
 ?>

 <!-- Side Navbar -->
 <nav class="side-navbar">
  <div class="side-navbar-wrapper">
    <!-- Sidebar Header    -->
    <div class="sidenav-header d-flex align-items-center justify-content-center">
      <!-- User Info-->
      <!-- <div class="sidenav-header-inner text-center">
        <img src="img/user-avatar.jpg" alt="person" class="img-fluid rounded-circle">
        <h2 class="h5">Nathan Andrews</h2>
      </div> -->

      <!-- Small Brand information, appears on minimized sidebar-->
      <div class="sidenav-header-logo">
        <a href="#" class="brand-small text-center"> <strong>X</strong>
          <strong class="text-primary">S</strong></a></div>
        </div>

        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li class="<?php echo ($uriSegments[3] =='AddItem' ? 'active':'')?>">
              <a href="<?php echo Config::HOST_URL.'/AddItem'; ?>">
                <i class="icon-form"></i>Add Item
              </a>
            </li>

            <li class="<?php echo ($uriSegments[3] =='ItemList' ? 'active':'')?>">
              <a href="<?php echo Config::HOST_URL.'/ItemList'; ?>">
                <i class="icon-grid"></i>Item List
              </a>
            </li>

            <!-- <li class="<?php echo ($uriSegments[3] =='Buyer' ? 'active':'')?>">
              <a href="<?php echo Config::HOST_URL.'/Buyer'; ?>">
                <i class="icon-form"></i>Buyers
              </a>
            </li>  -->           
            <!-- <li class="<?php echo ($uriSegments[3] =='User' ? 'active':'')?>">
              <a href="<?php echo Config::HOST_URL.'/User'; ?>">
                <i class="icon-user"></i>Users
              </a>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>

    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header">
                <a id="toggle-btn" href="#" class="menu-btn">
                  <i class="icon-bars"> </i>
                </a>
              </div>

              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Log out-->
                <!-- <li class="nav-item">
                  <a href="#" class="nav-link logout"> 
                    <span class="d-none d-sm-inline-block">Logout</span>
                    <i class="fa fa-sign-out"></i>
                  </a>
                </li> -->
              </ul>
            </div>
          </div>
        </nav>
      </header>

      <script type="text/javascript">
        var baseUrl = "<?php echo Config::HOST_URL; ?>";
      </script>
