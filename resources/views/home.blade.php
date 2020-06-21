<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SPA FORUM</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="../css/app.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="app">
         <app-home></app-home>
    </div>
    <script src="../js/app.js"></script>
</body>
</html>
