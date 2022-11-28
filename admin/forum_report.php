
        <div class="table-responsive">
            <table class='table table-bordered table-striped'>
                <thead>
                    <tr>
                        <?php 
                            $num=1;
                        ?>
                        <th class='text-center'>ลำดับ</th><?php $num++; ?>
                        <th class='text-center'>ชื่อ<?= $title[$page]; ?></th><?php $num++; ?>
                        <th class='text-center'>ผู้สร้าง</th><?php $num++; ?>
                        <th class='text-center'>ความคิดเห็น</th><?php $num++; ?>
                        <th class='text-center'>วันที่สร้าง</th><?php $num++; ?>
                        <th class='text-center'>สาเหตุ</th><?php $num++; ?>
                        <th class='text-center'>จัดการ</th><?php $num++; ?>
                    </tr>
                </thead>
                <?php  ?>
                <tbody>
                    <?php
                        $sel1="select * from forum_report group by forum_id";
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
                            while($f1111111=mysqli_fetch_assoc($q1)){
                                $sel20000="select * from forum where forum_id=".$f1111111['forum_id'];
                                $q20000=mysqli_query($conn,$sel20000);
                                $n20000=mysqli_num_rows($q20000);
                                $f1=mysqli_fetch_assoc($q20000);
                                $sel2="select * from user where u_id=".$f1['u_id'];
                                $q2=mysqli_query($conn,$sel2);
                                $n2=mysqli_num_rows($q2);
                                $f2=mysqli_fetch_assoc($q2);
                                $sel3="select * from comment_forum where forum_id=".$f1['forum_id'];
                                $q3=mysqli_query($conn,$sel3);
                                $n3=mysqli_num_rows($q3);
                                $go=urlencode("../?page=forum&forum_id=".$f1['forum_id']);
                                $old=urlencode($_SERVER['QUERY_STRING']);
                    ?>
                    <tr>
                        <td class='text-center'><?= number_format($c++); ?></td>
                        <td class='text-start'>
                            <?php 
                                if($f1['forum_pin']==1){
                                    ?>
                                    <span class='badge bg-success'><span class='icon icon-pushpin'></span></span>
                                    <?php
                                }
                            ?>
                            <?= $f1['forum_topic']; ?>
                        </td>
                        <td class='text-center'><?= $f2['u_fname'].' '.$f2['u_lname']; ?></td>
                        <td class='text-center'><?= number_format($n3); ?></td>
                        <td class='text-center'><?= thai($f1['forum_created'],2); ?></td>
                        <td class='text-center'>
                            <?php 
                                $sel5="select * from forum_report where forum_id=".$f1['forum_id']. " group by report_type";
                                $q5=mysqli_query($conn,$sel5);
                                $report_list=array(
                                    "1" => "สแปม",
                                    "2" => "ดูหมิ่น/ใส่ร้าย ผู้อื่น",
                                    "3" => "มีภาพ/เนื้อหาลามก อนาจาร หรือมีภาพที่รุนแรงเกินไป",
                                    "4" => "ใช้ภาษาที่หยาบคายรุนแรง",
                                    "5" => "อาจก่อให้เกิดความแตกแยก",
                                    "6" => "เกี่ยวข้องกับสิ่งผิดกฎหมาย",
                                    "7" => "มีข้อมูลส่วนบุคคล",
                                    "8" => "อื่นๆ"
                                );
                                while($f5=mysqli_fetch_assoc($q5)){
                                    echo $report_list[$f5['report_type']]."<br>";
                                }
                            ?>
                        </td>
                        <td class='text-center'>
                            <span class='dropdown-toggle' data-bs-toggle='dropdown'>จัดการ</span>
                            <ul class='dropdown-menu'> 
                                <li>
                                    <a href="?page=redirect&old=<?= $old ?>&go=<?= $go ?>" class='dropdown-item'> ไปยังกระดานสนทนา </a>
                                </li>
                                <li>
                                    <span class='dropdown-item' data-bs-toggle='modal' data-bs-target='#dd_<?= $f1['forum_id']; ?>'>ล้างการรายงาน</span>
                                </li>
                                <li>
                                    <span class='dropdown-item' data-bs-toggle='modal' data-bs-target='#d_<?= $f1['forum_id']; ?>'>ลบ</span>
                                </li>
                            </ul>
                        </td>
                    </tr>


<div class="modal" id='dd_<?= $f1['forum_id']; ?>'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                ล้างการรายงานกระดานสนทนา
                <button class='btn btn-close' data-bs-dismiss='modal'></button>
            </div>
            <div class="modal-body">
                ต้องการล้างการรายงาน <?= $f1['forum_topic']; ?>
            </div>
            <div class="modal-footer">
                <a href="?page=forum_report_re&id=<?= $f1['forum_id'] ?>" class='btn btn-outline-danger'>ล้าง</a>
                <button type='button' data-bs-dismiss='modal' class='btn btn-outline-dark btn-light' >ยกเลิก</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal" id='d_<?= $f1['forum_id']; ?>'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                ลบกระดานสนทนา
                <button class='btn btn-close' data-bs-dismiss='modal'></button>
            </div>
            <div class="modal-body">
                ต้องการลบ <?= $f1['forum_topic']; ?>
            </div>
            <div class="modal-footer">
                <a href="?page=forum_report_del&id=<?= $f1['forum_id'] ?>" class='btn btn-outline-danger'>ลบ</a>
                <button type='button' data-bs-dismiss='modal' class='btn btn-outline-dark btn-light' >ยกเลิก</button>
                </form>
            </div>
        </div>
    </div>
</div>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>