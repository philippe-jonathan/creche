<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Creche</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>

</head>
<body>
    <div id="navbar">
        <nav class='navbar navbar-dark bg-dark'>
            <div class="d-flex flex-nowrap bd-highlight">
                <button class="order-1 p-2 bd-highlight">home</button>
                <button class="order-2 p-2 bd-highlight">activity</button>
            </div>
            <div class="d-flex flex-nowrap bd-highlight">
                <button class="text-left" class="order-2 p-2 bd-highlight" >admin</button>
            </div>
        </nav>
    </div>
    
    <h1 class="text-center">Liste des enfants</h1>

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
                    </tr>";
            }
        ?>
    </tbody>
</table>

<!-- <script src="../js/navbar.js"></script>  -->

</body>
</html>

    