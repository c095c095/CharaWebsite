<?php

if(@$_SESSION['u_id'] != "") {
    ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 pt-5 pb-3">
            <div class="line">
                <span class='text'>สร้างกระดานสนทนา</span>
            </div>
        </div>
        <div class="col-12 col-lg-10 fs-4">
        <form action="?page=forum-create" enctype='multipart/form-data' method="post">
                            <label for="">ชื่อ<?= $title[$page]; ?></label>
                            <input type="text" maxlength='255' class='form-control  fs-4' name="forum_topic" required placeholder='ชื่อ<?= $title[$page]; ?>*' id="">
                            <label for="">รายละเอียด</label>
                            <textarea id="" class='form-control  fs-4' name="forum_detail" required placeholder='รายละเอียด*'  cols="30" rows="10"></textarea>
                            <label for="">ภาพ</label>
                            <input type="file" maxlength='255' accept='.jpg,.png,.jpeg,.gif,.webp' class='form-control  fs-4' name="img" placeholder='ภาพ' id="">
                            <input type="submit" name='btn' class='btn btn-primary fs-4 w-100 my-5' value="สร้างกระดานสนทนา">
                        </form>
        </div>
    </div>
</div>
<?php 
    if(@$_POST['btn']!=''){
        if(@$_SESSION['u_id']!=''){
            ?>
            <?php 
    @$id=$_GET['forum_id'];
    @$qid=$_GET['qid'];
    @$status=$_GET['status'];
    @$topic=$_POST['forum_topic'];
    @$detail=$_POST['forum_detail'];
    @$img=$_FILES['img']['name'];
    @$tmp_name=$_FILES['img']['tmp_name'];
    $exp=explode(".",$img);
    $u_id=$_SESSION['u_id'];
    $u_status=$_SESSION['u_status'];
    $u_name=$_SESSION['u_name'];
    $date=date("Y-m-d H:i:s");
    $date2=date("dmYHis");
    $time="current_timestamp()";
    $new_name='forum'.$date2.'.'.end($exp);
        if($img!=''){
            $sql1="insert into forum values(null,'$u_id','0','$topic','$detail','$new_name','$date',$time)";
            copy($tmp_name,'upload/forum/'.$new_name);
        }else{
            $new_name='';
            $sql1="insert into forum values(null,'$u_id','0','$topic','$detail','$new_name','$date',$time)";
        }
        $qq1=mysqli_query($conn,$sql1);
        $sel2="select * from forum where forum_topic='$topic' and forum_created='$date'";
        $q2=mysqli_query($conn,$sel2);
        $f2=mysqli_fetch_assoc($q2);
        ?>
<script>
    location.href='?page=forum&forum_id=<?= $f2['forum_id']; ?>';
</script>
<?php 
        }else{
            ?>
            <script>
                location.href="?page=login";
            </script>
            <?php
        }
    }
} else {
    ?>
    <div class="text-center fs-1 py-5" style="min-height: 60vh;">
        <div class="d-flex justify-content-center">
            <div class="spinner-border text-muted" role="status"></div>
        </div>
        <p class="text-muted">กำลังโหลด</p>
    </div>
    <?php
    to("?page=home");
}
?>