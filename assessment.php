<?php

$u_id = (@$_SESSION['u_id'] != "") ? $_SESSION['u_id'] : 0;

$sql = "SELECT * FROM assessment WHERE asse_status='1'";

?>
<div class="container py-5" style="min-height: 60vh;">
    <div class="line">
        <span class="text">แบบประเมิน</span>
    </div>
    <?php
    if(num($sql) > 0) {
        ?>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <?php
                foreach (fec($sql) as $key => $value) {
                    $sql_c = "SELECT * FROM asse_answer WHERE u_id='$u_id' AND asse_id='".$value['asse_id']."'";
                    ?>
                    <div class="card my-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-8 my-auto">
                                    <p class="fs-1"><?= $value['asse_topic'] ?></p>
                                    <p class="h3 text-muted"><?= thai($value['asse_created']) ?></p>
                                    <?php
                                    if(num($sql_c) > 0) {
                                        ?>
                                        <p class="fs-4 text-muted">(คุณทำแบบประเมินนี้ไปแล้ว)</p>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-12 col-lg-4 my-auto">
                                    <?php
                                    if(num($sql_c) == 0) {
                                        ?>
                                        <a href="?page=assessment-do&asse_id=<?= $value['asse_id'] ?>" class="btn btn-primary fs-4 w-100">ทำแบบประเมิน</a>
                                        <?php                                        
                                    } else {
                                        ?>
                                        <button type="button" class="btn btn-primary fs-4 w-100" disabled>ทำแบบประเมิน</button>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="text-center fs-1 py-5" style="min-height: 60vh;">
            <p class="text-muted">ยังไม่มีแบบประเมินที่คุณสามารถทำได้ ในขณะนี้</p>
            <a href="?page=home" class="link-primary fs-3">หน้าแรก</a>
        </div>
        <?php
    }
    ?>
</div>