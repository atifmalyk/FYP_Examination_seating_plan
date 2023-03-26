<?php
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    @include('components.links')
    {{--    <link rel="stylesheet" href="style.css">--}}
    <link href="{{ asset('css2/dashboard.css') }}" rel="stylesheet">
    <title>AdminHub</title>
</head>
<style>
    .my-table-class {
        border-collapse: separate;
        border-spacing: 10px;
        border: 1px solid white;
    }

    .my-table-class td {
        border: 1px solid white;
    }
</style>
<body>

<!-- CONTENT -->
<section id="content">
    <!-- NAVBAR -->
    <nav>
        <i class='bx bx-menu' ></i>
        <a href="#" class="nav-link">Categories</a>
        <form action="#">
            <div class="form-input">
                <input type="search" placeholder="Search...">
                <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
            </div>
        </form>
        <input type="checkbox" id="switch-mode" hidden>
        <label for="switch-mode" class="switch-mode"></label>
        <a href="#" class="notification">
            <i class='bx bxs-bell' ></i>
            <span class="num">8</span>
        </a>
        <a href="#" class="profile">
            <?php
            session_start();
            $admin = session("admin");
            if ($admin && isset($admin['admin_image'])) {
                echo '<img src="' . $admin['admin_image'] . '">';
            } else {
                echo 'Profile';
            }
            ?>
        </a>

    </nav>
