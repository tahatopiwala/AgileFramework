<?php
	$time = date("Y-m-d");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Project Run</title>
  		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  		<script type="text/javascript" src="http://www.parsecdn.com/js/parse-latest.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/marked/0.3.2/marked.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.23/browser.min.js"></script>
        <script type="text/babel" src="Assets/buildNavigation.js"></script>
        <script type="text/babel" src="Assets/buildFooter.js"></script>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	</head>
	<body>
		<div id="navigation"></div>
		<div id="content">
			<form onsubmit="return submitSignUpForm(this)">
				<input type="text" name="firstname">
				<input type="text" name="lastname">
				<input type="text" name="username">
				<input type="text" name="email">
				<input type="text" name="password">
				<input type="submit" name="submit">
			</form>
		</div>
		<div id="footer"></div>
	</body>
	<script type="text/javascript">

	Parse.initialize("BLHePwKUJXbjfen4KrliJFHWyFQay14eruRD3yJU", "c2acQmmIrFURUnUpHCPNv4b77A4BW7mJ2dnrRLr6");
	
	function submitSignUpForm(event) {
		var firstname = event.firstname.value;
		var lastname = event.lastname.value;
		var email = event.email.value;
		var username = event.username.value;
		var password = event.password.value;
		
		var user = new Parse.User();

			user.set("firstname",firstname);
			user.set("lastname",lastname);
			user.set("username",username);
			user.set("email",email);
			user.set("password",password);
	
		user.signUp(null,{
			success: function(user) {
			    // Hooray! Let them use the app now.
			},
			error: function(user, error) {
			    // Show the error message somewhere and let the user try again.
			    alert("Error: " + error.code + " " + error.message);
			  }
		});
		return false;
	}
	var currentUser = Parse.User.current();
	if (currentUser) {
	    // do stuff with the user
	    currentUser.fetch().then(function(fetchedUser){
		    var name = fetchedUser.getUsername();
		    console.log(fetchedUser);
		}, function(error){
		    //Handle the error
		});
	    
	} else {
	    // show the signup or login page
	}
	</script>
</html>
<?php
?>