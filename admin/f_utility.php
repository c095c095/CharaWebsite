<?php

function alert($text = "ทดสอบ") {
    echo "<script> alert(`".$text."`); </script>";
    return true;
}

function reload() {
    echo "<script> location.href = `".$_SERVER['REQUEST_URI']."`; </script>";
    return true;
}

function to($link) {
    echo "<script> location.href = `".$link."`; </script>";
    return true;
}

function thai($time, $type = 1) {
    $cut = explode("-", $time);
    $timeNew = strtotime($time);
    $month_map = [
        "01" => "มกราคม",
        "02" => "กุมภาพันธ์",
        "03" => "มีนาคม",
        "04" => "เมษายน",
        "05" => "พฤษภาคม",
        "06" => "มิถุนายน",
        "07" => "กรกฎาคม",
        "08" => "สิงหาคม",
        "09" => "กันยายน",
        "10" => "ตุลาคม",
        "11" => "พฤศจิกายน",
        "12" => "ธันวาคม"
    ];

    $hour = date("H:i น.", $timeNew);
    $day = date("d", $timeNew);
    $month = $month_map[$cut[1]];
    $year = date("Y", $timeNew) + 543;

    if($type == 1) {
        $text = $month." ".$day.", ".$year;
        return $text;
    } elseif($type == 2) {
        $text = $day." ".$month." ".$year." ".$hour;
        return $text; 
    }

    return $time;
}