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
    if($status==0){
        $sql1="update assessment set asse_status='1' where asse_id=$id";
    }else{
        $sql1="update assessment set asse_status='0' where asse_id=$id";
    }
$qq1=mysqli_query($conn,$sql1);

?>
<script>
    location.href='?page=asse';
</script>