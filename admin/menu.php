
        <div class="table-responsive">
            <table class='table table-bordered table-striped'>
                <thead>
                    <tr>
                        <?php 
                            $num=1;
                        ?>
                        <th class='text-center'>ลำดับ</th><?php $num++; ?>
                        <th class='text-center'>ชื่อ<?= $title[$page]; ?></th><?php $num++; ?>
                        <th class='text-center'>ประเภท</th><?php $num++; ?>
                        <th class='text-center'>ราคา</th><?php $num++; ?>
                        <th class='text-center'>จัดการ</th><?php $num++; ?>
                    </tr>
                </thead>
                <?php  ?>
                <tbody>
                    <?php
                    if(@$_POST['search']!=''){
                        $sel1="select * from menu where m_name like '%".$_POST['search']."%'
                        ";
                    }else{
                        $sel1="select * from menu";
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
                                $sel2="select * from type where type_id=".$f1['type_id'];
                                $q2=mysqli_query($conn,$sel2);
                                $n2=mysqli_num_rows($q2);
                                $f2=mysqli_fetch_assoc($q2);
                    ?>
                    <tr>
                        <td class='text-center'><?= number_format($c++); ?></td>
                        <td class='text-start'><?= $f1['m_name']; ?></td>
                        <td class='text-start'><?= $f2['type_name']; ?></td>
                        <td class='text-center'><?= number_format($f1['m_price']); ?></td>
                        <td class='text-center'>
                            <span class='dropdown-toggle' data-bs-toggle='dropdown'>จัดการ</span>
                            <ul class='dropdown-menu'>
                                <li>
                                    <span class='dropdown-item' data-bs-toggle='modal' data-bs-target='#e_<?= $f1['m_id']; ?>'>แก้ไข</span>
                                </li>
                                <li>
                                    <span class='dropdown-item' data-bs-toggle='modal' data-bs-target='#d_<?= $f1['m_id']; ?>'>ลบ</span>
                                </li>
                            </ul>
                        </td>
                    </tr>


<div class="modal" id='d_<?= $f1['m_id']; ?>'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                ลบ<?= $title[$page]; ?>
                <button class='btn btn-close' data-bs-dismiss='modal'></button>
            </div>
            <div class="modal-body">
                ต้องการลบ <?= $f1['m_name']; ?>
            </div>
            <div class="modal-footer">
                <a href="?page=menu_del&id=<?= $f1['m_id'] ?>" class='btn btn-outline-danger'>ลบ</a>
                <button type='button' data-bs-dismiss='modal' class='btn btn-outline-dark btn-light' >ยกเลิก</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal" id='e_<?= $f1['m_id']; ?>'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                แก้ไข<?= $title[$page]; ?>
                <button class='btn btn-close' data-bs-dismiss='modal'></button>
            </div>
            <div class="modal-body">
                <form action="?page=menu_edit&id=<?= $f1['m_id']; ?>" enctype='multipart/form-data' method="post">
                    <label for="">ชื่อ<?= $title[$page]; ?></label>
                    <input type="text" maxlength='255' value='<?= $f1['m_name']; ?>' class='form-control' name="m_name" required placeholder='ชื่อ<?= $title[$page]; ?>' id="">
                    <label for="">ราคา</label>
                    <input type="number" class='form-control' value='<?= $f1['m_price']; ?>' name="m_price" required placeholder='ราคา' id="">

                    <label for="">ประเภท</label>
                    <select name="type_id" required class='form-control' id="">
                    <?php
                    $sel3="select * from type";
                    $q3=mysqli_query($conn,$sel3);
                    $n3=mysqli_num_rows($q3);
                        while($f3=mysqli_fetch_assoc($q3)){
                    ?>
                    <option value="<?= $f3['type_id'] ?>" <?php if($f3['type_id']==$f1['type_id']){ echo 'selected'; } ?>><?= $f3['type_name'] ?></option>
                    <?php 
                            }
                    ?>
                    </select>
                    

            </div>
            <div class="modal-footer">
                <button type='submit' class='btn <?php if($n3==0){ echo 'disabled'; } ?> btn-outline-dark btn-light' >ตกลง</button>
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
                        <form action="?page=menu_add" enctype='multipart/form-data' method="post">

                        <label for="">ชื่อ<?= $title[$page]; ?></label>
                        <input type="text" maxlength='255' class='form-control' name="m_name" required placeholder='ชื่อ<?= $title[$page]; ?>' id="">
                        <label for="">ราคา</label>
                        <input type="number" class='form-control' name="m_price" required placeholder='ราคา' id="">

                        <label for="">ประเภท</label>
                        <select name="type_id" required class='form-control' id="">
                        <?php
                        $sel3="select * from type";
                        $q3=mysqli_query($conn,$sel3);
                        $n3=mysqli_num_rows($q3);
                        if($n3==0){
                            ?>
                            <option value="">โปรดเพิ่มประเภทอาหาร</option>
                            <?php 
                        }else{
                            while($f3=mysqli_fetch_assoc($q3)){
                        ?>
                        <option value="<?= $f3['type_id'] ?>"><?= $f3['type_name'] ?></option>
                        <?php 
                                }
                            }
                        ?>
                        </select>


                    </div>
                    <div class="modal-footer">
                        <button type='submit' <?php if($n3==0){ echo 'disabled'; } ?> class='btn btn-outline-dark btn-light' >ตกลง</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>