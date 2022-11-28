<?php

$sql_pin = "SELECT * FROM forum WHERE forum_pin = 1";
$sql_hot = "SELECT forum_id, COUNT(forum_id) AS c FROM view_forum GROUP BY forum_id ORDER BY c DESC LIMIT 10";
$sql_all = "SELECT * FROM forum ORDER BY forum_created DESC";

?>
<div class="container pt-5">
    <div class="line">
        <span class="text">กระดานสนทนา</span>
    </div>
    <div class="my-3 text-center">
        <a href="?page=<?php if(@$_SESSION['u_id'] != ""){ echo "forum-create"; } else { echo "go-to&go_page=".urlencode("?page=login")."&old_page=".urlencode("page=forum-create"); } ?>" class="btn btn-primary fs-3">สร้างกระดานสนทนา</a>
    </div>
</div>
<div class="container pb-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <?php
            if(num($sql_pin) > 0) {
                ?>
                <p class="display-3 mt-5" style="line-height: calc(1.525rem + 3vw);">ปักหมุด</p>
                <p class="text-dark-80 fs-3 mb-3">หัวข้อกระดานสนทนาที่ผู้ดูแลแนะนำให้คุณอ่าน</p>
                <?php
                foreach (fec($sql_pin) as $key => $value) {
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
            
            if(num($sql_hot) > 0) {
                ?>
                <p class="display-3 mt-5" style="line-height: calc(1.525rem + 3vw);">กระดานสนทนายอดนิยม</p>
                <p class="text-dark-80 fs-3 mb-3">หัวข้อกระดานสนทนาที่เป็นที่นิยมในขณะนี้</p>
                <?php
                foreach (fec($sql_hot) as $key => $value) {
                    $sql_forum = "SELECT * FROM forum WHERE forum_id='".$value['forum_id']."'";
                    $data_forum = fec($sql_forum);

                    $sql_name = "SELECT * FROM user WHERE u_id='".$data_forum[0]['u_id']."'";
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
                                    <p class="fs-1"><?= $data_forum[0]['forum_topic'] ?></p>
                                    <p class="fs-3">โดย <span class="text-primary"><?= $data_name[0]['u_fname']." ".$data_name[0]['u_lname'] ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-muted"><?= thai($data_forum[0]['forum_updated'], 2) ?></span></p>
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
                                    <p class="fs-1"><?= $data_forum[0]['forum_topic'] ?></p>
                                    <span class="text-muted fs-3"><?= thai($data_forum[0]['forum_updated'], 2) ?></span>
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

            if(num($sql_all) > 0) {
                ?>
                <p class="display-3 mt-5" style="line-height: calc(1.525rem + 3vw);">กระดานสนทนาทั้งหมด</p>
                <p class="text-dark-80 fs-3 mb-3">หัวข้อกระดานสนทนาทั้งหมดใน</p>
                <?php
                foreach (fec($sql_all) as $key => $value) {
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