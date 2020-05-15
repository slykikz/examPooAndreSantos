<?php
require_once 'pdo_connect.php';
require_once 'functions.php';
$errors = [];
$imageUrl = null;
if ( $_SERVER['REQUEST_METHOD'] === 'POST'){
    $returnValidation = validateForm();
    $errors = $returnValidation['errors'];

    if( count($errors) === 0) {
        addBdd($pdo, $returnValidation['image']);
        header('Location: index.php');
    }
}
?>
<html>
<head>
    <head>
        <?php
        require_once 'stylesheets.php';
        ?>
    </head>
</head>
<body>

<?php
include 'nav.php';
?>

<div style="text-align: center">

    <h1>Ajouter une recette</h1><br>

    <form method="post" action="add-recette.php" enctype="multipart/form-data">
        <label>ID de la recette</label>
        <input name="id" class="form-control" placeholder="ID de la recette">

        <label>Nom de la recette</label>
        <input name="titre" class="form-control" placeholder="Nom de la recette">

        <label>Description de la recette</label>
        <input name="recette" class="form-control" placeholder="Description de la recette" >


        <label>Image</label>
        <input type="file" name="image"><br><br>

        <input type="submit">

        <?php
        if(count($errors) != 0){
            echo(' <h2>Erreurs lors de la dernière soumission du formulaire : </h2>');
            foreach ($errors as $error){
                echo('<div class="error">'.$error.'</div>');
            }
        }
        ?>
    </form>
</div>
</body>
</html>
