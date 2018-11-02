<?php

    ini_set('display_errors', 1);

    try {
                                
        $db =new PDO('mysql:host=localhost;dbname=creche_bdd;charset=utf8', 'admin', 'azerty');

    }
    catch(Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    if(isset($_POST['delete']))
    {
        $id_del = $_POST['children_id'];
        $db->query("DELETE * FROM children WHERE children_id=" . $id_del);  
        //header('Location: home.php');
    }
?>
