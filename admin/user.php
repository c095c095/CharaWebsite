
        <div class="table-responsive">
            <table class='table table-bordered table-striped'>
                <thead>
                    <tr>
                        <?php 
                            $num=1;
                        ?>
                        <th class='text-center'>ลำดับ</th><?php $num++; ?>
                        <th class='text-center'>ชื่อ<?= $title[$page]; ?></th><?php $num++; ?>
                        <th class='text-center'>เบอร์โทรศัพท์</th><?php $num++; ?>
                        <th class='text-center'>อีเมล</th><?php $num++; ?>
                        <th class='text-center'>สถานะ</th><?php $num++; ?>
                        <th class='text-center'>จัดการ</th><?php $num++; ?>
                    </tr>
                </thead>
                <?php  ?>
                <tbody>
                    <?php
                    if(@$_POST['search']!=''){
                        $sel1="select * from user where u_fname like '%".$_POST['search']."%'
                        or u_lname like '%".$_POST['search']."%'
                        or u_tel like '%".$_POST['search']."%'
                        or u_email like '%".$_POST['search']."%'
                        ";
                    }else{
                        $sel1="select * from user where u_id<>$u_id";
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
                    ?>
                    <tr>
                        <td class='text-center'><?= number_format($c++); ?></td>
                        <td class='text-start'><?= $f1['u_fname'].' '.$f1['u_lname']; ?></td>
                        <td class='text-center'><?= $f1['u_tel']; ?></td>
                        <td class='text-center'>
                            <?php
                                if($f1['u_email']==''){
                                    ?><p class='text-muted'>ผู้ใช้นี้ยังไม่ได้ทำการเพิ่ม E-mail</p><?php
                                }else{
                            ?>
                            <?= $f1['u_email']; }?>
                                
                        </td>
                        <td class='text-center'>
                            <span class='badge bg-<?php if($f1['u_status']==0){ echo 'danger'; }elseif($f1['u_status']==2){ echo 'primary'; }else{ echo 'success'; } ?>'>
                            <?php if($f1['u_status']==0){ echo 'ปิดใช้งาน'; }elseif($f1['u_status']==1){ echo 'สมาชิก'; }elseif($f1['u_status']==2){ echo 'แอดมิน'; } ?>
                            </span>
                        </td>
                        <td class='text-center'>
                            <span class='dropdown-toggle' data-bs-toggle='dropdown'>จัดการ</span>
                            <ul class='dropdown-menu'>
                                <li>
                                    <a href="?page=user_status&status=<?= $f1['u_status'] ?>&id=<?= $f1['u_id'] ?>" class='dropdown-item
                                    <?php if($f1['u_id']==$u_id){ echo 'disabled'; } ?>'>
                                        <?php 
                                            if($f1['u_status']==0){
                                                echo 'เปิดใช้งาน';
                                            }else{
                                                echo 'ปิดใช้งาน';
                                            }
                                        ?>
                                    </a>
                                </li>
                                <li>
                                    <span class='dropdown-item' data-bs-toggle='modal' data-bs-target='#e_<?= $f1['u_id']; ?>'>แก้ไข</span>
                                </li>
                            </ul>
                        </td>
                    </tr>
<div class="modal" id='e_<?= $f1['u_id']; ?>'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                แก้ไข<?= $title[$page]; ?>
                <button class='btn btn-close' data-bs-dismiss='modal'></button>
            </div>
            <div class="modal-body">
                <form action="?page=user_edit&id=<?= $f1['u_id']; ?>" enctype='multipart/form-data' method="post">
                    <label for="">ชื่อ<?= $title[$page]; ?></label>
                    <input type="text" value='<?= $f1['u_fname']; ?>' class='form-control' maxlength='255' name="u_fname" required placeholder='ชื่อ<?= $title[$page]; ?>' id="">
                    <label for="">นามสกุล</label>
                    <input type="text" value='<?= $f1['u_lname']; ?>' class='form-control' maxlength='255' name="u_lname" required placeholder='นามสกุล' id="">
                    <label for="">เบอร์โทรศัพท์</label>
                    <input type="text" value='<?= $f1['u_tel']; ?>'  pattern='\d\d\d\d\d\d\d\d\d\d' maxlength='10' <?php if($f1['u_id']!=$u_id){ echo 'disabled'; } ?> minlength='10' class='form-control' name="u_tel" required placeholder='เบอร์โทรศัพท์' id="">
                    <label for="">อีเมล</label>
                    <input type="email" value='<?= $f1['u_email']; ?>'  maxlength='255' class='form-control' name="u_email" required placeholder='อีเมล' id="">
                    <label for="">สถานะ</label>
                    <select name="u_status" <?php if($f1['u_id']==$u_id){ echo 'disabled'; } ?> required class='form-control' id="">
                        <option value="1" <?php if($f1['u_status']==1){ echo 'selected'; } ?>>
                            สมาชิก
                        </option>
                        <option value="2" <?php if($f1['u_status']==2){ echo 'selected'; } ?>>
                            แอดมิน
                        </option>
                    </select>
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
                        <form action="?page=user_add" enctype='multipart/form-data' method="post">

                        <label for="">ชื่อ<?= $title[$page]; ?></label>
                        <input type="text"  class='form-control' maxlength='255' name="u_fname" required placeholder='ชื่อ<?= $title[$page]; ?>' id="">
                        <label for="">นามสกุล</label>
                        <input type="text"  class='form-control' maxlength='255' name="u_lname" required placeholder='นามสกุล' id="">
                        <label for="">เบอร์โทรศัพท์</label>
                        <input type="text" maxlength='10' pattern='\d\d\d\d\d\d\d\d\d\d' minlength='10' class='form-control' name="u_tel" required placeholder='เบอร์โทรศัพท์' id="">
                        <label for="">อีเมล</label>
                        <input type="email"   maxlength='255' class='form-control' name="u_email" required placeholder='อีเมล' id="">
                        <label for="">สถานะ</label>
                        <select name="u_status" required class='form-control' id="">
                            <option value="1">
                                สมาชิก
                            </option>
                            <option value="2">
                                แอดมิน
                            </option>
                        </select>

                    </div>
                    <div class="modal-footer">
                        <button type='submit' class='btn btn-outline-dark btn-light' >ตกลง</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>