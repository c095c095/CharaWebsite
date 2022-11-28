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
    $name=$_POST['m_name'];
    $price=$_POST['m_price'];
    $type=$_POST['type_id'];
$sql1="insert into menu values(null,'$type','$name','$price',$time)";
$qq1=mysqli_query($conn,$sql1);

?>
<script>
    location.href='?page=menu';
</script>