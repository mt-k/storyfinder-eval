<?PHP
$ip = $_SERVER['REMOTE_ADDR'];
	
if($_GET['t'] == 'log'){
	$fh = fopen('./data/'.$_POST['id'].'/log.txt', 'a');
	fwrite($fh, "\n".date('Y-m-d H:i:s').'	'.$ip.' '.$_POST['data']);
	fclose($fh);	
}else if($_GET['t'] == 'results'){
	file_put_contents('./data/'.$_POST['id'].'/results.json', $_POST['data']);	
}
?>