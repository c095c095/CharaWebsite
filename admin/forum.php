
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
                        <th class='text-center'>จัดการ</th><?php $num++; ?>
                    </tr>
                </thead>
                <?php  ?>
                <tbody>
                    <?php
                    if(@$_POST['search']!=''){
                        $sel1="select * from forum where forum_topic like '%".$_POST['search']."%'
                        ";
                    }else{
                        $sel1="select * from forum order by forum_pin DESC";
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
                            <span class='dropdown-toggle' data-bs-toggle='dropdown'>จัดการ</span>
                            <ul class='dropdown-menu'> 
                                <li>
                                    <a href="?page=redirect&old=<?= $old ?>&go=<?= $go ?>" class='dropdown-item'> ไปยังกระดานสนทนา </a>
                                </li>
                                <li>
                                    <a href="?page=forum_status&status=<?= $f1['forum_pin'] ?>&id=<?= $f1['forum_id'] ?>" class='dropdown-item'>
                                        <?php 
                                            if($f1['forum_pin']==0){
                                                echo 'ปักหมุด';
                                            }else{
                                                echo 'ยกเลิกการปักหมุด';
                                            }
                                        ?>
                                    </a>
                                </li>
                                <li>
                                    <span class='dropdown-item <?php  if($f1['u_id']!=$u_id){ echo 'disabled'; } ?>' data-bs-toggle='modal' data-bs-target='#e_<?= $f1['forum_id']; ?>'>แก้ไข</span>
                                </li>
                                <li>
                                    <span class='dropdown-item' data-bs-toggle='modal' data-bs-target='#d_<?= $f1['forum_id']; ?>'>ลบ</span>
                                </li>
                            </ul>
                        </td>
                    </tr>


<div class="modal" id='d_<?= $f1['forum_id']; ?>'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                ลบ<?= $title[$page]; ?>
                <button class='btn btn-close' data-bs-dismiss='modal'></button>
            </div>
            <div class="modal-body">
                ต้องการลบ <?= $f1['forum_topic']; ?>
            </div>
            <div class="modal-footer">
                <a href="?page=forum_del&id=<?= $f1['forum_id'] ?>" class='btn btn-outline-danger'>ลบ</a>
                <button type='button' data-bs-dismiss='modal' class='btn btn-outline-dark btn-light' >ยกเลิก</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal" id='e_<?= $f1['forum_id']; ?>'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                แก้ไข<?= $title[$page]; ?>
                <button class='btn btn-close' data-bs-dismiss='modal'></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 text-center">
                        <img src="../upload/forum/<?= $f1['forum_img']; ?>" style='max-width:250px;' alt="">
                    </div>
                </div>
                <form action="?page=forum_edit&id=<?= $f1['forum_id']; ?>" enctype='multipart/form-data' method="post">
                    <label for="">ชื่อ<?= $title[$page]; ?></label>
                    <input type="text" maxlength='255' value='<?= $f1['forum_topic']; ?>' class='form-control' name="forum_topic" required placeholder='ชื่อ<?= $title[$page]; ?>' id="">
                    <label for="">รายละเอียด</label>
                    <textarea id="" class='form-control' name="forum_detail" required placeholder='รายละเอียด'  cols="30" rows="10"><?= $f1['forum_detail']; ?></textarea>
                    <label for="">ภาพ</label>
                    <input type="file" maxlength='255' accept='.jpg,.png,.jpeg,.gif,.webp' class='form-control' name="img" placeholder='ภาพ' id="">
                    <small class='text-danger'>*หากไม่ต้องการเปลี่ยนรูปภาพไม่ต้องทำการอัพโหลดไฟล์</small>
            
            
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
                        <form action="?page=forum_add" enctype='multipart/form-data' method="post">
                            <label for="">ชื่อ<?= $title[$page]; ?></label>
                            <input type="text" maxlength='255' class='form-control' name="forum_topic" required placeholder='ชื่อ<?= $title[$page]; ?>' id="">
                            <label for="">รายละเอียด</label>
                            <textarea id="" class='form-control' name="forum_detail" required placeholder='รายละเอียด'  cols="30" rows="10"></textarea>
                            <label for="">ภาพ</label>
                            <input type="file" maxlength='255' accept='.jpg,.png,.jpeg,.gif,.webp' class='form-control' name="img" placeholder='ภาพ' id="">
                    </div>
                    <div class="modal-footer">
                        <button type='submit' class='btn btn-outline-dark btn-light' >ตกลง</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>