<?php
    ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add child</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>

</head>
<body>

    <div id="navbar">
        <nav class='navbar navbar-dark bg-dark'>
            <div class="d-flex flex-nowrap bd-highlight">
                <form action="home.php" method="POST">
                    <button type="submit" class="order-1 p-2 bd-highlight">home</button>
                </form>
                <form action="activity.php" method="POST">
                    <button type="submit" class="order-2 p-2 bd-highlight">activity</button>
                </form>
            </div>
            <div class="d-flex flex-nowrap bd-highlight">
                <form action="admin_activity.php" method="POST">
                    <button type="submit" class="text-left" class="order-2 p-2 bd-highlight">admin activity</button>
                </form>
                <form action="admin.php" method="POST">
                    <button type="submit" class="text-left" class="order-2 p-2 bd-highlight">admin child</button>
                </form>
            </div>
        </nav>
    </div>

    <h1 class="text-center">Add children</h1>

    <form class="text-center" method="POST">
        <div>First name : </div>
        <input type="text" name="children_firstname">

        <div>Last name : </div>
        <input type="text" name="children_lastname">

        <div>Birthday : </div>
        <input type="date" name="children_birthday">

        <div>Adress : </div>
        <input type="text" name="children_adress">

        <div>Parents contact : </div>
        <input type="text" name="children_parents_contact">

        <div>Remarks : </div>
        <input type="text" name="children_remarks">

        <div>
        <button type="submit" name="send_form">Send</button>
        </div>
    </form>

    <?php

        if(isset($_POST['send_form'])){
                try {

                    

                    $bdd = new PDO('mysql:host=localhost;dbname=creche_bdd;charset=utf8', 'admin','azerty');
                    
                    $children_firstname = $_POST['children_firstname'];
                    $children_lastname = $_POST['children_lastname'];
                    $children_birthday = $_POST['children_birthday'];
                    $children_adress = $_POST['children_adress'];
                    $children_parents_contact = $_POST['children_parents_contact'];
                    $children_remarks =$_POST['children_remarks'];
                    
                    $bdd->query('INSERT INTO children(children_firstname, children_lastname, children_birthday, children_adress, children_parents_contact, children_remarks)
                        VALUES("' . $children_firstname . '", "' . $children_lastname . '", "' . $children_birthday . '", "' . $children_adress . '", "' . $children_parents_contact . '", "' . $children_remarks . '")');
                    
                    header('Location: home.php');
                }
                catch (Exception $e)
                {
                    die('Erreur : ' . $e->getMessage());
                }
            
        }
?>

</body>
</html>
