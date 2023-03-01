<html>
<body>
    <h1>Liste des film</h1>
    <?php
    // Récupérer l'année de recherche
    $ANNEE = $_GET['annee'];

    // Connexion à la BDD
    $base = new PDO('mysql:host=localhost; dbname=id20205722_cnam', 'id20205722_mehdi', 'J3@fy?1UpR5Rp#Ez');
    $base->exec("SET CHARACTER SET utf8");

    // Échapper les caractères spéciaux pour éviter les injections SQL
    $ANNEE = $base->quote($ANNEE);

    // Construire la requête SQL
    $sql = "SELECT titre FROM movie WHERE annee = $ANNEE";

    // Exécuter la requête SQL
    $retour = $base->query($sql);

    // Vérifier si des résultats ont été trouvés
    if ($retour->rowCount() > 0) {
        // Afficher les résultats sous forme de liste
        echo "<ul>";
        while ($data = $retour->fetch()) {
            echo "<li>" . $data["titre"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "Aucun film trouvé pour l'année $ANNEE";
    }

    // Fermer la connexion à la base de données
    $base = null;
    ?>
</body>
</html>