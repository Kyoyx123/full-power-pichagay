<?php
   $id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบทดสอบออนไลน์</title>
    <link rel="stylesheet" href="../../page.css">
    <link rel="icon" href="../../images/technic1.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>
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

    input[type=number] {
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

    input[type=email] {
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
        color: #fff;

    }

    .button-style-change-private {
        background: var(--danger);
        color: #fff;
    }
    .label-style-firstname{
    font-size: 17px;
    margin-right: 125px;
    }

    .label-style-lastname{
        font-size: 17px;
        margin-right: 85px;
    }
    
    .label-style-codeid{
        font-size: 17px;
        margin-right: 130px;
    }
</style>

<body>

    <section class="main">
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        <div class="sidebar">
            <div class="sidebar-top">
                <div class="sb-logo">
                    <a href="edit_Profile.php?id=<?php echo $id?>">
                        <img src="../../images/technic1.png">
                    </a>
                </div>
                <ul class="sb-ul">
                    <li>
                        <a href="edit_list_teacher.php?id=<?php echo $id?>"><i class="fa-solid fa-user fontawesome"></i></i>โปรไฟล์</a>
                    </li>
                    
                    <li>
                    <a href="edit_img_profile.php?id=<?php echo $id?>">
                            <i class="fa-solid fa-image-portrait fontawesome"></i>
                                เปลี่ยนรูปโปรไฟล์
                             </a>
                    </li>
                    <li>
                        <a href="edit_Profile.php?id=<?php echo $id?>">
                            <i class="fa-solid fa-pen-to-square fontawesome"></i>
                            แก้ไขข้อมูลส่วนตัว
                            </a>
                    </li>
                
                </ul>
            </div>
            <div class="sidebar-bottom">
                <a href="../list_student.php" class="btn btn-logout">
                    <i class="fa-solid fa-right-from-bracket style-icon-logout"></i>
                    ออก</a>
            </div>
        </div>
        <?php
        include('../connectdb.php');
        $sql = "SELECT * FROM tb_member where member_id = '$id' ";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        ?>
        <div class="dashboard">
            <h1 style="text-align: center;">ข้อมูลส่วนตัว</h1>
            <br>
            <div class='data' style="display: flex; justify-content: center;">
                <img class='image' src='<?php if ($row['member_img'] == '') echo '../../images/img_avatar.png';
                                        else echo '../../teacher/uploads/' . $row['member_img']; ?>' width='167px' height='166px'>
            </div>
            <form action="check_profile.php" method="post">
            <div class="main-profile">

                 <div hidden>
                    <label for="" class="label-style-codeid" hidden><b>id</b></label>
                    <input type="text" name="id" value="<?php echo $row['member_id'] ?>" hidden>
                </div>

                <div>
                    <label for="" class="label-style-firstname"><b>ชื่อ</b></label>
                    <input type="text" name="firstname" value="<?php echo $row['member_firstname'] ?>" >
                </div>

                <div>
                    <label for="" class="label-style-lastname"><b>นามสกุล</b></label>
                    <input type="text" name="lastname" value="<?php echo $row['member_lastname'] ?>" >
                </div>

                <div hidden>
                    <label for="" class="label-style-id"><b>รหัสประจำตัวนักศึกษา</b></label>
                    <input type="number" name="teacher-id" value="<?php echo $row['member_code'] ?>" >
                </div>
                
                <div>
                    <label class="label-style-tel"><b>เบอร์โทรศัพท์</b></label>
                    <input type="number" name="phone-number" value="<?php echo $row['member_mobile']; ?>" >
                </div>
                    

                <div class="box4">
                    <label for="" class="label-style-email"><b>อีเมล</b></label>
                    <input type="email" name="email" value="<?php echo $row['member_email'] ?>" >
                </div>

                <div class="box5">
                    <label for="" class="label-style-address"><b>ที่อยู่</b></label>
                    <input type="text" name="address" value="<?php echo $row['member_address'] ?>" >
                </div>
                <input type="hidden" name="page_id" value="<?php echo $id?>">
            </div>
            <div class="dashboard-bottom">
                <button class="btn button-style-change-profile" type="submit" name="submit">          
                    ตกลง
                </button>         
                <a href="edit_list_teacher.php?id=<?php echo $id?>" class="btn button-style-change-private">
                    ยกเลิก
                </a>
            </div>
            </form>

        </div>
    </section>
    <script src="../page.js"></script>
</body>

</html>