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
$sql4="delete from forum_report where forum_id=$id";
$qq4=mysqli_query($conn,$sql4);

?>
<script>
    location.href='?page=forum_report';
</script>