<html>
	<head>
		<title>Đăng ký thành viên</title>
		<meta charset="utf-8">
	</head>
	<body>
	
		<?php
		
		if (isset($_POST["btn_submit"])) {
  			//lấy thông tin từ các form bằng phương thức POST
  			$username = $_POST["username"];
  			$password = $_POST["pass"];
 			 $name = $_POST["name"];
  			
  			//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
			  if ($username == "" || $password == "" || $name == "" ) {
				   echo "bạn vui lòng nhập đầy đủ thông tin";
  			}else{
  					// Kiểm tra tài khoản đã tồn tại chưa
					$conn = mysqli_connect("localhost", "root", "", "sinhvien2021");
  					$sql="SELECT * from taikhoan where username='$username'";
					$kt=mysqli_query($conn, $sql);

					if(mysqli_num_rows($kt)  > 0){
						echo "Tài khoản đã tồn tại";
					}else{
						//thực hiện việc lưu trữ dữ liệu vào db
	    				$sql = "INSERT INTO taikhoan (username,password,name) VALUES ('$username','$password','$name')";
					    // thực thi câu $sql với biến conn lấy từ file connection.php
   						mysqli_query($conn,$sql);
				   		echo "<p>chúc mừng bạn đã đăng ký thành công</p>";
						   
					}
									    
					
			  }
	}
	?>
	<form action="dangky.php" method="post">
		<fieldset>
		<center>
	<legend>Đăng Ký tài khoản</legend>
	
		<table>
				
			<tr>
				<td>Họ tên:</td>
				<td><input type="text" id="name" name="name"></td>
			</tr>
			<tr>
				<td>Username :</td>
				<td><input type="text" id="username" name="username"></td>
			</tr>
			<tr>
				<td>Password :</td>
				<td><input type="password" id="pass" name="pass"></td>
			</tr>
		
			
			<tr>
				<td colspan="2" align="center"><input type="submit" name="btn_submit" value="Đăng ký"></td>
			
				<td colspan="2" align="center"><a href="dangnhap.php"><input type="button"  value="Đăng nhập"></a></td>
			</tr>

		</table>
		</center>
		</fieldset>
	</form>
	</body>
	</html>