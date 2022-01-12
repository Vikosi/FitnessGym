<?php
require_once ("../conf.php");
$con = pg_connect("host=".Conf::host." dbname=".Conf::db." user=".Conf::user." password=".Conf::pass) or die ("Could not connect to Server\n");

	if(!$con){
		echo "sadasd\n";
	}
	else{
		$train = $_POST['idtrain'] ;
		$trainer = $_POST['idtrainer'];
		$cond_visit = $_POST['idcond_visit'];
		$type_train = $_POST['idtype_train'];
		$nazvanie = $_POST['nazvanie_train'];
		$dts = $_POST['date_time_start'];


		//echo $type_train;
		$query = "INSERT INTO train (idtrain, idtrainer, idcond_visit, idtype_train, nazvanie_train, date_time_start) VALUES ('$train', '$trainer', '$cond_visit', '$type_train','$nazvanie','$dts');";
		$result = pg_query($con, $query);
		header("Location: /view/index.php");
		//echo pg_num_rows($result);


	}
	pg_close($con);



?>
