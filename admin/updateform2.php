ccc
<?php
require_once('../database/database.php');
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["file4"]["name"]);
 if(isset($_POST['submit5'])){
    $text1=$_POST['text1'];
    $text2=$_POST['text2'];
    if (move_uploaded_file($_FILES["file4"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["file4"]["name"])). " has been uploaded.";
        $fileb=$_FILES['file4'];
        $sqlupdate4="UPDATE post2 SET t1='$text1', t2='$text2', img3='$target_file'";
        $sqlupdate4_1=$conn->prepare($sqlupdate4);
        $sqlupdate4_1->execute();
        if($sqlupdate4_1){
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
            <input name="file4" class="form-control form-control-lg bg-dark" id="formFileLg" type="file">
        </div>
        <button name="submit5" type="submit" class="btn btn-primary">Sign in</button>
    </form>
</div>