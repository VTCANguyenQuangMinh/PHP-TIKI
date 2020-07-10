<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shotcut icon" href="http://vtc.ac.vn/wp-content/uploads/2018/02/icon-1515340988.png" sizes="192x192">

    <link rel="stylesheet" href="View/css_file/cssforFooter.css">
    <link rel="stylesheet" href="View/css_file/cssforBoder.css">
    <title>Tiki-Minh</title>
</head>
<body onload="showForm()">
    <?php include "View/header.php";?>
    <div class="background-boder">
        <div class="boder">
            <div class="left-ctn">
                <div class="Top-left">
                    <h5>DANH MỤC SẢN PHẨM</h5>
                    <div><b>Đồ chơi - Mẹ & Bé</b></div>
                    <div class="Top-left-ctn">
                        <div>Tã, bỉm (1610)</div>
                        <div>Dinh dưỡng cho bé</div>
                        <div>Dinh dưỡng cho mẹ</div>
                        <div>Dinh dưỡng cho người lớn</div>
                        <div>Đồ dùng cho bé</div>
                        <div>Thời trang cho mẹ và bé</div>
                        <div>Đồ chơi</div>
                        <div>Chăm sóc mẹ mang thai</div>
                        <div>Chuẩn bị mang thai</div>
                    </div>
                    <hr>
                    <div class="mid-left">
                        <div>SẢN PHẨM ĐƯỢC GIAO TỪ</div>
                        <p>Trong nước (45290)<br>
                        Nước ngoài (2752)</p>
                    </div> 
                    <hr>
                    <div class="mid-left">
                        <div>CÔNG TY PHÁT HÀNH</div>
                        <p>Nhà xuất bản dân trí (1)<br>
                        Phụ nữ (1)</p>
                    </div> 
                    <hr>
                </div>
            </div>
            <div class="right-ctn">
                <div class="Big-img">
                    <img src="https://salt.tikicdn.com/cache/w885/ts/banner/4c/61/2e/bfad5b0f9c9373efbb8426e4cadaee6f.jpg">
                </div>
                <div class="smal-img">
                    <div><img src="https://salt.tikicdn.com/ts/categoryblock/6e/d3/ae/036c784acf3bc75875dcae77df51e72a.png"></div>
                    <div><img src="https://salt.tikicdn.com/ts/categoryblock/97/55/b1/6677920b4db43cc03ebde7564bd61643.png"></div>
                    <div><img src="https://salt.tikicdn.com/ts/categoryblock/3d/84/27/4887002626630f072bc24be388b3e504.png"></div>
                    <div><img src="https://salt.tikicdn.com/ts/categoryblock/bf/8d/f0/c7087c4146ddb704c87c4d57af6fb351.png"></div>
                    <div><img src="https://salt.tikicdn.com/ts/categoryblock/c0/00/e8/7698a4dfdd856cf102eb9935c495ecf9.png"></div>
                    <div><img src="https://salt.tikicdn.com/ts/categoryblock/d1/1f/a3/369978beeca0a8633ce8aa30e7670ad9.png"></div>
                    <div><img src="https://salt.tikicdn.com/ts/categoryblock/09/e7/3c/0e9cdc347a4f14b8ffc4c7fd22d5a272.png"></div>
                    <div><img src="https://salt.tikicdn.com/ts/categoryblock/cb/b4/b6/1643e061f22b807f41f4ee6d2bd2934d.png"></div>

                </div>
                <?php
                    try{
                        
                        $filepath = realpath(dirname(__FILE__));
                        include ($filepath.'/Model/ConnectToDB.php');
                        
                        $pagerows = 16;
                        
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

                        $sql = "SELECT product_name, price, sale_price, quantity,descriptions,tikiNow  FROM products LIMIT ?, ?"; 
                        
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

                                $temp = (($price-$sale_price)/$price)*100;
                                $sale_percent = ceil($temp);

                                $price = number_format($price, 3, '.', '.');
                                $sale_price = number_format($sale_price, 3, '.', '.');
                                

                                $img_src = "FileImage/" . $Prname . ".jpg";
                                $Prname = substr($Prname,  0, 36) . "...";
                                echo "<div><a href='#'>";
                                echo "<div class='card'>";
                                echo "<img class='card-img-top' src='" .$img_src."' alt='Card image'>";
                                echo "<div class='card-title'>";
                                $title = "";
                                if($tikiNow === "yes")
                                {
                                    $title .= "<span><img src='FileImage/TikiNow.jpg' width='35%'></span>";
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
                                $echoString .= "<a href='index.php?s=" . ($start-2*$pagerows)."'><button ><</button></a>";
                            }
                            if($current_page > 1)
                            {
                                $echoString .= "<a href='index.php?s=" . ($start-$pagerows)."'><button class='currenBtn1'>". ($current_page-1) ."</button></a>";
                            }
                            
                            $echoString .= "<button class='currenBtn'>" . $current_page . "</button>";
                            if($current_page <$pages)
                            {
                                $echoString .= "<a href='index.php?s=" . ($start+$pagerows)."'><button class='currenBtn1'>". ($current_page+1) ."</button></a>";
                            }
                            if($current_page < $pages-1)
                            {
                                $echoString .= "<a href='index.php?s=" . ($start+2*$pagerows) . "'><button >></button></a>";
                            }
                            $echoString .= "</div>";
                            echo $echoString;
                        }

                        $conn->close();

                    }catch(Exception $e)
                    {
                        echo "An exception occured. Message: " . $e;
                    }
                ?>
            </div>
        </div>
    </div>
    <?php include "View/footer.php";?>
</body>
</html>