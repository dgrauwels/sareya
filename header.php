<?php
/* 2-do-list
- HINT ON/OFF (placeholder) (AJAX!)
- DIFFERENT CALCULUS GAMES (+, -)
- TOGGLE ICONS VS NUMBERS
*/

//Start&refresh logic
$soundfile = file_get_contents("file1.txt");
if (strpos($soundfile, "SOUNDON") !== false){
	$soundstatus = "SOUNDON|";
	$soundvalue = "OFF";
	$soundicon = "fa-volume-up";
} else {
	$soundstatus = "SOUNDOFF|";
	$soundvalue = "ON";
	$soundicon = "fa-volume-off";
}

//Check current URL
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <title>Sareya's magische spelletjes</title>
    <link href="./includes/bootstrap.min.css" rel="stylesheet">
    <link href="./includes/bootflat.min.css" rel="stylesheet">
	<link href="./includes/game.css" rel="stylesheet">
		<script src="http://code.responsivevoice.org/responsivevoice.js"></script>
</head>

<body>

<nav class="navbar navbar-default navbar-expand-md fixed-top">
  <a class="navbar-brand" href="/"><i class="fa fa-magic" aria-hidden="true"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
	<ul class="navbar-nav mr-auto">
	  <li class="nav-item dropdown <?php if (strpos($url,'schrijven') !== false) {echo 'active';} ?>">
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-pencil" aria-hidden="true"></i> Schrijven</a>
		<div class="dropdown-menu">
			<a href="schrijven.php" class="dropdown-item">3 letter woorden <i class="fa fa-angle-right" aria-hidden="true"></i></a>
		</div>
	  </li>
	  <li class="nav-item dropdown <?php if (strpos($url,'rekenen') !== false) {echo 'active';} ?>">
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-calculator" aria-hidden="true"></i> Rekenen</a>
		<div class="dropdown-menu">
			<a href="rekenen.php?game=1&min=1&max=5" class="dropdown-item">Erbijsommen 1 - 5 <i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<a href="rekenen.php?game=1&?min=1&max=10" class="dropdown-item">Erbijsommen 1 - 10 <i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<a href="rekenen.php?game=2&?min=1&max=5" class="dropdown-item">Erafsommen 1 - 5 <i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<a href="rekenen.php?game=2&min=1&max=10" class="dropdown-item">Erafsommen 1 - 10 <i class="fa fa-angle-right" aria-hidden="true"></i></a>
		</div>
	  </li>
	  <li class="nav-item <?php if (strpos($url,'animaties') !== false) {echo 'active';} ?>">
		<a class="nav-link" href="#"><i class="fa fa-th-large" aria-hidden="true"></i> Animaties</a>
	  </li>
	</ul>
  </div>
  <ul class="navbar-nav mr-auto">
	  <li class="nav-item disabled">
		<form role="form" id="soundsettings">
			<input type="hidden" name="sound" id="sound" value="<?php echo $soundvalue; ?>">	
			<button type="submit" class="btn btn-info btn-lg btn-soundsettings">
			<i id="soundicon" class="fa fa-fw <?php echo $soundicon; ?>" aria-hidden="true"></i>
			</button>
		</form>
	  </li>
	</ul>
</nav>