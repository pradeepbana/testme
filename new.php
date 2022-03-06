<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'conn.php'?>
    <?php require_once 'users.php'?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $user = new user($pdo);
    $user->updateUser('pradeep', 'pradeep');
    ?>
</body>
</html>