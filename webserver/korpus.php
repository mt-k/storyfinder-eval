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
		<div class="container">
			<h1>Evaluationskorpus</h1>
			
			<?PHP
			$pages = json_decode('[{"file":"13","title":"Briefwahlstimmen f\u00fcr FDP erregen Verdacht - Delmenhorster Kurier: Ihr Portal des WESER-KURIER"},{"file":"05","title":"Delmenhorster Kommunalwahl 2016: CDU-Wahlkampfstart: Sicherheit in Zeiten des Terrors"},{"file":"03","title":"Kommunalwahl 2016: Diese Kandidaten wollen ins Delmenhorster Rathaus"},{"file":"26","title":"Delmenhorst zeigt Ratsherrn Volker Wohnig an - Delmenhorster Kurier: Ihr Portal des WESER-KURIER"},{"file":"11","title":"Elefantenrunde in Markthalle - Delmenhorster Kurier: Ihr Portal des WESER-KURIER"},{"file":"01","title":"Neuer Zusammenschluss im Rat: SPD und Piraten bilden Gruppe in Delmenhorster Stadtrat"},{"file":"09","title":"Die Stadt wird bunt bleiben - Delmenhorster Kurier: Ihr Portal des WESER-KURIER"},{"file":"15","title":"Stadt Delmenhorst zeigt Ratsherr Wohnig an \u2013 Vorwurf der \nUrkundenf\u00e4lschung bei Unterschriftenlisten f\u00fcr die Kommunalwahl"},{"file":"10","title":"Kommunalwahl 2016: Wie viel Natur steckt im Wahlkampf? Nabu stellt Umfrage vor"},{"file":"16","title":"Deniz Kurku SPD-Stadtratsfraktion Delmenhorst - \u00dcber mich"},{"file":"24","title":"Wohnig l\u00e4sst Mandat ruhen: Urkundenf\u00e4lschung? Stadt Delmenhorst zeigt Ratsherrn an"},{"file":"04","title":"Delmenhorster ab 60 w\u00e4hlen neuen Seniorenbeirat - WeserReport.de"}]',true);
			?>
			<ul class="list-group">
			<?PHP
			$i = 1;
			foreach($pages as $page){
				echo '<a href="'.$page['file'].'/out.html" class="list-group-item">'.$i.') '.$page['title'].'</a>';
				$i++;
			}
			?>
			</ul>
		</div>	
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>