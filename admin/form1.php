<?php
require_once('../database/database.php');
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["file1"]["name"]);

if(isset($_POST['submit1'])){
    $text1 = $_POST['text1'];
    $text2 = $_POST['text2'];
    
    if (move_uploaded_file($_FILES["file1"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["file1"]["name"])). " has been uploaded.";
        
        $file1 = $_FILES['file1']['name'];
        
        $sqluploads = "INSERT INTO post1 SET text1=?, text2=?, img4=?";
        $sqluploads1 = $conn->prepare($sqluploads);
        $sqluploads1->bindValue(1, $text1);
        $sqluploads1->bindValue(2, $text2);
        $sqluploads1->bindValue(3, $target_file);
        $sqluploads1->execute();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>