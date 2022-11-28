<?php

$title["home"] = "หน้าแรก";
$link["home"] = "home.php";

$title["login"] = "เข้าสู่ระบบ";
$link["login"] = "login.php";

$title["logout"] = "ออกจากระบบ";
$link["logout"] = "logout.php";

$title["register"] = "สร้างบัญชี";
$link["register"] = "register.php";

$title["profile"] = "โปรไฟล์";
$link["profile"] = "profile.php";

$title["go-to"] = "โปรดรอ...";
$link["go-to"] = "go-to.php";

$title["back"] = "โปรดรอ...";
$link["back"] = "back.php";

$title["menu"] = "รายการอาหาร";
$link["menu"] = "menu.php";

$title["information"] = "ประชาสัมพันธ์";
$link["information"] = "information.php";

if(@$_GET['page'] == "information-detail") {
    $id = ($_GET['info_id'] != "") ? real($_GET['info_id']) : 0;
    $sql = "SELECT * FROM information WHERE info_id='$id'";
    
    if(num($sql) == 1) {
        $data = fec($sql);
        $name = $data[0]['info_topic'];
    } else {
        $name = "ไม่พบประชาสัมพันธ์";
    }
}
$title["information-detail"] = @$name;
$link["information-detail"] = "information-detail.php";

$title["assessment"] = "แบบประเมิน";
$link["assessment"] = "assessment.php";

if(@$_GET['page'] == "assessment-do") {
    $id = ($_GET['asse_id'] != "") ? real($_GET['asse_id']) : 0;
    $sql = "SELECT * FROM assessment WHERE asse_id='$id'";
    
    if(num($sql) == 1) {
        $data = fec($sql);
        $name = $data[0]['asse_topic'];
    } else {
        $name = "ไม่พบแบบประเมิน";
    }
}
$title["assessment-do"] = @$name;
$link["assessment-do"] = "assessment-do.php";

$title["forum-home"] = "กระดานสนทนา";
$link["forum-home"] = "forum-home.php";

if(@$_GET['page'] == "forum") {
    $id = ($_GET['forum_id'] != "") ? real($_GET['forum_id']) : 0;
    $sql = "SELECT * FROM forum WHERE forum_id='$id'";
    
    if(num($sql) == 1) {
        $data = fec($sql);
        $name = $data[0]['forum_topic'];
    } else {
        $name = "ไม่พบกระดานสนทนา";
    }
}
$title["forum"] = @$name;
$link["forum"] = "forum.php";

$title["forum-create"] = "สร้างกระดานสนทนา";
$link["forum-create"] = "forum-create.php";

$title["forum-edit"] = "แก้ไขกระดานสนทนา";
$link["forum-edit"] = "forum-edit.php";

$title["forum-delete"] = "ลบกระดานสนทนา";
$link["forum-delete"] = "forum-delete.php";