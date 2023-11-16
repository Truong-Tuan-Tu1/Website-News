<?php
    include_once("function.php");
    $idlt = $_GET['idlt'];
    $p =  isset($_GET['p']) ? (int)$_GET['p'] : 1;
    $soTin1Trang = 2;
    $from = ($p - 1) * $soTin1Trang;
    $tongSoTin = mysqli_num_rows(Get_All_Tin_Theo_LoaiTin($idlt));
    // Tính tổng số trang
    $tongSoTrang = ceil($tongSoTin / $soTin1Trang);
    
    $rowTins = Get_Tin_PhanTrang_Theo_LoaiTin($idlt,$from, $soTin1Trang);
?>
    <?php
        while($rowTin = mysqli_Fetch_Assoc($rowTins)){
    ?>
    <div class="row-item row">
        <div class="col-md-3">

            <a href="detail.html">
                <br>
                <img width="200px" height="200px" class="img-responsive" src="img/tintuc/<?php echo $rowTin["Hinh"];?>" alt="">
            </a>
        </div>

        <div class="col-md-9">
            <h3><?php echo $rowTin["TieuDe"];?></h3>
            <p><?php echo $rowTin["TomTat"];?></p>
            <a class="btn btn-primary" href="chitiet.php">Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
        <div class="break"></div>
    </div>
    <?php
        }
    ?>
    
    <!-- Pagination -->
    <div class="row text-center">
        <div class="col-lg-12">
            <ul class="pagination">
                <?php
                    $disabled = $p == 1 ? "class='disabled'" : "";
                ?>
                <li <?php echo $disabled;?>>
                    <a  href="xulyloaitin.php?idlt=<?php echo $idlt;?>&p=1">&laquo;</a>
                </li>
                <li <?php echo $disabled;?>>
                    <a id="prev" <?php echo $disabled;?> href="xulyloaitin.php?idlt=<?php echo $idlt;?>&p=<?php echo $p - 1;?>">&lsaquo;</a>
                </li>
                <!-- Đầu lặp -->
                <?php
                    $offset = 3;
                    $tuTrang = max(1,$p - $offset);
                    $denTrang = min($p + $offset,$tongSoTrang);
                    for($i = $tuTrang; $i <= $denTrang; $i++){
                        $active = $p == $i ? "class='active'" : "";
                ?>
                <li <?php echo $active;?>>
                    <a href="xulyloaitin.php?idlt=<?php echo $idlt;?>&p=<?php echo $i;?>"><?php echo $i;?></a>
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