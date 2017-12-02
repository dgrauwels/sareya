<?php 
/* 2-do-list
- Masking of input field
- Create 4 and 5 letter words examples
-- incl validation
*/

if(!empty($_GET["letters"])){
$letters = $_GET["letters"];
} else {
$letters = 3;
}

$words = ["aap","bal","oog","kat","vis","pen"];

$images = [
    "aap" => "https://thumb1.shutterstock.com/display_pic_with_logo/3092624/684613660/stock-vector-cool-monkey-dancing-in-modern-clothes-vector-flat-cartoon-illustration-chimpanzee-mascot-684613660.jpg",
    "bal" => "https://thumb9.shutterstock.com/display_pic_with_logo/2764027/403010098/stock-vector-ball-children-and-variety-of-children-s-toys-403010098.jpg",
    "oog" => "https://thumb7.shutterstock.com/display_pic_with_logo/4563643/639741787/stock-vector-strong-healthy-white-eye-eyeball-character-vector-flat-cartoon-illustration-icon-design-isolated-639741787.jpg",
    "kat" => "https://thumb9.shutterstock.com/display_pic_with_logo/285580/116983858/stock-vector-cute-striped-kitten-walking-proud-116983858.jpg",
    "vis" => "https://thumb9.shutterstock.com/display_pic_with_logo/3409577/708535312/stock-vector-cute-and-funny-red-yellow-blue-fish-smiling-happily-vector-708535312.jpg",
    "pen" => "https://thumb1.shutterstock.com/display_pic_with_logo/662758/662758,1319467104,6/stock-vector-funny-red-pen-cartoon-writing-87285619.jpg"           
];

$rand_word = array_rand($words, 1);
$selectedword = $words[$rand_word];
$image = '<img src="'.$images[$selectedword].'" style="max-height: 200px;">';
?>

<?php include 'header.php'; ?>
<div class="container-fluid">
	<div class="row text-center">
		<div class="col">
		</div>
		<div class="col-8">
				<div class="panel panel-danger">
              <div class="panel-heading">
                <div class="h4">#1 - Schrijven met <?php echo $letters; ?> letters
                <a href="javascript:history.go(0)" class="btn btn-warning btn-sm float-right btn-refresh"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                <a href="" class="btn btn-warning btn-sm float-right btn-refresh" id="speech" data-word="<?php echo $selectedword; ?>"><i class="fa fa-comment" aria-hidden="true"></i></a>
                </div>
              </div>
              <div class="panel-body game">
					<table class="table">
					  <thead>
						<tr>
						  <th class="question">Wat zie je?</th>
						</tr>
					  </thead>
					  <tbody>
						<tr>
						  <td><?php echo $image; ?></td>
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
				<input type="text" maxlength="3" class="form-control form-control-lg text-center" id="answer" name="answer" aria-describedby="answerHelp" required="required">
				<input type="hidden" value="<?php echo $selectedword; ?>" name="checkvalue" id="checkvalue">
				<input type="hidden" name="soundstatus" id="soundstatus" value="<?php echo $soundstatus; ?>">
				<input type="hidden" name="game" id="game" value="0">
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