<div class="text-center fs-1 py-5" style="min-height: 60vh;">
    <div class="d-flex justify-content-center">
        <div class="spinner-border text-muted" role="status"></div>
    </div>
    <p class="text-muted">กำลังโหลด</p>
</div>
<?php

if(@$_GET['go_page'] !="" && @$_GET['old_page'] != "") {
    $_SESSION['old_page'] = "?".urldecode($_GET['old_page']);
    to(urldecode($_GET['go_page']));
} else {
    to("?page=home");
}