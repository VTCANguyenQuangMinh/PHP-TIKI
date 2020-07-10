<?php
    session_start();
    if(!isset($_SESSION["user"]))
    {
        header("location: ../index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css'
    integrity='sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4'crossorigin= "anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>

    <link rel="stylesheet" href="css_file\cssforeditPr.css">
    <link rel="shotcut icon" href="http://vtc.ac.vn/wp-content/uploads/2018/02/icon-1515340988.png" sizes="192x192">
    <title>Sửa thông tin sản phẩm</title>
</head>


<body>
    <div class="container">
    <h1 style='Text-align: center; margin: 50px 0;'>Chọn sản phẩm muốn chỉnh sửa</h1>
        <?php
            try{
                require "..\Model\ConnectToDB.php";

                $pagerows = 8;
                
                $query = "SELECT COUNT(product_id) FROM products";
                
                $result = $conn->query($query);
                $row = $result->fetch_array(MYSQLI_NUM);
                $record = htmlspecialchars($row[0]);
                
                if($record>$pagerows)
                {
                    $pages = ceil($record/$pagerows);
                    
                }else{
                    $pages = 1;
                }

                if(isset($_GET["s"]) && is_numeric($_GET["s"]))
                {
                    $start = htmlspecialchars($_GET["s"]);
                }else{
                    $start = 0;
                }

                $sql = "SELECT * FROM products LIMIT ?, ?"; 

                $stmt = $conn->stmt_init();
                $stmt->prepare($sql);
                $stmt->bind_param("ii",$start,$pagerows);

                $stmt->execute();
                $result = $stmt->get_result();

                if($result)
                {
                    echo "<div class='tabcontent'>";
                    while($row = $result->fetch_array(MYSQLI_ASSOC))
                    {

                        $Prname = htmlspecialchars($row["product_name"]);
                        $price = htmlspecialchars($row['price']);
                        $sale_price = htmlspecialchars($row['sale_price']);
                        $quantity = htmlspecialchars($row["quantity"]);
                        $descriptions = htmlspecialchars($row["descriptions"]);
                        $tikiNow = htmlspecialchars($row["tikiNow"]);
                        $idProduct = htmlspecialchars($row["product_id"]);

                        $temp = (($price-$sale_price)/$price)*100;
                        $sale_percent = ceil($temp);

                        $price = number_format($price, 3, '.', '.');
                        $sale_price = number_format($sale_price, 3, '.', '.');
                        

                        $img_src = "../FileImage/" . $Prname . ".jpg";
                        echo "<div><a href='UpdateProduct.php?id=".$idProduct."'>";
                        echo "<div class='card'>";
                        echo "<div class='img-product'>";
                        echo "<img class='card-img-top' src='" .$img_src."' alt='Card image'></div>";
                        echo "<div class='card-body'>";
                        echo "<div class='card-title'>";
                        $title = "";
                        if($tikiNow === "yes")
                        {
                            $title .= "<span><img src='../FileImage/TikiNow.jpg' width='35%'></span>";
                        }
                        $title .= "| " . $Prname;
                        echo $title . "</div>";


                        $priceText = "<p class='card-text'>";
                        if($sale_price == 0)
                        {
                            $priceText .= $price . " ₫";
                        }else{
                            $priceText .= $sale_price ." ₫";
                            $priceText .= "<span class='sale-percent'>&nbsp;&nbsp;&nbsp;&nbsp;-" .$sale_percent. "%</span><br>";
                            $priceText .= "<span class='ori-price'>". $price . "₫</span></p>";
                        }

                        echo $priceText;

                        echo "<div class='star'>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i><br>
                                <span style='font-size: 15px; opacity: 0.7;'>(0 nhận xét)</span>
                        </div>";

                        if($quantity == 0)
                        {
                            echo "<br><span style='color:red'>Đã hết hàng</span>";
                        }

                        echo "</div>";
                        echo "<div class = 'infor'>";
                        echo "<div style='font-size: 20px;'>Id: <b>" . $idProduct ."</b></div>";
                        echo "<div>Số lượng sản phẩm: " . $quantity ."</div>";
                        echo "<div>Ghi chú: " . $descriptions . "</div>";
                        echo "</div>";
                        echo "</div>
                    </a></div> ";

                    }
                    echo "</div>";
                    $result->free_result();
                }else{
                    exit;
                }

                if($pages>=1)
                {
                    
                    $current_page = round(($start/$pagerows)+1);
                    $echoString = "<div class='text-right'>";
                    if($current_page > 2)
                    {
                        $echoString .= "<a href='editProduct.php?s=" . ($start-2*$pagerows)."'><button ><</button></a>";
                    }
                    if($current_page > 1)
                    {
                        $echoString .= "<a href='editProduct.php?s=" . ($start-$pagerows)."'><button class='currenBtn1'>". ($current_page-1) ."</button></a>";
                    }
                    
                    $echoString .= "<button class='currenBtn'>" . $current_page . "</button>";
                    if($current_page <$pages)
                    {
                        $echoString .= "<a href='editProduct.php?s=" . ($start+$pagerows)."'><button class='currenBtn1'>". ($current_page+1) ."</button></a>";
                    }
                    if($current_page < $pages-1)
                    {
                        $echoString .= "<a href='editProduct.php?s=" . ($start+2*$pagerows) . "'><button >></button></a>";
                    }
                    $echoString .= "</div>";
                    echo "<nav class='navbar'>". "<a href='admin.php'><button class='goback'>Trở lại</button></a>" . $echoString . "</nav>";
                }

                $conn->close();

            }catch(Exception $e)
            {
                echo "An exception occured. Message: " . $e;
            }
        ?>

        
    </div>
    
</body>
</html>  