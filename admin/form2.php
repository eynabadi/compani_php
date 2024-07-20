<?php
require_once('../database/database.php');
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["file2"]["name"]);
if(isset($_POST['submit2'])){
    $text1=$_POST['text1'];
    $text2=$_POST['text2'];

    if (move_uploaded_file($_FILES["file2"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["file2"]["name"])). " has been uploaded.";

        $file2=$_FILES['file2'];
        $sqlop="INSERT INTO post2 SET t1=?, t2=? ,img3=?";
        $sqloop=$conn->prepare($sqlop);
        $sqloop->bindValue(1,$text1);
        $sqloop->bindValue(2,$text2);
        $sqloop->bindValue(3,$target_file);
        $sqloop->execute();
        
    }
    
}
?>