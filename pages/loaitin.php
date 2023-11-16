<?php 
    include_once("function.php");
    $idlt = $_GET['idlt'];
    $p = isset($_GET['p']) ? (int)$_GET['p'] : 1;
    $soTin1Trang = 2;
    $from = ($p-1) * $soTin1Trang;
    $tongSoTin = mysqli_num_rows(Get_All_Tin_Theo_LoaiTin($idlt));
    $tongSoTrang = ceil($tongSoTin / $soTin1Trang);
    $rowTins = Get_Tin_PhanTrang_Theo_LoaiTin($idlt,$from,$soTin1Trang);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Khoa Pham</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
     <!-- Navigation -->
     <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"> Tin Tức</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Giới thiệu</a>
                    </li>
                    <li>
                        <a href="#">Liên hệ</a>
                    </li>
                </ul>

                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>

                <ul class="nav navbar-nav pull-right">
                    <li>
                        <a href="#">Đăng ký</a>
                    </li>
                    <li>
                        <a href="#">Đăng nhập</a>
                    </li>
                </ul>
            </div>


            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <?php
                include_once("menu.php");
            ?>

    <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>Danh sách tin</b></h4>
                    </div>
                    <!-- Đầu lặp -->
                    <?php 
                        while($rowTin = mysqli_fetch_assoc($rowTins)){
                    ?>
                    <div class="row-item row">
                        <div class="col-md-3">

                            <a href="detail.html">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="image/tintuc/<?php echo $rowTin["Hinh"];?>" alt="">
                            </a>
                        </div>

                        <div class="col-md-9">
                            <h3><?php echo $rowTin["TieuDe"];?></h3>
                            <p><?php echo $rowTin["TomTat"];?></p>
                            <a class="btn btn-primary" href="detail.html">Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>
                    <?php
                        }
                    ?>
                    <!-- Cuối lặp -->
                    <!-- Pagination -->
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <ul class="pagination">
                                <?php 
                                    $disabled = $p == 1 ? "class='disabled'" : "" ;
                                ?>
                                <li <?php echo $disabled; ?>>
                                    <a href="xulyloaitin.php?idlt=<?php echo $idlt;?>&p=1">&laquo;</a>
                                </li>
                                <li <?php echo $disabled; ?>>
                                    <a id="prev" <?php echo $disabled;?> href="xulyloaitin.php?idlt=<?php echo $idlt;?>&p=<?php echo $p - 1;?>">&lsaquo;</a>
                                </li>
                                <!-- Đầu lặp -->
                                <?php
                                    $offset = 3;
                                    $tuTrang = max(1,$p - $offset);
                                    $denTrang =min($p + $offset,$tongSoTrang);
                                    for($i = $tuTrang; $i <= $denTrang; $i++){
                                        $active = $p == $i ? "class='active'" : "";
                                ?>
                                <li <?php echo $active; ?>>
                                    <a href="xulyloaitin.php?idlt=<?php echo $idlt;?>&p=<?php echo $i;?>"><?php echo $i;?>></a>
                                </li>
                                <?php
                                    }
                                ?>
                                <!-- Cuối lặp -->
                                <li>
                                    <a href="xulyloaitin.php?idlt=<?php echo $idlt;?>&p=<?php echo $p + 1;?>">&rsaquo;</a>
                                </li>
                                <li>
                                    <a href="xulyloaitin.php?idlt=<?php echo $idlt;?>&p=<?php echo $tongSoTrang;?>">&raquo;</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
            </div> 

        </div>

    </div>
    <!-- end Page Content -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/my.js"></script>
    <script>
        $(document).ready(function(){
            $("prev").click(function(e){
                if($(this).hasClass('disabled')){
                    e.preventDefault();
                };
            });
        });
    </script>                               
</body>

</html>
