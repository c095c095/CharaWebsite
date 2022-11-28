<?php

$u_id = (@$_SESSION['u_id'] != "") ? $_SESSION['u_id'] : 0;

$sql = "SELECT * FROM user WHERE u_id ='$u_id'";
$sql_forum = "SELECT * FROM forum WHERE u_id='$u_id' ORDER BY forum_created DESC";

if(@$_SESSION['u_id'] != "" && num($sql) == 1) {
    if($_POST) {
        ?>
        <div class="text-center fs-1 py-5" style="min-height: 60vh;">
            <div class="d-flex justify-content-center">
                <div class="spinner-border text-muted" role="status"></div>
            </div>
            <p class="text-muted">กำลังโหลด</p>
        </div>
        <?php
        function a($u_fname, $u_lname, $u_email) {
            global $u_id;

            $u_id = real($u_id);
            $u_fname = real($u_fname);
            $u_lname = real($u_lname);
            $u_email = real($u_email);

            $sql = "UPDATE user SET u_fname='$u_fname', u_lname='$u_lname', u_email='$u_email' WHERE u_id='$u_id' LIMIT 1";

            if(qry($sql)) {
                return true;
            }

            return false;
        }

        if(a($_POST['u_fname'], $_POST['u_lname'], $_POST['u_email'])) {
            $sql_f = "SELECT * FROM user WHERE u_id ='$u_id'";
            $data_f = fec($sql_f);
            $_SESSION['u_name'] = $data_f[0]['u_fname']." ".$data_f[0]['u_lname'];
            alert("แก้ไขโปรไฟล์สำเร็จ!");
            reload();
        } else {
            alert("เกิดข้อผิดพลาด!");
            reload();
        }
    }

    $data = fec($sql);
?>
    <div class="container py-5">
        <div class="line">
            <span class="text">โปรไฟล์</span>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 my-3">
                <div class="card py-4">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row my-3 my-lg-4">
                                <div class="col-12 col-lg-2 my-auto">
                                    <p class="fs-3">ชื่อเต็ม</p>
                                </div>
                                <div class="col-12 col-lg-10 my-auto">
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <input type="text" name="u_fname" id="u_fname" value="<?= $data[0]['u_fname'] ?>" placeholder="ชื่อจริง*" class="form-control fs-4" maxlength="255" required>
                                        </div>
                                        <div class="col-12 col-lg-6 mt-3 mt-lg-0">
                                            <input type="text" name="u_lname" id="u_lname" value="<?= $data[0]['u_lname'] ?>" placeholder="นามสกุล*" class="form-control fs-4" maxlength="255" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-3 my-lg-4">
                                <div class="col-12 col-lg-2 my-auto">
                                    <p class="fs-3">เบอร์โทรศัพท์</p>
                                </div>
                                <div class="col-12 col-lg-10 my-auto">
                                    <input type="tel" name="u_tel" id="u_tel" value="<?= $data[0]['u_tel'] ?>" placeholder="เบอร์โทรศัพท์*" class="form-control fs-4" maxlength="10" disabled >
                                </div>
                            </div>
                            <div class="row my-3 my-lg-4">
                                <div class="col-12 col-lg-2 my-auto">
                                    <p class="fs-3">อีเมล</p>
                                </div>
                                <div class="col-12 col-lg-10 my-auto">
                                    <input type="email" name="u_email" id="u_email" value="<?= $data[0]['u_email'] ?>" placeholder="อีเมล*" class="form-control fs-4" maxlength="255" required>
                                    <?php
                                    if(@$data[0]['u_email'] == "") {
                                        ?>
                                        <span class="text-danger fs-5">*ในการแก้ไขโปรไฟล์ครั้งแรก ท่านจำเป็นต้องกรอกอีเมลด้วย เพื่อความเป็นปลอดภัยบัญชีของท่านเอง</span>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="row mt-3 mt-lg-4 justify-content-center text-center">
                                <div class="col-12 col-lg-10">
                                    <button type="submit" class="btn btn-primary fs-4 px-5">แก้ไขโปรไฟล์</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                if(num($sql_forum) > 0) {
                    ?>
                    <p class="display-3 mt-5" style="line-height: calc(1.525rem + 3vw);">กระดานสนทนาของคุณ</p>
                    <p class="text-dark-80 fs-3 mb-3">กระดานสนทนาทั้งหมดของคุณ</p>
                    <?php
                    foreach (fec($sql_forum) as $key => $value) {
                        $sql_name = "SELECT * FROM user WHERE u_id='".$value['u_id']."'";
                        $data_name = fec($sql_name);

                        $sql_view = "SELECT COUNT(vforum_id) AS c FROM view_forum WHERE forum_id='".$value['forum_id']."'";
                        $data_view = fec($sql_view);

                        $sql_comment = "SELECT COUNT(comf_id) AS c FROM comment_forum WHERE forum_id='".$value['forum_id']."'";
                        $data_comment = fec($sql_comment);
                        ?>
                        <div class="card my-3">
                            <a href="?page=forum&forum_id=<?= $value['forum_id'] ?>" class="stretched-link"></a>
                            <div class="card-body">
                                <div class="row d-none d-lg-flex">
                                    <div class="col-8">
                                        <p class="fs-1"><?= $value['forum_topic'] ?></p>
                                        <p class="fs-3">โดย <span class="text-primary"><?= $data_name[0]['u_fname']." ".$data_name[0]['u_lname'] ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-muted"><?= thai($value['forum_updated'], 2) ?></span></p>
                                    </div>
                                    <div class="col-4 my-auto">
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-6 text-center border-end border-1">
                                                <p class="fs-2 fw-bold" style="line-height: 35px;"><?= number_format($data_view[0]['c']) ?></p>
                                                <p class="fs-2 fw-bold" style="line-height: 35px;">เข้าชม</p>
                                            </div>
                                            <div class="col-6 text-center">
                                                <p class="fs-2 fw-bold" style="line-height: 35px;"><?= number_format($data_comment[0]['c']) ?></p>
                                                <p class="fs-2 fw-bold" style="line-height: 35px;">ความคิดเห็น</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-lg-none">
                                    <div class="col-12">
                                        <p class="fs-1"><?= $value['forum_topic'] ?></p>
                                        <span class="text-muted fs-3"><?= thai($value['forum_updated'], 2) ?></span>
                                        <p class="fs-3">โดย <span class="text-primary"><?= $data_name[0]['u_fname']." ".$data_name[0]['u_lname'] ?></span></p>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-6 text-center border-end border-1">
                                                <p class="fs-2 fw-bold" style="line-height: 35px;"><?= number_format($data_view[0]['c']) ?></p>
                                                <p class="fs-2 fw-bold" style="line-height: 35px;">เข้าชม</p>
                                            </div>
                                            <div class="col-6 text-center">
                                                <p class="fs-2 fw-bold" style="line-height: 35px;"><?= number_format($data_comment[0]['c']) ?></p>
                                                <p class="fs-2 fw-bold" style="line-height: 35px;">ความคิดเห็น</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
<?php
} else {
    ?>
    <div class="text-center fs-1 py-5" style="min-height: 60vh;">
        <div class="d-flex justify-content-center">
            <div class="spinner-border text-muted" role="status"></div>
        </div>
        <p class="text-muted">กำลังโหลด</p>
    </div>
    <?php
    to("?page=home");
}
?>