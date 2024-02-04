<?php
	// Get the current page filename without the extension
	$current_page = basename($_SERVER['PHP_SELF']);

	// Function to check and add "active" page
	function isPageActive($page, $current_page) {
		return ($page === $current_page) ? 'class="active"' : '';
	}
	
	// Function to set the title page 
	// Variable : < page title, current dir, active status>
	function getPageDetails($current_page) {
		switch ($current_page) {
			case 'index.php'		:	return array('Home', 'Home');
			case 'reservation.php'	:	return array('Reservation', 'Reservation');
			case 'rooms.php'		:	return array('Rooms & Suites', 'Rooms');
			default					:	return array('Page Not Found', 'Page Not Found');
			}
	}

	$pageDetails = getPageDetails($current_page);
	$pageTitle = $pageDetails[0];
	$breadcrumbs = $pageDetails[1];
?>

<body>   
    <header class="site-header js-site-header">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-6 col-lg-4 site-logo" data-aos="fade"><a href="index.php">Lava Hotel</a></div>
          <div class="col-6 col-lg-8">


            <div class="site-menu-toggle js-site-menu-toggle"  data-aos="fade">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <!-- END menu-toggle -->
			
			<div class="site-navbar js-site-navbar">
              <nav role="navigation">
                <div class="container">
                  <div class="row full-height align-items-center">
                    <div class="col-md-6 mx-auto">
                      <ul class="list-unstyled menu">
						<li <?php echo isPageActive('index.php', $current_page); ?>><a href="index.php">Home</a></li>
						<li <?php echo isPageActive('rooms.php', $current_page); ?>><a href="rooms.php">Rooms & Suites</a></li>
						<li <?php echo isPageActive('reservation.php', $current_page); ?>><a href="reservation.php">Reservation</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </nav>
            </div> 
			
          </div>
        </div>
      </div>
    </header>
	
	<?php
		if ($current_page !== 'index.php'){ echo '
			<section class="site-hero inner-page overlay" style="background-image: url(images/hero_4.jpg)" data-stellar-background-ratio="0.5">
			  <div class="container">
				<div class="row site-hero-inner justify-content-center align-items-center">
				  <div class="col-md-10 text-center" data-aos="fade">
					<h3 class="heading mb-3">' . $pageTitle . '</h3>
					<ul class="custom-breadcrumbs mb-4">
						<li><a href="index.php">Home</a></li>
						<li>&bullet;</li>
						<li>' . $breadcrumbs . '</li>
					</ul>
				  </div>
				</div>
			  </div>

			  <a class="mouse smoothscroll" href="#next">
				<div class="mouse-icon">
				  <span class="mouse-wheel"></span>
				</div>
			  </a>
			</section>';
		}?>
	
<!-- END head navbar-->