<?php

$u_id = (@$_SESSION['u_id'] != "") ? $_SESSION['u_id'] : 0;
$info_id = (@$_GET['info_id'] != "") ? $_GET['info_id'] : 0;

$sql = "SELECT * FROM information WhERE info_id='$info_id'";
$sql_random = "SELECT * FROM information WHERE info_id!='$info_id' ORDER BY RAND() LIMIT 3";

if(num($sql) == 1) {
    $data = fec($sql);
    if($data[0]['info_img'] != "") {
        ?>
        <div class="container px-0">
            <img src="upload/information/<?= $data[0]['info_img'] ?>" alt="information image" style="width: 100%;" onerror="this.onerror=null; this.src='assets/images/404_2.png';">
        </div>
        <?php
    }
    ?>
    <div class="container py-5" style="min-height: 50vh;">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <p class="display-5"><?= $data[0]['info_topic'] ?></p>
                <p class="fs-3 text-dark-80"><?= thai($data[0]['info_updated']) ?></p>
                <hr>
                <pre class="fs-18px"><?= $data[0]['info_detail'] ?></pre>
            </div>
        </div>
    </div>
    <?php
    if(num($sql_random) > 0) {
        ?>
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="line" style="margin-top: 5rem;">
                        <span class="text">อ่านเรื่องอื่นๆ</span>
                    </div>
                    <div class="row justify-content-center">
                        <?php
                        foreach (fec($sql_random) as $key => $value) {
                            ?>
                            <div class="col-12 col-md-6 col-lg-4 my-3">
                                <div class="card border-0 h-100 shadow-sm">
                                    <a href="?page=information-detail&info_id=<?= $value['info_id'] ?>" class="stretched-link"></a>
                                    <img src="upload/information/<?= $value['info_img'] ?>" onerror="this.onerror=null; this.src='assets/images/404.png';" alt="information image" style="width: 100%; height: 250px; object-fit: cover; border-top-left-radius: 0.375rem; border-top-right-radius: 0.375rem;">
                                    <div class="card-body">
                                        <p class="h1"><?= $value['info_topic'] ?></p>
                                        <p class="h3 text-muted mb-0"><?= thai($value['info_updated']) ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    $sql_viewinfo = "INSERT INTO view_info VALUES(NULL, '$info_id', '$u_id', CURRENT_TIMESTAMP)";
    qry($sql_viewinfo);
} else {
    ?>
    <div class="text-center fs-1 py-5" style="min-height: 60vh;">
        <p class="text-muted">ไม่พบข่าสารประชาสัมพันธ์ที่คุณต้องการอ่าน</p>
        <a href="?page=home" class="link-primary fs-3">หน้าแรก</a>
    </div>
    <?php
}
?>