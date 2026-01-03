<?php
// Traitement du formulaire
$resultat = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $organisme  = $_POST['organisme'] ?? '';
    $activite   = $_POST['activite'] ?? '';
    $population = (int) ($_POST['population'] ?? 0);
    $taux       = (int) ($_POST['taux'] ?? 0);
    $region     = $_POST['region'] ?? '';

    // Logique simple de détection (exemple)
    if ($population > 500000 && $taux > 50) {
        $resultat = "Secteur prioritaire (développement & statistiques)";
    } else {
        $resultat = "Secteur standard";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détection de secteur d'activité</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 520px;
            margin: 60px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        label {
            font-weight: bold;
            margin-top: 15px;
            display: block;
            color: #555;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        button {
            width: 100%;
            margin-top: 25px;
            padding: 12px;
            background: #0066cc;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #004999;
        }

        .result {
            margin-top: 25px;
            padding: 15px;
            background: #e8f4ff;
            border-left: 5px solid #0066cc;
            border-radius: 6px;
            color: #333;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Détection de secteur</h1>

    <form method="POST" action="">
        <label for="organisme">Nom de l'organisme</label>
        <input type="text" id="organisme" name="organisme" required placeholder="ANSD">

        <label for="activite">Type d'activité</label>
        <input type="text" id="activite" name="activite" required placeholder="Démographie">

        <label for="population">Population ciblée</label>
        <input type="number" id="population" name="population" required placeholder="700000">

        <label for="taux">Taux (%)</label>
        <input type="number" id="taux" name="taux" required placeholder="60">

        <label for="region">Région</label>
        <select id="region" name="region" required>
            <option value="">-- Choisir une région --</option>
            <option value="Dakar">Dakar</option>
            <option value="Thiès">Thiès</option>
            <option value="Saint-Louis">Saint-Louis</option>
            <option value="Kaolack">Kaolack</option>
            <option value="Ziguinchor">Ziguinchor</option>
        </select>

        <button type="submit">Analyser</button>
    </form>

    <?php if ($resultat): ?>
        <div class="result">
            <strong>Résultat :</strong><br>
            <?= htmlspecialchars($resultat) ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
