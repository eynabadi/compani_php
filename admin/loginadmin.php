<?php
session_start();
// databse
require_once('../database/database.php');
// database check login
if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  $sqlcheck = "SELECT * FROM useradmin WHERE email='$email' AND passsword='$password'";
  $sqlresult=$conn->prepare($sqlcheck);

  $sqlresult->execute();
  
  if($sqlresult->fetchAll()){
      echo "yes";
      $_SESSION['login']=$email;
      header('Location:paneladmin.php');
  }else{
      echo "no";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>

<body>
    <div>

        <body class="antialiased bg-gray-200 text-gray-900 font-sans">

            <div class="flex items-center h-screen w-full">
                <div class="w-full bg-white rounded shadow-lg p-8 m-4 md:max-w-sm md:mx-auto">
                    <span class="block w-full text-xl uppercase font-bold mb-4">Login admin</span>
                    <form class="mb-4" method="post">
                        <div class="mb-4 md:w-full">
                            <label for="email" class="block text-xs mb-1">Username or Email</label>
                            <input class="w-full border rounded p-2 outline-none focus:shadow-outline" type="email"
                                name="email" id="email" placeholder="Username or Email">
                        </div>
                        <div class="mb-6 md:w-full">
                            <label for="password" class="block text-xs mb-1">Password</label>
                            <input class="w-full border rounded p-2 outline-none focus:shadow-outline" type="password"
                                name="password" id="password" placeholder="Password">
                        </div>
                        <button name="submit" type="submit"
                            class="bg-green-500 hover:bg-green-700 text-white uppercase text-sm font-semibold px-4 py-2 rounded">Login</button>
                    </form>

                </div>
            </div>
        </body>
    </div>
</body>

</html>