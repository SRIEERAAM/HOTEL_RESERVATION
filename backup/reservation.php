<?php
	include 'header.php'; 	//Style Sheet, Theme Style 
	include 'navbar.php'; 	//Menu Toggle, Navigation Bar	
	session_start();
?> 

<section class="section contact-section" id="next">
<!-- Payment Result-->	
	<?php if (isset($_POST['submit_payment'])) : ?>	
	  <div class="container">
		<div> <i class="fa fa-check"></i> Payment Successful ! </div> <br>
		<a href="index.php"	class="btn btn-primary text-white py-3 px-5 font-weight-bold">	Return Home </a>
	  </div>
	  
<!-- Payment Form -->
	<?php elseif (isset($_POST['check_out'])): ;?>
		<div class="container">
		<form action="" method="post" class="form" id="paymentForm" >
            <div class="col-12 mt-4">
                <div class="card p-3">
                    <p class="mb-0 fw-bold h4">Reservation Information</p><br>
					<div class="row	">
						<div class="col-3">
                            <div class="form__div">
                                <span class="d-block">Room Type</span> <span class="text-black" id="type"><?php echo $_POST['room_type_hidden']; ?> Room </span></div></div>
						<div class="col-3">
                            <div class="form__div">
                                <p><span class="d-block">Prices</span> <span class="text-black" id="price">RM <?php echo $_POST['room_price_hidden']; ?>  </span></p></div></div>	
					</div>
					
					<div class="row	">
						<div class="col-3">
                            <div class="form__div">
                                <span class="d-block">Guest Name</span> <span class="text-black" id="name"><?php echo $_POST['name']; ?></span></div></div>
						<div class="col-3">
                            <div class="form__div">
                                <p><span class="d-block">Phone</span> <span class="text-black" id="phone"><?php echo $_POST['phone']; ?></span></p></div></div>
						<div class="col-4">
                            <div class="form__div">
                                <p><span class="d-block">Email</span> <span class="text-black" id="email"><?php echo $_POST['email']; ?></span></p></div></div>						
					</div>
					
					<div class="row	">
						<div class="col-3">
                            <div class="form__div">
                                <span class="d-block">Date Check In </span> <span class="text-black" id="checkin_date"><?php echo $_POST['checkin_date']; ?></span></div></div>
						<div class="col-3">
                            <div class="form__div">
                                <p><span class="d-block">Date Check Out </span> <span class="text-black" id="checkout_date"><?php echo $_POST['checkout_date']; ?></span></p></div></div>
						<div class="col-3">
                            <div class="form__div">
                                <p><span class="d-block">Adults</span> <span class="text-black" id="adult"><?php echo $_POST['adult']; ?></span></p></div></div>
						<div class="col-3">
                            <div class="form__div">
                                <p><span class="d-block">Children</span> <span class="text-black" id="children"><?php echo $_POST['children']; ?></span></p></div></div>						
					</div>	
                </div>
				
                <br>
                <div class="card p-3">
                    <div class="collapse show p-3 pt-0" id="collapseExample">
					<p class="mb-0 fw-bold h4">Payment Confirmation</p><br>
                        <div class="row	">
							<div class="col-lg-5 mb-lg-0 mb-3">
								<input type="hidden" name="payment_id" id="payment_id" value="">
									<span class="d-block">Payment Reference No</span> 
									<div id="payment_id_display"></div>
								<br>
                                <input type="hidden" name="pay_amt" value="">
									<span class="d-block">Payment Amount </span> 
									<div id="pay_amt"> 90 </div>
                            </div>
							
                            <div class="col-lg-7"> 
                                    <div class="row">
                                        <div class="col-12">
											<div class="form__div">
												<input type="text" class="form-control" id="card_number" placeholder=" " required>
												<label for="card_number" class="form__label">Card Number</label>
											</div>
										</div>
										<div class="col-6">
											<div class="form__div">
												<input type="text" class="form-control" id="expiration_date" placeholder="" required>
												<label for="expiration_date" class="form__label">Expiration Date (MM / YY)</label>
											</div>
										</div>								
										<div class="col-6">
											<div class="form__div">
												<input type="password" class="form-control" id="cvv_code" placeholder=" " required>
												<label for="cvv_code" class="form__label">CVV Code</label>
											</div>
										</div>
                                        <div class="col-12">
                                            <button type="submit" name="submit_payment" class="btn btn-primary text-white py-3 px-5 font-weight-bold" onclick="return validateCreditCard()">Proceed Payment</button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</form>
        </div>
	
		  
<!-- Reservation Form -->
	<?php else : ?>
		<section class="section contact-section" id="next">
		  <div class="container">
			<div class="row">
			  <div class="col-md-5" data-aos="fade-up" data-aos-delay="200">
			  <form action="" method="post" class="bg-white p-md-5 p-4 mb-5 border">
				<div class="row">
	<!-- RF: Room Information -->
              <div class="col-md-12 ml-auto contact-info">
			  <input type="hidden" name="room_type_hidden" value="" id="room_type_hidden">
				<p><span class="d-block">Room Types:</span> 
					<span class="text-black">
						<div class="field-icon-wrap">
							<div class="icon"><span class="ion-ios-arrow-down"></span></div>
							<select name="room_type" id="room_type" class="form-control" onchange="updatePrice()">
								<option value="Single">Single Room</option>
								<option value="Standard">Standard Room</option>
								<option value="Family">Family Room</option>
								<option value="Presidential">Presidential Room</option>
							</select>
						</div>
					</span>
				</p>
				<input type="hidden" name="room_price_hidden" value="" id="room_price_hidden">
                <p><span class="d-block">Prices (RM):</span> <span class="text-black" id="price">90.00</span></p>
              </div>
            </div>
          </div>		
		  
	<!-- RF: Personal and Contact Information -->
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">   
			  <div class="col-md-12	 ml-auto contact-info">
				<p><span class="text-black"> Personal Information </span></p>
			  </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="name">Name</label>
                  <input type="text" name="name" id="name" class="form-control " required>
                </div>
				<div class="col-md-6 form-group">
					<label class="text-black font-weight-bold" for="phone">Phone</label>
					<input type="text" name="phone" id="phone" class="form-control" pattern="\d{10}" required>
					<span id="phoneError" class="text-danger d-none">Please enter a valid phone number.</span>
				</div>
              </div>          
              <div class="row">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="email">Email</label>
                  <input type="email" name="email" id="email" class="form-control " required>
				  <span id="emailError" class="text-danger d-none">Please enter a valid email address.</span>
                </div>
              </div>

	<!-- RF: Check In and Check Out Dates -->
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="checkin_date">Date Check In</label>
                  <input type="text" name="checkin_date" id="checkin_date" class="form-control" required>
                </div>
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="checkout_date">Date Check Out</label>
                  <input type="text" name="checkout_date" id="checkout_date" class="form-control"required>
                </div>
              </div>
			  
	<!-- RF: Guest Amount -->
              <div class="row">
				  <div class="col-md-6 form-group">
					<label for="adults" class="font-weight-bold text-black">Adults</label>
					<div class="input-group number-spinner">
					  <input type="number" min="1" class="form-control text-center" name="adult" id="adults" value="1">
					</div>
				  </div>
				  <div class="col-md-6 form-group">
					<label for="children" class="font-weight-bold text-black">Children (optional)</label>
					<div class="input-group number-spinner">
					  <input type="number" min="0" class="form-control text-center" name="children" id="children" value="0">
					</div>
				  </div>
			   </div>


	<!-- RF: Guest Remark/Notes -->
				  <div class="row mb-4">	
					<div class="col-md-12 form-group">
					  <label class="text-black font-weight-bold" for="message">Notes</label>
					  <textarea name="message" id="message" class="form-control " cols="30" rows="8"></textarea>
					</div>
				  </div>
				  
	<!-- Proceed Payment -->
				<button type="submit" name="check_out" class="btn btn-primary text-white py-3 px-5 font-weight-bold">Make Payment</button>					
			</form>
		  </div>
        </div>
      </div>
	
<?php 	endif; ?>
		</section>

<?php 	include 'reservation.js';
		include 'footer.php'; //footer section, JS ?> 



