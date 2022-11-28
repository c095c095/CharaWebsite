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
        <div class="row">
            <div class="col-12">

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
                            while($f2=mysqli_fetch_assoc($q2)){
                                $sel3="select * from asse_answer where ques_id=".$f2['ques_id'];
                                $q3=mysqli_query($conn,$sel3);
                                $n3=mysqli_num_rows($q3);
                    ?>
                <div class="row">
                    <div class="col-10 h4 mb-1 mt-3">
                        <?= $f2['ques_topic']; ?>
                    </div>
                    <div class="col-2  mb-1 mt-3">
                        <span class='dropdown-toggle' data-bs-toggle='dropdown'>จัดการ</span>
                            <ul class='dropdown-menu'>
                                <li>
                                    <span class='dropdown-item' data-bs-toggle='modal' data-bs-target='#e_<?= $f2['ques_id']; ?>'>แก้ไข</span>
                                </li>
                                <li>
                                    <span class='dropdown-item' data-bs-toggle='modal' data-bs-target='#d_<?= $f2['ques_id']; ?>'>ลบ</span>
                                </li>
                            </ul>
                    </div>
                    <div class="col-12">
                        <?php
                            if($f2['ques_type']==1){
                                ?>
                                <input type="radio" name="" disabled class='form-check-input' id=""><label for="">ดีมาก</label><br>
                                <input type="radio" name="" disabled class='form-check-input' id=""><label for="">ดี</label><br>
                                <input type="radio" name="" disabled class='form-check-input' id=""><label for="">ค่อนข้างดี</label><br>
                                <input type="radio" name="" disabled class='form-check-input' id=""><label for="">พอใช้</label><br>
                                <input type="radio" name="" disabled class='form-check-input' id=""><label for="">ปรับปรุง</label><br>
                                <?php
                            }
                            if($f2['ques_type']==2){
                                ?>
                                <input type="radio" name="" disabled class='form-check-input' id=""><label for="">ใช่</label><br>
                                <input type="radio" name="" disabled class='form-check-input' id=""><label for="">ไม่ใช่</label><br>
                                <?php
                            }
                            if($f2['ques_type']==3){
                                ?>
                                <input type="text" placeholder='กรอกคำตอบของคุณ' name="" disabled class='form-control' id=""><br>
                                <?php
                            }
                        ?>
                    </div>
                    <hr class='mt-2'>
                </div>


<div class="modal" id='d_<?= $f2['ques_id']; ?>'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                ลบคำถาม
                <button class='btn btn-close' data-bs-dismiss='modal'></button>
            </div>
            <div class="modal-body">
                ต้องการลบ <?= $f2['ques_topic']; ?>
            </div>
            <div class="modal-footer">
                <a href="?page=ques_del&id=<?= $id ?>&qid=<?= $f2['ques_id']; ?>" class='btn btn-outline-danger'>ลบ</a>
                <button type='button' data-bs-dismiss='modal' class='btn btn-outline-dark btn-light' >ยกเลิก</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal" id='e_<?= $f2['ques_id']; ?>'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                แก้ไขคำถาม
                <button class='btn btn-close' data-bs-dismiss='modal'></button>
            </div>
            <div class="modal-body">
                <form action="?page=ques_edit&id=<?= $id ?>&qid=<?= $f2['ques_id']; ?>" enctype='multipart/form-data' method="post">
                    <label for="">ชื่อคำถาม</label>
                    <input type="text" maxlength='255' class='form-control' value='<?= $f2['ques_topic']; ?>' name="ques_topic" required placeholder='ชื่อคำถาม' id="">
                    <label for="">ประเภท</label>
                    <select name="ques_type" <?php if($n3>0){ echo 'disabled'; } ?> required class='form-control' id="">
                        <option value="1" <?php if($f2['ques_type']==1){ echo 'selected'; } ?>>
                            5ตัวเลือก
                        </option>
                        <option value="2" <?php if($f2['ques_type']==2){ echo 'selected'; } ?>>
                            ใช่/ไม่ใช่
                        </option>
                        <option value="3" <?php if($f2['ques_type']==3){ echo 'selected'; } ?>>
                            คำตอบ
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

            </div>
        </div>
    </div>
</div>

<div class="modal" id='a_<?= $page ?>'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                เพิ่มคำถาม
                <button class='btn btn-close' data-bs-dismiss='modal'></button>
            </div>
            <div class="modal-body">
                <form action="?page=ques_add&id=<?= $id ?>" enctype='multipart/form-data' method="post">
                    <label for="">ชื่อคำถาม</label>
                    <input type="text" maxlength='255' class='form-control' name="ques_topic" required placeholder='ชื่อคำถาม' id="">
                    <label for="">ประเภท</label>
                    <select name="ques_type" required class='form-control' id="">
                        <option value="1">
                            5ตัวเลือก
                        </option>
                        <option value="2">
                            ใช่/ไม่ใช่
                        </option>
                        <option value="3">
                            คำตอบ
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