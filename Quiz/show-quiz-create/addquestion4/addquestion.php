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
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-top">
            <div class="sb-logo" style="width: 200px;">
                <!-- <a href="index.php"> -->

                <img class='image' src='<?php if ($row['member_img'] == '') echo './images/img_avatar.png';
                                        else echo '../../../Page/teacher/uploads/' . $row['member_img']; ?>' width='167px' height='166px'>
                </a>
                <h3 class="h3-style"><?php echo $row['member_title'] . " " . $row['member_firstname'] . " " . $row['member_lastname'] ?></h3>
                <hr width="100%" style="margin-top: 10px;">
            </div>

            <ul class="sb-ul" style="margin-top: 50px;">
            </ul>
        </div>
        <div class="sidebar-bottom">
            <a href="../show-quiz.php?id=<?php echo $row['member_id']?>" style="margin-right: 10px;" class="btn btn-logout">
                <i class="fa-solid fa-right-from-bracket style-icon-logout"></i>
                ออก</a>
        </div>
    </div>

    <div class="dashboard">
        <form action="check_addquestion.php" method="post" enctype="multipart/form-data">
            <div style="background-color: rgba(0, 0, 0, 0.2); border-radius: 5px; padding: 30px; margin: 10px; margin-top: -15px; display: flex; justify-content: center; ">
                <div>
                    <div style="display: flex; align-items: center;justify-content: center; margin: 15px;">
                        <label style="margin-right: 5px;">โจทย์ :</label>
                        <textarea name="questionname" cols="25" rows="8"></textarea>
                    </div>
                    <div style="display: flex; justify-content: center; align-items: center; margin: 10px; margin-top: -15px;    padding: 10px; padding-left: 90px;">
                        <label for="img" style="margin-right: 5px;">เพิ่มรูปภาพ :</label>
                        <!-- <input type="text" name="picname" value="test"> -->
                        <?php $code = $row['member_code']; 
                        
                        ?>
                        <input type="hidden" name="q_0name" value="<?php echo 'q_'.$id.$code;?>">
                        <input type="hidden" name="q_1name" value="<?php echo 'ch1_'.$id.$code;?>">
                        <input type="hidden" name="q_2name" value="<?php echo 'ch2_'.$id.$code;?>">
                        <input type="hidden" name="q_3name" value="<?php echo 'ch3_'.$id.$code;?>">
                        <input type="hidden" name="q_4name" value="<?php echo 'ch4_'.$id.$code;?>">
                        <input type="hidden" name="q_5name" value="<?php echo 'ch5_'.$id.$code;?>">
                        <input type="file" name="filUpload" accept="image/gif , image/jepg, image/png">
                    </div>
                    <div style="display: flex; justify-content: space-around; margin: 15px;">
                        <div style="display: flex; align-items: center;justify-content: center; margin-right: 30px;">
                            <label for="" style="margin-right: 5px;">ก :</label>
                            <textarea name="c-1" cols="25" rows="7"></textarea>
                        </div>
                        <div style="display: flex; align-items: center;justify-content: center;">
                            <label for="" style="margin-right: 5px;">ข :</label>
                            <textarea name="c-2" cols="25" rows="7"></textarea>
                        </div>
                    </div>
                    <div style="display: flex;">
                    <div style="display: flex; justify-content: center; align-items: center; margin: 10px; margin-top: -15px; padding: 10px; padding-left: 90px;">
                        <label for="img" style="margin-right: 5px;">เพิ่มรูปภาพ :</label>
                        <input type="hidden" name="picname" value="<?php echo $row['id'] ?>">
                        <input type="file" name="filUpload1" accept="image/gif , image/jepg, image/png">
                    </div>
                    <div style="display: flex; justify-content: center; align-items: center; margin: 10px; margin-top: -15px; padding: 10px; padding-left: 90px;">
                        <label for="img" style="margin-right: 5px;">เพิ่มรูปภาพ :</label>
                        <input type="hidden" name="picname" value="<?php echo $row['id'] ?>">
                        <input type="file" name="filUpload2" accept="image/gif , image/jepg, image/png">
                    </div>
                    </div>
                    <div style="display: flex; justify-content: space-around; margin: 15px;">
                        <div style="display: flex; align-items: center;justify-content: center; margin-right: 30px;">
                            <label for="" style="margin-right: 5px;">ค :</label>
                            <textarea name="c-3" cols="25" rows="7"></textarea>
                        </div>
                        <div style="display: flex; align-items: center;justify-content: center;">
                            <label for="" style="margin-right: 5px;">ง :</label>
                            <textarea name="c-4" cols="25" rows="7"></textarea>
                        </div>
                    </div>
                    <div style="display: flex;">
                    <div style="display: flex; justify-content: center; align-items: center; margin: 10px; margin-top: -15px; padding: 10px; padding-left: 90px;">
                        <label for="img" style="margin-right: 5px;">เพิ่มรูปภาพ :</label>
                        <input type="hidden" name="picname" value="<?php echo $row['id'] ?>">
                        <input type="file" name="filUpload3" accept="image/gif , image/jepg, image/png">
                    </div>
                    <div style="display: flex; justify-content: center; align-items: center; margin: 10px;margin-top: -15px; padding: 10px; padding-left: 90px;">
                        <label for="img" style="margin-right: 5px;">เพิ่มรูปภาพ :</label>
                        <input type="hidden" name="picname" value="<?php echo $row['id'] ?>">
                        <input type="file" name="filUpload4" accept="image/gif , image/jepg, image/png">
                    </div>
                    </div>
                    <div style="display: flex; justify-content: center; align-items: center; margin: 10px;">
                        <label for="" style="margin-right: 5px;">คำตอบ :</label>
                        <select name="answer">
                            <option value="ก">ก</option>
                            <option value="ข">ข</option>
                            <option value="ค">ค</option>
                            <option value="ง">ง</option>
                        </select>
                    </div>
                    <div style="display: flex; justify-content: center; align-items: center;">
                        <button type="submit" name="create" class="btn-submit">เพิ่ม</button>
                    </div>
                </div>
            </div>
            <div>
                <table>
                    <tr>
                        <th>ข้อที่</th>
                        <th>โจทย์</th>
                        <th>รูปภาพ</th>
                        <th>เฉลย</th>
                        <th>แก้ไข</th>
                        <th>ลบ</th>
                    </tr>
                    <form action="check_addquestion.php" method="post">
                        <?php
                        
                        include('connectdb.php');
                        $sql = "SELECT * FROM question WHERE questionid = '$id' ";
                        $result = mysqli_query($conn, $sql);
                        $order = 1;

                        // loop ข้อมูล
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $order++ ?></td>
                                <td>
                                    <div style="text-align: left;">
                                        <input type="hidden" value="<?php echo $row['id'] ?>" name="id2">
                                        <?php echo $row['questionname'] . "<br>"; ?>
                                        <?php echo "..." . "ก. " . $row['choice1'] . "<br>"; ?>
                                        <?php echo "..." . "ข. " . $row['choice2'] . "<br>"; ?>
                                        <?php echo "..." . "ค. " . $row['choice3'] . "<br>"; ?>
                                        <?php echo "..." . "ง. " . $row['choice4']; ?>
                                    </div>
                                </td>
                                <td>
                                    <a href="show_pic.php?id=<?php echo $id ?>&q_id=<?php echo $row['id']?>" class="edit">ดูรูปภาพ</a>
                                </td>
                                <td><?php echo $row['answer']; ?></td>
                                <td><a href="./editequestion/editequestion.php?id=<?php echo $row['id'] ?>&back_id=<?php echo $id?>" name="edit" class="edit">แก้ไข<i class="far fa-edit fontawesome"></i></button></td>
                                <td><button type="submit" name="delete" class="remove" onclick="return confirm('คุณต้องการลบหรือไม่!?')">ลบ<i class="fa-regular fa-trash-can  fontawesome"></i></button></td>
                            </tr>
                        <?php } ?>
                </table>
                <input type="hidden" name="order" value="<?php echo $order - 1 ?>">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="hidden" name="idreal" value="<?php echo $row['id'] ?>">
        </form>
    </div>
    </div>
    <script src="script.js"></script>
</body>

</html>