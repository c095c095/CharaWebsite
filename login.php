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
    function a($u_tel) {
        $u_tel = real($u_tel);
        
        $sql = "SELECT * FROM user WHERE u_tel='$u_tel'";

        if(num($sql) == 1) {
            $data = fec($sql);

            $_SESSION['u_id'] = $data[0]['u_id'];
            $_SESSION['u_name'] = $data[0]['u_fname']." ".$data[0]['u_lname'];
            $_SESSION['u_status'] = $data[0]['u_status'];

            return true;
        }

        return false;
    }

    if(a($_POST['u_tel'])) {
        if($_SESSION['u_status'] == 1) {
            if(@$_SESSION['old_page'] != "") {
                to("?page=back");
            } else {
                to("?page=home");
            }
        } elseif($_SESSION['u_status'] == 2) {
            to("admin/");
        } elseif($_SESSION['u_status'] == 0) {
            session_destroy();
            alert("เกิดข้อผิดพลาด! บัญชีของคุณถูกระงับการใช้งาน");
            reload();
        }
    } else {
        alert("เกิดข้อผิดพลาด! ไม่พบเบอร์โทรศัพท์ของคุณในระบบ โปรดตรวจสอบและลองใหม่อีกครั้ง");
        reload();
    }
}

?>
<div class="container py-5">
    <div class="text-center my-3">
        <p class="display-3">ยินดีต้อนรับกลับ</p>
        <p class="h3">เข้าสู่ระบบได้ง่ายด้วย <span class="text-primary">เบอร์โทรศัพท์</span> และ <span class="text-primary">OTP</span></p>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="" style="width: 28rem;">
            <form action="" method="post">
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
                <button type="submit" class="btn btn-primary fs-4 w-100 mt-4">เข้าสู่ระบบ</button>
                <p class="text-center my-3 fs-5">หรือ</p>
                <a href="?page=register" class="btn btn-outline-secondary fs-4 w-100">สร้างบัญชี</a>
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