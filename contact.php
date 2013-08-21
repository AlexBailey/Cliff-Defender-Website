<!DOCTYPE HTML>
<html>
	<head>
		<title>Cliff Defender: Contact</title>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<div id="Wrapper">
			<div id="PlayButton">
				<a href="play.html"><img src="playnow.png" /></a>
			</div>
			<div id="Banner">
				<a href="index.html">
                <object type="application/x-shockwave-flash" 
  				data="banner2.swf" 
  				width="1024" height="350">
  			    <param name="movie" value="banner2.swf" />
  				<param name="quality" value="high"/>
				</object></a>
			</div>
			
			<div id="NavSection">
				<ul id="MainNav">
					<li><a href="index.html">Home</a></li>
					<li><a href="story.html">Story</a></li>
					<li><a href="gameplay.html">Game</a></li>
					<li class="empty">&nbsp;</li>
					<li><a href="media.html">Media</a></li>
					<li><a href="quiz.php">Quiz</a></li>
					<li><a href="contact.php">Contact</a></li>
				</ul>
			</div>

			<!-- Contact Form Main PHP Block -->
			<?php if ($_POST['submitted']) {
				// Fetching details from the form and storing in variables
				$name = $_POST['name'];
				$email = $_POST['email'];
				$subject = $_POST['subject'];
				$message = $_POST['message'];

				$result = 0;

				// Where Email is sent
				$mail_to = "abailey950@fareham.ac.uk";
				
				// Body
				$body = 'From: '.$name."\n";
				$body .= 'E-mail: '.$email."\n";
				$body .= 'Subject: '.$subject."\n";
				$body .= 'Message: '."\n".$message;

				$headers = 'From: '.$email."\r\n";
				$headers .= 'Reply-To: '.$email."\r\n";
	 			
	 			// Name longer than 0 Validation
				if(strlen($name) <= 0) {
					$error1 = True;
				}
				// Email longer than 0 and in correct format Validation
				if(strlen($email) <= 0) {
					$error2 = True;
				} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$error3 = True;
				}
				// Subject chosen Validation
				if($subject == "Please Select") {
					$error4 = True;
				}
				if($subject == "Legal Message") {
					$mail_to = "abailey950@fareham.ac.uk";
				}
				// Message longer than 0 Validation
				if(strlen($message) <= 0) {
					$error5 = True;
				}

				if($error1 || $error2 || $error3 || $error4 || $error5) {
					$result = 1;
				}else{
					$result = 2;
					mail($mail_to, $subject." from ".$name, $body, $headers);
				}
			} ?>
			<!-- END - Contact Form Main PHP Block -->

			<div id="MainBody">
				<div id="SupportWrapper">
					<h3>Contact</h3>
					<p>If you have encountered a problem with a form, please contact me directly with the email address below and also inlcuding details about the problem.</p>
					<h4>Contact Details</h4>
					<p><a href="mailto:abailey950@fareham.ac.uk">
abailey950@fareham.ac.uk</a></p>
				</div>
				<div id="ContactFormWrapper">
					<h3>Contact Us</h3>
					<form action="contact.php" method="post">
						Name: <br>
						<input type="text" placeholder="Your Name" name="name"><span class="errorMsg"><?php if($error1) {echo "Please enter your name";} ?></span><br>
						Email: <br>
						<input type="text" placeholder="Your Email" name="email"><span class="errorMsg"><?php if($error2) {echo "Please enter your Email Address";} elseif($error3) {echo "Please enter a valid Email Address";} ?></span><br>
						Subject: <br>
						<select name="subject">
							<option value="Please Select">Select One</option>
							<option value="General Message">General</option>
							<option value="Web Bug Report">Website Problem/Bug</option>
							<option value="Program Bug Report">Program/Game Problem/Bug</option>
							<option value="Legal Message">Legal Issues</option>
						</select><span class="errorMsg"><?php if($error4) {echo "Please choose a subject";} ?></span><br>
						Message: <br>
						<textarea name="message" placeholder="Your Message" rows="5" cols="20"></textarea>
						<span class="errorMsg"><?php if($error5) {echo "Please enter your message";} ?></span><br>
						<input type="hidden" name="submitted" value=1>
						<input type="submit" value="Submit">
						<input type="reset" value="Reset"><br>
						<span class="resultMsg"><?php if($result == 1) {echo "Please correct the form and re-submit it";} 
						elseif($result == 2) {echo "E-mail sent successfully";} ?></span>
					</form>
				</div>
			</div>
			<div id="Footer">
				<p>Copyright &copy; 2013 | Alex Bailey</p>
			</div>
		</div>
	</body>
</html>