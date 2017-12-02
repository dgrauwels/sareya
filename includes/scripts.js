//Speech
$( "#speech" ).click(function() {
    event.preventDefault();
	$word = $(this).data('word');

	responsiveVoice.speak($word, "Dutch Female");
});

//Soundsettings
$("#soundsettings").submit(function(event){
    event.preventDefault();
	submitSoundForm();
});

function submitSoundForm(){
	var soundsetting = $("#sound").val();
    $.ajax({
        type: "POST",
        url: "./scripts/soundsettings.php",
        data: "soundsetting=" + soundsetting,
        success : function(text){
            if (text == "OFF"){
                soundOff();
            } else if (text == "ON"){
                soundOn();
            }
        }
    });
}

function soundOn(){
	$('input[name=sound]').val('OFF');	
	$('#soundicon').removeClass().addClass('fa fa-fw fa-volume-up');
	$('#soundstatus').val('SOUNDON|');
}

function soundOff(){
	$('input[name=sound]').val('ON');
	$('#soundicon').removeClass().addClass('fa fa-fw fa-volume-off');
	$('#soundstatus').val('SOUNDOFF|');
}

//Game form
$("#game-form").submit(function(event){
    event.preventDefault();
	submitForm();
	$('#game-form').hide();
	$('.game').html('<table class="table"><thead><tr><th class="question">Magische controle...</th></tr></thead></table>');
	$('.game').addClass('loader');
});

function submitForm(){
	var soundstatus = $("#soundstatus").val();
	var answer = $("#answer").val();
	var checkvalue = $("#checkvalue").val();
	var game = $("#game").val();
	
    $.ajax({
        type: "POST",
        url: "./scripts/checkanswer.php",
        data: "soundstatus=" + soundstatus + "&answer=" + answer + "&checkvalue=" + checkvalue + "&game=" + game,
        success : function(text){
     		if (text == "YES"){
                resultYes();
            } else if (text == "NO"){
                resultNo();
            }
        }
    });
}

function resultYes(){
	$('.game').removeClass('loader');
	$('.game').html('<table class="table"><thead><tr><th class="question">Goed zo!</th></tr><tr><td><a href="javascript:history.go(0)" style="margin-top: 60px;" class="btn btn-primary btn-lg"><i class="fa fa-angle-right" aria-hidden="true"></i> volgende</a></td></tr></thead></table>');
}

function resultNo(){
	$('.game').removeClass('loader');
	$('.game .question').html('Helaas...');
	$('.game').html('<table class="table"><thead><tr><th class="question">Helaas...</th></tr><tr><td><a href="javascript:history.go(0)" style="margin-top: 60px;" class="btn btn-primary btn-lg"><i class="fa fa-angle-right" aria-hidden="true"></i> volgende</a></td></tr></thead></table>');
}