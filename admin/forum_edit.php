<div class="text-center fs-1 py-5" style="min-height: 60vh;">
    <div class="d-flex justify-content-center">
        <div class="spinner-border text-muted" role="status"></div>
    </div>
    <p class="text-muted">กำลังโหลด</p>
</div>
<?php 
    @$id=$_GET['id'];
    @$qid=$_GET['qid'];
    @$status=$_GET['status'];
    @$topic=$_POST['forum_topic'];
    @$detail=$_POST['forum_detail'];
    @$img=$_FILES['img']['name'];
    @$tmp_name=$_FILES['img']['tmp_name'];
    $exp=explode(".",$img);
    $new_name='forum'.$date2.'.'.end($exp);
        if($img!=''){
            $sql1="update forum set forum_topic='$topic',forum_detail='$detail',forum_img='$new_name' where forum_id=$id";
            copy($tmp_name,'../upload/forum/'.$new_name);
        }else{
            $new_name='';
            $sql1="update forum set forum_topic='$topic',forum_detail='$detail' where forum_id=$id";
        }
        $qq1=mysqli_query($conn,$sql1);

?>
<script>
    location.href='?page=forum';
</script>