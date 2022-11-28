<div class="row">
    <div class="col-lg-8 col-12">
        <div class="row">
            <div class="col-12 h3">
                รายงานผลทั่วไป
            </div>
            
            <div class="col-6 col-lg-4">
                <a href="?page=user" class='text-decoration-none text-dark'>
                <div class="card my-3 text-end shadow">
                    <div class="card-header text-white bg-success">
                        สมาชิก
                    </div>
                    <div class="card-body">
                        <?php 
                            $se1="select * from user";
                            $qe1=mysqli_query($conn,$se1);
                            $ne1=mysqli_num_rows($qe1);
                        ?>
                        <h5><?= number_format($ne1) ?><small class='text-muted'> คน</small></h5>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-6 col-lg-4">
                <a href="?page=asse" class='text-decoration-none text-dark'>
                <div class="card my-3 text-end shadow">
                    <div class="card-header  text-white bg-primary">
                        แบบประเมิน
                    </div>
                    <div class="card-body">
                        <?php 
                            $se2="select * from assessment";
                            $qe2=mysqli_query($conn,$se2);
                            $ne2=mysqli_num_rows($qe2);
                        ?>
                        <h5><?= number_format($ne2) ?><small class='text-muted'> เรื่อง</small></h5>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-6 col-lg-4">
                <a href="?page=forum" class='text-decoration-none text-dark'>
                <div class="card my-3 text-end shadow ">
                    <div class="card-header  text-white bg-primary">
                        กระดานสนทนา
                    </div>
                    <div class="card-body">
                        <?php 
                            $se3="select * from forum";
                            $qe3=mysqli_query($conn,$se3);
                            $ne3=mysqli_num_rows($qe3);
                        ?>
                        <h5><?= number_format($ne3) ?><small class='text-muted'> หัวข้อ</small></h5>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-6 col-lg-4">
                <a href="?page=info" class='text-decoration-none text-dark'>
                <div class="card my-3 text-end shadow">
                    <div class="card-header  text-dark bg-warning">
                        ประชาสัมพันธ์
                    </div>
                    <div class="card-body">
                        <?php 
                            $se4="select * from information";
                            $qe4=mysqli_query($conn,$se4);
                            $ne4=mysqli_num_rows($qe4);
                        ?>
                        <h5><?= number_format($ne4) ?><small class='text-muted'> หัวข้อ</small></h5>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-12 col-lg-4">
                <a href="?page=forum_report" class='text-decoration-none text-dark'>
                <div class="card my-3 text-end shadow" >
                    <div class="card-header  text-white bg-danger">
                        กระดานสนทนาที่ถูกรายงาน
                    </div>
                    <div class="card-body">
                        <?php 
                            $se5="select * from forum_report group by forum_id";
                            $qe5=mysqli_query($conn,$se5);
                            $ne5=mysqli_num_rows($qe5);
                        ?>
                        <h5><?= number_format($ne5) ?><small class='text-muted'> หัวข้อ</small></h5>
                    </div>
                </div>
                </a>
            </div>

        </div><div class="row">
            <div class="col-12  h3">
                สถิติการเข้าชม
            </div>
            
            <div class="col-6 col-lg-4">
                <a href="" class='text-decoration-none text-dark'>
                <div class="card my-3 text-end shadow">
                    <div class="card-header text-white bg-success">
                        เว็บไซต์ทั้งหมด
                    </div>
                    <div class="card-body">
                        <?php 
                            $se6="select * from view_web";
                            $qe6=mysqli_query($conn,$se6);
                            $ne6=mysqli_num_rows($qe6);
                        ?>
                        <h5><?= number_format($ne6) ?><small class='text-muted'> ครั้ง</small></h5>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-6 col-lg-4">
                <a href="" class='text-decoration-none text-dark'>
                <div class="card my-3 text-end shadow">
                    <div class="card-header  text-white bg-primary">
                        แบบประเมิน
                    </div>
                    <div class="card-body">
                        <?php 
                            $se7="select * from view_asse";
                            $qe7=mysqli_query($conn,$se7);
                            $ne7=mysqli_num_rows($qe7);
                        ?>
                        <h5><?= number_format($ne7) ?><small class='text-muted'> ครั้ง</small></h5>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-6 col-lg-4">
                <a href="" class='text-decoration-none text-dark'>
                <div class="card my-3 text-end shadow ">
                    <div class="card-header  text-white bg-primary">
                        กระดานสนทนา
                    </div>
                    <div class="card-body">
                        <?php 
                            $se8="select * from view_forum";
                            $qe8=mysqli_query($conn,$se8);
                            $ne8=mysqli_num_rows($qe8);
                        ?>
                        <h5><?= number_format($ne8) ?><small class='text-muted'> ครั้ง</small></h5>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-6 col-lg-4">
                <a href="" class='text-decoration-none text-dark'>
                <div class="card my-3 text-end shadow">
                    <div class="card-header  text-dark bg-warning">
                        ประชาสัมพันธ์
                    </div>
                    <div class="card-body">
                        <?php 
                            $se9="select * from view_info";
                            $qe9=mysqli_query($conn,$se9);
                            $ne9=mysqli_num_rows($qe9);
                        ?>
                        <h5><?= number_format($ne9) ?><small class='text-muted'> ครั้ง</small></h5>
                    </div>
                </div>
                </a>
            </div>

        </div>
    </div>
    <div class="col-12 col-lg-4">
        <div class="h3">กระดานสนทนาล่าสุด</div>
        <div class="table-responsive">
            <table class='table table-bordered table-striped'>
                <thead>
                    <tr>
                        <?php 
                            $num=1;
                        ?>
                        <th class='text-center'>ลำดับ</th><?php $num++; ?>
                        <th class='text-center'>ชื่อ</th><?php $num++; ?>
                        <th class='text-center'>ความคิดเห็น</th><?php $num++; ?>
                    </tr>
                </thead>
                <?php  ?>
                <tbody>
                    <?php
                        $sel1="select * from forum order by forum_created DESC LIMIT 10";
                        $q1=mysqli_query($conn,$sel1);
                        $n1=mysqli_num_rows($q1);
                        if($n1==0){
                            ?>
                            <tr>
                                <td class='text-center' colspan='<?= $num ?>'>ไม่มีกระดานสนทนา</td>
                            </tr>
                            <?php
                        }else{
                            $c=1;
                            while($f1=mysqli_fetch_assoc($q1)){
                                $sel2="select * from comment_forum where forum_id=".$f1['forum_id'];
                                $q2=mysqli_query($conn,$sel2);
                                $n2=mysqli_num_rows($q2);
                                $go=urlencode("../?page=forum&forum_id=".$f1['forum_id']);
                                $old=urlencode($_SERVER['QUERY_STRING']);
                    ?>
                    <tr>
                        <td class='text-center'><?= number_format($c++); ?></td>
                        <td class='text-start'><a href="?page=redirect&old=<?= $old ?>&go=<?= $go ?>" class='text-decoration-none text-dark'><?= $f1['forum_topic']; ?></a></td>
                        <td class='text-center'><?= number_format($n2); ?></td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>