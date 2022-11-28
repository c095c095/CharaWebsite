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
    $type=$_POST['ques_type'];
$topic=$_POST['ques_topic'];
$sql1="insert into asse_question values(null,'$id','$topic','$type','$date',$time)";
$qq1=mysqli_query($conn,$sql1);

?>
<script>
    location.href='?page=asse_edit&id=<?= $id; ?>';
</script>