<?php

$sql = "SELECT * FROM information ORDER BY info_created DESC";

?>
<div class="container py-5" style="min-height: 60vh;">
    <div class="line">
        <span class="text">ข่าวสารประชาสัมพันธ์</span>
    </div>
    <?php
    if(num($sql) > 0) {
        ?>
        <div class="row justify-content-center">
            <?php
            foreach (fec($sql) as $key => $value) {
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
        <?php
    } else {
        ?>
        <div class="text-center fs-1 py-5" style="min-height: 60vh;">
            <p class="text-muted">ยังไม่มีข่าวสารประชาสัมพันธ์ในขณะนี้</p>
            <a href="?page=home" class="link-primary fs-3">หน้าแรก</a>
        </div>
        <?php
    }
    ?>
</div>