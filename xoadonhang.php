<?php
		session_start();
		$id = $_GET['id'];
		$conn =	mysqli_connect("localhost", "root", "", "sinhvien2021");
		$sql= "DELETE FROM donhang where id=$id ";
		$ketqua = mysqli_query($conn, $sql);
		header("location: admin.php");
		
?>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<?php
?>
</body>
</html>