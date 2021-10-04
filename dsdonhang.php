<?php
	session_start();
	$id =$_GET['id'];
	$conn =	mysqli_connect("localhost", "root", "", "sinhvien2021");
	$sql= "SELECT * FROM taikhoan where id=$id ";
	$ketqua = mysqli_query($conn, $sql);
?>

<html>
<title>Trang chủ</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>
<body class="w3-content" style="max-width:1200px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide" ><b><a href="index.php"><img src="logo.jpg" style="width: 50%"> </a> <?php
	
	
	?></b></h3>  
    <a href="dangnhap.php"><h2><i class="fa fa-user">               <?php echo $_SESSION['username'];  ?></i></h2></a>
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
    <a href="#" class="w3-bar-item w3-button">Sách giáo khoa</a>
    <a href="#" class="w3-bar-item w3-button">Sách tiểu thuyết</a>
    <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Sách Việt Nam <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
      <a href="#" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-caret-right w3-margin-right"></i>Sách</a>
      <a href="#" class="w3-bar-item w3-button">Sách nổi bật</a>
      <a href="#" class="w3-bar-item w3-button">Sách hàng tuần</a>
      <a href="#" class="w3-bar-item w3-button">Sách hàng tháng</a>
    </div>
    <p></p>
    
  </div>
  <a href="admin.php" class="w3-bar-item w3-button w3-padding">Quản trị viên</a> 
  <a href="#footer" class="w3-bar-item w3-button w3-padding">Liên lạc</a> 
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('newsletter').style.display='block'">Bản tin</a> 
  <a href="#footer"  class="w3-bar-item w3-button w3-padding">Đặt mua</a>
</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide">LOGO</div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Top header -->
  <header class="w3-container w3-xlarge">
    <p class="w3-left"><a href="index.php"><i class="fa fa-home"></i> </a>Home</p> 
    <p class="w3-right">
      <a href="cart.php"><i class="fa fa-shopping-cart w3-margin-right" ></i></a>
      <i class="fa fa-search"></i>
   
    </p>
  </header>

  <!-- Image header -->
  <div class="w3-display-container w3-container">
  <img src="sach0.jpg" alt="Jeans" style="width:100%" height="300">
    <div class="w3-display-topleft w3-text-white" style="padding:24px 48px">
      <h1 class="w3-jumbo w3-hide-small">Điểm đến mới</h1>
      <h1 class="w3-hide-large w3-hide-medium">Bộ sách 2021</h1>
      <h1 class="w3-hide-small">Bộ sách 2021</h1>
      <p><a href="#jeans" class="w3-button w3-black w3-padding-large w3-large">MUA SẮM NGAY</a></p>
    </div>
  </div>

  <div class="w3-container w3-text-grey" id="jeans">
    
  </div>
  <!-- Product grid -->
  <div class="w3-row w3-grayscale">
   
  </div>
  
  <h1>Danh sách đơn hàng</h1>
    <table border="1">
	
		<tr>	
			<td>Tên khách hàng</td>
			<td>Ngày mua</td>
			<td>Tổng tiền</td>
			<td>Trạng thái</td>
            <td>Xóa</td>

		</tr>
		<?php
			$id =$_GET['id'];
			$conn =	mysqli_connect("localhost", "root", "", "sinhvien2021");
			$sql= "SELECT * FROM donhang where id=$id ";
			$ketqua = mysqli_query($conn, $sql);
			$stt = 1;
			while ($row = mysqli_fetch_array($ketqua)) {
				echo "<tr>";
                echo "<td>".$row['idkhachhang']."</td>";
				echo "<td>".$row['ngaymua']."</td>";
				echo "<td>".$row['tongtien']."</td>";
                echo '	<td><a href=" suadonhang.php?id= '.$row['id'].'">'.$row['trangthai'].'</a></td>';
				echo '<td><a href=" xoadonhang.php?id= '.$row['id'].'">Xóa</a></td>';
				echo "</tr>";
				$stt++;
			}
			
			mysqli_close($conn);
		?>
	</table>
  <br>
  <a href="admin.php"><input type="button" value="Quay lại"></a>
<p></p>
  <!-- Subscribe section -->
  <div class="w3-container w3-black w3-padding-32">
    <h1>Đăng ký</h1>
    <p>Để nhận ưu đãi đặc biệt và đãi ngộ VIP:</p>
    <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail" style="width:100%"></p>
    <button type="button" class="w3-button w3-red w3-margin-bottom">Đăng ký</button>
  </div>
  
  <!-- Footer -->
  <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
    <div class="w3-row-padding">
      <div class="w3-col s4">
        <h4>Contact</h4>
        <p>Questions? Go ahead.</p>
        <form action="/action_page.php" target="_blank">
          <p><input class="w3-input w3-border" type="text" placeholder="Name" name="Name" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Email" name="Email" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Subject" name="Subject" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Message" name="Message" required></p>
          <button type="submit" class="w3-button w3-block w3-black">Send</button>
        </form>
      </div>

      <div class="w3-col s4">
        <h4>About</h4>
        <p><a href="#">About us</a></p>
        <p><a href="#">We're hiring</a></p>
        <p><a href="#">Support</a></p>
        <p><a href="#">Find store</a></p>
        <p><a href="#">Shipment</a></p>
        <p><a href="#">Payment</a></p>
        <p><a href="#">Gift card</a></p>
        <p><a href="#">Return</a></p>
        <p><a href="#">Help</a></p>
      </div>

      <div class="w3-col s4 w3-justify">
        <h4>Store</h4>
        <p><i class="fa fa-fw fa-map-marker"></i> Company Name</p>
        <p><i class="fa fa-fw fa-phone"></i> 0044123123</p>
        <p><i class="fa fa-fw fa-envelope"></i> ex@mail.com</p>
        <h4>We accept</h4>
        <p><i class="fa fa-fw fa-cc-amex"></i> Amex</p>
        <p><i class="fa fa-fw fa-credit-card"></i> Credit Card</p>
        <br>
        <i class="fa fa-facebook-official w3-hover-opacity w3-large"></i>
        <i class="fa fa-instagram w3-hover-opacity w3-large"></i>
        <i class="fa fa-snapchat w3-hover-opacity w3-large"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity w3-large"></i>
        <i class="fa fa-twitter w3-hover-opacity w3-large"></i>
        <i class="fa fa-linkedin w3-hover-opacity w3-large"></i>
      </div>
    </div>
  </footer>

  <div class="w3-black w3-center w3-padding-24">Powered by Anh Tai</div>

  <!-- End page content -->
</div>

<!-- Newsletter Modal -->
<div id="newsletter" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">BẢN TIN</h2>
      <p>Tham gia danh sách gửi thư của chúng tôi để nhận thông tin cập nhật về những người mới đến và những ưu đãi đặc biệt.</p>
      <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail"></p>
      <button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('newsletter').style.display='none'">Subscribe</button>
    </div>
  </div>
</div>

<script>
// Accordion 
function myAccFunc() {
  var x = document.getElementById("demoAcc");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}

// Click on the "Jeans" link on page load to open the accordion for demo purposes
document.getElementById("myBtn").click();


// Open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>

