<?php
include("./connectdb.php");
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

if ($_SESSION['username'] != $row['member_code'] || $_SESSION['username'] == '') {
    header("location:login.php");
    exit();
}

$id = $_GET['id'];
$q_id = $_GET['q_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบทดสอบออนไลน์</title>
    <link rel="stylesheet" href="addquestion.css">
    <link rel="icon" href="../../images/technic1.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .image{
            width: 100px;
            height: 100px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <div class="sidebar-top">
            <div class="sb-logo" style="width: 200px;">
                <!-- <a href="index.php"> -->

                <img class='image' src='<?php if ($row['member_img'] == '') echo '../../images/img_avatar.png';
                                        else echo '../../../Page/teacher/uploads/' . $row['member_img']; ?>' width='167px' height='166px'>
                </a>
                <h3 class="h3-style"><?php echo $row['member_title'] . " " . $row['member_firstname'] . " " . $row['member_lastname'] ?></h3>
                <hr width="100%" style="margin-top: 10px;">
            </div>

            <ul class="sb-ul" style="margin-top: 50px;">
            </ul>
        </div>
        <div class="sidebar-bottom">
            <a href="./addquestion.php?id=<?php echo $id ?>" style="margin-right: 10px;" class="btn btn-logout">
                <i class="fa-solid fa-right-from-bracket style-icon-logout"></i>
                ออก</a>
        </div>
    </div>

    <div class="dashboard">
        <table>
            <tr>
                <th>ข้อที่</th>
                <th>รูปภาพ</th>
            </tr>
            <?php

            include('connectdb.php');
            $sql = "SELECT * FROM question WHERE questionid = '$id' and id = '$q_id' ";
            $result = mysqli_query($conn, $sql);
            $order = 1;

            // loop ข้อมูล
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td>โจทย์</td>
                    <td> <img class='image' src="<?php if ($row['question_img'] == '') echo '../../images/img_avatar.png';
                                        else echo 'uploads/' . $row['question_img']; ?>" width='167px' height='166px'></td>
                </tr>
                <tr>
                    <td>ข้อที่<?php echo " ".$order++?></td>
                    <td> <img class='image' src="<?php if ($row['choice1_img'] == '') echo '../../images/img_avatar.png';
                                        else echo 'uploads/' . $row['choice1_img']; ?>" width='167px' height='166px'></td>
                </tr>
                <tr>
                    <td>ข้อที่<?php echo " ".$order++?></td>
                    <td> <img class='image' src="<?php if ($row['choice2_img'] == '') echo '../../images/img_avatar.png';
                                        else echo 'uploads/' . $row['choice2_img']; ?>" width='167px' height='166px'></td>
                </tr>
                <tr>
                    <td>ข้อที่<?php echo " ".$order++?></td>
                    <td> <img class='image' src="<?php if ($row['choice3_img'] == '') echo '../../images/img_avatar.png';
                                        else echo 'uploads/' . $row['choice3_img']; ?>" width='167px' height='166px'></td>
                </tr>
                <tr>
                    <td>ข้อที่<?php echo " ".$order++?></td>
                    <td> <img class='image' src="<?php if ($row['choice4_img'] == '') echo '../../images/img_avatar.png';
                                        else echo 'uploads/' . $row['choice4_img']; ?>" width='167px' height='166px'></td>
                </tr>
            <?php } ?>
        </table>
    </div>


</body>

</html>