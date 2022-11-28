
        <div class="table-responsive">
            <table class='table table-bordered table-striped'>
                <thead>
                    <tr>
                        <?php 
                            $num=1;
                        ?>
                        <th class='text-center'>ลำดับ</th><?php $num++; ?>
                        <th class='text-center'>ชื่อ<?= $title[$page]; ?></th><?php $num++; ?>
                        <th class='text-center'>คำถาม</th><?php $num++; ?>
                        <th class='text-center'>คำตอบ</th><?php $num++; ?>
                        <th class='text-center'>วันที่สร้าง</th><?php $num++; ?>
                        <th class='text-center'>สถานะ</th><?php $num++; ?>
                        <th class='text-center'>จัดการ</th><?php $num++; ?>
                    </tr>
                </thead>
                <?php  ?>
                <tbody>
                    <?php
                    if(@$_POST['search']!=''){
                        $sel1="select * from assessment where asse_topic like '%".$_POST['search']."%'
                        ";
                    }else{
                        $sel1="select * from assessment";
                    }
                        
                        $q1=mysqli_query($conn,$sel1);
                        $n1=mysqli_num_rows($q1);
                        if($n1==0){
                            ?>
                            <tr>
                                <td class='text-center' colspan='<?= $num ?>'>ไม่มี<?= $title[$page]; ?></td>
                            </tr>
                            <?php
                        }else{
                            $c=1;
                            while($f1=mysqli_fetch_assoc($q1)){
                                $sel2="select * from asse_question where asse_id=".$f1['asse_id'];
                                $q2=mysqli_query($conn,$sel2);
                                $n2=mysqli_num_rows($q2);
                                $sel3="select * from asse_answer where asse_id=".$f1['asse_id']." group by u_id";
                                $q3=mysqli_query($conn,$sel3);
                                $n3=mysqli_num_rows($q3);
                    ?>
                    <tr>
                        <td class='text-center'><?= number_format($c++); ?></td>
                        <td class='text-start'><?= $f1['asse_topic']; ?></td>
                        <td class='text-center'><?= number_format($n2); ?></td>
                        <td class='text-center'><?= number_format($n3); ?></td>
                        <td class='text-center'><?= thai($f1['asse_created'],2); ?></td>
                        <td class='text-center'>
                            <span class='badge bg-<?php if($f1['asse_status']==0){ echo 'danger'; }else{ echo 'success'; } ?>'>
                            <?php if($f1['asse_status']==0){ echo 'ปิดใช้งาน'; }else{ echo 'เปิดใช้งาน'; } ?>
                            </span>
                        </td>
                        <td class='text-center'>
                            <a href="?page=asse_report_p&id=<?= $f1['asse_id']; ?>" class='btn btn-defualt text-decoration-none'>รายงาน</a>
                        </td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>