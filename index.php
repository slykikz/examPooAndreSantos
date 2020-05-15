<?php
    require_once 'pdo_connect.php';
    ?>


<html>
<head>
    <?php
    require_once 'stylesheets.php';
    ?>
</head>
<body>
    <?php
        include 'nav.php';
    ?>


    <h2>
        <h1>Les Recettes disponibles</h1>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Titre</th>
                <th scope="col">Recette</th>
                <th scope="col">Date Ajout</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>

            </tr>
            </thead>
            <tbody>
            <?php
            $reponse = $pdo->query('SELECT * FROM raviole');
            while ($data = $reponse->fetch())
            {
                ?>
                <tr>
                    <td><?php echo($data['id']); ?></td>
                    <td><?php echo($data['titre']); ?></td>
                    <td><?php echo($data['recette']); ?></td>
                    <td><?php echo($data['dateAjout']); ?></td>
                    <td>
                        <img style="max-width: 140px;" src="<?php echo('images/recettes/'.$data['image']); ?>"
                             alt="Image de la recette <?php echo($data['titre']); ?>"/>
                    </td>
                    <td>

                        <a title="Supprimer" href="delete-recette.php?id=<?php echo($data['id']);?>">
                            <button type="button" class="btn btn-danger">Danger</button>
                        </a>
                    </td>


                </tr>
                <?php
            }
            $reponse->closeCursor();
            ?>

            </tbody>
        </table>
    </h2>


</body>
