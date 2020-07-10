<?php
    session_start();
    if(!isset($_SESSION["user"]))
    {
        header("location: ../index.php");
        exit();
    }

    require "ConnectToDB.php";
    $query = "UPDATE products SET product_name = ?, price = ?, sale_price = ?, quantity = ?, tikiNow = ?, descriptions=? WHERE product_id = ?; ";			                
    $stmt = $conn->prepare($query);
    
    $stmt->bind_param("sddissi", $name, $price, $sale_price, $quantity, $tikiNow, $descriptions,$checkProductID);
    if ($stmt->execute()) {
        $formSuccess = "Cập nhật thông tin sản phẩm thành công!";
        $name = $picture = $price= $password = $sale_price = $tikiNow=$quantity=$checkProductID="";
    } else {
        $formSuccess = "Lỗi cập nhật dữ liệu vào database!";
    }

    $stmt->close();
    $conn->close();
?>