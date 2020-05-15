<?php



function deleteRecette($pdo, $id)
{
    $res = $pdo->prepare('DELETE FROM raviole WHERE id = :id');
    $res->execute(['id'=> $id]);
}


function addBdd($pdo, $imageUrl){
    $req = $pdo->prepare(
        'INSERT INTO raviole(titre, recette, dateAjout , image)
    VALUES(:titre, :recette, :dateAjout, :image)');
    $req->execute([
        'titre' => $_POST['titre'],
        'recette' => $_POST['recette'],
        'dateAjout' => $_POST['dateAjout'],
        'image' => $imageUrl
    ]);
}


function validateForm() {
    $errors = [];

    if($_FILES['image']['size'] == 0){
        $errors[] = 'Veuillez ajouter une image';
    }
    if($_FILES['image']['type'] === 'image/png'){
        if($_FILES['image']['size']<800000){
            $extension = explode('/', $_FILES['image']['type'])[1];
            $imageUrl = uniqid().'.'.$extension;
            move_uploaded_file($_FILES['image']['tmp_name'], 'images/recettes/'.$imageUrl);
        } else {
            $errors[] = 'Fichier trop lourd impossible';
        }
    } else {
        $errors[] = 'Impossible : j\'accepte que les PNGS !';
    }
    if (empty($_POST['id'])) {
        $errors[] = 'Veuillez saisir l\'id de la recette';
    }
    if (empty($_POST['titre'])) {
        $errors[] = 'Veuillez saisir le nom de la recette';
    }
    if ( empty($_POST['recette'])) {
        $errors[] = 'Veuillez saisir la description de la recette';
    }

    return ['errors'=>$errors, 'image'=>$imageUrl];
}
