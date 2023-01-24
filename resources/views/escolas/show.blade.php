 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 </head>

 <body class="navbar-dark" data-base-url="/">
     <div class="horizontal-menu">
         <div class="container">
             <div class="horizontal-menu">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarText">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ url('escolas') }}">
                                        <i class="link-icon" data-feather="box"></i>
                                        <span class="menu-title">Início</span>
                                    </a>
                                </li>
    
                                <li class="nav-item">
                                    <a class="nav-link" href="route('logout')"
                                    onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                        <i class="link-icon" data-feather="box"></i>
                                        <span class="menu-title">Sair</span>
                                    </a>
                                </li>
                            </ul>
                    </nav>
                </form>
             </div>
         </div>
     </div>

     <div class="container">
         <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
             <div>
                 <h4 class="mb-3 mb-md-0">Detalhe escola</h4>
             </div>
             <div class="d-flex align-items-center flex-wrap text-nowrap">
                 <a href="{{ route('escolas.index') }}" class="btn btn-info btn-icon-text mb-2 mb-md-0">
                     Todas Escolas
                 </a>
             </div>
         </div>

         <div class="card">
             <div class="card-body">
                 <form action="#" method="POST">


                     <div class="mb-3">
                         <label for="name" class="form-label">Escolas Nome <span
                                 class="text-danger">*</span></label>
                         <input value="{{ $escola->name }}" disabled id="name" name="name" type="text"
                             class="form-control"placeholder="Product Name">
                     </div>

                   


                     <div class="mb-3">
                         <label for="image" class="form-label">Imagem Escola</label>
                         <div>
                             <img class="mt-2" src="/img/{{ $escola->image }}" width="300px">
                         </div>
                     </div>

                     <div>
                         <a href="{{ route('escolas.edit', $escola->escola_id) }}"
                             class="btn btn-success btn-icon-text mb-2 mb-md-0">
                             Editar Escola
                         </a>
                     </div>

                 </form>
             </div>

         </div>
     </div>

     <!-- base js -->
     <script src="{{ asset('js/core.js') }}"></script>
     <script src="{{ asset('js/feather.min.js') }}"></script>
     <script src="{{ asset('js/perfect-scrollbar.min.js') }}"></script>
     <!-- end base js -->

     <!-- plugin js -->
     <script src="{{ asset('js/prism.js') }}"></script>
     <script src="{{ asset('js/clipboard.min.js') }}"></script>
     <!-- end plugin js -->

     <!-- common js -->
     <script src="{{ asset('js/template.js') }}"></script>
     <!-- end common js -->

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
     </script>

 </body>

 </html>
