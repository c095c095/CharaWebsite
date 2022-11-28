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
            $sql1="insert into information values(null,'$u_id','$topic','$detail','$new_name','$date',$time)";
            copy($tmp_name,'../upload/information/'.$new_name);
        }else{
            $new_name='';
            $sql1="insert into information values(null,'$u_id','$topic','$detail','$new_name','$date',$time)";
        }
        $qq1=mysqli_query($conn,$sql1);

?>
<script>
    location.href='?page=info';
</script>