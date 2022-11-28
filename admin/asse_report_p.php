<?php 
    $id=$_GET['id'];
    $sel1="select * from assessment where asse_id=$id";
    $q1=mysqli_query($conn,$sel1);
    $n1=mysqli_num_rows($q1);
    $f1=mysqli_fetch_assoc($q1);
?>
<div class="card">
    <div class="card-header text-center">
        <h2 class=''><?= $f1['asse_topic']; ?></h2>
    </div>
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6">

                    <?php 
                        $sel2="select * from asse_question where asse_id=$id";
                        $q2=mysqli_query($conn,$sel2);
                        $n2=mysqli_num_rows($q2);
                        if($n2==0){
                        ?>
                            <div class="row">
                                <div class="col-12 text-center text-muted">ไม่มีคำถามในแบบประเมินนี้</div>
                            </div>
                        <?php
                        }else{
                            $sel3="select * from asse_answer where asse_id=$id";
                            $q3=mysqli_query($conn,$sel3);
                            $n3=mysqli_num_rows($q3);
                            if($n2==0){
                            ?>
                                <div class="row">
                                    <div class="col-12 text-center text-muted">ไม่มีการตอบคำถามในแบบประเมินนี้</div>
                                </div>
                            <?php
                            }else{
                            while($f2=mysqli_fetch_assoc($q2)){
                    ?>
                <div class="row">
                    <div class="col-12 h4 mb-1 mt-3">
                        <?= $f2['ques_topic']; ?>
                    </div>
                    <div class="col-12">
                        <?php
                            if($f2['ques_type']==1){
                                $se6="select * from asse_answer where ques_id=".$f2['ques_id'];
                                $qe6=mysqli_query($conn,$se6);
                                $ne6=mysqli_num_rows($qe6);
                                if($ne6==0){
                                    ?>
                                    <div class="row">
                                        <div class="col-12 text-center">ไม่มีการตอบคำถามนี้ <br><small class='text-danger'>(คำถามนี้อาจถูกเพิ่มหลังจากการตอบคำถาม)</small></div>
                                    </div>
                                    <?php
                                }else{
                                    $se5="select * from asse_answer where ans_detail='5' and ques_id=".$f2['ques_id'];
                                    $qe5=mysqli_query($conn,$se5);
                                    $ne5=mysqli_num_rows($qe5);
                                    $se4="select * from asse_answer where ans_detail='4' and ques_id=".$f2['ques_id'];
                                    $qe4=mysqli_query($conn,$se4);
                                    $ne4=mysqli_num_rows($qe4);
                                    $se3="select * from asse_answer where ans_detail='3' and ques_id=".$f2['ques_id'];
                                    $qe3=mysqli_query($conn,$se3);
                                    $ne3=mysqli_num_rows($qe3);
                                    $se2="select * from asse_answer where ans_detail='2' and ques_id=".$f2['ques_id'];
                                    $qe2=mysqli_query($conn,$se2);
                                    $ne2=mysqli_num_rows($qe2);
                                    $se1="select * from asse_answer where ans_detail='1' and ques_id=".$f2['ques_id'];
                                    $qe1=mysqli_query($conn,$se1);
                                    $ne1=mysqli_num_rows($qe1);
                                ?>
                                <div class="row">
                                    <div class="col-12">
                                        <p class='text-dark my-0'>ดีมาก</p>
                                        <div class="progress">
                                            <div class="progress-bar  bg-success" style='width:<?= number_format(($ne5/$ne6)*100,2); ?>%;'><?= number_format(($ne5/$ne6)*100,2); ?>%</div>
                                        </div>
                                        <p class='text-end text-muted my-0'><?= number_format($ne5); ?>/<?= number_format($ne6); ?></p>
                                    </div>
                                    <div class="col-12">
                                        <p class='text-dark my-0'>ดี</p>
                                        <div class="progress">
                                            <div class="progress-bar  bg-info" style='width:<?= number_format(($ne4/$ne6)*100,2); ?>%;'><?= number_format(($ne4/$ne6)*100,2); ?>%</div>
                                        </div>
                                        <p class='text-end text-muted my-0'><?= number_format($ne4); ?>/<?= number_format($ne6); ?></p>
                                    </div>
                                    <div class="col-12">
                                        <p class='text-dark my-0'>ค่อนข้างดีดี</p>
                                        <div class="progress">
                                            <div class="progress-bar" style='width:<?= number_format(($ne3/$ne6)*100,2); ?>%;'><?= number_format(($ne3/$ne6)*100,2); ?>%</div>
                                        </div>
                                        <p class='text-end text-muted my-0'><?= number_format($ne3); ?>/<?= number_format($ne6); ?></p>
                                    </div>
                                    <div class="col-12">
                                        <p class='text-dark my-0'>พอใช้</p>
                                        <div class="progress">
                                            <div class="progress-bar  bg-warning" style='width:<?= number_format(($ne2/$ne6)*100,2); ?>%;'><?= number_format(($ne2/$ne6)*100,2); ?>%</div>
                                        </div>
                                        <p class='text-end text-muted my-0'><?= number_format($ne2); ?>/<?= number_format($ne6); ?></p>
                                    </div>
                                    <div class="col-12">
                                        <p class='text-dark my-0'>ปรับปรุง</p>
                                        <div class="progress">
                                            <div class="progress-bar  bg-danger" style='width:<?= number_format(($ne1/$ne6)*100,2); ?>%;'><?= number_format(($ne1/$ne6)*100,2); ?>%</div>
                                        </div>
                                        <p class='text-end text-muted my-0'><?= number_format($ne1); ?>/<?= number_format($ne6); ?></p>
                                    </div>
                                </div>
                                <?php
                                }
                            }
                            if($f2['ques_type']==2){
                                $se9="select * from asse_answer where ques_id=".$f2['ques_id'];
                                $qe9=mysqli_query($conn,$se9);
                                $ne9=mysqli_num_rows($qe9);
                                if($ne9==0){
                                    ?>
                                    <div class="row">
                                        <div class="col-12 text-center">ไม่มีการตอบคำถามนี้ <br><small class='text-danger'>(คำถามนี้อาจถูกเพิ่มหลังจากการตอบคำถาม)</small></div>
                                    </div>
                                    <?php
                                }else{
                                    $se7="select * from asse_answer where ans_detail='yes' and ques_id=".$f2['ques_id'];
                                    $qe7=mysqli_query($conn,$se7);
                                    $ne7=mysqli_num_rows($qe7);
                                    $se8="select * from asse_answer where ans_detail='no' and ques_id=".$f2['ques_id'];
                                    $qe8=mysqli_query($conn,$se8);
                                    $ne8=mysqli_num_rows($qe8);
                                ?>
                                <div class="row">
                                    <div class="col-12">
                                        <p class='text-dark my-0'>ใช่</p>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" style='width:<?= number_format(($ne7/$ne9)*100,2); ?>%;'><?= number_format(($ne7/$ne9)*100,2); ?>%</div>
                                        </div>
                                        <p class='text-end text-muted my-0'><?= number_format($ne7); ?>/<?= number_format($ne9); ?></p>
                                    </div>
                                    <div class="col-12">
                                        <p class='text-dark my-0'>ไม่ใช่</p>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" style='width:<?= number_format(($ne8/$ne9)*100,2); ?>%;'><?= number_format(($ne8/$ne9)*100,2); ?>%</div>
                                        </div>
                                        <p class='text-end text-muted my-0'><?= number_format($ne8); ?>/<?= number_format($ne9); ?></p>
                                    </div>
                                </div>
                                <?php
                                }
                            }
                            if($f2['ques_type']==3){
                                $se10="select * from asse_answer where ques_id=".$f2['ques_id'];
                                $qe10=mysqli_query($conn,$se10);
                                $ne10=mysqli_num_rows($qe10);
                                if($ne10==0){
                                    ?>
                                    <div class="row">
                                        <div class="col-12 text-center">ไม่มีการตอบคำถามนี้ <br><small class='text-danger'>(คำถามนี้อาจถูกเพิ่มหลังจากการตอบคำถาม)</small></div>
                                    </div>
                                    <?php
                                }else{
                                    $se11="select * from asse_answer where ques_id=".$f2['ques_id'];
                                    $qe11=mysqli_query($conn,$se11);
                                    $ne11=mysqli_num_rows($qe11);
                                    while($fe11=mysqli_fetch_assoc($qe11)){
                                ?>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="text" name="" disabled class='form-control' value='<?= $fe11['ans_detail']; ?>'id="">
                                    </div>
                                </div>
                                <?php   }
                                }
                            }
                        ?>
                    </div>
                    <hr class='mt-2'>
                </div>

                                <?php
                            }
                            }
                        }
                                ?>

            </div>
        </div>
    </div>
</div>