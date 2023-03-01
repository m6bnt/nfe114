<!DOCTYPE html>
<html>
<head>
    <title>Liste des films</title>
</head>
<body>
    <a href="liste.php">Voir le code</a>
    <a href="insert.php">Voir le code</a>
    <br>
    <br>
    <h1>Formulaire de saisie</h1>
    <form action="insert.php" method="GET">
        <p>TITRE ? <input name="titre"/></p>
        <p>GENRE ? <input name="genre"/></p>
        <p>ANNEE ? <input name="annee"/></p>
        <p><input type="submit"/></p>
    </form>
    <br>
    <form action="liste.php" method="GET">
        <label for="ANNEE">Année :</label>
        <?php
        //1° - Connexion à la BDD
        $base = new PDO('mysql:host=localhost; dbname=id20205722_cnam', 'id20205722_mehdi', 'J3@fy?1UpR5Rp#Ez');
        $base->exec("SET CHARACTER SET utf8");

        //2° - Préparation de requette et execution
        $retour = $base->query('SELECT DISTINCT annee FROM movie;');

        //3° - Lecture du resultat de la requette
        echo "<select name='annee' id='ANNEE'>";
        while ($data = $retour->fetch()){
            echo "<option value='".$data['annee']."'>".$data['annee']."</option>";
        }
        echo "</select>";
        ?>
        <input type="submit" value="Rechercher">
    </form>
</body>
</html>