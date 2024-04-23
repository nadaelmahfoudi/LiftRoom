<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Inclure Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>    
    <style>
        /* Pour une hauteur de 100% */
        html, body {
            height: 100%;
        }
        .exercise-title {
           
            font-weight: bold;
            color: #b45309; }

        .exercise-repetition {
            
            font-style: italic;
            color: #b45309;
        }
        

    </style>
    @vite('resources/css/app.css')
</head>
<body>
    <!-- Contenu de la vue -->
    @yield('content')
    <script>
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();

            var url = $(this).attr('href');

            $.ajax({
                url: url,
                type: 'get',
                success: function(response) {
                    $('.content').html(response);
                }
            });
        });

    </script>
</body>
</html>
