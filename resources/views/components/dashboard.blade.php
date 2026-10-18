<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Softwear Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@100..900&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Domine:wght@400..700&family=Figtree:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css' , 'resources/js/app.js'])
</head>
<body class="bg-gray-50 flex">
    <x-dashboard-sidebar/>
    <main class="w-[80%] ml-80 mt-10">{{ $slot }}</main>
</body>
</html>
