<?php

    require "ConnectToDB.php";
    $query = "INSERT INTO products (product_name, price, sale_price, quantity, tikiNow, descriptions) ";
    $query .= "VALUES(?, ?, ?, ?, ?, ?)";			                
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sddiss", $name, $price, $sale_price, $quantity, $tikiNow, $descriptions);
    if ($stmt->execute()) {			
        $formSuccess = "Thêm sản phẩm thành công!";
        $name = $picture = $price= $password = $sale_price = $tikiNow=$quantity="";
    } else {
        $formSuccess = "Lỗi đưa dữ liệu vào database!";
    }

    $stmt->close();
    $conn->close();
?>