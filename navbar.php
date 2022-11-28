<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a href="?page=home" class="navbar-brand">
            <img src="assets/images/icon.png" style="width: 75px;" alt="icon">
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar">
            <ul class="navbar-nav text-center fs-3 me-auto">
                <li class="nav-item">
                    <a href="?page=home" class="nav-link <?php if($page == "home") { echo "active"; } ?>">หน้าแรก</a>
                </li>
                <li class="nav-item">
                    <a href="?page=menu" class="nav-link <?php if($page == "menu") { echo "active"; } ?>">รายการอาหาร</a>
                </li>
                <li class="nav-item">
                    <a href="?page=information" class="nav-link <?php if($page == "information") { echo "active"; } ?>">ประชาสัมพันธ์</a>
                </li>
                <li class="nav-item">
                    <a href="?page=forum-home" class="nav-link <?php if($page == "forum-home") { echo "active"; } ?>">กระดานสนทนา</a>
                </li>
                <li class="nav-item">
                    <a href="?page=assessment" class="nav-link <?php if($page == "assessment") { echo "active"; } ?>">แบบประเมิน</a>
                </li>
            </ul>
            <ul class="navbar-nav text-center fs-3">
                <?php
                if(@$_SESSION['u_id'] != "") {
                    if(@$_SESSION['u_status'] == 2 && @$_SESSION['old_page'] != "") {
                        ?>
                        <li class="nav-item my-auto me-2">
                            <a href="?page=back" class="btn btn-primary fs-4">กลับหลังบ้าน</a>
                        </li>
                        <?php
                    }
                    ?>
                    <li class="nav-item dropdown dropdown-auto">
                        <a href="" class="nav-link dropdown-toggle  <?php if($page == "profile" || $page == "logout") { echo "active"; } ?>" data-bs-toggle="dropdown">
                            <span class="icon icon-user fs-5"></span>
                            <?= @$_SESSION['u_name'] ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-auto fs-4 py-0">
                            <li class="dropdown-h"></li>
                            <div class="px-2">
                                <li class="my-2">
                                    <a href="?page=profile" class="dropdown-item  <?php if($page == "profile") { echo "active"; } ?>">โปรไฟล์</a>
                                </li>
                                <?php
                                if(@$_SESSION['u_status'] == 2) {
                                    ?>
                                    <li class="my-2">
                                        <a href="admin/" class="dropdown-item">Dashboard</a>
                                    </li>
                                    <?php
                                }
                                ?>
                                <li class="my-2">
                                    <a href="?page=logout" class="dropdown-item  <?php if($page == "logout") { echo "active"; } ?>">ออกจากระบบ</a>
                                </li>
                            </div>
                        </ul>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="nav-item">
                        <a href="?page=register" class="nav-link  <?php if($page == "register") { echo "active"; } ?>">สร้างบัญชี</a>
                    </li>
                    <li class="nav-item my-auto">
                        <a href="?page=login" class="btn btn-primary fs-4">
                            <span class="icon icon-log-in fs-5"></span>
                            เข้าสู่ระบบ
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

<script>
    $(document).ready(() => {
        $(".dropdown-auto").mouseenter(() => {
            $(".dropdown-menu-auto").addClass("show");
        });
        $(".dropdown-auto").mouseleave(() => {
            $(".dropdown-menu-auto").removeClass("show");
        });
    });
</script>