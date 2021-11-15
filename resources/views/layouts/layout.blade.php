<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>@yield('title', 'Mon Blog')</title>
</head>
<body>
    <header class="p-3 bg-dark text-white">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
              <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>
    
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="/home" class="nav-link px-2 text-secondary">Home</a></li>
              <li><a href="/categories" class="nav-link px-2 text-white">Categories</a></li>
              <li><a href="/formations" class="nav-link px-2 text-white">Formations</a></li>
            </ul>
            
            @if (!Auth::check())
            <div class="text-end">
              <a href="/login"><button type="button" class="btn btn-outline-light me-2">Connexion</button></a>
              <a href="/signup"><button type="button" class="btn btn-warning">Inscription</button></a>
            </div>
            @else
            <div class="text-end">
              @if(Auth::user()->isAdmin)
              <a href="/admin"><button type="button" class="btn btn-outline-light me-2">Admin</button></a>  
              @endif
              <a href="/account"><button type="button" class="btn btn-warning">Mon compte</button></a>
              <a href="/logout"><button type="button" class="btn btn-outline-light me-2">Deconnexion</button></a>  
            </div>
            @endif
          </div>
        </div>
    </header>
    @yield('content')
    <script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script></script>
</body>
</html>