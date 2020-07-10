<?php

    require "../Model/GetProductInfor.php";
    $nameErr = $pictureErr = $priceErr = $sale_priceErr = $tikiNowErr = $quantityErr = "";
    $checkErr = 1;

    $target_file = "..\FileImage/" . basename($_FILES["picture"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $checkProductID = htmlspecialchars($_POST['id']);
        $imgSrc = htmlspecialchars($_POST['imgSrc']);
        if (empty($_POST["name"])) {
            $nameErr = "Không được bỏ trống tên sản phẩm!";
            $checkErr = 0;
        } else {
            $name = test_input($_POST["name"]);
            require "../Model/checkUniqueName.php";
            if($checkStop == 1 && $checkId != $checkProductID){
                $nameErr = "Tên sản phẩm đã tồn tại!";
                $checkErr = 0;
            }
        }

        if($imageFileType != "") {
           
            $checkErrIMG = 1;
            $checkIMG = getimagesize($_FILES["picture"]["tmp_name"]);
            if($checkIMG !== false) {
            } else {
                $pictureErr = "Chọn một file ảnh đi pro!";
                $checkErr = 0;
            }

            if (file_exists($target_file)) {
                $pictureErr = "Cái này có rồi anh ưi!";
                $checkErr = 0;
            }

            if ($_FILES["picture"]["size"] > 500000) {
                $pictureErr = "Ảnh này to quá, sever không chứa!";
                $checkErr = 0;
            }

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                $pictureErr = "File phải là ảnh mới chịu nha! " . $imageFileType . " Hey";
                $checkErr = 0;
            }

        }else{
            $checkErrIMG = 0;
        }
        

        
        if (empty($_POST["price"])) {
            $priceErr = "Nhập giá sản phẩm bạn êy!";
            $checkErr = 0;
        } else {
            $price = test_input($_POST["price"]);

            if(!is_numeric($price))
            {
                $priceErr = "Gía cả là số nha bạn êy!";
                $checkErr = 0;
            }else if($price<0)
            {
                $priceErr = "Nhập giá cho chuẩn đi bạn êy!";
                $checkErr = 0;
            }
        }

        
        if (!empty($_POST["sale_price"])) {
            $sale_price = test_input($_POST["sale_price"]);
            if(!is_numeric($sale_price))
            {
                $sale_priceErr = "Gía cả là số nha bạn êy!";
                $checkErr = 0;
            }else if($sale_price<0)
            {
                $sale_priceErr = "Nhập giá cho chuẩn đi bạn êy!";
                $checkErr = 0;
            }else if($sale_price>=$price)
            {
                $sale_priceErr = "Bạn có chắc sản phẩm này đang được sale không đó?";
                $checkErr = 0;
            }
        }

        if (empty($_POST["tikiNow"])) {
            $tikiNowErr = "Có hay Không?";
            $checkErr = 0;
        } else {
            $tikiNow = test_input($_POST["tikiNow"]);
        }


        if (empty($_POST["quantity"])) {
            if($_POST["quantity"]=== '0')
            {
                $quantity = 0;
            }else{
                $quantityErr = "Vui lòng nhập số lượng sản phẩm";
                $checkErr = 0;
            }
            
        } else {
            $quantity = test_input($_POST["quantity"]);
            if(!is_numeric($quantity))
            {
                $quantityErr = "Vui lòng nhập số cho trường này";
                $checkErr = 0;
            }else if($quantity<0 || is_int($quantity))
            {
                $quantityErr = "Vui lòng nhập số nguyên dương";
                $checkErr = 0;
            }
        }

        $descriptions = test_input($_POST["descriptions"]);

        if($checkErr == 1){
            require "../Model/UpdateFile.php";
            if($stop == 1){
                require "../Model/UpdatePr.php";
            }
            
        }
    }
   
?>