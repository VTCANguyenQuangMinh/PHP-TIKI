<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="View/css_file/cssforLoginForm.css">
<script src="View\JS_file\checkFormLogin.js"></script>
</head>
<body>

<?php include "Controler/checkLoginForm.php";?>
<div id="id01" class="modal">
  
    <div class="modal-content">
    
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <div class="right-content">
          <div id="L1" class="tabcontent">
          	<h2> ĐĂNG NHẬP </h2>
          </div>
          <div id="L2" class="tabcontent">
          	<h2> TẠO TÀI KHOẢN </h2>
          </div>
          <div style="margin-top: 30px;">
          	<img class="img_form" src="https://pipe.tikicdn.com/media/upload/2018/10/12/2a3acb91a35d45e1b4b7c96912a0c84a.png">
          </div>
      </div>
      <div class="left-content">
		<div class="tab">
          <button class="tablinks" onclick="openTab(event, 'Login','L1')" id="defaultOpen">Đăng nhập</button>
          <button class="tablinks" onclick="openTab(event, 'Register', 'L2')" id="regisOpen">Tạo tài khoản</button>
        </div>
        
        <div id="Login" class="tabcontent" >
          <form id="form-login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="row">
                <div class="col-25">
                    <label for="uname">Email/SĐT</label>
                </div>
                <div class="col-75">
                    <input type="text" id="Uname" placeholder="Nhập email hoặc số điện thoại" value="<?php echo $Uname;?>" name="uname" required>
                    <span class="error" id="UnameErr"><?php echo $UnameErr;?></span><br>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="psw">Mật khẩu</label>
                </div>
                <div class="col-75">
                    <input type="password" id="pwd" placeholder="Mật khẩu từ 6 đến 32 ký tự" name="pwd" required>
                    <span class="error" id="pwdErr"><?php echo $passErr;?></span><br>
                </div>
            </div>
            <input type="hidden" name="typeForm" value="login">
            <div class="row" style="margin-top: 30px;">
                <div class="col-25">
                </div>
                <div class="col-75">
                    <?php echo $formErr;?>
                    <button type="submit" class="sub">Đăng nhập</button>
                </div>
            </div>
          </form>
        </div>
        
        <div id="Register" class="tabcontent">
          <form id="form-regis" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="row">
                <div class="col-25">
                    <label for="name">Họ tên</label>
                </div>
                <div class="col-75">
                    <input type="text" id="nameRe" placeholder="Nhập họ tên" name="name" value="<?php echo $name;?>" required>
                    <span class="error" id="nameReErr"><?php echo $nameErr;?></span><br>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="SDT">SĐT</label>
                </div>
                <div class="col-75">
                    <input type="text" id="sdtRe" placeholder="Nhập số điện thoại" name="SDT" value="<?php echo $sdt;?>" required>
                    <span class="error" id="sdtReErr"><?php echo $sdtErr;?></span><br>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="email">Email</label>
                </div>
                <div class="col-75">
                    <input type="email" id="emailRe" placeholder="Nhập email" name="email" value="<?php echo $email;?>" required>
                    <span class="error" id="emailReErr"><?php echo $emailErr;?></span><br>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="pass">Mật khẩu</label>
                </div>
                <div class="col-75">
                    <input type="password" id="passRe" placeholder="Mật khẩu từ 6-32 ký tự" name="pass" required>
                    <span class="error" id="passReErr"><?php echo $passwordErr;?></span><br>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="gender">Giới tính:</label>
                </div>
                <div class="col-75" style="margin-top: 15px;">
                    <input type="radio" name="gender" id="gender" value="nam">Nam
                    <input type="radio" name="gender" id="gender" value="nu">Nữ
                    <span class="error"><?php echo $genderErr;?></span><br>
                </div>
            </div>
            <input type="hidden" name="typeForm" value="regis">

            <div class="row">
                <div class="col-25">
                </div>
                <div class="col-75">
                    <?php echo $formRegisErr;?>
                    <button type="submit" class="sub">Tạo tài khoản</button>
                </div>
            </div>
          </form>
        </div>
         

    </div>
    
  </div>
</div>


<script src="View\JS_file\JSforFormLogin.js"></script>
</body>
</html>