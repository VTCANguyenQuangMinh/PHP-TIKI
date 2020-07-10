<?php
    session_start();
    if(!isset($_SESSION["user"]))
    {
        header("location: ../index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shotcut icon" href="http://vtc.ac.vn/wp-content/uploads/2018/02/icon-1515340988.png" sizes="192x192">
<title>Admin-Tiki-Minh</title>
<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css'
    integrity='sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4'crossorigin= "anonymous">

<link rel="stylesheet" href="css_file\cssforAdmin.css">
</head>
<body>

<div class="parallax ctn1" >
	<div class="box-ctn" style="line-height: 630px;  background-color: rgba(0,0,0,0.1);height: 630px;">
        <h1 style="line-height: 630px">CHÀO MỪNG ADMIN</h1>
    </div>
</div>

<div class="Admin_content">
Cho admin (phải đăng nhập):
- Đăng xuất
- Hiển thị danh sách sản phẩm có phân trang
- Thêm, sửa, xoá sản phẩm
</div>

<div class="parallax ctn2">
	<div class="box-ctn">
    <a href="ListProduct.php"><div class="box1-ctn">Xem danh sách sản phẩm</div></a>
    </div>
</div>

<div class="Admin-content-02">
o Admin có thể đăng nhập để vào phần quản trị sản phẩm
o Phần nhập thông tin sản phẩm chỉ cần yêu cầu nhập 1 ảnh cho sản phẩm
tương ứng. Yêu cầu nhập dữ liệu đầy đủ thông tin.
</div>

<div class="parallax ctn3">
	<div class="box-ctn">
        <a href="AddProducts.php"><div class="box2-ctn">Thêm sản phẩm</div></a>
    </div>
    <div class="box-ctn">
        <a href="editProduct.php"><div class="box2-ctn">Sửa thông tin sản phẩm</div></a>
    </div>
    <div class="box-ctn">
        <a href="DeletePr.php"><div class="box2-ctn">Xóa sản phẩm</div></a>
    </div>
</div>

<div class="Admin_content">
Dashboard: dạng như thống kê số người dùng, số sản phẩm, thông tin
server (hosting, ip, path,...)
</div>

<div class="parallax ctn5">	
    <div class="box-ctn" style="font-size: 35px;">
        <div class="box2-ctn" style="left: 43%; width: 300px; color: #151316;text-shadow: 0px 0px 5px white;">Số liệu thống kê</div>
    </div>
</div>

<div class="Admin_content">
- Thiết kế được giao diện hợp lý
- Thiết kế các hàm chức năng hợp lý
- Thực hiện được cơ bản các chức năng với người dùng
- Thực hiện đầy đủ các chức năng của chương trình
</div>

<div class="parallax ctn4">
	<div class="box-ctn" style="height: 630px;">
        <div><button class="box1-ctn" onclick= "document.getElementById('id01').style.display='block'">Đăng xuất</button></div>
    </div>
</div>
<div id="id01" class="modal">
    <div class="modal-content">
        <div class="contain" style="background-color:#f1f1f1">
            <h4 style="text-align:center; margin-top: 40px;">Bạn có chắc muốn đăng xuất?</h4>
            <div style="display: flex; margin: 40px;">
                <div style="width:100%;margin: 15px;"><button style="width:100%" class="btn" type="button" onclick="document.getElementById('id01').style.display='none'">Hủy</button></div>
                <div style="width:100%;margin: 15px;"><a href="../Controler/Logout.php"><button class="btn btn-danger" style="width:100%">Đăng xuất</button></a></div>
            </div>
        </div>
    </div>
</div>
<script>
var modal = document.getElementById('id01');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}
</script>

<div class="Admin_content" style="height: 150px; padding-top: 70px; line-height: 0;">
    - Phân trang dữ liệu, giao diện đẹp
    - Bắt lỗi toàn phần
    - Các chức năng hoạt động tốt không lỗi -
    <div style="padding-top: 25px;">
    - Hế nhô! -
    </div>
</div>


</body>
</html>