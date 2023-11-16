<!-- Page Content -->
<div class="container">

<!-- slider -->
<div class="row carousel-holder">
    <div class="col-md-12">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <?php 
                    $conn = Connect();
                    $kq = Get_Slides();
                    while($row = mysqli_fetch_Assoc($kq)){
                        if($row["id"] == 1){
                            $active = "active";
                        }else{
                            $active = "";
                        }
                ?>
                <div class="item active <?php echo $active?>">
                    <img class="slide-image" src="img/slide/<?php echo $row["Hinh"];?>" alt="">
                </div>
                <?php
                    }
                ?>
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>
</div>
<!-- end slide -->

<div class="space20"></div>


<div class="row main-left">
    <?php 
        include_once("menu.php");
    ?>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                <h2 style="margin-top:0px; margin-bottom:0px;"> Tin Tức</h2>
            </div>

            <div class="panel-body">
            <!-- Bắt đầu vòng lặp -->
            <?php
                $kq = Get_All_TheLoai();
                while($row = mysqli_fetch_assoc($kq)){
                    $kq1 = Get_LoaiTin_Theo_TheLoai($row["id"]);
                    $soLoaiTin = mysqli_num_rows($kq1);
                    if($soLoaiTin > 0){
            ?>
            <!-- item -->
            <div class="row-item row">
                <h3>
                    <a href="#"><?php echo $row["Ten"];?></a> 
                    <!-- Đầu vòng lặp -->
                    <?php 
                        while($row = mysqli_fetch_assoc($kq1)){
                    ?>
                    <small><a href="loaitin.php?idlt=<?php echo $row1["id"];?>"><i><?php echo $row1["Ten"]; ?></i></a>/</small>
                    <?php
                        }
                    ?>
                    <!-- Cuối vòng lặp -->

                </h3>
                <?php
                    $row2 = mysqli_fetch_assoc(Get_TinNoiBat_Theo_TheLoai($row["id"]));
                ?>
                <div class="col-md-12 border-right">
                    <div class="col-md-3">
                        <a href="chitiet.html">
                            <img class="img-responsive" src="img/tintuc/<?php echo $row2["Hinh"];?>" alt="">
                        </a>
                    </div>

                        <div class="col-md-9">
                            <h3><?php echo $row2["TieuDe"];?></h3>
                            <p><?php echo $row2["TomTat"];?></p>
                            <a class="btn btn-primary" href="chitiet.php">Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                    </div>
                    
                    <div class="break"></div>
                </div>
                <!-- end item -->
                <!-- Cuối vòng lặp -->
                <?php }}?>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
</div>
<!-- end Page Content -->