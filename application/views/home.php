<!doctype html>
<html lang="pt-br">

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
        /////////////////////////////////////////////////////////////////////////////////////
        //// Caso renomeie o nome do arquivo principal deve ser alterado na URL abaixo.  ////
        /////////////////////////////////////////////////////////////////////////////////////
        url: "//localhost/table/index.php/Home/busca",
        type: "POST",
        dataType: 'json',
        data: {},
        success: function(data) {

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
      return '<button class="btn btn-primary" onclick="Editar(\'' + value + '\',\'' + row.idade + '\',\'' + row.Prof + '\',\'' + row.cpf + '\',\'' + row.registro + '\',\'' + row.setor + '\')"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> EDITAR </button>';
    }

    function Editar(value, idade, professor, cpf, registro, setor) {
      $('#exampleModalLong').modal('show');
      $('#htexto').text('EDITAR DE FUNCIONARIO');
      $('#nome').val(value);
      $('#idade').val(idade);
      $('#profissao').val(professor);
      $('#cpf').val(cpf);
      $('#registro').val(registro);
      $('#setor').val(setor);
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

    function SalvarEdit(value) {
      if (value == 'CADASTRO DE FUNCIONARIO') {
        swal("OK!", "Cadastro salva com sucesso!", "success");
      } else {
        swal("OK!", "Alteração salva com sucesso!", "success");

      }
      console.log(value);

    }

    function Sair() {
      $('#PrimeiraParte').removeClass('d-none');
      $('#SegundaParte').addClass('d-none');
    }

    function cadastro() {
      $('#formulario_modal')[0].reset();
      $('#exampleModalLong').modal('show');
      $('#htexto').text('CADASTRO DE FUNCIONARIO');
    }
  </script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.1/dist/bootstrap-table.min.css">
</head>

<div class="circle-bcgd" style="    
    background: #6360601a;
    border-top-left-radius: 80%;
    height: 100%;
    padding-top: 50%;
    padding-bottom: 50%;
    padding-left: 50%;
    padding-right: 50%;
    position: fixed;
    z-index: -1; margin-left:25%;"></div>

<body style="overflow: visible;">
  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="box-shadow: 1px 1px 5px #e6e6e6;">
    <a class="navbar-brand" href="#">Empresa</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <button class="btn btn-outline-danger nav-item nav-link active" onclick="Sair()">Sair</button>
    </form>
  </nav>

  <!-- Login:admin, Senha: admin -->
  <div class="card mb-3 mt-5 " id="PrimeiraParte" style="max-width: 22rem; margin-left: 35%">
    <div class="card-header">Logo Empresa</div>
    <div class="card-body">
      <div class="container shadow p-4 mb-2 bg-white rounded">
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
    <div class="container-fluid shadow p-4 mb-5 bg-white rounded mt-5">
      <div class="col-12">
        <div id="toolbar">
          <button class="btn btn-primary" onclick="cadastro()">CADASTRAR</button>
        </div>
        <table id="table" data-toolbar="#toolbar"  data-show-columns="true" data-toggle="table" data-detail-formatter="detailFormatterusuario" data-pagination="true" data-id-field="id" data-page-list="[10, 25, 50, 100, all]" class="table table-dark" data-search="true">
          <thead>
            <tr>
              <th data-field="registro" data-align="center" data-sortable="true">REGISTRO</th>
              <th data-field="nome" data-align="center">NOME</th>
              <th data-field="idade" data-align="center">IDADE</th>
              <th data-field="cpf" data-align="center">CPF</th>
              <th data-field="Prof" data-align="center">PROFISSÃO</th>
              <th data-field="setor" data-align="center">SETOR</th>
              <th data-field="nome" data-align="center" data-formatter="EditarItem" data-searchable="false">EDITAR</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header bg-dark text-white">
          <h5 class="modal-title" id="htexto">FUNCIONARIO</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="formulario_modal">
          <div class="modal-body">
            <div class="row">
              <div class="col-6">
                <label>NOME:</label>
                <input type="text" class="form-control" id="nome">
              </div>
              <div class="col-2">
                <label>IDADE:</label>
                <input type="text" class="form-control" id="idade">
              </div>
              <div class="col-4">
                <label>CPD:</label>
                <input type="text" class="form-control" id="cpf">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-5">
                <label>PROFISSÃO:</label>
                <input type="text" class="form-control" id="profissao">
              </div>
              <div class="col-4">
                <label>REGISTRO:</label>
                <input type="text" class="form-control" id="registro">
              </div>
              <div class="col-3">
                <label>SETOR:</label>
                <input type="text" class="form-control" id="setor">
              </div>

            </div>
          </div>
        </form>
        <div class="modal-footer bg-dark text-white">
          <button type="button" class="btn btn-secondary" onclick="fechar()" data-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-success" onclick="SalvarEdit($('#htexto').text())" data-dismiss="modal">Salvar</button>
        </div>
      </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/bootstrap-table@1.21.1/dist/bootstrap-table.min.js"></script>
</body>

</html>
