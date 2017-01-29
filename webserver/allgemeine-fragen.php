<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="data[viewport" content="width=device-width, initial-scale=1">
		<title>Evaluation</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		
	</head>	
	<body>
		<?PHP
		if(!empty($_POST['data']) && !empty($_POST['data']['id'])){
			$subid = 0;
			$id = preg_replace('/[^\d]/', '', $_POST['data']['id']);
			
			while(file_exists('./data/'.$id.'-'.$subid)){
				$subid++;
			}
			
			mkdir('./data/'.$id.'-'.$subid);
			$filename = './data/'.$id.'-'.$subid.'/allgemein.json';
			
			file_put_contents($filename, json_encode($_POST['data']));
		?>
			<div class="container text-center">
				<h1>Vielen Dank!</h1>
				<div>Ihre ID lautet: <?PHP echo $id.'-'.$subid; ?></div>
			</div>
		<?PHP	
		}else{
			$id = 0;
			$dh = opendir('./data');
			while($f = readdir($dh)){
				if(preg_match('/^\d+\-\d+$/', $f)){
					$key = floor(str_replace('-', '.', $f)) * 1;
					if($key > $id)
						$id = $key;
				}
			}
			
			$id++;
		?>		
			<div class="container">
					<form method="post">
						<h1>Allgemeine Angaben zur Versuchsperson</h1>
						
						<div class="form-group">
							<label>A1) ID:</label>
							<input type="hidden" name="data[id]" class="form-control" placeholder="ID" value="<?PHP echo $id; ?>"> <?PHP echo $id; ?>
						</div>
						
						<div class="form-group">
							<label>A2) Geburtsjahr</label>
							<input type="text" name="data[year_of_birth]" class="form-control" placeholder="z.B. 1986">
						</div>
						
						<label>A3) Geschlecht</label>
						<div class="form-group">
							<label class="radio-inline">
								<input type="radio" name="data[gender]" id="inlineRadio1" value="M"> männlich
							</label>
							<label class="radio-inline">
								<input type="radio" name="data[gender]" id="inlineRadio2" value="F"> weiblich
							</label>
						</div>
						
						<label>A4) Wohnort</label>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-4">
									<input class="form-control" name="data[zip]" placeholder="PLZ" />
								</div>
								<div class="col-sm-8">
									<input class="form-control" name="data[city]" placeholder="Ort" />
								</div>
							</div>
						</div>
						
						<h1>Ausbildung und Beruf</h1>
						
						<div class="form-group">
							<label>B1) Höchster Schulabschluss</label>
							<input type="text" name="data[school]" class="form-control" placeholder="z.B. Qualifizierter Hauptschulabschluss oder Bachelor of Science">
						</div>
						
						<div class="form-group">
							<label>B2) Berufsabschluss</label>
							<input type="text" name="data[education]" class="form-control" placeholder="z.B. Mechatroniker">
						</div>
						
						<div class="form-group">
							<label>B3) Zur Zeit ausgeübter Beruf</label>
							<input type="text" name="data[job]" class="form-control" placeholder="z.B. Lehrer">
						</div>
						
						<h1>Nutzungsverhalten im Internet</h1>
						
						<label>C1) Wie häufig nutzen Sie das Internet in der Woche?</label>
						<div class="form-group">
							<label class="radio-inline">
								<input type="radio" name="data[webusagetime]" id="inlineRadio1" value="unsteady"> unregelmäßig
							</label>
						</div>
						<div class="form-group">
							<label class="radio-inline">
								<input type="radio" name="data[webusagetime]" id="inlineRadio1" value="1d-2d"> an 1-2 Tagen in der Woche
							</label>
						</div>
						<div class="form-group">
							<label class="radio-inline">
								<input type="radio" name="data[webusagetime]" id="inlineRadio1" value="multi_weekly"> mehrmals wöchentlich
							</label>
						</div>
						<div class="form-group">
							<label class="radio-inline">
								<input type="radio" name="data[webusagetime]" id="inlineRadio1" value="1h-2h"> 1 - 2 Stunden täglich
							</label>
						</div>
						<div class="form-group">
							<label class="radio-inline">
								<input type="radio" name="data[webusagetime]" id="inlineRadio1" value="2h-5h"> 2 - 5 Stunden täglich
							</label>
						</div>
						<div class="form-group">
							<label class="radio-inline">
								<input type="radio" name="data[webusagetime]" id="inlineRadio1" value="5h+"> mehr als 5 Stunden täglich
							</label>
						</div>
						
			
						<label>C2) In welchem Bereich nutzen die das Internet überwiegend?</label>
						<div class="form-group">
							<label class="radio-inline">
								<input type="radio" name="data[webusagearea]" id="inlineRadio1" value="privat"> privat
							</label>
						</div>
						<div class="form-group">
							<label class="radio-inline">
								<input type="radio" name="data[webusagearea]" id="inlineRadio1" value="beruflich"> beruflich
							</label>
						</div>
						<div class="form-group">
							<label class="radio-inline">
								<input type="radio" name="data[webusagearea]" id="inlineRadio1" value="studium"> Studium/Ausbildung
							</label>
						</div>
						
						<div class="form-group">
							<label>C3) Welche 3 Webseiten (ohne Suchmaschinen wie z.B. Google.de oder Bing.de) verwenden Sie am häufigsten?</label>
							<input type="text" name="data[webusagewebsites]" class="form-control" placeholder="z.B. wikipedia.de, tu-darmstadt.de und heise.de">
						</div>
						
						<label>C4) Welche der folgenden Hilfsmittel verwenden Sie bei der Recherche oder beim Lesen von Nachrichten im Internet?</label>
						<div class="form-group">
							<label class="checkbox-inline">
								<input type="checkbox" name="data[webusagetools][bookmarks]" value="1"> Lesezeichen
							</label>
						</div>
						<div class="form-group">
							<label class="checkbox-inline">
								<input type="checkbox" name="data[webusagetools][rss]" value="1"> Feed Reader (RSS, Atom)
							</label>
						</div>
						<div class="form-group">
							<label class="checkbox-inline">
								<input type="checkbox" name="data[webusagetools][notes]" value="1"> Handschriftliche Notizen
							</label>
						</div>
						<div class="form-group">
							<input type="text" name="data[webusagetools][others]" class="form-control" placeholder="Sonstiges">
						</div>
						
						<label>C5) Welches Leseverhalten entspricht am ehesten Ihrem Vorgehen beim Lesen von Artikeln auf Webseiten?</label>
						<div class="form-group">
							<label class="checkbox-inline">
								<input type="radio" name="data[webusagebehaviour]" value="ueberblick"> Ich überfliege den Artikel und lese nur wichtige Abschnitte.
							</label>
						</div>
						<div class="form-group">
							<label class="checkbox-inline">
								<input type="radio" name="data[webusagebehaviour]" value="ueberschrift"> Ich lese nur die Überschrift und Einleitung und suche dann nach wichtigen Begriffen im Text.
							</label>
						</div>
						<div class="form-group">
							<label class="checkbox-inline">
								<input type="radio" name="data[webusagebehaviour]" value="full"> Ich lese den kompletten Artikel der Reihe nach.
							</label>
						</div>
						
						<hr />
						<button type="submit" class="btn btn-block btn-primary">Absenden</button>
						<hr />
						<div class="text-right">
							<small class="text-muted">
							<?PHP echo date('d.m.Y H:i'); ?>
							</small>
						</div>
					</form>
			</div>	
		<?PHP
		}	
		?>	
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>