<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" 
        content="width=device-width, initial-scale=1.0, maximum=scale=1.0, minimum=scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<?php
    require('connect.php');
    
    if(isset ($_POST['name']) 
    && isset ($_POST['surname']) 
    && isset ($_POST['email']) 
    && isset ($_POST['phone'])) 
    {
        $name = mysqli_real_escape_string ($connection, $_POST['name'] );
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $query = "INSERT INTO users (name, surname, email, phone) VALUES ('$name', '$surname', '$email', '$phone')";
        $result = mysqli_query($connection, $query);

        if ($result) {
            $smsg = "Регистрация прошла успешно";
        } else {
            $fsmsg = "Ошибка";
        }
    }
    ?>

    
            <?php if(isset($smsg)){ ?> <div class="alert alert-success" role="alert"> 
                    <?php 
                    echo $smsg; 
                    ?> 
                </div>
                <?php 
                }
                ?>

            <?php 
            if(isset($fsmsg)) { 
            ?> 
                <div class="alert alert-danger" role="alert"> 
                    <?php 
                    echo $fsmsg; 
                    ?> 
                </div>
                <?php 
                }
                ?>









<div class="container">
        <form class="form-signin" method="POST">
            <h2>Registration</h2>

            <input type="text" name="name" class="form-control" placeholder="Name" required>
            <input type="text" name="surname" class="form-control" placeholder="Surname" required>
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <input type="text" name="phone" class="form-control" placeholder="Phone" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit"> Register </button>
        </form>
    </div> 
</body>
</html>




