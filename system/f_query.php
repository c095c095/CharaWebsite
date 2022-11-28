<?php

function loga($name, $text, $log) {
    if($log === true) {
        echo "<script> console.log(`".$name." : ".$text."`); </script>";
    }
    return true;
}

function qry($sql, $log = false) {
    global $conn;

    if($sql == "") {
        loga("query", "no sql", $log);
        return false;
    }

    loga("query", $sql, $log);

    if($query = mysqli_query($conn, $sql)) {
        loga("query", "success", $log);
        return $query;
    }

    loga("query", "fail", $log);
    return false;
}

function num($sql, $log = false) {
    if($query = qry($sql, $log)) {
        $num = mysqli_num_rows($query);

        if($num >= 0) {
            loga("num", "success", $log);
            loga("num", "num ".$num." row", $log);
            return $num;
        }
    }

    loga("num", "fail", $log);
    return false;
}

function fec($sql, $log = false) {
    if($query = qry($sql, $log)) {
        if(num($sql, $log) > 0) {
            while($value = mysqli_fetch_array($query)) {
                $data[] = $value;
            }

            loga("fetch", "success", $log);
            return $data;
        } else {
            loga("fetch", "no data to fetch", $log);
        }
    }

    loga("fetch", "fail", $log);
    return false;
}

function real($data, $log = false) {
    global $conn;

    if($data == "") {
        loga("escape real string", "no data", $log);
        return $data;
    }

    if($newData = mysqli_real_escape_string($conn, $data)) {
        loga("escape real string", "success", $log);
        return $newData;
    }

    loga('escape real string', "fail", $log);
    return false;
}