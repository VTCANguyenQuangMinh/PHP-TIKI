<?php
    session_start();
    if(!isset($_SESSION["user"]))
    {
        header("location: ../index.php");
        exit();
    }
    
?>

<!DOCTYPE HTML>  
<html>
<head>
<link rel="stylesheet" href="css_file\cssforAddPr.css">
<link rel="shotcut icon" href="http://vtc.ac.vn/wp-content/uploads/2018/02/icon-1515340988.png" sizes="192x192">
<title>Update Product</title>
</head>
<body>
<?php require "..\Controler\checkUpdatePr.php";?>
<div class="container">
  <div class="center">
    <h1>SỬA THÔNG TIN SẢN PHẨM</h1>
  </div>
  <br><br>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="needs-validation" enctype="multipart/form-data">  
      <div class="row">
        <div class="col-25">
          <label for="name">Tên sản phẩm:</label>
        </div>
        <div class="col-75">
          <input type="text" name="name" id="name" value="<?php echo $name;?>" placeholder="Nhập tên sản phẩm">
          <span class="error"> <?php echo $nameErr;?></span>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="picture">Ảnh:</label> 
        </div>
        <div class="col-75" style = "display: flex;">
          <div style="width: 70%">
            <img style="height: auto; width: 50%;" src="<?php echo $imgSrc?>">
          </div>
          <div style="width: 30%">
            <input type="file" name="picture" id="picture">
          </div>
          <span class="error"> <?php echo $pictureErr;?></span>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="price">Gía:</label> 
        </div>
        <div class="col-75">
          <input type="text" name="price" id="price" value="<?php echo $price;?>" placeholder="Nhập giá sản phẩm">
          <span class="error"> <?php echo $priceErr;?></span>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="sale_price">Gía ưu đãi:</label> 
        </div>
        <div class="col-75">
          <input type="text" name="sale_price" id="sale_price" value="<?php echo $sale_price;?>" placeholder="Nhập giá được giảm(nếu có)">
          <span class="error"> <?php echo $sale_priceErr;?></span>
        </div>
      </div>

    
      <div class="row">
        <div class="col-25">
          <label for="tikiNow">Hỗ trợ giao nhanh:</label>
        </div>
        <div class="col-75">
          <input type="radio" name="tikiNow" id="tikiNow" <?php if (isset($tikiNow) && $tikiNow=="yes") echo "checked";?> value="yes">Có
          <input type="radio" name="tikiNow" id="tikiNow" <?php if (isset($tikiNow) && $tikiNow=="no") echo "checked";?> value="no">Không
          <span class="error"><br> <?php echo $tikiNowErr;?></span>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="quantity">Số lượng:</label> 
        </div>
        <div class="col-75">
          <input type="number" name="quantity" id="quantity" value="<?php echo $quantity;?>" placeholder="Nhập số lượng sản phẩm">
          <span class="error"> <?php echo $quantityErr;?></span>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="descriptions">Mô tả:</label> 
        </div>
        <div class="col-75">
            <textarea name="descriptions" id="descriptions" value="<?php echo $descriptions;?>" placeholder="Nhập mô tả"></textarea><br>
            <span> <?php echo $formSuccess;?></span>
        </div>
      </div>
      <input type="hidden" name="id" value="<?php echo $checkProductID;?>">
      <input type="hidden" name="imgSrc" value="<?php echo $imgSrc;?>">
    
    
    <input type="submit" name="submit" value="Cập nhật">  
  </form>
  <a href="editProduct.php"><button>Trở về</button></a>
</div>
</body>
</html>