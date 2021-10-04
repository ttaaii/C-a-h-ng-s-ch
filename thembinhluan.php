
<?php
session_start();
if (!isset($_SESSION['username'])) {
    
}
?><?php
    $noidung = $_POST['noidung'];
    $username = $_SESSION['username'];
    $idbook = $_POST['idbook'];
    
    
    echo $noidung.'-'.$username.'-'.$idbook;

    $conn = mysqli_connect("localhost", "root", "", "sinhvien2021");
    $sql = "INSERT INTO binhluan( noidung, username, idbook) VALUES ('$noidung','$username',$idbook)";
    $ketqua = mysqli_query($conn, $sql);
    echo $sql;
    echo "OK";
   
?>