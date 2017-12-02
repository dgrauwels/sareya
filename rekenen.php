<?php 
if(!empty($_GET["min"]) && !empty($_GET["max"])){
	$min = $_GET["min"];
	$max = $_GET["max"];
} else {
	$min = 1;
	$max = 5;
}

if(!empty($_GET["game"])){
	$game = $_GET["game"];
} else {$game = 1;}

//Images to work with
$icons = ["rammelaar","eend","bal","auto","raket","beer"];
$names = [
    "rammelaar" => "rammelaars",
    "bal" => "ballen",
    "eend" => "eendjes",
    "auto" => "auto's",
    "raket" => "raketten",
    "beer" => "beren"           
];

$rand_icon = array_rand($icons, 1);
$selectedicon = $icons[$rand_icon];
$image = '<img src="images/icons/'.$selectedicon.'.jpg">';

//Game 1 - Erbijsommen
if($game == 1){
	$title = 'Hoeveel '.$names[$selectedicon].' tel je?';
	$number1 = rand($min, $max);
	$number2 = rand($min, $max);
	$total = $number1 + $number2;
}

//Game 2 - Erafsommen
if($game == 2){
	$title = 'Hoeveel '.$names[$selectedicon].' houd je over?';
	$number1 = rand($min, $max);
	$number2 = rand($min, $max);
	if($number2 < $number1){
		list($number2, $number1) = array($number1, $number2);
	}
	$total = $number2 - $number1;
}
?>

<?php include 'header.php'; ?>
<div class="container-fluid">
	<div class="row text-center">
		<div class="col">
		</div>
		<div class="col-8">
				<div class="panel panel-danger">
              <div class="panel-heading">
                <div class="h4">#2 - Rekenen met plaatjes <?php echo $min; ?> tot <?php echo $max; ?> <a href="javascript:history.go(0)" class="btn btn-warning btn-sm float-right btn-refresh"><i class="fa fa-refresh" aria-hidden="true"></i></a></div>
              </div>
              <div class="panel-body game">
					<table class="table">
					  <thead>
						<tr>
						  <th class="question"><?php echo $title; ?></th>
						</tr>
					  </thead>
					  <tbody>
						<tr>
						  <td>
						  <?php
						  if($game == 1){echo str_repeat($image, $number1);}
						  if($game == 2){echo str_repeat($image, $number2);}
						  ?>
						  </td>
						</tr>
						<tr>
						  <td class="symbols">
						  <?php
						  if($game == 1){echo "+";}
						  if($game == 2){echo "-";}
						  ?>						  
						  </td>
						</tr>
						<tr>
						  <td>
						  <?php
						  if($game == 1){echo str_repeat($image, $number2);}
						  if($game == 2){echo str_repeat($image, $number1);}
						  ?>
						  </td>

						</tr>
						<tr>
						  <td class="symbols">= ?</td>
						</tr>
					  </tbody>
					</table>
              </div>
            </div>
		</div>
		<div class="col">
		</div>
	</div>
	<form role="form" id="game-form">
	<div class="row text-center">
		<div class="col"></div>
		<div class="col-2">
			  <div class="form-group">
				<label for="answer" class="h4">Antwoord</label>
				<input type="text" maxlength="2" pattern="\d*" class="form-control form-control-lg text-center" id="answer" name="answer" aria-describedby="answerHelp" required="required">
				<input type="hidden" value="<?php echo $total; ?>" name="checkvalue" id="checkvalue">
				<input type="hidden" name="soundstatus" id="soundstatus" value="<?php echo $soundstatus; ?>">
				<input type="hidden" name="game" id="game" value="1">
			  </div>
		</div>
		<div class="col"></div>
	</div>
	<div class="row text-center">
		<div class="col"></div>
		<div class="col-4">
			  <button type="submit" class="btn btn-primary btn-lg">Controleren</button>
		</div>
		<div class="col"></div>
	</div>
	</form>
	
</div>
<?php include 'footer.php'; ?>