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
    </div>


    <!-- Authentication -->

    <nav class="bottom-navbar">
        <div class="container">
            <ul class="nav page-navigation">

                <li class="nav-item">

                </li>



            </ul>
        </div>
    </nav>
    </div>
    </form>

    <div class="container">
        <h1>Bem vindo !<div class="font-medium text-base ">{{ Auth::user()->name }}</div>
        </h1>

    </div>



    <!-- partial -->
    <div class='container'>
        <div class="page-wrapper">
            <div class="page-content">

                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                    <div>
                        <h4 class="mb-3 mb-md-0">Todas as Escolas </h4>
                    </div>


                    <div class="d-flex align-items-center flex-wrap text-nowrap">
                      
                    </div>

                    <div class="d-flex align-items-center flex-wrap text-nowrap">
                        <a href="{{ url('localizacao') }}" class="btn btn-sm btn-success btn-icon-text  mb-md-0">
                            <i data-feather="plus"></i> Adicionar localizacao
                        </a>

                        <a href="{{ url('escolas/create') }}" class="btn btn-sm btn-success btn-icon-text mb-2 mb-md-0">
                            <i data-feather="plus"></i> Adicionar escola
                        </a>
                    </div>

                    
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    @if ($message = session('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-sm table-hover mb-0">
                            <thead>
                                <tr>
                                    <th class="pt-0">id</th>
                                    <th class="pt-0">Nome Escola</th>
                                    <th class="pt-0">Localizacao</th>
                                    <th class="pt-0">Imagem escola</th>
                                    <th class="pt-0">Criado em </th>
                                    <th class="pt-0">Ações</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($escolas as $index => $val)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>{{ $val->name }}</td>
                                        <td>{{ $val->local_name }}</td>
                                        <td><img alt="img" src="/img/{{ $val->image }}" width="100px"></td>
                                        <td>{{ $val->created_at }}</td>
                                        <td>

                                            <form action="{{ route('escolas.destroy', $val->escola_id) }}"
                                                method="POST">
                                                {{ csrf_field() }}
                                                @method('DELETE')
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('escolas.show', $val->escola_id) }}"><i
                                                        data-feather="eye"></i> Ver</a>
                                                <a class="btn btn-sm btn-warning"
                                                    href="{{ route('escolas.edit', $val->escola_id) }}"><i
                                                        data-feather="link"></i> Editar</a>


                                                <a type="submit" class="btn btn-sm btn-danger" data-toggle="modal"
                                                    data-target="#exampleModal">
                                                    <i data-feather="trash"></i>
                                                    Excluir
                                                </a>

                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Excluir
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Tem certeza ??
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-sm btn-danger" type="submit"><i
                                                                        data-feather="trash"></i> Excluir</button>
                                                                <a type="button" href="{{ url('escolas') }}"
                                                                    class="btn btn-sm btn-success">Cancelar</a>


                                                            </div>
                                                        </div>


                                            </form>

                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>

    </div>


    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
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
