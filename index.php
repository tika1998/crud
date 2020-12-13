<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<style>
	.alert {
	  color: white;
	  width: 500px;
      margin: auto;
      display: none
	}

	.closebtn {
	  margin-left: 15px;
	  color: white;
	  font-weight: bold;
	  float: right;
	  font-size: 22px;
	  line-height: 20px;
	  cursor: pointer;
	  transition: 0.3s;
	}

	.closebtn:hover {
	  color: black;
	}

	</style>
</head>
<body>
	<div class="alert">
	  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
	   <span class="text"></span>
	</div>
	<div id="box" style="width: 500px; margin: 15px auto">
		<form method="post">
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
		    <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
		  </div>
		  <input type="text"  class="form-control name" aria-label="Sizing example input" name="name" aria-describedby="inputGroup-sizing-default">
		</div>

		<div class="input-group mb-3">
		  <div class="input-group-prepend">
		    <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
		  </div>
		  <input type="text"  class="form-control email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="email">
		</div>

		<div class="input-group mb-3">
		  <div class="input-group-prepend">
		    <span class="input-group-text" id="inputGroup-sizing-default">Mob num</span>
		  </div>
		  <input type="text" class="form-control mobile" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="mobile">
		</div>

		<div class="input-group mb-3">
		  <div class="input-group-prepend">
		    <span class="input-group-text" id="inputGroup-sizing-default">address</span>
		  </div>
		  <input type="text" class="form-control address" class="address" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
		</div>

		<div class="input-group mb-3">
		 <button  type="button"  name="submit">Send</button>
		</div>
		</form>
	</div>	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$("button").click(function() {
	  	$.ajax({
	  		url: "model.php",
	  		type: 'post',
	  		data: {
	  			name: $('.name').val(),
	  			email: $('.email').val(),
	  			address: $('.address').val(),
	  			mobile: $('.mobile').val(),
	  			type: 'insert'
	  		},
	  		success: function(res) {
	  			let resp = JSON.parse(res);
	  			$(".text").text(resp.message)
	  			$(".alert").show();
	  			resp.status == "success" ? $(".alert").css("background", "green") : $(".alert").css("background", "red")
	  		}
  		})
	})
})
</script>
</body>
</html>