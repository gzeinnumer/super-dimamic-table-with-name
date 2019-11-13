<?php
	require_once 'connection.php';

	$query = "SELECT * FROM demo_view WHERE sektor = 1";

	$result = mysqli_query($connect, $query);
	$array = array();

	while($row = mysqli_fetch_assoc($result)){
		$array[] = $row;
	}

	echo($result) ?
        json_encode(array('kode' =>1,'read_view'=>$array)) :
        json_encode(array('kode' =>2,'read_view' =>'Data tidak ditemukan'));

?>
