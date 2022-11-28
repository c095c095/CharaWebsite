
        <div class="table-responsive">
            <table class='table table-bordered table-striped'>
                <thead>
                    <tr>
                        <?php 
                            $num=1;
                        ?>
                        <th class='text-center'>ลำดับ</th><?php $num++; ?>
                        <th class='text-center'>ชื่อ<?= $title[$page]; ?></th><?php $num++; ?>
                        <th class='text-center'>วันที่สร้าง</th><?php $num++; ?>
                        <th class='text-center'>จัดการ</th><?php $num++; ?>
                    </tr>
                </thead>
                <?php  ?>
                <tbody>
                    <?php
                    if(@$_POST['search']!=''){
                        $sel1="select * from information where info_topic like '%".$_POST['search']."%'
                        ";
                    }else{
                        $sel1="select * from information";
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
                                $go=urlencode("../?page=information-detail&info_id=".$f1['info_id']);
                                $old=urlencode($_SERVER['QUERY_STRING']);
                    ?>
                    <tr>
                        <td class='text-center'><?= number_format($c++); ?></td>
                        <td class='text-start'>
                            <?= $f1['info_topic']; ?>
                        </td>
                        <td class='text-center'><?= thai($f1['info_created'],2); ?></td>
                        <td class='text-center'>
                            <span class='dropdown-toggle' data-bs-toggle='dropdown'>จัดการ</span>
                            <ul class='dropdown-menu'> 
                                <li>
                                    <a href="?page=redirect&old=<?= $old ?>&go=<?= $go ?>" class='dropdown-item'> ไปยังประชาสัมพันธ์ </a>
                                </li>
                                <li>
                                    <span class='dropdown-item' data-bs-toggle='modal' data-bs-target='#e_<?= $f1['info_id']; ?>'>แก้ไข</span>
                                </li>
                                <li>
                                    <span class='dropdown-item' data-bs-toggle='modal' data-bs-target='#d_<?= $f1['info_id']; ?>'>ลบ</span>
                                </li>
                            </ul>
                        </td>
                    </tr>


<div class="modal" id='d_<?= $f1['info_id']; ?>'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                ลบ<?= $title[$page]; ?>
                <button class='btn btn-close' data-bs-dismiss='modal'></button>
            </div>
            <div class="modal-body">
                ต้องการลบ <?= $f1['info_topic']; ?>
            </div>
            <div class="modal-footer">
                <a href="?page=info_del&id=<?= $f1['info_id'] ?>" class='btn btn-outline-danger'>ลบ</a>
                <button type='button' data-bs-dismiss='modal' class='btn btn-outline-dark btn-light' >ยกเลิก</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal" id='e_<?= $f1['info_id']; ?>'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                แก้ไข<?= $title[$page]; ?>
                <button class='btn btn-close' data-bs-dismiss='modal'></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 text-center">
                        <img src="../upload/information/<?= $f1['info_img']; ?>" style='max-width:250px;' alt="">
                    </div>
                </div>
                <form action="?page=info_edit&id=<?= $f1['info_id']; ?>" enctype='multipart/form-data' method="post">
                    <label for="">ชื่อ<?= $title[$page]; ?></label>
                    <input type="text" maxlength='255' value='<?= $f1['info_topic']; ?>' class='form-control' name="info_topic" required placeholder='ชื่อ<?= $title[$page]; ?>' id="">
                    <label for="">รายละเอียด</label>
                    <textarea id="" class='form-control' name="info_detail" required placeholder='รายละเอียด'  cols="30" rows="10"><?= $f1['info_detail']; ?></textarea>
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
                        <form action="?page=info_add" enctype='multipart/form-data' method="post">
                            <label for="">ชื่อ<?= $title[$page]; ?></label>
                            <input type="text" maxlength='255' class='form-control' name="info_topic" required placeholder='ชื่อ<?= $title[$page]; ?>' id="">
                            <label for="">รายละเอียด</label>
                            <textarea id="" class='form-control' name="info_detail" required placeholder='รายละเอียด'  cols="30" rows="10"></textarea>
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