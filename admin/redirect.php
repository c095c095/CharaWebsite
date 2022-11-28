<div class="text-center fs-1 py-5" style="min-height: 60vh;">
    <div class="d-flex justify-content-center">
        <div class="spinner-border text-muted" role="status"></div>
    </div>
    <p class="text-muted">กำลังโหลด</p>
</div>
<?php 
    $go=$_GET['go'];
    $old=$_GET['old'];
    $_SESSION['old_page']='admin/?'.$old;

?>
<script>
    location.href='<?= $go ?>';
</script>