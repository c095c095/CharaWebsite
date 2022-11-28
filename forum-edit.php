<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 pt-5 pb-3">
            <div class="line">
                <span class='text'>แก้ไขกระดานสนทนา</span>
            </div>
        </div>
        <div class="col-12 col-lg-10 fs-4">
            <?php
                @$id=$_GET['forum_id'];
                $sel1="select * from forum where forum_id='$id'";
                $q1=mysqli_query($conn,$sel1);
                $f1=mysqli_fetch_assoc($q1);
                if($f1['u_id']==$_SESSION['u_id']){
            ?>
        <form action="?page=forum-edit&forum_id=<?= $id ?>" enctype='multipart/form-data' method="post">
                            <label for="">ชื่อ<?= $title[$page]; ?></label>
                            <input type="text" maxlength='255' value='<?= $f1['forum_topic'] ?>' class='form-control  fs-4' name="forum_topic" required placeholder='ชื่อ<?= $title[$page]; ?>*' id="">
                            <label for="">รายละเอียด</label>
                            <textarea id="" class='form-control  fs-4' name="forum_detail" required placeholder='รายละเอียด*'  cols="30" rows="10"><?= $f1['forum_detail'] ?></textarea>
                            <label for="">ภาพ</label>
                            <input type="file" maxlength='255' accept='.jpg,.png,.jpeg,.gif,.webp' class='form-control  fs-4' name="img" placeholder='ภาพ' id="">
                            <input type="submit" name='btn' class='btn btn-primary fs-4 w-100 my-5' value="แก้ไขกระดานสนทนา">
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
        $sql1="update forum set forum_topic='$topic',forum_detail='$detail',forum_img='$new_name' where forum_id=$id";
        copy($tmp_name,'upload/forum/'.$new_name);
    }else{
        $new_name='';
        $sql1="update forum set forum_topic='$topic',forum_detail='$detail' where forum_id=$id";
    }
        $qq1=mysqli_query($conn,$sql1);
        ?>
<script>
    location.href='?page=forum&forum_id=<?= $id; ?>';
</script>
<?php 
        }else{
            ?>
            <script>
                location.href="?page=login";
            </script>
            <?php
        }
    }}else{
        ?>
        <script>
            location.href="?page=home";
        </script>
        <?php
    }
?>