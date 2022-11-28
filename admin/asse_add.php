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
$topic=$_POST['asse_topic'];
$sql1="insert into assessment values(null,'$u_id','$topic','0','$date')";
$qq1=mysqli_query($conn,$sql1);
$sel1="select * from assessment where asse_topic='$topic' and asse_created='$date'";
$q1=mysqli_query($conn,$sel1);
$f1=mysqli_fetch_assoc($q1);

?>
<script>
    location.href='?page=asse_edit&id=<?= $f1['asse_id']; ?>';
</script>