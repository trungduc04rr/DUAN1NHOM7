<!DOCTYPE html>
<html lang="en">

<head>
    <title>𝑨𝒅𝒎𝒊𝒏_𝑷𝒐𝒘𝒆𝒓</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link id="favicon" rel="icon" type="../image/logo-acgen.png" sizes="50x50" href="../image/logo-may-bay-17.png">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../style/main.css">
    <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.2/dist/css/bootstrap.min.css"> -->
</head>

<body>
    <header class="app-header">
        <ul class="app-nav">
            <div class="dash">
                <h3>Dashboard</h3>
            </div>
            <div class="noti">
                <i class='bx bx-bell' style='color:#ffffff'>
                    <span>9</span>
                </i>
            </div>
            <div class="app-img">
                <img src="../image/user-1.jpg" alt="" width="33px">
            </div>
            <div class="dropdown">
                <button class="dropdown-button">Admin<i class='bx bx-chevrons-down'></i></button>
                <div class="dropdown-content">
                    <a href="#"><i class='bx bx-user'></i>My Account</a>
                    <a href="#"><i class='bx bx-lock-alt'></i>Lock Screen</a>
                    <a href="#" id="btnLogout"><i class='bx bx-log-out'></i>Logout</a>
                </div>
            </div>
            <div class="setting">
                <a class="app-nav__item" href="#">
                    <i class='bx bx-cog rotating'></i>
                </a>
            </div>
        </ul>
    </header>
    <!-- Sidebar menu-->
    <aside class="app-sidebar">
        <div class="app-sidebar__user">
            <img class="app-sidebar__user-avatar" src="../image/Shipper_CPS3.77d4065.png" width="50px" alt="User Image">
            <div>
                <p class="app-sidebar__user-name"><b style="color:yellow;">cửa hàng</b></p>
                <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
            </div>
            <hr>
        </div>
        <ul class="app-menu">
            <li>
                <a class="app-menu__item" href="index.php">
                    <i class='app-menu__icon bx bxs-home'></i>
                    <span class="app-menu__label">Trang Chủ</span>
                </a>
            </li>

            <li>
                <a class="app-menu__item" href="index.php?act=listdm">
                    <i class='app-menu__icon bx bx-paper-plane'></i>
                    <span class="app-menu__label">Quản lý Danh mục</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item" href="index.php?act=listsp">
                    <i class='app-menu__icon bx bx-printer'></i>
                    <span class="app-menu__label">Quản lý sản phẩm</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item" href="index.php?act=seat">
                    <i class='app-menu__icon bx bx bxl-xing'></i>
                    <span class="app-menu__label">Quản lý đơn hàng</span>
                </a>
            </li>

            <li>
                <a class="app-menu__item" href="index.php?act=bill">
                    <i class='app-menu__icon bx bxs-user-check'></i>
                    <span class="app-menu__label">tài khoản Admin</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item" href="index.php?act=account">
                    <i class='app-menu__icon bx bx-user-voice'></i>
                    <span class="app-menu__label">Khách hàng</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item" href="index.php?act=Evaluate">
                    <i class='app-menu__icon bx bx-chat'></i>
                    <span class="app-menu__label">Quản lý bình luận</span>
                </a>
            </li>



            <li>
                <a class="app-menu__item" href="index.php?act=statistical">
                    <i class='app-menu__icon bx bx-bar-chart-alt-2'></i>
                    <span class="app-menu__label">Thống kê</span>
                </a>
            </li>
        </ul>
    </aside>