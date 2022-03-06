<?php
     $title = 'User Login';
     //require_once 'include/header.php';
     require_once 'conn.php';
     require_once 'session.php';

    //if data was submitted via a form POST then...
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = strtolower(trim($_POST['username']));
        $password = $_POST['password'];
        $new_password = md5($username.$password);
        
        $result = $user->getUser($username,$new_password);
        if (!$result) {
            echo "<div>Username or Password is incorrect! Please try again. </div>";
        }else{
            $_SESSION['username'] = $username;
            $_SESSION['userid'] = $result['id'];
            header('Location: index.php');
        }
    }
?>

<h1 class="text-center"> <?php echo $title ?></h1>

    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <table>
            <tr>
                <td><lable for="username">Username: *</lable></td>
                <td><input type="text" name="username" class="form-control" id="username" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>">

                <?php if(empty($username) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p></p>"; ?>
                </td>
            </tr>
            <tr>
                <td><lable for="username">Password: *</lable></td>
                <td><input type="password" name="password" class="form-control" id="password">
                <?php if(empty($password) && isset($password_error)) echo "<p></p>"; ?>
                </td>
            </tr>
        </table><br/></br>
        <input type="submit" value="Login"><br/>

    </form><br/><br/><br/>
