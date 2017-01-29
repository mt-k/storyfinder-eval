<?PHP
require_once('./fragen.php');
?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="data[viewport" content="width=device-width, initial-scale=1">
		<title>Evaluation</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		
	</head>
	<style>
		label {
			font-size: 150%;
			padding-top: 15px;
			padding-bottom: 15px;
		}
		
		input[type="radio"] {
			margin-top: 7px;
			padding-right: 25px;
		}
		
		.btns {
			position: fixed;
			bottom: 0;
			height: 80px;
		}
		
		.btn {
			font-size: 130%;
		}
		
		.question {
			display: none;
		}
		
		.question.active {
			display: block;
		}
	</style>
	<body onload="showQuestion()">
		<div class="container">
			<input type="hidden" id="userid" value="<?PHP echo $_GET['id']; ?>"/>
			<form method="post">
			<?PHP
			for($j = 0;$j < count($questions); $j++){
							
				$q = $questions[$j];
				$q = explode('	', $q);
				$multi = false;
				if(substr($q[0], 0, 1) == '*'){
					$multi = true;
					$q[0] = substr($q[0], 1);
				}
			?>
			<div class="question" data-id="<?PHP echo $j; ?>">
				<h2><small>Frage <?PHP echo $j + 1; ?> von <?PHP echo count($questions); ?></small><br /><?PHP echo $q[0]; ?></h2>
				
				
					<?PHP
					for($i = 1; $i < count($q); $i++){
						if($multi){
						?>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="data[question][<?PHP echo $j; ?>][<?PHP echo $q[$i]; ?>]" value="1">
									<?PHP echo $q[$i] ?>
								</label>
							</div>
						<?PHP
						}else{
						?>
							<div class="radio">
								<label>
									<input type="radio" name="data[question][<?PHP echo $j; ?>]" value="<?PHP echo $q[$i]; ?>">
									<?PHP echo $q[$i] ?>
								</label>
							</div>
						<?PHP
						}
					}
				?>
			</div>
			<?PHP
			}	
			?>
				<div class="btns container">
					<div class="col-sm-4">
						<button class="btn btn-info btn-block" id="btnPrev" onclick="return prevQuestion()">Vorherige Frage</button>
					</div>
					<div class="col-sm-8">
						<button class="btn btn-primary btn-block" id="btnNext" onclick="return nextQuestion()">Nächste Frage</button>
					</div>
					<p />
					<hr />
					<div class="text-center" style="padding-top: 10px">
						Bereits beantwortete Fragen: <span class="done">0</span> / 29
					</div>
				</div>
			</form>
		</div>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script>
			var currentQuestion = 0;
			
			function prevQuestion(e){
				if(currentQuestion != 0)
					currentQuestion--;
				
				showQuestion();
				return false;
			}
			
			function nextQuestion(e){
				if(currentQuestion < 29)
					currentQuestion++;
								
				showQuestion();
				return false;
			}
			
			function showQuestion(){
				var a = $('.question.active').removeClass('active');

				$('.question[data-id="' + currentQuestion + '"]').addClass('active');
				
				if(currentQuestion == 29){
					document.getElementById('btnNext').classList.add('disabled');
				}else{
					document.getElementById('btnNext').classList.remove('disabled');
				}
				
				if(currentQuestion == 0){
					document.getElementById('btnPrev').classList.add('disabled');
				}else{
					document.getElementById('btnPrev').classList.remove('disabled');
				}
				
				$.post('./cmd.php?t=log', {data: '[questions] ' + 'show question ' + currentQuestion, id: $('#userid').val()}, function(err){
					
				});
			}
			
			$('body').delegate('input', 'click', function(){
				var data = $('form').serializeArray();
				$('.done').html(data.length);
				
				var status = 'Selectected ' + $(this).val();
				
				if($(this).attr('type') == 'checkbox'){
					if($(this).filter(':checked').length){
						status = 'Selected ' + $(this).attr('name');
					}else{
						status = 'Unselected ' + $(this).attr('name');
					}
				}
				
				$.post('./cmd.php?t=log', {data: '[questions] ' + currentQuestion + ': ' + status, id: $('#userid').val()}, function(err){
					
				});
				
				$.post('./cmd.php?t=results', {data: JSON.stringify(data), id: $('#userid').val()}, function(err){
					
				});
			});
		</script>
	</body>
</html>