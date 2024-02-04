<?php 
	include 'header.php'; 	//Style Sheet, Theme Style 
	include 'navbar.php'; 	//Menu Toggle, Navigation Bar
	include 'connection.php';		
?>  
 


    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12" data-aos="fade-up" data-aos-delay="100">
                    <div class="row">
					
						<?php if (!empty($roomsByType)){
								foreach ($roomsByType as $room) : ?>
									<div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up">
										<form action="reservation.php" method="post" class="bg-white p-md-5 p-4 mb-5 border" id="reservationForm">
											<a  class="room" >
												<input type="hidden" name="roomType" value="<?php echo $room['RoomType']; ?>">
												<input type="hidden" name="roomPrice" value="<?php echo $room['Price']; ?>">
												<figure class="img-wrap">
													<img src="
													<?php echo $room['ImagePath']; ?>" alt="Free website template" class="img-fluid mb-3">
												</figure>
												<div class="p-3 text-center room-info">
													<h3> <?php echo $room['RoomType']; ?> </h3>
													<hr><span class="fa fa-money">		 RM <?php echo $room['Price']; ?> / per night </span>
													<hr><span class="fa fa-bed"> 		 <?php echo $room['BedConfig']; ?> </span>
													<hr><span class="fa fa-users"> 		 Max <?php echo $room['MaxGuests']; ?> Guest(s)</span>
													<hr><span class="fa fa-arrows-alt">  <?php echo $room['SquareFootage']; ?> sq ft</span>
													<hr><span class="fa fa-television">  <?php echo $room['Amenities']; ?></span>
													<hr><button type="submit" class="btn btn-primary text-white py-3 px-5 font-weight-bold">Reserve Now</button>
												</div>
											</a>			
										</form>
									</div>
								<?php endforeach;
							}else {
								echo "No rooms found.";
						}	
						?>
					
                    </div>
                </div>
            </div>
        </div>
    </section>
	 
<?php include 'footer.php'; //footer section, JS ?>  