<!-- template de GET /locations -->
<h1>LISTE DES VILLES</h1>
<?php 
foreach($locations as $id => $location): ?>

	<li><a href="/locations/<?= $id ?>"><?= $location ?></a></li>
	
<?php endforeach; ?>

<!-- formulaire pour ajouter une ville -->
<h1>CREER UNE VILLE</h1>
<form action="/locations" method="POST">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name">
    <input type="submit" value="Add New">
</form>

