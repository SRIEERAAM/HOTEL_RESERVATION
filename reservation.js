<script>
	const prices = {
        'Single': 90.00,
        'Standard': 120.00,
        'Family': 170.00,
        'Presidential': 250.00
    };

    const emailInput = document.getElementById('email');
    const emailErrorSpan = document.getElementById('emailError');
	const phoneInput = document.getElementById('phone');
	const phoneErrorSpan = document.getElementById('phoneError');
	const uniquePaymentId = generateUniquePaymentId();
	
		
function updatePrice() {
    var roomTypeDropdown = document.getElementById('room_type');
    var selectedRoomType = roomTypeDropdown.value;

    // Update the displayed price and  the hidden input value
    document.getElementById('price').innerText = prices[selectedRoomType].toFixed(2);
    document.getElementById('room_type_hidden').value = selectedRoomType;
    document.getElementById('room_price_hidden').value = prices[selectedRoomType];
	
	
	var checkinDate = new Date(document.getElementById("checkin_date").value);
	var checkoutDate = new Date(document.getElementById("checkout_date").value);
	
	if (checkinDate != "Invalid Date" && checkoutDate != "Invalid Date"){
		var total_day = calculateDays(checkinDate, checkoutDate);
		var total_pay = prices[selectedRoomType]*total_day;
		
		document.getElementById('total_day').value = total_day;
		document.getElementById('total_pay').value = total_pay;
	}	
}
	
function validateEmail(email) {
    const regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-]+.)+[a-zA-Z]{2,}))$/;
    return regex.test(email);
}

emailInput.addEventListener('keyup', () => {
    if (!validateEmail(emailInput.value)) {
        emailErrorSpan.classList.remove('d-none');
    } else {
        emailErrorSpan.classList.add('d-none');
    }
});

// Validate Check In and Check Out Date

	function validateCheckinDate() {
		var today = new Date();
		var checkinDateInput = document.getElementById("checkin_date");
		var checkinDate = new Date(checkinDateInput.value);

		if (checkinDate < today) {
			alert("Check-in date must be today or in the future. Please select a valid date.");
			checkinDateInput.value = "";
		}
		
		var checkoutDate = new Date(document.getElementById("checkout_date").value);
		if (checkoutDate != "Invalid Date"){
			var total_day = calculateDays(checkinDate, checkoutDate);
			var total_pay = prices[selectedRoomType]*total_day;
		
			document.getElementById('total_day').value = total_day;
			document.getElementById('total_pay').value = total_pay;	
		} 
	}

	function validateCheckoutDate() {
		var checkinDate = new Date(document.getElementById("checkin_date").value);
		var checkoutDateInput = document.getElementById("checkout_date");
		var checkoutDate = new Date(checkoutDateInput.value);

		if (checkoutDate <= checkinDate) {
			alert("Check-out date must be after the check-in date. Please select a valid date.");
			// Clear the input field
			checkoutDateInput.value = "";
		}
		
		var total_day = calculateDays(checkinDate, checkoutDate);		
		var roomTypeDropdown = document.getElementById('room_type');
		var selectedRoomType = roomTypeDropdown.value;
		var total_pay = prices[selectedRoomType]*total_day;
		
		document.getElementById('total_day').value = total_day;
		document.getElementById('total_pay').value = total_pay;	
	}
		
	function calculateDays(checkinDate, checkoutDate) {
        checkinDate.setHours(0, 0, 0, 0);
        checkoutDate.setHours(0, 0, 0, 0);

        var timeDifference = checkoutDate - checkinDate;
        var daysDifference = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
        return daysDifference;
    }


// Adults and Children Counter
$('.number-spinner button').click(function() {
        const btn = $(this);
        const input = btn.closest('.input-group').find('input');
        const dir = btn.data('dir');
        const currentVal = parseInt(input.val(), 10);
        if (dir === 'plus') {
            input.val(currentVal + 1);
        } else if (dir === 'minus' && currentVal > 1) {
            input.val(currentVal - 1);
        }
});

function generateUniquePaymentId() {
  var timestamp = Date.now();
  var randomNum = Math.floor(Math.random() * 10000);
  var uniquePaymentId = timestamp + randomNum;

  document.getElementById('payment_id').value = uniquePaymentId;
  document.getElementById('payment_id_display').innerText = uniquePaymentId;
  
  return uniquePaymentId;
}

function validateCreditCard() {
  // Get input values
  var cardNumber = document.getElementById('card_number').value.trim();
  var expirationDate = document.getElementById('expiration_date').value.trim();
  var cvvCode = document.getElementById('cvv_code').value.trim();

  var isValid = true;

  if (!/^\d+$/.test(cardNumber)) {
    isValid = false;
    alert('Please enter a valid card number.');
  }

  if (!/^\d{2}\/\d{2}$/.test(expirationDate)) {
    isValid = false;
    alert('Please enter a valid expiration date in the format MM/YY.');
  }

  if (!/^\d+$/.test(cvvCode)) {
    isValid = false;
    alert('Please enter a valid CVV code.');
  }

  return isValid;
}


</script>