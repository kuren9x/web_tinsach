<?php 
require_once("dao/PostDao.php");
require_once("category.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/fonts/font_awesome/css/all.css">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <title>Xuất bản</title>




</head>

<body>
    <div id="wrapper">
        <div id="header">
            <div class="container justify-content-between">
                <a id="logo" href="">
                    <img src="assets/images/logo1.png" alt="">
                </a>
                <!-- End Logo -->
                 <form method="POST" id="search">
                    <input type="text" name="query" placeholder="Nhập thông tin cần tìm....">
                    <button name="sub"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="container">
                <nav>
                    <ul id="main-menu" class="d-flex">
                        <li><a href="index.php">Trang chủ</a></li>
                          <?php 
                            $list = listCategory();
                            foreach($list as $l){
                                echo '
                                    <li><a href="list.php?id='.$l['id'].'">'.$l['name'].'</a></li>
                                ';
                            }
                            
                        ?>
                        <li><a href="">Sự kiện</a></li>
                        <li><a href="">Liên hệ</a></li>
                        <li><a href="login.php">Đăng nhập</a></li>
                    </ul>
                </nav>
            </div>
        </div>


<div id="wp-featured-post" class="container">
    <div class="box featured-post">
        <div class="box-head">
            <h3>Sách nổi bật</h3>
        </div>
        <div class="box-body">
            <ul class="list-featured-post d-flex justify-content-between">
                <?php 
                    $id = $_GET['id'];
                    $list = getPostByCategoryId($id);
                    if(isset ($_POST['sub'])){
                        $list = search($_POST['query'],$id);
                        if(sizeof($list) == 0){
                            echo '<h3>không có bản ghi nào</h3>';
                        }
                    }
                    foreach($list as $ls){
                        echo '  
                        <li>
                        <a href=" " class="post-thumb">
                            <img style="width:300px;height:200px;" src="'.$ls['image'].'" alt=" ">
                        </a>
                        <a href="chitiet.php?id='.$ls['id'].'" class="post-title">'.$ls['title'].'</a>
                        </li>
                        ';
                    }
                ?>
            </ul>
        </div>
    </div>
</div>

<!-- -- End wp-content -- -->
<div id="wp-content" class="container">
<div id="content">
    <div class="box new-post">
        <div class="box-head">
            <h3>Tin sách mới</h3>
        </div>
        <div class="box-body">
            <ul class="list-post">
                <?php 

                    $post = getTopPost($_GET['id']);
                    foreach($post as $p){
                        echo '
                        <li>
                            <a href="" class="post-thumb">
                                <img style="width:200px;heigt:auto;" src="'.$p['image'].'" alt=" ">
                            </a>
                            <div class="more-info">
                                <a href="chitiet.php?id='.$p['id'].'" class="post-title">'.$p['title'].'</a>
                                <div class="post-published">
                                    <a href="" class="post-author">'.$p['name'].'</a>
                                    <span class="post-date">'.$p['createddate'].'</span>
                                </div>
                                <p class="post-excerpt">
                                    '.$p['description'].'
                                </p>
                            </div>
                        </li>
                        ';
                    }
                ?>
            </ul>
        </div>
    </div>
</div>


<!-- ----****/// -->
<div id="sidebar">
<a href="" class="ads">
    <img src="assets/images/ads.png" atl=" ">
</a>
<div class="box top-topic">
    <div class="box-head">
        <h3>Chủ đề quan tâm</h3>
    </div>
    <div class="box-body">
        <ul class="list-topic">
            <li>
                <a href=""> Xuất bản <span class="num-post">20</span></a>
            </li>
            <li>
                <a href=""> Thế giới <span class="num-post">10</span></a>
            </li>
            <li>
                <a href=""> Công nghệ <span class="num-post">15</span></a>
            </li>
            <li>
                <a href=""> Đời sống <span class="num-post">12</span></a>
            </li>
            <li>
                <a href=""> Sức khỏe <span class="num-post">21</span></a>
            </li>
            <li>
                <a href=""> Bóng đá <span class="num-post">25</span></a>
            </li>
        </ul>
    </div>
</div>
</div>
</div> 


   <!-- <----- End featured-post -->
     
   <div id="footer">
    <div class="container">
        <div class="box logo-footer">
            <div class="box-head">
                <h3>MAEL</h3>
            </div>
            <div class="box-body">
                <a href=" ">
                    <img src="assets/images/logo1.png" alt=" ">
                </a>
            </div>
        </div>
        <div class="box about-us">
            <div class="box-head">
                <h3>Về chúng tôi</h3>
            </div>
            <div class="box-body">
                <p>
                    Tạp chí điện tử Tri thức trực tuyến
                    Tổng biên tập: Lưu Phước Nhân
                    Giấy phép bái chí: 54/GP do Bộ Thông tin và Truyền thông cấp ngày 25/05/2022
                    Địa chỉ tòa soạn: 741 Tạ Quang Bữu P4 Q8
                    Điện thoại: 0768-935-5xx.
                    Email: phuocnhanx29@gmail.com
                </p>
                <a href="Facebook.com/Ren.info29">Facebook.com/Ren.info29</a>
            </div>
        </div>
        <div class="box follow-us">
            <div class="box-head">
                <h3>Theo dõi</h3>
            </div>
            <div class="box-body">
                <ul class="list-social d-flex">
                    <li>
                        <a href="https://www.facebook.com/Ren.Info29/"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/Ren.Info29/"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/Ren.Info29/"><i class="fab fa-youtube"></i></a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/Ren.Info29/"><i class="fab fa-pinterest-p"></i></a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>
<!-- End footer -->
 <div id="wp-copyright">
    <div class="container justify-content-between">
        <p class="copyright">@Lưu Phước Nhân</p>
        <ul id="footer-menu" class="d-flex">
            <li><a href="https://www.facebook.com/Ren.Info29/">Liên hệ</a></li>
            <li><a href="">Bảo mật</a></li>
            <li><a href="">Quảng cáo</a></li>
        </ul>
    </div>

</div>
<!-- End copyright -->
</div>

</body>

</html> 