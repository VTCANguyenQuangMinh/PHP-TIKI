<?php
    $checkStop = 0;
    require "ConnectToDB.php";
    $sql = "SELECT product_name, product_id from products;";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        if($name === $row["product_name"])
        {
            $checkId = $row["product_id"];
            $checkStop = 1;
        }
    }

    $conn->close();

?>