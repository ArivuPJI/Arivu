<?php
	// include database connection file
session_start();
include_once("../../../../../conexao.php");

	// delete data from student table..

	
	if (isset($_POST['deleteId'])) {
		
		$deleteId = $_POST['deleteId'];
		// implode function break the array in to string 
		$deleteId = implode(',', $deleteId);
		
		$query  = "DELETE from questoes WHERE id NOT IN ($deleteId)";
		$result = mysqli_query($conexao, $query);

		if ($result === true) {
			echo 1;

			$_SESSION['Teste'] = 1;
		}else{
			echo 0;
		}

	}
	
?>