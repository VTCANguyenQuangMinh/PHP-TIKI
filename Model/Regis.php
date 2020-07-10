<?php
    require "ConnectToDB.php";
    $query = "INSERT INTO users (nameUser, phoneNumber, email, gender, pass) ";
    $query .= "VALUES(?, ?, ?, ?, ?)";			                
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssss", $name, $sdt, $email, $gender, $password);
    if ($stmt->execute()) {	// One record inserted			

    } else { // If it did not run OK.
        $errorstring = "<p class='text-center col-sm-8' style='color:red'>";
        $errorstring .= "System Error<br />You could not be registered due ";
        $errorstring .= "to a system error. We apologize for any inconvenience.</p>"; 
    }
    
    $stmt->close();
    $conn->close();
?>