<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gestion des étudiants</title>

        <link rel="stylesheet" href=" {{ asset('css/app.css') }}">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
        
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark my-3" >
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    <li class="nav-item active">
                        <router-link class="nav-link" to="/">ACCUEIL <span class="sr-only">(current)</span></router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/filieres">LES FILIERES</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/etudiants">LES ETUDIANTS</router-link>
                    </li>
                    <li class="nav-item">
                    <router-link class="nav-link" to="/filtrer">FILTRAGE</router-link>
                    </li>
                    </ul>
                </div>
            </nav>

            <div class="container" pt-20>        
                <router-view></router-view>
            </div>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>