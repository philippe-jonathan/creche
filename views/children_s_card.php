<?php
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Children's card</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <!-- <script src="main.js"></script> -->
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
    <h1 class="text-center">Fiche de l'enfants</h1>

    <table class="table table-striped">
    <thead>
        <tr>
            <th scope="col"></th>   
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Birthday</th>
            <th scope="col">Adress</th>
            <th scope="col">Parents contact</th>
            <th scope="col">Remarks</th>
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

        if (isset($_GET['child_first_name']))
        {
            $id = $_GET['input_child'];
            $id = intval($id);
            $reponse = $db->query('SELECT * FROM children WHERE children_id='.$id);
            while($donnees=$reponse->fetch())
            {
                echo "<tr>
                <th scope='row'></th>
                    <form action='children_s_card.php' method='get'>
                        <td>
                            <p name='child_first_name'>" . $donnees['children_firstname'] . "</p>
                        </td>
                        <td>
                            <p name='child_first_name'>" . $donnees['children_lastname'] . "</p> 
                        </td>
                        <td>
                            <p name'child_first_name'>" . $donnees['children_birthday'] . "</p>
                        </td>
                        <td>
                            <p name'child_first_name'>" . $donnees['children_adress'] . "</p>
                        </td>
                        <td>
                            <p name'child_first_name'>" . $donnees['children_parents_contact'] . "</p>
                        </td>
                        <td>
                            <p name'child_first_name'>" . $donnees['children_remarks'] . "</p>
                        </td>
                    </form>
            </tr>";
            }
        }

    ?>

    </tbody>
</table>

</body>
</html>
