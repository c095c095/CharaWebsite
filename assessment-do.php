<?php

$u_id = (@$_SESSION['u_id'] != "") ? $_SESSION['u_id'] : 0;
$asse_id = (@$_GET['asse_id'] != "") ? $_GET['asse_id'] : 0;

$asse_id = real($asse_id);

$sql = "SELECT * FROM assessment WHERE asse_id='$asse_id' AND asse_status='1'";
$sql_c = "SELECT * FROM asse_answer WHERE asse_id='$asse_id' AND u_id='$u_id'";
$sql_ques = "SELECT * FROM asse_question WHERE asse_id='$asse_id'";

if(num($sql) == 1) {
    if($_POST) {
        ?>
        <div class="text-center fs-1 py-5" style="min-height: 60vh;">
            <div class="d-flex justify-content-center">
                <div class="spinner-border text-muted" role="status"></div>
            </div>
            <p class="text-muted">กำลังโหลด</p>
        </div>
        <?php
        function a($data) {
            global $u_id, $asse_id;

            $s = 0;
            foreach ($data as $ques_id => $ans_detail) {
                $sql = "INSERT INTO asse_answer VALUES(NULL, '$ques_id', '$asse_id', '$u_id', '$ans_detail', CURRENT_TIMESTAMP)";

                if(qry($sql)) {
                    ++$s;
                }
            }

            if($s == count($data)) {
                return true;
            }

            return false;
        }

        if(a($_POST)) {
            alert("ส่งแบบประเมินสำเร็จ ขอขอบคุณที่ทำแบบประเมินของเรา");
            to("?page=assessment");
        } else {
            alert("เกิดข้อผิดพลาด!");
            reload();
        }
    }

    $data = fec($sql);
    ?>
    <div class="container py-5" style="min-height: 60vh;">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <p class="display-5"><?= $data[0]['asse_topic'] ?></p>
                <p class="fs-3 text-dark-80"><?= thai($data[0]['asse_created']) ?></p>
                <hr>
                <?php
                if(@$_SESSION['u_id'] != "") {
                    if(num($sql_c) == 0) {
                        if(num($sql_ques) > 0) {
                            ?>
                            <form action="" method="post">
                                <?php
                                $i = 0;
                                foreach (fec($sql_ques) as $key => $value) {
                                    if($value['ques_type'] == 1) {
                                        ?>
                                        <div class="my-3">
                                            <p class="fs-2"><?= ++$i ?>. <?= $value['ques_topic'] ?><span class="text-danger">*</span></p>
                                            <div class="ms-4">
                                                <div class="form-check">
                                                    <input type="radio" name="<?= $value['ques_id'] ?>" id="<?= $value['ques_id'] ?>_5" value="5" class="form-check-input" required>
                                                    <label for="<?= $value['ques_id'] ?>_5" class="form-check-label fs-4 d-block" style="line-height: 23px;">ดีมาก</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="<?= $value['ques_id'] ?>" id="<?= $value['ques_id'] ?>_4" value="4" class="form-check-input" required>
                                                    <label for="<?= $value['ques_id'] ?>_4" class="form-check-label fs-4 d-block" style="line-height: 23px;">ดี</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="<?= $value['ques_id'] ?>" id="<?= $value['ques_id'] ?>_3" value="3" class="form-check-input" required>
                                                    <label for="<?= $value['ques_id'] ?>_3" class="form-check-label fs-4 d-block" style="line-height: 23px;">ปานกลาง</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="<?= $value['ques_id'] ?>" id="<?= $value['ques_id'] ?>_2" value="2" class="form-check-input" required>
                                                    <label for="<?= $value['ques_id'] ?>_2" class="form-check-label fs-4 d-block" style="line-height: 23px;">พอใช้</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="<?= $value['ques_id'] ?>" id="<?= $value['ques_id'] ?>_1" value="1" class="form-check-input" required>
                                                    <label for="<?= $value['ques_id'] ?>_1" class="form-check-label fs-4 d-block" style="line-height: 23px;">ปรับปรุง</label>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    } elseif($value['ques_type'] == 2) {
                                        ?>
                                        <div class="my-3">
                                            <p class="fs-2"><?= ++$i ?>. <?= $value['ques_topic'] ?><span class="text-danger">*</span></p>
                                            <div class="ms-4">
                                                <div class="form-check">
                                                    <input type="radio" name="<?= $value['ques_id'] ?>" id="<?= $value['ques_id'] ?>_yes" value="yes" class="form-check-input" required>
                                                    <label for="<?= $value['ques_id'] ?>_yes" class="form-check-label fs-4 d-block" style="line-height: 23px;">ใช่</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="<?= $value['ques_id'] ?>" id="<?= $value['ques_id'] ?>_no" value="no" class="form-check-input" required>
                                                    <label for="<?= $value['ques_id'] ?>_no" class="form-check-label fs-4 d-block" style="line-height: 23px;">ไม่ใช่</label>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    } elseif($value['ques_type'] == 3) {
                                        ?>
                                        <div class="my-3">
                                            <p class="fs-2"><?= ++$i ?>. <?= $value['ques_topic'] ?><span class="text-danger">*</span></p>
                                            <div class="ms-4">
                                                <textarea name="<?= $value['ques_id'] ?>" id="<?= $value['ques_id'] ?>" cols="30" rows="5" placeholder="หากไม่ต้องการกรอกข้อมูลช่องนี้ให้ใส่ - แทน" class="form-control fs-4" required></textarea>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                                <button type="submit" class="btn btn-primary fs-4 w-100">ส่งแบบประเมิน</button>
                            </form>
                            <?php
                        } else {
                            ?>
                            <div class="text-center fs-1 py-5" style="min-height: 60vh;">
                                <p class="text-muted">แบบประเมินนี้ ยังไม่พร้อมใช้งาน</p>
                                <a href="?page=home" class="link-primary fs-3">หน้าแรก</a>
                            </div>
                            <?php
                        }   
                    } else {
                        ?>
                        <div class="text-center fs-1 py-5" style="min-height: 60vh;">
                            <p class="text-muted">คุณทำแบบประเมินนี้ไปแล้ว</p>
                            <a href="?page=home" class="link-primary fs-3">หน้าแรก</a>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <div class="text-center fs-1 py-5" style="min-height: 60vh;">
                        <p class="text-muted">โปรดเข้าสู่ระบบก่อนทำแบบประเมิน</p>
                        <a href="?page=go-to&go_page=<?= urlencode("?page=login") ?>&old_page=<?= urlencode($_SERVER['QUERY_STRING']) ?>" class="link-primary fs-3">เข้าสู่ระบบ</a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    $sql_viewasse = "INSERT INTO view_asse VALUES(NULL, '$asse_id', '$u_id', CURRENT_TIMESTAMP)";
    qry($sql_viewasse);
} else {
    ?>
    <div class="text-center fs-1 py-5" style="min-height: 60vh;">
        <p class="text-muted">ไม่พบแบบประเมินที่คุณต้องการทำ</p>
        <a href="?page=home" class="link-primary fs-3">หน้าแรก</a>
    </div>
    <?php
}
?>
