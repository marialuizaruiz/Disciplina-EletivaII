<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
    

    <title>Cliente</title>
  </head>
  <body>
    <main class="container mt-5">
        
        <div class="d-flex justify-content-between">
            <h3>Cliente</h3>
            <a href=" {{route('clientes.create') }}" class="btn btn-primary"> <i class="fas fa-plus"></i> Novo cliente</a>
        </div>

        <table class="table table-stripped table-hover mt-5" id="tabela">
            <thead>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Idade</th>
                <th>Ações</th>
            </thead>
            <tbody>
                @foreach($clientes as $c)
                    <tr>
                        <td>{{$c->nome}}</td>
                        <td>{{$c->telefone}}</td>
                        <td>{{$c->idade}}</td>
                        <td>
                        <a href="{{ route('clientes.edit', $c->id) }}" class="btn btn-sm btn-warning">Alterar</a>
                            <a href="clientes/{{$c->id}}/delete" class="btn btn-sm btn-danger">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.min.js"></script>

        <script> 
        var table = new DataTable('#tabela', {
            language: {
                url: 'https://cdn.datatables.net/plug-ins/2.0.6/i18n/pt-BR.json',
            },
        });
        </script>
    </main>
  </body>
</html>