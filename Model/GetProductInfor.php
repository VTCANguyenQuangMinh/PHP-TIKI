<?php
    session_start();
    if(!isset($_SESSION["user"]))
    {
        header("location: ../index.php");
        exit();
    }
    
    if(isset($_GET['id']))
    {
        $idProduct = htmlspecialchars($_GET['id']);

        require "ConnectToDB.php";
        $sql = "SELECT * FROM products where product_id = ?"; 
        
        $stmt = $conn->stmt_init();
        
        $stmt->prepare($sql);
        
        $stmt->bind_param("i",$idProduct);
        
        $stmt->execute();
        $result = $stmt->get_result();
        if($result)
        {
            $row = $result->fetch_array(MYSQLI_ASSOC);

            $name = htmlspecialchars($row["product_name"]);
            $price = htmlspecialchars($row['price']);
            $sale_price = htmlspecialchars($row['sale_price']);
            $quantity =  htmlspecialchars($row["quantity"]);
            $tikiNow = htmlspecialchars($row["tikiNow"]);
            $descriptions = htmlspecialchars($row["descriptions"]);


            $checkProductID = htmlspecialchars($row["product_id"]);

            $imgSrc = "../FileImage/" . $name . ".jpg";
        }

        $stmt->close();
        $conn->close();
    }
    
    
    
?>