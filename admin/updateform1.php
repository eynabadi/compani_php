<?php
require_once('../database/database.php');
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["file3"]["name"]);
if(isset($_POST['submit4'])){
    $text1=$_POST['text1'];
    $text2=$_POST['text2'];

    if (move_uploaded_file($_FILES["file3"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["file3"]["name"])). " has been uploaded.";
       $file=$_FILES['file3'];
       $sqlpu="UPDATE  post1 SET text1='$text1' , text2='$text2' , img4='$target_file' ";
       $sqldf=$conn->prepare($sqlpu);
       $sqldf->execute();
       if($sqldf){
        echo "yes";
       }else{
        echo "no";
       }
       
    }
}
?>
<div class="bg-secondary rounded h-100 p-4">
    <h6 class="mb-4">form2</h6>
    <form action="form2.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="text1" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="text2" type="text" class="form-control" id="exampleInputPassword1">
        </div>
        <div>
            <label for="formFileLg" class="form-label">Large file input example</label>
            <input name="file3" class="form-control form-control-lg bg-dark" id="formFileLg" type="file">
        </div>
        <button name="submit4" type="submit" class="btn btn-primary">Sign in</button>
    </form>
</div>