<?php

$u_id = (@$_SESSION['u_id'] != "") ? $_SESSION['u_id'] : 0;
$forum_id = (@$_GET['forum_id'] != "") ? $_GET['forum_id'] : 0;

$sql = "SELECT * FROM forum WHERE forum_id='$forum_id'";
$sql_comment = "SELECT * FROM comment_forum WHERE forum_id='$forum_id'";
$sql_report = "SELECT * FROM forum_report WHERE forum_id='$forum_id' AND u_id='$u_id'";

$report_list = [
    "1" => "สแปม",
    "2" => "ดูหมิ่น/ใส่ร้าย ผู้อื่น",
    "3" => "มีภาพ/เนื้อหาลามก อนาจาร หรือมีภาพที่รุนแรงเกินไป",
    "4" => "ใช้ภาษาที่หยาบคายรุนแรง",
    "5" => "อาจก่อให้เกิดความแตกแยก",
    "6" => "เกี่ยวข้องกับสิ่งผิดกฎหมาย",
    "7" => "มีข้อมูลส่วนบุคคล",
    "8" => "อื่นๆ"
];

if(num($sql) == 1) {
    if(@$_POST['comment']) {
        function a($text) {
            global $u_id, $forum_id;

            $sql = "INSERT INTO comment_forum VALUES(NULL, '$forum_id', '$u_id', '$text', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";

            if(qry($sql)) {
                return true;
            }

            return false;
        }

        if(a($_POST['comment'])) {
            reload();
        } else {
            alert("เกิดข้อผิดพลาด!");
        }
    }

    if(@$_POST['comment_edit']) {
        function b($id ,$text) {
            global $u_id, $forum_id;

            $sql = "UPDATE comment_forum SET comf_detail='$text' WHERE comf_id='$id' AND u_id='$u_id' AND forum_id='$forum_id' LIMIT 1";

            if(qry($sql)) {
                return true;
            }

            return false;
        }

        if(b($_POST['comment_id'], $_POST['comment_edit'])) {
            alert("แก้ไขความคิดเห็นสำเร็จ!");
            reload();
        } else {
            alert("เกิดข้อผิดพลาด!");
        }
    }

    if(@$_POST['comment_delete']) {
        function c($id) {
            global $u_id, $forum_id;

            $sql = "DELETE FROM comment_forum WHERE comf_id='$id' AND forum_id='$forum_id' AND u_id='$u_id' LIMIT 1";

            if(@$_SESSION['u_status'] == 2) {
                $sql = "DELETE FROM comment_forum WHERE comf_id='$id' AND forum_id='$forum_id' LIMIT 1";
            }

            if(qry($sql)) {
                return true;
            }

            return false;
        }

        if(c($_POST['comment_id'])) {
            reload();
        } else {
            alert("เกิดข้อผิดพลาด!");
        }
    }

    if(@$_POST['report_type']) {
        function d($type) {
            global $u_id, $forum_id;

            $sql = "INSERT INTO forum_report VALUES(NULL, '$forum_id', '$u_id', '$type', CURRENT_TIMESTAMP)";

            if(qry($sql)) {
                return true;
            }

            return false;
        }

        if(d($_POST['report_type'])) {
            reload();
        } else {
            alert("เกิดข้อผิดพลาด!");
        }
    }

    $data = fec($sql);

    $sql_forum_name = "SELECT * FROM user WHERE u_id='".$data[0]['u_id']."'";
    $data_forum_name = fec($sql_forum_name);
    ?>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <p class="display-5" style="line-height: calc(1.425rem + 1.5vw);"><?= $data[0]['forum_topic'] ?></p>
                <p class="fs-3" style="line-height: 30px;">โดย <span class="text-primary"><?= $data_forum_name[0]['u_fname']." ".$data_forum_name[0]['u_lname'] ?></span><?php if($data_forum_name[0]['u_status'] == 2){ echo " <span class='badge bg-primary fs-5 py-0 px-2'>ผู้ดูแล</span> "; } ?></p>
                <p class="fs-3 text-dark-80" style="line-height: 30px;"><?= thai($data[0]['forum_updated']) ?></p>
                <?php
                if(num($sql_report) == 0 && @$_SESSION['u_id'] != "") {
                    ?>  
                    <span class="badge bg-warning fs-5 py-1 px-2 cursor" data-bs-toggle="dropdown">รายงาน</span>
                    <ul class="dropdown-menu fs-4">
                        <?php
                        foreach ($report_list as $key => $value) {
                            ?>
                            <li>
                                <form action="" method="post">
                                    <input type="hidden" name="report_type" value="<?= $key ?>">
                                    <button type="submit" class="dropdown-item" onclick="return confirm(`คุณต้องการรายงานกระดานสนทนานี้ ใช่หรือไม่?`);"><?= $value ?></button>
                                </form>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                    <?php
                }

                if($data[0]['u_id'] == $u_id) {
                    ?>
                    <span class="badge bg-secondary fs-5 py-1 px-2 cursor" data-bs-toggle="dropdown">จัดการ</span>
                    <ul class="dropdown-menu fs-4">
                        <li>
                            <a href="?page=forum-edit&forum_id=<?= $forum_id ?>" class="dropdown-item">แก้ไข</a>
                        </li>
                        <li>
                            <a href="?page=forum-delete&forum_id=<?= $forum_id ?>" class="dropdown-item" onclick="return confirm(`คุณต้องการลบกระดานสนทนานี้ ใช่หรือไม่?`);">ลบ</a>
                        </li>
                    </ul>
                    <?php
                }

                if($data[0]['u_id'] != $u_id && @$_SESSION['u_status'] == 2) {
                    ?>
                    <span class="badge bg-secondary fs-5 py-1 px-2 cursor" data-bs-toggle="dropdown">จัดการ</span>
                    <ul class="dropdown-menu fs-4">
                        <li>
                            <a href="?page=forum-delete&forum_id=<?= $forum_id ?>" class="dropdown-item" onclick="return confirm(`คุณต้องการลบกระดานสนทนานี้ ใช่หรือไม่?`);">ลบ</a>
                        </li>
                    </ul>
                    <?php
                }
                ?>
                <hr>
                <pre class="fs-18px"><?= $data[0]['forum_detail'] ?></pre>
                <?php
                if($data[0]['forum_img'] != "") {
                    ?>
                    <div class="text-center">
                        <img src="upload/forum/<?= $data[0]['forum_img'] ?>" onerror="this.onerror=null; this.src='assets/images/404.png';" alt="forum image" style="max-width: 100%;">
                    </div>
                    <?php
                }
                ?>
                <hr>
                <?php
                if(num($sql_comment) > 0) {
                    ?>
                    <p class="fs-1 my-3">ความคิดเห็น</p>
                    <?php
                    foreach (fec($sql_comment) as $key => $value) {
                        $sql_name = "SELECT * FROM user WHERE u_id='".$value['u_id']."'";
                        $data_name = fec($sql_name);
                        ?>
                        <div class="card my-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-lg-9">
                                        <p class="fs-3 fw-bold">
                                            <?php
                                            echo $data_name[0]['u_fname']." ".$data_name[0]['u_lname'];

                                            // echo "<pre>";
                                            // var_dump($data_name);
                                            // echo "</pre>";

                                            if($data_name[0]['u_status'] == 2) {
                                                echo " <span class='badge bg-primary fs-5 py-0 px-2'>ผู้ดูแล</span> ";
                                            }

                                            if($data[0]['u_id'] == $value['u_id']) {
                                                echo " <span class='badge bg-secondary fs-5 py-0 px-2'>ผู้ตั้งกระดานสนทนา</span> ";
                                            }
                                            ?>
                                        </p>
                                        <p class="fs-4 text-muted"><?= thai($value['comf_updated'], 2) ?></p>
                                    </div>
                                    <?php
                                    if($value['u_id'] == $u_id) {
                                        ?>
                                        <div class="col-12 col-lg-3 text-lg-end">
                                            <a href="" class="dropdown-toggle link-dark fs-5" data-bs-toggle="dropdown">จัดการ</a>
                                            <ul class="dropdown-menu fs-4">
                                                <li>
                                                    <button type="button" class="dropdown-item" id="btn<?= $value['comf_id'] ?>">แก้ไข</button>
                                                </li>
                                                <li>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="comment_delete" value="true">
                                                        <input type="hidden" name="comment_id" value="<?= $value['comf_id'] ?>">
                                                        <button type="submit" class="dropdown-item" onclick="return confirm(`คุณต้องการลบความคิดเห็น ใช่หรือไม่?`);">ลบ</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                        <?php
                                    }

                                    if($value['u_id'] != $u_id && @$_SESSION['u_status'] == 2) {
                                        ?>
                                        <div class="col-12 col-lg-3 text-lg-end">
                                            <a href="" class="dropdown-toggle link-dark fs-5" data-bs-toggle="dropdown">จัดการ</a>
                                            <ul class="dropdown-menu fs-4">
                                                <li>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="comment_delete" value="true">
                                                        <input type="hidden" name="comment_id" value="<?= $value['comf_id'] ?>">
                                                        <button type="submit" class="dropdown-item" onclick="return confirm(`คุณต้องการลบความคิดเห็น ใช่หรือไม่?`);">ลบ</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="mt-3" id="box<?= $value['comf_id'] ?>">
                                    <pre class="mb-0" style="font-size: 16px"><?= $value['comf_detail'] ?></pre>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
                <p class="fs-1 my-3">แสดงความคิดเห็น</p>
                <?php
                if(@$_SESSION['u_id'] != "") {
                    ?>
                    <form action="" method="post">
                        <textarea name="comment" id="comment" cols="30" rows="5" placeholder="กรอกความคิดเห็นของคุณได้ที่นี่..." class="form-control fs-4" required></textarea>
                        <button type="submit" class="btn btn-primary fs-4 mt-3">แสดงความคิดเห็น</button>
                    </form>
                    <?php
                } else {
                    ?>
                    <textarea name="" id="" cols="30" rows="5" placeholder="กรุณาเข้าสู่ระบบก่อนแสดงความคิดเห็น" class="form-control fs-4" disabled></textarea>
                    <a href="?page=go-to&go_page=<?= urlencode("?page=login") ?>&old_page=<?= urlencode($_SERVER['QUERY_STRING']) ?>" class="btn btn-primary fs-4 mt-3">เข้าสู่ระบบ</a>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    if(num($sql_comment) > 0) {
        ?>
        <script>
            $(document).ready(() => {
                <?php
                foreach (fec($sql_comment) as $key => $value) {
                    if($value['u_id'] == $u_id) {
                        ?>
                        $("#btn<?= $value['comf_id'] ?>").click(() => {
                            const text = `
                            <form action="" method="post">
                                <textarea name="comment_edit" id="comment_edit" cols="30" rows="5" placeholder="กรอกความคิดเห็นของคุณได้ที่นี่..." class="form-control fs-4" required><?= $value['comf_detail'] ?></textarea>
                                <input type="hidden" name="comment_id" value="<?= $value['comf_id'] ?>">
                                <button type="submit" class="btn btn-primary fs-4 mt-3">แก้ไขความคิดเห็น</button>
                            </form>
                            `;

                            $("#box<?= $value['comf_id'] ?>").html(text);
                        });
                        <?php
                    }
                }
                ?>
            });
        </script>
        <?php
    }
    $sql_viewforum = "INSERT INTO view_forum VALUES(NULL, '$forum_id', '$u_id', CURRENT_TIMESTAMP)";
    qry($sql_viewforum);
} else {
    ?>
    <div class="text-center fs-1 py-5" style="min-height: 60vh;">
            <p class="text-muted">ไม่พบกระดานสนทนาที่คุณต้องการดู</p>
            <a href="?page=home" class="link-primary fs-3">หน้าแรก</a>
        </div>
    <?php
}