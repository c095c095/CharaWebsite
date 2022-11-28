<?php

$sql_info = "SELECT * FROM information ORDER BY info_created DESC LIMIT 3";

?>
<div class="container-fluid py-5" style="background-image: url(assets/images/shape.png); background-position-x: center; background-position-y: bottom; background-repeat: no-repeat;">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
            <p class="fw-bold text-center text-light mb-3" style="font-size: calc(1.9rem + 4vw); line-height: calc(1.9rem + 4vw);">ทำเรื่องอาหาร ให้เป็นเรื่องง่ายๆ สำหรับผู้สูงอายุ</p>
        </div>
    </div>
    <p class="text-center text-light h1 fst-italic">เราทำอาหารที่เหมาะสมกับสุขภาพของคุณมากที่สุด</p>
    <div class="text-center mt-5">
        <a href="#plan" class="btn btn-light fs-4 px-4">ดูเพิ่มเติม</a>
    </div>
</div>
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <p class="text-center display-3">ทำไมต้องโภชชรา ?</p>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 my-3">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-9">
                                    <p class="h1">ใช้วัตถุดิบ สดใหม่จากฟาร์ม</p>
                                    <p class="h3 text-muted">ใช้วัตถุดิบสดใหม่ และมีคุณภาพจากฟาร์มของเรา</p>
                                </div>
                                <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                    <span class="icon icon-check fs-1 text-primary"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 my-3">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-9">
                                    <p class="h1">จัดส่งอาหาร อย่างรวดเร็ว</p>
                                    <p class="h3 text-muted">เราจัดส่งอาหารอย่างรวดเร็ว ถึงหน้าบ้านคุณในตอนเช้า</p>
                                </div>
                                <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                    <span class="icon icon-check fs-1 text-primary"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 my-3">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-9">
                                    <p class="h1">เป็นสินค้าแบบออแกนิค</p>
                                    <p class="h3 text-muted">สินค้าเป็นสินค้าออแกนิค ทำให้มั่นใจคุณภาพได้</p>
                                </div>
                                <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                    <span class="icon icon-check fs-1 text-primary"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container py-5" id="plan">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <p class="display-3" style="line-height: calc(1.525rem + 3vw);">เซ็ทเมนูอาหาร</p>
            <p class="text-dark-80 fs-3">เซ็ทเมนูอาหารที่หลากหลาย เลือกได้ตามสุขภาพของคุณ</p>
            <div class="row">
                <div class="col-12 col-lg-6 my-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-6 h-100">
                                    <img src="assets/images/set.png" style="width: 100%; height: 250px; object-fit: cover; border-top-left-radius: 0.375rem; border-bottom-left-radius: 0.375rem;" onerror="this.onerror=null; this.src='assets/images/404.png';" alt="photo menu_set">
                                </div>
                                <div class="col-6 h-100">
                                    <p class="display-4 text-primary">Set ทดลอง</p>
                                    <p class="fs-4 text-danger">โปรโมชั่น</p>
                                    <div class="my-3 my-lg-0">
                                        <p class="fs-3">
                                            <span class="icon icon-cutlery fs-5"></span>
                                            18 กล่อง
                                        </p>
                                        <p class="fs-3">
                                            <span class="icon icon-calendar fs-5"></span>
                                            7 วัน    
                                        </p>
                                    </div>
                                    <a href="https://line.me/R/ti/p/@phodchara" target="_blank" class="btn btn-primary fs-4">฿1,200</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 my-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-6 h-100">
                                    <img src="assets/images/set.png" style="width: 100%; height: 250px; object-fit: cover; border-top-left-radius: 0.375rem; border-bottom-left-radius: 0.375rem;" onerror="this.onerror=null; this.src='assets/images/404.png';" alt="photo menu_set">
                                </div>
                                <div class="col-6 h-100">
                                    <p class="display-4 text-primary">Set ลดหวาน</p>
                                    <p class="fs-4 text-danger">โปรโมชั่น</p>
                                    <div class="my-3 my-lg-0">
                                        <p class="fs-3">
                                            <span class="icon icon-cutlery fs-5"></span>
                                            36 กล่อง
                                        </p>
                                        <p class="fs-3">
                                            <span class="icon icon-calendar fs-5"></span>
                                            14 วัน    
                                        </p>
                                    </div>
                                    <a href="https://line.me/R/ti/p/@phodchara" target="_blank" class="btn btn-primary fs-4">฿2,000</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 my-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-6 h-100">
                                    <img src="assets/images/set.png" style="width: 100%; height: 250px; object-fit: cover; border-top-left-radius: 0.375rem; border-bottom-left-radius: 0.375rem;" onerror="this.onerror=null; this.src='assets/images/404.png';" alt="photo menu_set">
                                </div>
                                <div class="col-6 h-100">
                                    <p class="display-4 text-primary">Set ลดมัน</p>
                                    <p class="fs-4 text-danger">โปรโมชั่น</p>
                                    <div class="my-3 my-lg-0">
                                        <p class="fs-3">
                                            <span class="icon icon-cutlery fs-5"></span>
                                            36 กล่อง
                                        </p>
                                        <p class="fs-3">
                                            <span class="icon icon-calendar fs-5"></span>
                                            14 วัน    
                                        </p>
                                    </div>
                                    <a href="https://line.me/R/ti/p/@phodchara" target="_blank" class="btn btn-primary fs-4">฿2,000</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 my-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-6 h-100">
                                    <img src="assets/images/set.png" style="width: 100%; height: 250px; object-fit: cover; border-top-left-radius: 0.375rem; border-bottom-left-radius: 0.375rem;" onerror="this.onerror=null; this.src='assets/images/404.png';" alt="photo menu_set">
                                </div>
                                <div class="col-6 h-100">
                                    <p class="display-4 text-primary">Set ลดเค็ม</p>
                                    <p class="fs-4 text-danger">โปรโมชั่น</p>
                                    <div class="my-3 my-lg-0">
                                        <p class="fs-3">
                                            <span class="icon icon-cutlery fs-5"></span>
                                            36 กล่อง
                                        </p>
                                        <p class="fs-3">
                                            <span class="icon icon-calendar fs-5"></span>
                                            14 วัน    
                                        </p>
                                    </div>
                                    <a href="https://line.me/R/ti/p/@phodchara" target="_blank" class="btn btn-primary fs-4">฿2,000</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container py-lg-5">
    <div class="row">
        <div class="col-12 col-lg-6 my-3">
            <div class="card h-100 border-0 shadow bg-primary text-light">
                <div class="card-body">
                    <p class="h1 fw-bold">กระดานสนทนา</p>
                    <p class="fs-4">พื้นที่พูดคุย สำหรับกลุ่มคนรักอาหารคลีนทุกคน สามารถเข้ามาพูดคุย สอบถาม หรือแชร์ข้อมูลดีแก่กันได้</p>
                    <div class="text-end">
                        <a href="?page=forum-home" class="btn btn-light fs-4">
                            ดูเพิ่มเติม
                            <span class="icon icon-chevron-right fs-6"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 my-3">
            <div class="card h-100 border-0 shadow bg-primary text-light">
                <div class="card-body">
                    <p class="h1 fw-bold">แบบประเมิน</p>
                    <p class="fs-4">แบบประเมินที่คุณสามารถมีส่วนช่วยเราในการปรับปรุงและพัฒนาบริการ รวมถึงเสนอแนะหรือติชมบริการของเรา</p>
                    <div class="text-end">
                        <a href="?page=assessment" class="btn btn-light fs-4">
                            ดูเพิ่มเติม
                            <span class="icon icon-chevron-right fs-6"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if(num($sql_info) > 0) {
    ?>
    <div class="container py-5">
        <div class="line">
            <span class="text">ข่าวสารประชาสัมพันธ์</span>
        </div>
        <div class="row justify-content-center">
            <?php
            foreach (fec($sql_info) as $key => $value) {
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
    <?php
}
?>