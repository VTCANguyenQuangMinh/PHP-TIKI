<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shotcut icon" href="http://vtc.ac.vn/wp-content/uploads/2018/02/icon-1515340988.png" sizes="192x192">
    <title>Tiki-Minh</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="View/css_file/cssforHeader.css">
</head>
<body>
    <header>
        <?php include "View/login_form.php";?>
        <div class="header1">
            <a href="#"><i class="fas fa-parachute-box"></i> Trợ lý tiki</a>
            <a href="#"><i class="fas fa-shopping-bag"></i> Ưu đãi đối tác</a>
            <a href="#"><i class="fas fa-hotel"></i> Đặt khách sạn</a>
            <a href="#"><i class="fas fa-plane"></i> Đặt vé máy bay</a>
            <a href="#"><i class="fas fa-bolt"></i> Săn hàng tồn</a>
            <a href="#"><i class="fas fa-fire"></i> Khuyến Mãi HOT</a>
            <a href="#"><i class="fas fa-globe"></i> Hàng quốc tế</a>
            <a href="#"><i class="fas fa-comments-dollar"></i> Bán hàng cùng Tiki</a>
        </div>
        <div class="header2">
            <div><img src="FileImage\VTCA_White_Logo.png" alt="VTCA_White_Logo" width="200px"></div>
            <div class="find">
                <input type="text" placeholder="Tìm sản phẩm, danh mục hay thương hiệu bạn mong muốn...">
                <button>
                    <i class="fas fa-search"></i>
                    Tìm kiếm
                </button>
            </div>
            <div class="UserStyle">
                <a href="#" title="Theo dõi đơn hàng">
                    <i class="fas fa-truck"></i>
                    <span>Theo dõi</span><br>
                    <span>đơn hàng</span>
                </a>

                <a href="#" title="Thông báo của tôi">
                    <i class="fas fa-bell"></i>
                    <span>Thông báo</span><br>
                    <span>của tôi</span>
                </a>

                <button id="btn-account" onclick="document.getElementById('id01').style.display='block'">
                    <i class="fas fa-user"></i>
                    <span id="log">Đăng nhập</span><br>
                    <span id="in">tài khoản</span>
                </button>

                <a href="#" class="cart" title="Giỏ hàng">
                    <div>
                        <i class="fas fa-shopping-cart"></i>
                        <span>Giỏ hàng</span>
                        <span class="cart-count">0</span>
                    </div>
                </a>

            </div>
        </div>
        <div class="header3">
            <div>
                <i class="fas fa-align-justify"></i>
                <span>DANH MỤC SẢN PHẨM</span>
            </div>
            <div>
                <i class="check-map"></i>
                <span>Bạn muốn giao hàng tới đâu?</span>
            </div>
            <div>
                <i class="fas fa-angle-down"></i>
                <span>Sản phẩm bạn đã xem</span>
            </div>
            <div style="line-height: 90%">
                <i class="Tiki-now"></i>
                <span style="padding: 10px 0 0 80px;">TikiNOW giao nhanh</span><br>
                <span style="padding: 10px 0 0 80px;">Hàng trăm nghìn sản phẩm</span>
            </div>
            <div style="line-height: 90%">
                <i class="thuongHieu"></i>
                <span style="padding: 10px 0 0 40px;">Tất cả sản phẩm</span><br>
                <span style="padding: 10px 0 0 40px;">100% chính hiệu</span>
            </div>
            <div>
                <i class="doiTra"></i>
                <span style="padding-left: 40px;">30 ngày đổi trả</span>
            </div>

            
        </div>
    </header>

</body>
</html>