<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>

    <!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content'>
   @foreach ($categorasMenu as $categorasM)
   <li><a href="{{ route('site.categoria', ['categoria' => $categorasM->id]) }}">{{ $categorasM->nome }}</a></li>

   @endforeach
  </ul>
  
  <ul id='dropdown2' class='dropdown-content'>
    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li><a href="{{ route('login.logout') }}">Sair</a></li>
 
   </ul>

    <nav class="red">
        <div class="nav-wrapper container">
          <a href="{{ route('site.index') }}" class="brand-logo center">Vendas Online</a>
          <ul id="nav-mobile" class="left">
            <li><a href="{{ route('site.index') }}">Inicio</a></li>
            <li><a class='dropdown-trigger' href='#' data-target='dropdown1'>
                Categorias<i class="material-icons right">expand_more</i></a>
            </li>            
            <li><a href="{{ route('site.carrinho') }}">Carrinha <span class="badge white">{{ Cart::content()->count() }}</span></a></li>
          </ul>

          <ul id="nav-mobile" class="right">
            @auth ()
              <li><a class='dropdown-trigger' href='#' data-target='dropdown2'>
                {{ Auth::user()->firstname }}<i class="material-icons right">expand_more</i></a>
              </li>            
            @else
              <li><a href='{{ route('login.form') }}'>
                Login<i class="material-icons right">lock</i></a>
              </li>            

            @endauth
        </ul>
          
        </div>
      </nav>

    @yield('conteudo')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
     
    <script> 
       
       var elemDrop = document.querySelectorAll('.dropdown-trigger');
        var instanceDrop = M.Dropdown.init(elemDrop, {
            coverTrigger: false,
            constrainWidth: false
        });
    
    </script>
</body>
</html>