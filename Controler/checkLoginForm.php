<?php
    session_start();
    $formErr = $formRegisErr = "";
    $checkErr = $checkRegisErr = 1;
    $Uname = $pass = "";
    $UnameErr = $passErr = "";
    $name = $sdt = $email = $password = $gender = "";
    $nameErr = $sdtErr = $emailErr = $passwordErr = $genderErr = "";

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["typeForm"]=="login") {
    
        
        $Uname = test_input($_POST["uname"]);
        $pass = test_input($_POST["pwd"]);
        if(is_numeric($Uname))
        {
            require "Model\LoginSDT.php";
        }else{
            require "Model\Login.php";
        }


        if($pos == 1)
        {
            header("location: View\admin.php");
            exit();
        }
    
    }

    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["typeForm"]=="regis") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
            $checkRegisErr = 0;
          } else {
            $name = test_input($_POST["name"]);
        }

        if (empty($_POST["SDT"])) {
            $stdErr = "Vui lòng điền số điện thoại";
            $checkRegisErr = 0;
        } else {
            $sdt = test_input($_POST["SDT"]);
            
            require "Model\ConnectToDB.php";

            $sql = "SELECT phoneNumber from users;";

            $result = $conn->query($sql);
            
            if($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc()) {
                    if($sdt === $row["phoneNumber"])
                    {
                        $sdtErr = "Số điện thoại đã được đăng ký!";
                        $checkRegisErr = 0;
                    }
                }
            }
            $conn->close();
        }


        if (empty($_POST["email"])) {
            $emailErr = "Vui lòng điền email!";
            $checkRegisErr = 0;
          } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailRegisErr = "Email không đúng định dạng!";
              $checkErr = 0;
            }else{
              require "Model\ConnectToDB.php";
      
              $sql = "SELECT email from users;";
      
              $result = $conn->query($sql);
              
              if($result->num_rows > 0)
              {
                while($row = $result->fetch_assoc()) {
                  if($email === $row["email"])
                  {
                    $emailErr = "Email đã được đăng ký!";
                    $checkRegisErr = 0;
                  }
                }
              }
              $conn->close();
            }
        }


        if (empty($_POST["pass"])) {
            $passwordErr = "Vui lòng điền password!";
            $checkRegisErr = 0;
        } else {
            $password = test_input($_POST["pass"]);
            if (strlen($password)<6 || strlen($password)>32) {
              $passwordErr = "Mật khẩu từ 6-21 ký tự!";
              $checkRegisErr = 0;
            }
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Vui lòng chọn giới tính!";
            $checkRegisErr = 0;
        }else{
            $gender = $_POST["gender"];
        }


        if($checkRegisErr == 1)
        {
            require "Model\Regis.php";
        }
    }


    
    echo "<script>";
    echo "function showForm(){";
        
    if($checkErr == 0)
    {
        echo "document.getElementById('btn-account').click();";
    }
    
    if($checkRegisErr == 0)
    {
        echo "document.getElementById('btn-account').click();";
        echo "document.getElementById('regisOpen').click();";
    }

    if(isset($_SESSION['user']))
    {
        echo "document.getElementById('log').innerHTML = 'Xin chào';";
        echo "document.getElementById('in').innerHTML = " . "'". $_SESSION['user']."'".";";
    }
    echo "}";
    echo "</script>";
?>