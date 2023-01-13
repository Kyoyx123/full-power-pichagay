<?php
include("../connectdb.php");
session_start();
$sql = "SELECT * FROM tb_member INNER JOIN jointthectn_tb ON tb_member.member_code=jointthectn_tb.member_code where tb_member.member_code='" . $_SESSION['username'] . "'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);

if ($row['member_code'] == '') {
    $sql = "SELECT * FROM tb_member where member_code='" . $_SESSION['username'] . "'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    $conn->close();
}

if ($_SESSION['username'] != 'admin' || $_SESSION['username'] == '') {
    header("location:login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบทดสอบออนไลน์</title>
    <link rel="stylesheet" href="../page.css">
    <link rel="icon" href=".././images/technic1.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Kanit&family=Poppins:wght@300;400;500;600;700&display=swap');
    :root {
        --theme-primary: #6F1E51;
        --theme-sub: #8e44ad;
        --theme-cut: #fff;
        --theme-cut-sub: #f1c40f;
        --theme-fade-f7: #f7f7f7;
        --theme-fade-e5: #e5e5e5;
        --theme-fade-ad: #adadad;
        --danger: #EA2027;
        --warning: #FFC312;
        --success: #1abc9c;
        --info: #3498db;
        --liner1: linear-gradient(to bottom, #929b92, #a8b4b1, #c4ccce, #e2e5e7, #ffffff);
    }

    input[type=text] {
        border: 2px solid #aaa;
        width: 40%;
        font-size: 17px;
        padding: 7px;
        margin: 5px 10px;
        outline: none;
        border-radius: 4px;
        display: inline-block;
        box-sizing: border-box;
    }

    .style-icon-logout {
        margin-right: 5px;
    }

    .dashboard-bottom {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .style-icon-CPF {
        font-size: 1.3rem;
        margin-right: 5px;
    }

    .fa-pen-to-square {
        margin-right: 5px;
    }

    .button-style-change-profile {
        margin-left: 1.5rem;
        margin-right: 10px;
        background: #4fee2d;
        color: #000;

    }

    .button-style-change-private {
        background: #11eedf;
        color: #000;
    }

    .label-style-name{
        font-size: 17px;
        margin-right: 60px;
    }

    .box{
        background-color: #e74c3c;
        width: 1000px;
        height: 570px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
        box-shadow: 2px 2px 7px #000;
    }

    .text{
        text-align: center;
        font-family: 'Kanit', sans-serif;
        font-size: 150px;
        color: #fff;
    }
</style>

<body>

    <section class="main">
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        <div class="sidebar">
            <div class="sidebar-top">
                <div class="sb-logo" style="margin-bottom: 50px;">
                    <a href="addmin_page.php">
                        <img src="../images/technic1.png">
                    </a>    
                    <div style="display: flex; align-items: center;justify-content: center;">
                        <h1 style="color: #fff;">admin</h1>
                    </div>
                    <hr>
                </div>
                <ul class="sb-ul">
                    <li>
                        <a href="addmin_page.php"><i class="fa-solid fa-user fontawesome"></i></i>หน้าหลัก</a>
                    </li>
                    
                    <li>
                        <a href="list_student.php">
                            <i class="fa-solid fa-image-portrait fontawesome"></i>
                                จัดการข้อมูลนักเรียน
                             </a>
                    </li>
                    <li>
                        <a href="list_teacher.php">
                            <i class="fa-solid fa-pen-to-square fontawesome"></i>
                                จัดการข้อมูลครู
                            </a>
                    </li>
                </ul>
            </div>
            <div class="sidebar-bottom">
                <a href="../../login/login.php" class="btn btn-logout">
                    <i class="fa-solid fa-right-from-bracket style-icon-logout"></i>
                    ออกจากระบบ</a>
            </div>
        </div>
        <div class="dashboard">
            <div class="box">
                <div style="margin-top: -80px;">
                    <p class="text">Addmin</p>
                    <p style="text-align: center; margin-top: -25px;font-size: 40px;">จัดการเกี่ยวกับข้อมูลนักเรียนนักศึกษาและอาจารย์</p>
                </div>
            </div>
        </div>
    </section>
    <script src="../page.js"></script>
</body>

</html>