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
$sql1="delete from assessment where asse_id=$id";
$qq1=mysqli_query($conn,$sql1);
$sql2="delete from asse_question where asse_id=$id";
$qq2=mysqli_query($conn,$sql2);
$sql3="delete from asse_answer where asse_id=$id";
$qq3=mysqli_query($conn,$sql3);
$sql4="delete from view_asse where asse_id=$id";
$qq4=mysqli_query($conn,$sql4);

?>
<script>
    location.href='?page=asse';
</script>