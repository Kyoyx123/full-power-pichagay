 <?php
$page_id = $_GET['id'];
include('connectdb.php');
if(isset($_POST['submit'])){
    $sql = "SELECT * FROM question where id = $page_id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $bruh = 1;

    $questionname = $_POST['questionname'];
    $choice1 = $_POST['c-1'];
    $choice2 = $_POST['c-2'];
    $choice3 = $_POST['c-3'];
    $choice4 = $_POST['c-4'];
    $choice5 = $_POST['c-5'];
    $answer  = $_POST['answer'];
    // $questionid = $row['questionid'];
      
    $picname = $_POST["q_0name"];
    $choice1_name = $_POST['q_1name'];
    $choice2_name = $_POST['q_2name'];
    $choice3_name = $_POST['q_3name'];
    $choice4_name = $_POST['q_4name'];
    $choice5_name = $_POST['q_5name'];
    $order_P = $order+1;
    
    $_FILES["filUpload"]["name"] = $picname.$order_P.".jpg";
    $_FILES["filUpload1"]["name"] = $choice1_name.$order_P."_".$bruh++.".jpg";
    $_FILES["filUpload2"]["name"] = $choice2_name.$order_P."_".$bruh++.".jpg";
    $_FILES["filUpload3"]["name"] = $choice3_name.$order_P."_".$bruh++.".jpg";
    $_FILES["filUpload4"]["name"] = $choice4_name.$order_P."_".$bruh++.".jpg";
    $_FILES["filUpload5"]["name"] = $choice5_name.$order_P."_".$bruh++.".jpg";

    $url1 = $_FILES["filUpload"]["name"];
    $url2 = $_FILES["filUpload1"]["name"];
    $url3 = $_FILES["filUpload2"]["name"];
    $url4 = $_FILES["filUpload3"]["name"];
    $url5 = $_FILES["filUpload4"]["name"];
  
    echo $url1."<br>";
    echo $url2."<br>";
    echo $url3."<br>";
    echo $url4."<br>";
    echo $url5."<br>";
    echo $questionid;

    $sql = "UPDATE question SET questionname = '$questionname', choice1 = '$choice1', choice2 = '$choice2', choice3 = '$choice3', choice4 = '$choice4', answer = '$answer' ,question_img = '$url1', choice1_img = '$url2', choice2_img = '$url3',  choice3_img = '$url4', choice4_img = '$url5' WHERE  id = '$id' ";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header('location:../addquestion.php?id='.$page_id);
      } else {
        echo "Error updating record: " . $conn->error;
      }


      move_uploaded_file($_FILES["filUpload"]["tmp_name"],"../uploads/".$_FILES["filUpload"]["name"]);
      move_uploaded_file($_FILES["filUpload1"]["tmp_name"],"../uploads/".$_FILES["filUpload1"]["name"]);
      move_uploaded_file($_FILES["filUpload2"]["tmp_name"],"../uploads/".$_FILES["filUpload2"]["name"]);
      move_uploaded_file($_FILES["filUpload3"]["tmp_name"],"../uploads/".$_FILES["filUpload3"]["name"]);
      move_uploaded_file($_FILES["filUpload4"]["tmp_name"],"../uploads/".$_FILES["filUpload4"]["name"]);
    }
    
    $conn->close();

?>