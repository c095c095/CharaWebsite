<div class="text-center fs-1 py-5" style="min-height: 60vh;">
    <div class="d-flex justify-content-center">
        <div class="spinner-border text-muted" role="status"></div>
    </div>
    <p class="text-muted">กำลังโหลด</p>
</div>
<?php

$u_id = (@$_SESSION['u_id'] != "") ? $_SESSION['u_id'] : 0;
$forum_id = (@$_GET['forum_id'] != "") ? $_GET['forum_id'] : 0;

$forum_id = real($forum_id);

$sql_c = "SELECT * FROM forum WHERE forum_id='$forum_id' AND u_id='$u_id'";

if(@$_SESSION['u_status'] == 2) {
    $sql_c = "SELECT * FROM forum WHERE forum_id='$forum_id'";
}

if(num($sql_c) == 1) {
    $sql = "DELETE FROM forum WHERE forum_id='$forum_id' AND u_id='$u_id' LIMIT 1";

    if(@$_SESSION['u_status'] == 2) {
        $sql = "DELETE FROM forum WHERE forum_id='$forum_id' LIMIT 1";
    }

    if(qry($sql)) {
        $sql2 = "DELETE FROM comment_forum WHERE forum_id='$forum_id'";

        if(qry($sql2)) {
            $sql3 = "DELETE FROM view_forum WHERE forum_id='$forum_id'";

            if(qry($sql3)) {
                $sql4 = "DELETE FROM forum_report WHERE forum_id='$forum_id'";

                if(qry($sql4)) {
                    alert("ลบกระดานสนทนา สำเร็จ!");
                    to("?page=forum-home");
                } else {
                    alert("เกิดข้อผิดพลาด!");
                    to("?page=home");
                }
            } else {
                alert("เกิดข้อผิดพลาด!");
                to("?page=home");
            }
        } else {
            alert("เกิดข้อผิดพลาด!");
            to("?page=home");
        }
    } else {
        alert("เกิดข้อผิดพลาด!");
        to("?page=home");
    }
} else {
    alert("เกิดข้อผิดพลาด!");
    to("?page=home");
}