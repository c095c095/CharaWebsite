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
if($type!=''){
    $sql1="update asse_question set ques_topic='$topic',ques_type='$type' where ques_id=$qid";

}else{
    $sql1="update asse_question set ques_topic='$topic' where ques_id=$qid";

}
$qq1=mysqli_query($conn,$sql1);

?>
<script>
    location.href='?page=asse_edit&id=<?= $id; ?>';
</script>