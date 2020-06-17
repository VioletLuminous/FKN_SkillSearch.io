<?php
header('Access-Control-Allow-Origin: *'); //允許所有來源使用
include "sqlConn.php";

$email = $_REQUEST["email"];
$sqlSelect = $_REQUEST["sqlSelect"];

// INSERT INTO `fkgTable` (`Id`, `Email`, `Set1`, `Set2`, `Set3`, `Set4`) VALUES (NULL, '123456789', '123456', '123456', '123456', '')
// UPDATE `fkgTable` SET `Email` = '123456' WHERE `fkgTable`.`Id` = 2;
// echo $sqlSelect;
switch($sqlSelect){
	case 'selectData':
		$sql = "SELECT * FROM fkgTable WHERE Email = '$email'";

		$result = $con->query($sql);

		// if($con->query($sql)) $dataArray = $con->query($sql);
			
		if ($result->num_rows > 0) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) {

		  	$setObj = new stdClass();  //新增一個空類

		  	$setObj->set1 = $row["Set1"];
		  	$setObj->set2 = $row["Set2"];
		  	$setObj->set3 = $row["Set3"];
		  	$setObj->set4 = $row["Set4"];

		  	$setObj = json_encode($setObj);
		    echo $setObj;
		  }
		} else {
		  echo "0 results";
		}
		break;

	case 'createData':

		$set1 = $_REQUEST["set1"];
		$set2 = $_REQUEST["set2"];
		$set3 = $_REQUEST["set3"];
		$set4 = $_REQUEST["set4"];

		$sql = "INSERT INTO fkgTable (Id, Email, Set1, Set2, Set3, Set4) VALUES (NULL, '$email', '$set1', '$set2', '$set3', '$set4')";

		$result = $con->query($sql);
		break;
	case 'updata':

		$set1 = $_REQUEST["set1"];
		$set2 = $_REQUEST["set2"];
		$set3 = $_REQUEST["set3"];
		$set4 = $_REQUEST["set4"];
		$sql = "UPDATE fkgTable SET Set1='$set1', Set2='$set2', Set3='$set3', Set4='$set4' WHERE Email = '$email'";

		$result = $con->query($sql);
		break;
	case 'checkEmailCount':
		$sql = "SELECT * FROM fkgTable WHERE Email = '$email'";

		$result = $con->query($sql);

		echo $result->num_rows;

		break;
}

$con->close();
?>
