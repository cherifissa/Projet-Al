<!DOCTYPE html>
<html>

<head>
    <title>Réservation Acceptée</title>
</head>

<body>
    <p>Cher {{ $nom_client }},</p>

    <p>Nous sommes heureux de vous informer que votre réservation avec l'identifiant {{ $id }} a été acceptée
        !</p>

    <p>Détails de la réservation :</p>
    <ul>
        <li>Date d'arrivée : {{ $date_arrive }}</li>
        <li>Date de départ : {{ $date_depart }}</li>
        <li>Type de chambre : {{ $type_chambre }}</li>
        <li>Nombre d'adultes : {{ $nombre_adulte }}</li>
        <li>Nombre d'enfants : {{ $nombre_enfant }}</li>
    </ul>

    <p>Nous vous remercions d'avoir choisi notre hôtel pour votre séjour. Nous avons hâte de vous accueillir le
        {{ $date_arrive }}. Si vous avez des questions ou des demandes spéciales, n'hésitez pas à nous contacter à
        l'adresse {{ $email_client }}.</p>

    <p>Bon voyage, et nous sommes impatients de rendre votre séjour chez nous inoubliable !</p>

    <p>Cordialement,<br>[Hôtel Keto]</p>
</body>

</html>
