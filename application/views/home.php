<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Empresa</title>

  <script src="https://kit.fontawesome.com/775fd40529.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
          $('#PrimeiraParte').removeClass('d-none');
          $('#SegundaParte').addClass('d-none');
          swal("Senha invalida!");
          swal("Atenção!", "Login ou senha esta incorreta!", "info");
        }
      })
    }

    function clicando() {


      $.ajax({
        url: "//localhost/Boostrap_table-main/index.php/Home/busca",
        type: "POST",
        dataType: 'json',
        data: {},
        success: function(data) {
          console.log(data);

          $("#table").bootstrapTable('removeAll');
          $("#table").bootstrapTable('append', data);

        },
      });






      ///////////////////////////////////////////
      //Caso seja necessario um retorno sem Ajax
      ///////////////////////////////////////////
      // $.post("index.php/Home/busca", {
      // }, function(data) {
      //   $("#table").bootstrapTable('removeAll');
      //   $("#table").bootstrapTable('append', JSON.parse(data));
      // })

    }

    function EditarItem(value, row) {
      return '<button class="btn btn-primary" onclick="Editar(\'' + value + '\',\'' + row.idade + '\',\'' + row.Prof + '\',\'' + row.cpf + '\')"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar </button>';
    }

    function Editar(value, idade, professor, cpf) {
      $('#exampleModalLong').modal('show');

      $('#nome').val(value);
      $('#idade').val(idade);
      $('#profissao').val(professor);
      $('#cpf').val(cpf);
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

    function SalvarEdit() {
      swal("OK!", "Salvo com sucesso!", "success");
    }
  </script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.1/dist/bootstrap-table.min.css">
</head>

<body style="overflow: visible;">
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">Empresa</a>
  </nav>

  <div class="card text-white bg-secondary mb-3 mt-5" id="PrimeiraParte" style="max-width: 22rem; margin-left: 35%">
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
              <th data-field="cpf" data-align="center">CPF</th>
              <th data-field="Prof" data-align="center">Profissão</th>
              <th data-field="nome" data-align="center" data-formatter="EditarItem">Editar</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
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
            <div class="col-3">
              <input type="text" class="form-control" id="cpf">
            </div>
            <div class="col-3">
              <input type="text" class="form-control" id="profissao">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="fechar()" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success" onclick="SalvarEdit()" data-dismiss="modal">Salvar</button>
        </div>
      </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/bootstrap-table@1.21.1/dist/bootstrap-table.min.js"></script>
</body>

</html>