<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title></title>
</head>
<body>

<?php
//header("Content-type: text/html; charset:utf-8");
//header("Content-Type: text/html;charset=utf-8");
//error_reporting(E_ALL^E_NOTICE^E_WARNING);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thcpl";

$conn = new mysqli($servername,$username,$password,$dbname);

$sql="SET NAMES 'utf8'";
$conn->query($sql);

$sql ="SELECT * FROM category;";

$cat = array();

$result = $conn->query($sql);// 执行语句
echo "## 分类类别<br><br>";
while($row=$result->fetch_assoc()){
	array_push($cat,$row);
}
foreach($cat as $row){
	echo $row['id'].". [".$row['name']."](#".$row['name'].")<br>";	
}
foreach($cat as $row){
	echo "## ".$row['name']."<br>";
	echo "名称|全称|截稿时间|结果时间|篇幅|官网<br>";
	echo "-|-|-|-|-|-<br>";
	echo "A类期刊| | | | |<br>";
	$sql ="SELECT * FROM message WHERE cat=".$row['id']." and isTrans=1 and isA=1;";
	$result = $conn->query($sql);// 执行语句
	while($i=$result->fetch_assoc()){
		printf("%s|%s|%s|%s|%s|%s<br>",$i['name'],$i['fullname'],$i['deadline'],$i['restime'],$i['page'],$i['site']);
	}

	echo "B类期刊| | | | |<br>";
	$sql ="SELECT * FROM message WHERE cat=".$row['id']." and isTrans=1 and isA=0;";
	$result = $conn->query($sql);// 执行语句
	while($i=$result->fetch_assoc()){
		printf("%s|%s|%s|%s|%s|%s<br>",$i['name'],$i['fullname'],$i['deadline'],$i['restime'],$i['page'],$i['site']);
	}

	echo "A类会议| | | | |<br>";
	$sql ="SELECT * FROM message WHERE cat=".$row['id']." and isTrans=0 and isA=1;";
	$result = $conn->query($sql);// 执行语句
	while($i=$result->fetch_assoc()){
		printf("%s|%s|%s|%s|%s|%s<br>",$i['name'],$i['fullname'],$i['deadline'],$i['restime'],$i['page'],$i['site']);
	}

	echo "B类会议| | | | |<br>";
	$sql ="SELECT * FROM message WHERE cat=".$row['id']." and isTrans=0 and isA=0;";
	$result = $conn->query($sql);// 执行语句
	while($i=$result->fetch_assoc()){
		printf("%s|%s|%s|%s|%s|%s<br>",$i['name'],$i['fullname'],$i['deadline'],$i['restime'],$i['page'],$i['site']);
	}
	
}
//echo "数据库表内容：</br>";
//echo "<table border='1' cellspacing='0'>";
//echo "<tr>";
//	echo "<th>uid </th>";
//	echo "<th>name </th>";
//	echo "<th>pswd </th>";
//	echo "<th>删除 </th>";
//echo "</tr>";

//while($row=$result->fetch_assoc()){
//	echo "<tr>";
//		echo "<td>".$row['uid']."</td>";
//		echo "<td>".$row['name']."</td>";
//		echo "<td>".$row['pswd']."</td>";
//		echo "<form method='post' action='delete.php'>";
//			echo "<td>";
//			echo "<button name='uid' value=".$row['uid'].">删除</button>";
//			echo "</td>";
//		echo "</form>";
//	echo "</tr>";
//}
//	
//	echo "<tr>";
//	echo "<form method='post' action='add.php'>";
//		echo "<td>";
//		echo "<input name='uid' type='number'>";
//		echo "</td>";
//		echo "<td>";
//		echo "<input name='name' type='text'>";
//		echo "</td>";
//		echo "<td>";
//		echo "<input name='pswd' type='text'>";
//		echo "</td>";
//		echo "<td>";
//		echo "<button>插入</button>";
//		echo "</td>";
//	echo "</form>";
//	echo "</tr>";
//echo "</table>";
//


$conn->close();
?>
</body>
</html>
