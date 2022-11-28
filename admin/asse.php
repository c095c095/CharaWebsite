
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
                            <span class='dropdown-toggle' data-bs-toggle='dropdown'>จัดการ</span>
                            <ul class='dropdown-menu'>
                                <li>
                                    <a href="?page=asse_status&status=<?= $f1['asse_status'] ?>&id=<?= $f1['asse_id'] ?>" class='dropdown-item
                                    <?php if($n2==0){ echo 'disabled'; } ?>'>
                                        <?php 
                                            if($f1['asse_status']==0){
                                                echo 'เปิดใช้งาน';
                                            }else{
                                                echo 'ปิดใช้งาน';
                                            }
                                        ?>
                                    </a>
                                </li>
                                <li>
                                    <span class='dropdown-item <?php  if($f1['asse_status']==1){ echo 'disabled'; } ?>' data-bs-toggle='modal' data-bs-target='#e_<?= $f1['asse_id']; ?>'>แก้ไข</span>
                                </li>
                                <li>
                                    <a href="?page=asse_edit&id=<?= $f1['asse_id'] ?>" class='dropdown-item
                                    <?php if($f1['asse_status']==1){ echo 'disabled'; } ?>'> จัดการคำถาม </a>
                                </li>
                                <li>
                                    <span class='dropdown-item' data-bs-toggle='modal' data-bs-target='#d_<?= $f1['asse_id']; ?>'>ลบ</span>
                                </li>
                            </ul>
                        </td>
                    </tr>


<div class="modal" id='d_<?= $f1['asse_id']; ?>'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                ลบ<?= $title[$page]; ?>
                <button class='btn btn-close' data-bs-dismiss='modal'></button>
            </div>
            <div class="modal-body">
                ต้องการลบ <?= $f1['asse_topic']; ?>
            </div>
            <div class="modal-footer">
                <a href="?page=asse_del&id=<?= $f1['asse_id'] ?>" class='btn btn-outline-danger'>ลบ</a>
                <button type='button' data-bs-dismiss='modal' class='btn btn-outline-dark btn-light' >ยกเลิก</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal" id='e_<?= $f1['asse_id']; ?>'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                แก้ไข<?= $title[$page]; ?>
                <button class='btn btn-close' data-bs-dismiss='modal'></button>
            </div>
            <div class="modal-body">
                <form action="?page=asse_name&id=<?= $f1['asse_id']; ?>" enctype='multipart/form-data' method="post">
                    <label for="">ชื่อ<?= $title[$page]; ?></label>
                    <input type="text" maxlength='255' value='<?= $f1['asse_topic']; ?>' class='form-control' name="asse_topic" required placeholder='ชื่อ<?= $title[$page]; ?>' id="">
            </div>
            <div class="modal-footer">
                <button type='submit' class='btn btn-outline-dark btn-light' >ตกลง</button>
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


        <div class="modal" id='a_<?= $page ?>'>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        เพิ่ม<?= $title[$page]; ?>
                <button class='btn btn-close' data-bs-dismiss='modal'></button>
                    </div>
                    <div class="modal-body">
                        <form action="?page=asse_add" enctype='multipart/form-data' method="post">
                            <label for="">ชื่อ<?= $title[$page]; ?></label>
                            <input type="text" maxlength='255' class='form-control' name="asse_topic" required placeholder='ชื่อ<?= $title[$page]; ?>' id="">
                    </div>
                    <div class="modal-footer">
                        <button type='submit' class='btn btn-outline-dark btn-light' >ตกลง</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>