<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connect to DB</title>
</head>
<body>
    <?php
        try {
            DEFINE("DB_Host", "localhost");
            DEFINE("DB_User", "root");
            DEFINE("DB_Password", "root");
            DEFINE("DB_Name", "asignment_tiki");
            DEFINE("DB_Port", 3306);

            $conn = new MySqli(DB_Host, DB_User, DB_Password, DB_Name, DB_Port);
            if($conn->connect_error){
                die( "Connected failed: " . $conn->connect_error . "\n");
            }

        }catch(Exception $e)
        {
            echo "Caugth exception: " . $e->message . "\n";
        }
    ?>
</body>
</html>