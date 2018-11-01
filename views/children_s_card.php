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

    <h1 class="text-center">Fiche de l'enfants</h1>
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
            $id = $_GET('input_child');
            $id = intval($id);
            var_dump($id);
            $reponse = $db->query('SELECT * FROM children WHERE children_id='.$id);
            while($donnees=$reponse->fetch())
            {
                echo "<div>" . $donnees['children_remarks'] . "</div>";
            } 
        }

       
    ?>
</body>
</html>
