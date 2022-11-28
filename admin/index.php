<?php 
    session_start();
    include("connect.php");
    include("link.php");
    include("f_utility.php");
    $_SESSION['old_page']='';
    if(@$_GET['page']==''){
        $page='home';
    }else{
        $page=$_GET['page'];
    }if(@$page==''){
        $page='home';
    }if(@$_SESSION['u_status']!=2){
        ?>
        <script>
            location.href='../?page=home';
        </script>
        <?php
    }else{
        $u_id=$_SESSION['u_id'];
        $u_status=$_SESSION['u_status'];
        $u_name=$_SESSION['u_name'];
        $date=date("Y-m-d H:i:s");
        $date2=date("dmYHis");
        $time="current_timestamp()";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/icon.css">
    <title>Photchara Admin</title>
</head>
<body>
    <?php 
        include("navbar.php");
    ?>
    <div class="container bg-light" style='min-height:92vh;'>
        <div class="row">
            <div class="col-2">
                <?php
                    if($page=='asse_edit'){
                        ?>
                        <a href="?page=asse" class='btn btn-light  btn-outline-secondary'>กลับ</a>
                        <?php
                    }
                    if($page=='asse_report_p'){
                        ?>
                        <a href="?page=asse_report" class='btn btn-light  btn-outline-secondary'>กลับ</a>
                        <?php
                    }
                ?>
            </div>
            <div class="col-10">
                <div class="row">
                    <div class="col-6  col-lg-8">
                        <form action="?page=<?= $page ?>" enctype='multipart/form-data' method="post">
                        <?php if($page!='home'&&$page!='asse_edit'&&$page!='asse_report'&&$page!='asse_report_p'&&$page!='forum_report'){ ?>
                        <input type="text" name="search" class='form-control' placeholder='Search' id="">
                        <?php } ?>
                    </div>
                    <div class="col-3  col-lg-2">
                        <?php if($page!='home'&&$page!='asse_edit'&&$page!='asse_report'&&$page!='asse_report_p'&&$page!='forum_report'){ ?>
                            <button type="submit" class='btn btn-light btn-outline-secondary'>ค้นหา</button>
                        <?php } ?>
                        </form>
                    </div>
                    <div class="col-3 col-lg-2 text-end">
                        <?php if($page!='home'&&$page!='asse_report'&&$page!='asse_report_p'&&$page!='forum_report'){ ?>
                        <button class='btn btn-light btn-outline-secondary' data-bs-toggle='modal' data-bs-target='#a_<?= $page ?>'>เพิ่ม<div class="d-none d-lg-inline">ข้อมูล</div></button>
                        <?php } ?>
                    </div>   
                </div>
            </div>
        </div>
                        <?php if($page!='home'){ ?>
        <div class="row">
            <div class="col-12 text-center h1">
                <?= $title[$page]; ?>
            </div>
        </div>
        <hr>
                        <?php } ?>
        <div class="row">
            <div class="col-12">
                <?php 
                    include($link[$page]);
                ?>
            </div>
        </div>
    </div>
    <?php 
        include("footer.php");
    ?>



<div class="offcanvas offcanvas-start" id='cann'>
        <div class="offcanvas-header">
            <h2 class='my-0 text-success'>Photchara <i class='my-0'><small class='h6 my-0'>Admin</small></i></h2>
            <button class='btn btn-close' data-bs-dismiss='offcanvas'></button>
        </div>
        <hr class='my-0'>
        <div class="offcanvas-body">
                <ul class='nav row' style='max-width:100%;'>
                    <div class="col-12 justify-content-center">
                    <li class='nav-item'>
                        <a href="?page=home" class='nav-link <?php if($page=='home'){ echo 'active bg-success rounded-3 text-white'; }else{ echo 'text-success'; } ?>'><?= $title['home']; ?></a>
                    </li>
                    <li class='nav-item'>
                        <a href="?page=user" class='nav-link <?php if($page=='user'){ echo 'active bg-success rounded-3 text-white'; }else{ echo 'text-success'; } ?>'><?= $title['user']; ?></a>
                    </li>
                    <li class='nav-item'>
                        <a href="?page=asse" class='nav-link <?php if($page=='asse'||$page=='asse_edit'){ echo 'active bg-success rounded-3 text-white'; }else{ echo 'text-success'; } ?>'><?= $title['asse']; ?></a>
                    </li>
                    <li class='nav-item'>
                        <a href="?page=forum" class='nav-link <?php if($page=='forum'){ echo 'active bg-success rounded-3 text-white'; }else{ echo 'text-success'; } ?>'><?= $title['forum']; ?></a>
                    </li>
                    <li class='nav-item'>
                        <a href="?page=info" class='nav-link <?php if($page=='info'){ echo 'active bg-success rounded-3 text-white'; }else{ echo 'text-success'; } ?>'><?= $title['info']; ?></a>
                    </li>
                    <li class='nav-item'>
                        <a href="?page=type" class='nav-link <?php if($page=='type'){ echo 'active bg-success rounded-3 text-white'; }else{ echo 'text-success'; } ?>'><?= $title['type']; ?></a>
                    </li>
                    <li class='nav-item'>
                        <a href="?page=menu" class='nav-link <?php if($page=='menu'){ echo 'active bg-success rounded-3 text-white'; }else{ echo 'text-success'; } ?>'><?= $title['menu']; ?></a>
                    </li>
                    <li class='nav-item'>
                        <a href="?page=asse_report" class='nav-link <?php if($page=='asse_report'||$page=='asse_report_p'){ echo 'active bg-success rounded-3 text-white'; }else{ echo 'text-success'; } ?>'><?= $title['asse_report']; ?></a>
                    </li>
                    <li class='nav-item'>
                        <a href="?page=forum_report" class='nav-link <?php if($page=='forum_report'){ echo 'active bg-success rounded-3 text-white'; }else{ echo 'text-success'; } ?>'><?= $title['forum_report']; ?></a>
                    </li>
                    </div>
                </ul>
                <hr class='my-1'>
                <ul class='nav row ' style='max-width:100%;'>
                    <div class="col-12 justify-content-center">
                        <li class='nav-item'>
                            <a href="../?page=home" class='nav-link text-success'>ไปยังหน้าผู้ใช้</a>
                        </li>
                        <li class='nav-item'>
                            <a href="?page=logout" class='nav-link <?php if($page=='logout'){ echo 'active bg-success rounded-3 text-white'; }else{ echo 'text-success'; } ?>'><?= $title['logout']; ?></a>
                        </li>
                    </div>
                </ul>
        </div>
</div>

        <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php 
    }
?>