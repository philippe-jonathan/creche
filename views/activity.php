<?php
    ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Activity</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />

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
                <form action="admin.php" method="POST">
                    <button type="submit" class="text-left" class="order-2 p-2 bd-highlight" >admin</button>
                </form>
            </div>
        </nav>
    </div>

    <h1 class="text-center">List of activities</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"></th>   
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Number max child</th>
            </tr>
        </thead>

        <tbody>

            <?php 

                try {
                            
                    $db =new PDO('mysql:host=localhost;dbname=creche_bdd;charset=utf8', 'admin', 'azerty');

                }
                catch(Exception $e)
                {
                    die('Erreur : ' . $e->getMessage());
                }

                $reponse = $db->query('SELECT * FROM activity');
                while($donnees=$reponse->fetch()){
                    echo "<tr>
                            <th scope='row'></th>
                            <form action='children_s_card.php' method='get'>
                                <td>
                                    <p name='child_first_name'>" . $donnees['activity_name'] . "</p>
                                </td>
                                <td>
                                    <p name='child_first_name'>" . $donnees['activity_type'] . "</p> 
                                </td>
                                <td>
                                    <p name'child_first_name'>" . $donnees['activity_number_max_child'] . "</p>
                                </td>
                            </form>
                        </tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>
