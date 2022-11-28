<div class="text-center fs-1 py-5" style="min-height: 60vh;">
    <div class="d-flex justify-content-center">
        <div class="spinner-border text-muted" role="status"></div>
    </div>
    <p class="text-muted">กำลังโหลด</p>
</div>
<?php

    $id=$_GET['id'];
    $sql1="delete from type where type_id=$id";
    $q1=mysqli_query($conn,$sql1);
    $sql2="delete from menu where type_id=$id";
    $q2=mysqli_query($conn,$sql2);
    
?>
<script>
    location.href='?page=type';
</script>