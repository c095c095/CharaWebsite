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
    @$topic=$_POST['info_topic'];
    @$detail=$_POST['info_detail'];
    @$img=$_FILES['img']['name'];
    @$tmp_name=$_FILES['img']['tmp_name'];
    $exp=explode(".",$img);
    $new_name='information'.$date2.'.'.end($exp);
        if($img!=''){
            $sql1="update information set info_topic='$topic',info_detail='$detail',info_img='$new_name' where info_id=$id";
            copy($tmp_name,'../upload/information/'.$new_name);
        }else{
            $new_name='';
            $sql1="update information set info_topic='$topic',info_detail='$detail' where info_id=$id";
        }
        $qq1=mysqli_query($conn,$sql1);

?>
<script>
    location.href='?page=info';
</script>