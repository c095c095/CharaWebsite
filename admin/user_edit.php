<div class="text-center fs-1 py-5" style="min-height: 60vh;">
    <div class="d-flex justify-content-center">
        <div class="spinner-border text-muted" role="status"></div>
    </div>
    <p class="text-muted">กำลังโหลด</p>
</div>
<?php 
    @$id=$_GET['id'];
    @$qid=$_GET['qid'];
    @$status=$_GET['status'];
    @$fname=$_POST['u_fname'];
    @$lname=$_POST['u_lname'];
    @$tel=$_POST['u_tel'];
    @$email=$_POST['u_email'];
    @$status=$_POST['u_status'];
    $sel1="select * from user where u_tel='$tel' and u_id!='$id'";
    $q1=mysqli_query($conn,$sel1);
    $n1=mysqli_num_rows($q1);
    if($n1!=0){
        ?>
        <script>
            alert("มีเบอร์นี้ในระบบแล้ว");
        </script>
        <?php
    }else{

        if($tel!=''){
            $sql1="update user set u_fname='$fname',u_lname='$lname',u_tel='$tel',u_email='$email' where u_id=$id";

        }else{
            $sql1="update user set u_fname='$fname',u_lname='$lname',u_email='$email',u_status='$status' where u_id=$id";

        }
        $qq1=mysqli_query($conn,$sql1);

}

?>
<script>
    location.href='?page=user';
</script>