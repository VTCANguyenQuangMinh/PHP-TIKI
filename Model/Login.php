<?php
session_start();
 require "ConnectToDB.php";
    $checkStop = 0;
    $UserName = $pos = "";
    
 $sql = "SELECT email, pass, nameUser, pos from users;";
 $result = $conn->query($sql);
 if($result->num_rows > 0)
 {
   while($row = $result->fetch_assoc()) {
        if($Uname === $row["email"])
        {
            $checkStop = 1;
            
            if($pass !== $row["pass"])
            {
                $passErr = "Mật khẩu không đúng!";
                $checkErr = 0;
            }else{
                $checkStop = 2;
                $UserName = $row["nameUser"];
                $pos = $row["pos"];
            }
            
        }
   }
     
   if($checkStop == 0)
   {
       $UnameErr = "Tài khoản không tồn tại!";
       $checkErr = 0;
   }elseif($checkStop == 2)
   {
    $_SESSION["user"] = $UserName;
   }
     
 }

 $conn->close();
?>