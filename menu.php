<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div class="line">
                <span class='text'>รายการอาหาร</span>
            </div>
        </div>
        <div class="col-12">
            <?php 
                $sel1="select * from type ";
                $q1=mysqli_query($conn,$sel1);
                $n1=mysqli_num_rows($q1);
                if($n1==0){
                    ?>
                        <div class="row">
                            <div class="col-12 text-center mb-5 fs-2">
                                <p class='text-muted'>ไม่มีประเภทอาหารในตอนนี้</p>
                            </div>
                        </div>
                    <?php
                }else{
                    while($f1=mysqli_fetch_assoc($q1)){
            ?>
            <div class="row justify-content-center">
                <div class="col-12 text-center fs-2 my-4"><?= $f1['type_name']; ?></div>
                <?php
                    $sel2="select * from menu where type_id=".$f1['type_id'];
                    $q2=mysqli_query($conn,$sel2);
                    $n2=mysqli_num_rows($q2);
                    if($n2==0){
                        ?>
                            <div class="row">
                                <div class="col-12 text-center mb-5 fs-2">
                                    <p class='text-muted'>ไม่มีอาหารในประเภทนี้</p>
                                </div>
                            </div>
                        <?php
                    }else{
                        while($f2=mysqli_fetch_assoc($q2)){
                        ?>
                        <div class="col-6 fs-3 mt-2">
                            <div class="d-flex">
                                <span class='text-nowrap'><?= $f2['m_name']; ?></span>
                                <span class='overflow-hidden'>.....................................................................................................................................................................</span>
                                <span class='text-nowrap'><?= number_format($f2['m_price']); ?>฿</span>
                            </div>
                        </div>
                        <?php
                        }
                    }
                ?>
                <hr class='my-5'>
            </div>
            <?php 
                    }
                }
            ?>
        </div>
    </div>
</div>