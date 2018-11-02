<?php
    ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administration activity</title>
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

    <h1 class="text-center">Add activity</h1>

    <form class="text-center" method="POST">
        <div>Activity name : </div>
        <input type="text" name="activity_name">

        <div>Activity type : </div>
        <input type="text" name="activity_type">

        <div>Activity number max child : </div>
        <input type="text" name="activity_number_max_child">

        <div>
        <button type="submit" name="send_form_act">Send</button>
        </div>
    </form>

    <?php

        if(isset($_POST['send_form_act'])){
            try {

            

                $bdd = new PDO('mysql:host=localhost;dbname=creche_bdd;charset=utf8', 'admin','azerty');
                
                $activity_name = $_POST['activity_name'];
                $activity_type = $_POST['activity_type'];
                $activity_number_max_child = $_POST['activity_number_max_child'];
                
                $bdd->query('INSERT INTO activity(activity_name, activity_type, activity_number_max_child)
                    VALUES("' . $activity_name . '", "' . $activity_type . '", "' . $activity_number_max_child . '")');
                
                header('Location: activity.php');
            }
            catch (Exception $e)
            {
                die('Erreur : ' . $e->getMessage());
            }
    
        }
?>

</body>
</html>
