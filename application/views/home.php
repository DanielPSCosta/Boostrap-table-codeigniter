<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Hello, Bootstrap Table!</title>


  <script src="//code.jquery.com/jquery-3.6.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

  <script type="text/javascript">
    function acesso() {
      $.post("index.php/Home/acesso", {
        login: $('#login').val(),
        senha: $('#senha').val()
      }, function(data) {
        if (data == 1) {
          $('#PrimeiraParte').addClass('d-none')
          $('#SegundaParte').removeClass('d-none')

          clicando();
        } else {
          $('#PrimeiraParte').removeClass('d-none')
          $('#SegundaParte').addClass('d-none')
        }
      })
    }

    function clicando() {
      var retorno = [{
          "nome": 'Daniel',
          "idade": '25',
          "Prof": 'Analista de sistemas'
        },
        {
          "nome": 'Bruno',
          "idade": '21',
          "Prof": 'Analista de suporte'
        },

        {
          "nome": 'Mauricio',
          "idade": '28',
          "Prof": 'Analista de infraestrutura'
        },

        {
          "nome": 'Bruno',
          "idade": '22',
          "Prof": 'Analista de infraestrutura'
        },

        {
          "nome": 'Vinicius',
          "idade": '19',
          "Prof": 'Analista de infraestrutura'
        },

        {
          "nome": 'Fernando',
          "idade": '19',
          "Prof": 'Analista de infraestrutura'
        },

        {
          "nome": 'Mauricio',
          "idade": '28',
          "Prof": 'Analista de infraestrutura'
        },

        {
          "nome": 'Mauricio',
          "idade": '28',
          "Prof": 'Analista de infraestrutura'
        },

        {
          "nome": 'Mauricio',
          "idade": '28',
          "Prof": 'Analista de infraestrutura'
        },

        {
          "nome": 'Mauricio',
          "idade": '28',
          "Prof": 'Analista de infraestrutura'
        },

        {
          "nome": 'Mauricio',
          "idade": '28',
          "Prof": 'Analista de infraestrutura'
        },

        {
          "nome": 'Mauricio',
          "idade": '28',
          "Prof": 'Analista de infraestrutura'
        },
      ]

      $("#table").bootstrapTable('removeAll');
      $("#table").bootstrapTable('append', retorno);

    }

    function teste(value, row) {
      return '<button class="btn btn-danger" onclick="Editar(\'' + value + '\',\'' + row.idade + '\',\'' + row.Prof + '\')"> Consultar </button>';
    }

    function Editar(value, idade, professor) {
      $('#exampleModalLong').modal('show');

      $('#nome').val(value);
      $('#idade').val(idade);
      $('#profissao').val(professor);
    }

    function fechar() {
      $('#exampleModalLong').modal('hide');
    }

    function detailFormatterusuario(index, row) {
      var html = [];
      $.each(row, function(key, value) {
        let include = true;
        if (key == 'Prof') {
          key = 'PROFISSÃO';
        }

        if (include) {
          html.push('<p><b style="text-transform: uppercase" >' + key + ':</b> ' + value + '</p>');
        }

      })
      return html.join('')
    }
  </script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.1/dist/bootstrap-table.min.css">
</head>

<body style="background: #7f8083;">
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">Empresa</a>
  </nav>






  <div class="card text-white bg-secondary mb-3 mt-5" id="PrimeiraParte"  style="max-width: 22rem; margin-left: 35%">
    <div class="card-header">Conta</div>
    <div class="card-body">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <Label>login</Label>
              <input type="text" class="form-control" id="login" placeholder="Digite seu login">
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <Label>Senha</Label>
              <input type="password" class="form-control" id="senha" placeholder="Digite sua senha">
            </div>
          </div>
          <div class="row">
            <div class="col-12 mt-2">
              <button class="btn btn-primary" onclick="acesso()">Acessar</button>
            </div>
          </div>
        </div>
    </div>
  </div>








  <div id="SegundaParte" class="d-none">

    <div class="container">
      <div class="col-12">
        <table id="table" data-toolbar="#toolbar" data-toggle="table" data-detail-formatter="detailFormatterusuario" data-pagination="true" data-id-field="id" data-page-list="[10, 25, 50, 100, all]" class="table table-dark" data-search="true">
          <thead>
            <tr>
              <th data-field="nome" data-align="center">Nome</th>
              <th data-field="idade" data-align="center">Idade</th>
              <th data-field="Prof" data-align="center">Profissão</th>
              <th data-field="nome" data-align="center" data-formatter="teste">Editar</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">FUNCIONARIO</h5>
          <button type="button" class="close" data-dismiss="modal" onclick="fechar()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-4">
              <input type="text" class="form-control" id="nome">
            </div>
            <div class="col-2">
              <input type="text" class="form-control" id="idade">
            </div>
            <div class="col-6">
              <input type="text" class="form-control" id="profissao">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="fechar()" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/bootstrap-table@1.21.1/dist/bootstrap-table.min.js"></script>
</body>

</html>