<?php
require_once ("../conf.php");
require_once ("../core/model.php");


Class  model_insert extends model{
	public function insert ($train, $trainer, $cond_visit, $type_train, $nazvanie, $dts)
    {	
		$con = pg_connect("host=".Conf::host." dbname=".Conf::db." user=".Conf::user." password=".Conf::pass) or die ("Could not connect to Server\n");

			$query = "INSERT INTO train (idtrain, idtrainer, idcond_visit, idtype_train, nazvanie_train, date_time_start) VALUES ('$train', '$trainer', '$cond_visit', '$type_train','$nazvanie','$dts');";
			$result = pg_query($con, $query);

	}

}
?>
