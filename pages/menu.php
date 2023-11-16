<div class="col-md-3 ">
        <ul class="list-group" id="menu">
            <li href="#" class="list-group-item menu1 active">
                THỂ LOẠI
            </li>

            <!-- Bắt đầu vòng lặp -->
            <?php
                $kq = Get_All_TheLoai();
                while($row = mysqli_fetch_assoc($kq)){
                    $kq1 = Get_LoaiTin_Theo_TheLoai($row["id"]);
                    $soLoaiTin = mysqli_num_rows($kq1);
                    if($soLoaiTin > 0) {
            ?>
            <li href="#" class="list-group-item menu1">
                <?php echo $row["Ten"]; ?>
            </li>
            <ul>
                <!-- Đầu vòng lặp -->
                <?php
                    while($row1 = mysqli_fetch_assoc($kq1)){
                ?>
                <li class="list-group-item">
                    <a href="loaitin.php?idlt=<?php echo $row1["id"];?>"><?php echo $row1["Ten"];?></a>
                </li>
                <!-- Cuối vòng lặp -->
                <?php } ?>
            </ul>
            <?php
                }}
            ?>
            <!-- Kết thúc vòng lặp -->
        </ul>
    </div>