<?php

if(@$_SESSION['u_id'] != "") {
    session_destroy();
    reload();
}

if($_POST) {
    ?>
    <div class="text-center fs-1 py-5" style="min-height: 60vh;">
        <div class="d-flex justify-content-center">
            <div class="spinner-border text-muted" role="status"></div>
        </div>
        <p class="text-muted">กำลังโหลด</p>
    </div>
    <?php
    function a($u_fname, $u_lname, $u_tel) {
        $u_fname = real($u_fname);
        $u_lname = real($u_lname);
        $u_tel = real($u_tel);
        
        $sql_c = "SELECT * FROM user WHERE u_tel='$u_tel'";

        if(num($sql_c) == 0) {
            $sql = "INSERT INTO user VALUES(NULL, '$u_fname', '$u_lname', '$u_tel', '', 1, CURRENT_TIMESTAMP)";

            if(qry($sql)) {
                return true;
            }
        }

        return false;
    }

    if(a($_POST['u_fname'], $_POST['u_lname'], $_POST['u_tel'])) {
        alert("สร้างบัญชีสำเร็จ! ขอบคุณที่มาเป็นครอบครัวเดียวกันกับเรา");
        to("?page=login");
    } else {
        alert("เกิดข้อผิดพลาด! เบอร์โทรศัพท์นี้ถูกใช้งานแล้ว โปรดใช้หมายเลขอื่นหรือ ทำการเข้าสู่ระบบแทน");
        reload();
    }
}

?>
<div class="container py-5">
    <div class="text-center my-3">
        <p class="display-3">ยินดีต้อนรับสู่ โภชชรา</p>
        <p class="h3">กรอกแบบฟอร์มด้านล่างเพื่อเริ่มต้นการสร้างบัญชีของคุณ <span class="text-primary">ฟรี</span></p>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="" style="width: 28rem;">
            <form action="" method="post">
                <div class="mb-4">
                    <label for="u_fname" class="form-label fs-4">ชื่อจริง</label>
                    <input type="text" name="u_fname" id="u_fname" placeholder="ชื่อจริง*" class="form-control fs-4" maxlength="255" required>
                </div>
                <div class="mb-4">
                    <label for="u_lname" class="form-label fs-4">นามสกุล</label>
                    <input type="text" name="u_lname" id="u_lname" placeholder="นามสกุล*" class="form-control fs-4" maxlength="255" required>
                </div>
                <div class="mb-4">
                    <label for="u_tel" class="form-label fs-4">เบอร์โทรศัพท์</label>
                    <input type="tel" name="u_tel" id="u_tel" placeholder="เบอร์โทรศัพท์*" class="form-control fs-4" maxlength="10" required>
                </div>
                <div class="mb-4">
                    <label for="otp" class="form-label fs-4">OTP</label>
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <input type="text" name="otp" id="otp" placeholder="OTP*" class="form-control fs-4" maxlength="6" required>
                        </div>
                        <div class="col-12 col-lg-4 my-auto">
                            <button type="button" class="btn btn-dark w-100 fs-4 mt-3 mt-lg-0" onclick="document.getElementById('otp').value = getOTP();">ขอ OTP</button>
                        </div>
                    </div>
                </div>
                <div class="mb-4 form-check">
                    <input type="checkbox" name="agree" id="agree" class="form-check-input" required>
                    <label for="agree" class="form-check-label fs-4" style="line-height: 25px;">ข้าพเจ้าได้อ่านและยอมรับ <a href="#">เงื่อนไขการให้บริการ</a> และ <a href="#">ข้อตกลงความเป็นส่วนตัว</a> แล้ว</label>
                </div>
                <button type="submit" class="btn btn-primary fs-4 w-100 mt-4">สร้างบัญชี</button>
                <p class="text-center my-3 fs-5">หรือ</p>
                <a href="?page=login" class="btn btn-outline-secondary fs-4 w-100">เข้าสู่ระบบ</a>
            </form>
        </div>
    </div>
</div>
<script>
    function getOTP() {
        var a = 0;
        while(a > 999999 || a < 100000) {
            a = Math.floor(Math.random()*999999-100000)+100000;
        }
        return a;
    }
</script>