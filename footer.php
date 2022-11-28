<?php

$sql = "SELECT COUNT(vweb_id) AS c FROM view_web";
$data = fec($sql);

?>
<footer class="text-center text-light">
    <div class="container-fluid bg-primary py-3">
        <a href="?page=home" class="navbar-brand">
            <img src="assets/images/icon.png" style="width: 75px;" alt="icon">
        </a>
        <p class="fs-4 mt-3">สถิติการเข้าชม <?= number_format($data[0]['c']) ?> ครั้ง</p>
        <hr class="my-3">
        <p class="mb-3 fs-3">วิทยาลัยเทคนิคลพบุรี</p>
        <p class="fs-4">Line @phodchara</p>
        <p class="fs-4">เบอร์โทรศัพท์ 0889502125</p>
        <p class="fs-4">ที่อยู่ 323 ตำบลทะเลชุบศร อำเภอเมืองลพบุรี จังหวัดลพบุรี 15000</p>
        <hr class="my-3">
        <p class="display-1 text-danger fw-bold">สำหรับการศึกษาเท่านั้น ห้ามนำไปหาผลประโยชน์เด็ดขาด</p>
        <p class="fs-4 my-1">จัดทำโดย</p>
        <a href="https://www.facebook.com/seoemitv" target="blank" class="fs-1 link-light d-block">นายศรศิววงศ์ สุขเลิศ</a>
        <a href="https://www.facebook.com/supakorn.pea.73" target="blank" class="fs-1 link-light d-block">นายศุภกร สิริเกื้อกูลชัย</a>
        <a href="https://www.facebook.com/profile.php?id=100013337351695" target="blank" class="fs-1 link-light d-block">นายยุทธนา อินยิ้ม</a>
    </div>
</footer>