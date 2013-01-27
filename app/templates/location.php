<h2>D&eacute;tails sur cette location :</h2>
<?php echo "Nom de la ville : ".$location ?>

<h2>Modifier cette location : </h2>
<form action="/locations/<?= $id ?>" method="POST">
    <input type="hidden" name="_method" value="PUT">
    <input type="text" name="name" value="<?= $location ?>">
    <input type="submit" value="Update">
</form>

<!-- formulaire pour supprimer une ville -->
<h2>Supprimer cette location : </h2>
<form action="/locations/<?= $id ?>" method="POST">
    <input type="hidden" name="_method" value="DELETE">
    <input type="submit" value="Delete">
</form>

<a href="/locations">Retour sur la page d'accueil</a>

