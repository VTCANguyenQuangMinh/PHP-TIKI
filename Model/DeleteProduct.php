<?php
    session_start();
    if(!isset($_SESSION["user"]))
    {
        header("location: ../index.php");
        exit();
    }
    
    if(isset($_GET['id']))
    {
        $id = htmlspecialchars($_GET['id']);

        require "ConnectToDB.php";

        $sql = "DELETE FROM products WHERE product_id= ?"; 
        
        $stmt = $conn->stmt_init();
        
        $stmt->prepare($sql);
        $stmt->bind_param("i",$id);
        
        $stmt->execute();

        $stmt->close();
        $conn->close();

        header("location: ../View/DeletePr.php");
        exit();
    }
?>