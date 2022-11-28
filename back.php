<div class="text-center fs-1 py-5" style="min-height: 60vh;">
    <div class="d-flex justify-content-center">
        <div class="spinner-border text-muted" role="status"></div>
    </div>
    <p class="text-muted">กำลังโหลด</p>
</div>
<?php
if(@$_SESSION['old_page'] != "") {
    $old_page = $_SESSION['old_page'];
    unset($_SESSION['old_page']);
    to($old_page);
} else {
    to("?page=home");
}