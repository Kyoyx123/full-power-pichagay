<?php

  include('../connectdb.php');

  $picname = $_POST["picname"];
  $_FILES["filUpload"]["name"] = $picname.".jpg";
  $url = $_FILES["filUpload"]["name"];
 
  if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"../../student/uploads/".$_FILES["filUpload"]["name"]))
  {
    $sql = "SELECT * FROM  tb_member where member_id='$picname'";
    $result = $conn->query($sql);
    $row=mysqli_fetch_array($result);


    $sql = "UPDATE tb_member SET member_img='$url' WHERE member_id='$picname'";

      if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
          header("location:edit_img_profile.php?id=$picname");
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
    
  }else{
    header('location:edit_img_profile.php?text=something');
    echo "ไฟล์รูปภาพของคุณขนาดใหญ่เกินไป";
  }
?>