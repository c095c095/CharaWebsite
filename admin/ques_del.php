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
$sql2="delete from asse_question where ques_id=$qid";
$qq2=mysqli_query($conn,$sql2);
$sql3="delete from asse_answer where ques_id=$qid";
$qq3=mysqli_query($conn,$sql3);

?>
<script>
    location.href='?page=asse_edit&id=<?= $id ?>';
</script>