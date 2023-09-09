<!DOCTYPE html>
<html>

<head>
    <title>Réservation Refusée</title>
</head>

<body>
    <p>Cher {{ $nom_client }},</p>

    <p>Nous vous remercions pour votre demande de réservation auprès de notre hôtel.</p>

    <p>Cependant, nous regrettons de vous informer que nous ne sommes actuellement pas en mesure d'accepter votre
        réservation en raison du manque de chambres disponibles pour les dates demandées, à savoir du
        {{ $date_arrive }} au {{ $date_depart }}.</p>

    <p>Nous comprenons que cela puisse être décevant, et nous nous excusons pour tout inconvénient que cela pourrait
        causer. Si vos dates de séjour sont flexibles, nous vous encourageons à envisager de les modifier, car nous
        serions ravis de vous accueillir à une autre période.</p>

    <p>Nous sommes à votre disposition pour toute question ou assistance supplémentaire. N'hésitez pas à nous contacter
        à l'adresse contact@ketohotel.com.</p>

    <p>Encore une fois, nous vous présentons nos excuses pour cette situation et espérons avoir l'opportunité de vous
        accueillir dans un proche avenir.</p>

    <p>Cordialement,<br>[Hôtel Keto]</p>
</body>

</html>
