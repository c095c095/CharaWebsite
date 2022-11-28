<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
            <button class='btn btn-light' data-bs-toggle='offcanvas' data-bs-target='#cann'>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-none d-lg-inline">
        <a href="?page=home" class="navbar-brand">
            <img src="../assets/images/icon.png" style="width: 75px;" alt="icon">
        </a></div>
        
                        <a href="" class="nav-link  ">
                            <span class="icon icon-user fs-5"></span>
                            <?= @$_SESSION['u_name'] ?>
                        </a>
    </div>
</nav>