<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administartion</title>
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
                    <button type="submit" class="text-left" class="order-2 p-2 bd-highlight" >admin activity</button>
                </form>
            </div>
        </nav>
    </div>

    <h1 class="text-center">Administration</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"></th>   
                <th scope="col">Name</th>
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

                $reponse = $db->query('SELECT * FROM children');
                while($donnees=$reponse->fetch()){
                    echo 
                        "<tr>
                            <th scope='row'></th>
                                <form action='children_s_card.php' method='get'>
                                    <td>
                                        <button name='child_first_name' type='submit' class='btn btn-light'>" . $donnees['children_firstname'] . " ". $donnees['children_lastname'] .  "</button>
                                        <input class='invisible' class='inputid' name='input_child' value=" . $donnees['children_id'] .">
                                    </td>
                                    <td>
                                        <button name='child_first_name' type='submit' class='btn btn-light' class='text-right'>Informations ></button>
                                    </td>
                                </form>
                                <td>
                                    <form class='text-center' action='add_child.php' method='post'>
                                        <button type='submit' name='add' type='submit' class='btn btn-light'> + </button>
                                    </form>
                                    <form class='text-center'>
                                        <button name='delete' type='submit' class='btn btn-light'> - </button>
                                    </form>
                                    <form class='text-center' action='' method='post'>
                                        <button name='edit' type='submit' class='btn btn-light'>Edit</button>
                                    </form>
                                </td>
                        </tr>";
                }
            ?>

        </tbody>
    </table>
</body>
</html>
