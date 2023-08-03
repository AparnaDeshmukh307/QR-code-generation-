<?php
$f = "visit.php";
if(!file_exists($f)){
	touch($f);
	$handle =  fopen($f, "w" ) ;
	fwrite($handle,0) ;
	fclose ($handle);

}
 
include('libs/phpqrcode/qrlib.php'); 

function getUsernameFromEmail($email) {
	$find = '@';
	$pos = strpos($email, $find);
	$username = substr($email, 0, $pos);
	return $username;
}

if(isset($_POST['submit']) ) {
	$tempDir = 'temp/'; 
	$email = $_POST['mail'];
	$subject =  $_POST['subject'];
	$filename = getUsernameFromEmail($email);
	$body =  $_POST['msg'];
	$codeContents = 'mailto:'.$email.'?subject='.urlencode($subject).'&body='.urlencode($body); 
	QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
}
?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
	<title>Quick Response (QR) Code Generator</title>
	<link rel="icon" href="img/favicon.ico" type="image/png">
	<!-- <link rel="stylesheet" href="libs/css/bootstrap.min.css"> -->
	<!-- <link rel="stylesheet" href="libs/style.css"> -->
	<script src="libs/navbarclock.js"></script>
	</head>
    <style>
        #clockdate{
	float:right;
}
.clockdate-wrapper {
    background-color: #333;
    padding:10px;
    max-width:170px;
    width:100%;
    text-align:center;
    margin:0 0 -2px 0; 
}
#clock{
    background-color:#333;
    font-family: sans-serif;
    font-size:25px;
    text-shadow:0px 0px 1px #fff;
    color:#fff;
}
#clock span {
	color:#888;
	text-shadow:0px 0px 1px #333;
	font-size:17px;
	position:relative;
	top:-7px;
}
#date {
    font-size:9px;
    font-family:arial,sans-serif;
    color:#fff;
}
nav.navbar-inverse{
	height:72px;
	position:fixed;
	width:100%;
	top:0;
	z-index:999;
}
.hederimg{
	margin-top:15px;
	margin-left:15px;
}
.pagevisit{
	width:100%;
	background-color:#47d147;
	margin-top:13px;
	height:30px;
}
.visitcount{
	text-align:center;
	color:#ffffb3;
	font-size:20px;
	font-weight:bold;
}
/*===================================*/
.input-field{
	border: 3px groove cornflowerblue;
	border-radius: 10px;
	width: 25em;
	padding: .5em 2em 2em 2em;
	margin:1em 5em 5em 3em;
	height:26em;
}
.qr-field{
	border: 3px groove cornflowerblue;
	border-radius: 10px;
	width: 24em;
	height:26em;
	padding: .5em 2em 2em 2em;
	margin:-31em 3em 5em;
	float:right;
}
.myoutput{
	border: 3px groove green;
	border-radius: 10px;
	margin:7em 5em 0em 5em;
}
h3{
	text-align:center;
}
</style>

	<body onload="startTime()">
		<nav class="navbar-inverse" role="navigation">
			<a href=#>
				<img src="author.png" class="hederimg">
			</a>
			<div id="clockdate">
				<div class="clockdate-wrapper">
					<div id="clock"></div>
					<div id="date"><?php echo date('l, F j, Y'); ?></div>
				</div>
			</div>
			<div class="pagevisit">
				<div class="visitcount">
					<?php
					$handle = fopen($f, "r");
					$counter = ( int ) fread ($handle,20) ;
					fclose ($handle) ;
					
					if(!isset($_POST["submit"])){
						$counter++ ;
					}
					
				// echo "This Page is Visited ".$counter." Times";
					$handle =  fopen($f, "w" ) ;
					fwrite($handle,$counter) ;
					fclose ($handle) ;
					?>
				</div>
			</div>
		</nav>
		<div class="myoutput">
			<h3><strong>Quick Response (QR) Code Generator</strong></h3>
			<div class="input-field">
				<h3>Please Fill-out All Fields</h3>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="mail" style="width:20em;" placeholder="Enter your Email" value="<?php echo @$email; ?>" required />
					</div>
					<div class="form-group">
						<label>Subject</label>
						<input type="text" class="form-control" name="subject" style="width:20em;" placeholder="Enter your Email Subject" value="<?php echo @$subject; ?>" required pattern="[a-zA-Z .]+" />
					</div>
					<div class="form-group">
						<label>Message</label>
						<input type="text" class="form-control" name="msg" style="width:20em;" value="<?php echo @$body; ?>" required pattern="[a-zA-Z0-9 .]+" placeholder="Enter your message"></textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-primary submitBtn" style="width:20em; margin:0;" />
					</div>
				</form>
			</div>
			<?php
			if(!isset($filename)){
				$filename = "author";
			}
			?>
			<div class="qr-field">
				<h2 style="text-align:center">QR Code Result: </h2>
				<center>
					<div class="qrframe" style="border:2px solid black; width:210px; height:210px;">
							<?php echo '<img src="author.png'. @$filename.'.png" style="width:200px; height:200px;"><br>'; ?>
					</div>
					<a class="btn btn-primary submitBtn" style="width:210px; margin:5px 0;" href="download.php?file=<?php echo $filename; ?>.png ">Download QR Code</a>
				</center>
			</div>
			<div class = "dllink" style="text-align:center;margin:-100px 0px 50px 0px;">
				<!-- <h4>Developer: Aparna</h4> -->
			</div>
		</div>
	</body>
	<footer><center><br></center></footer>
</html>