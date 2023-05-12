<?php
	$toexcelarray = Select("EsquinaRemoto@select * from vwfbws_franquiciaprices");
	$filename = "franquicia.xls";
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=".$filename);
	foreach($toexcelarray as $row) {
		echo implode("\t", array_values($row)) . "\n";
	}

	function Select($select){
		if( strtok($select,'@') == "EsquinaRemoto"){
			$conn = "host=b9180af7d38c.sn.mynetname.net port=5432 dbname=LAESQCERAMICO user=ws password=Xmayor2022";
		}
		$connection = pg_connect ($conn);
		$query = pg_query($connection,strtok('@'));
		$count_row = pg_num_rows($query);
		$result = array();
		for ($i=0;$i<$count_row;$i++)    { $result [$i] = @pg_fetch_array($query,null,PGSQL_NUM); }
		pg_close($connection);
		return $result;
	}
?>
