
<div class="content">
<!DOCTYPE html>
@include("navbar")

<body>
    <form class="form-horizontal" method="post" action="{{ route('companyRegister') }}">
        <fieldset>
            <div class="panel panel-primary">
                <div class="panel-heading">Cadastro de Empresas</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-11 control-label">
                            <p class="help-block">
                                <h11>*</h11> Campo Obrigatório
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="corporate-name">Razão Social <h11>*</h11></label>
                        <div class="col-md-8">
                            <input id="corporate-name" name="corporate-name" placeholder=""
                                class="form-control input-md" required type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="cnpj">CNPJ <h11>*</h11></label>
                        <div class="col-md-2">
                            <input id="cnpj" name="cnpj" placeholder="Apenas números" class="form-control input-md"
                                required type="text" maxlength="14" pattern="[0-9]+$">
                        </div>
                        <label class="col-md-1 control-label" for="name">Telefone<h11>*</h11></label>
                        <div class="col-md-2">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input id="phone" name="phone" class="form-control" placeholder="XX XXXXX-XXXX"
                                    required="" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
                                    OnKeyPress="format('## #####-####', this)">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="email">Email</label>
                        <div class="col-md-5">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input id="email" name="email" class="form-control" placeholder="email@email.com"
                                    type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="CEP">CEP</label>
                        <div class="col-md-2">
                            <input id="cep" name="cep" placeholder="Apenas números" class="form-control input-md"
                                value="" type="number" maxlength="8" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" pattern="[0-9]+$">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="street">Endereço</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">Rua</span>
                                <input id="street" name="rua" class="form-control" placeholder="" type="text">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group">
                                <span class="input-group-addon">Nº </span>
                                <input id="number" maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="number" class="form-control" placeholder="" type="number">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-addon">Bairro</span>
                                <input id="district" name="district" class="form-control" placeholder="" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="city"></label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">Cidade</span>
                                <input id="city" name="city" class="form-control" placeholder="" type="text">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group">
                                <span class="input-group-addon">Estado</span>
                                <input id="estate" name="estate" class="form-control" placeholder="" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="Cadastrar"></label>
                        <div class="col-md-8">
                            <button id="register" name="register" class="btn btn-success" type="Submit">Cadastrar</button>
                            <button id="cancel" name="clean" class="btn btn-danger" onclick="window.location.reload();">Limpar</button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal">
                                Adicionar Colaborador
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
</form>
</div>

<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Adicionar Colaborador</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div>
                <label>Colaborador</label>
                <select id="colaborator-select" class="form-control"> 
                    <option value="">Selecione</option>
                    @foreach ($colaborators as $colaborator)
                    <option value="{{ $colaborator->id }}">{{ $colaborator->name }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div>
                <label>Empresa</label>
                <select id="company-select" class="form-control"> 
                    <option value="">Selecione</option>
                    @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->corporate_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" onclick="addColaborator(this)">Salvar</button>
        </div>
      </div>
    </div>
  </div>

<div>
<div class="panel-heading">Lista de empresas</div>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Razão Social</th>
        <th scope="col">CNPJ</th>
        <th scope="col">Telefone</th>
        <th scope="col">E-Mail</th>
        <th scope="col">CEP</th>
        <th scope="col">Rua</th>
        <th scope="col">Numero</th>
        <th scope="col">Bairro</th>
        <th scope="col">Cidade</th>
        <th scope="col">Estado</th>
      </tr>
    </thead>
    <tbody>
        @foreach($companies as $company)
      <tr>
        <td>{{ $company->corporate_name ?? 'sem dados' }}</td>
        <td>{{ $company->cnpj ?? 'sem dados' }}</td>
        <td>{{ $company->phone ?? 'sem dados' }}</td>
        <td>{{ $company->email ?? 'sem dados' }}</td>
        <td>{{ $company->cep ?? 'sem dados' }}</td>
        <td>{{ $company->rua ?? 'sem dados' }}</td>
        <td>{{ $company->number ?? 'sem dados' }}</td>
        <td>{{ $company->district ?? 'sem dados' }}</td>
        <td>{{ $company->city ?? 'sem dados' }}</td>
        <td>{{ $company->estate ?? 'sem dados' }}</td>
        <td><button data-id="{{ $company->id}}" onclick="edit(this)" class="btn btn-primary">Editar</button></td>
        <td><button data-id="{{ $company->id}}" onclick="destroy(this)" class="btn btn-danger">Excluir</button></td>
      </tr>
        @endforeach
    </tbody>
  </table>
</div>
</body>

</html>

<script>
    function format(mask, document) {
        var i = document.value.length;
        var output = mask.substring(0, 1);
        var text = mask.substring(i);

        if (text.substring(0, 1) != output) {
            document.value += text.substring(0, 1);
        }

    }

    function edit(element){
        const id = $(element).data('id');

        $.ajax({
          url: '{{ route('companyEdit') }}',
          method: 'get',
          data: {
            id: id,
          },
          success: function(response) {
            jQuery('.content').empty();
            jQuery('.content').html(response);
          },
          error: function() {
            alert('Erro ao Salvar!');
          }
      });
    }

    function destroy(element){
        const id = $(element).data('id');

        $.ajax({
          url: '{{ route('companyDestroy') }}',
          method: 'post',
          data: {
            id: id,
          },
          success: function(response) {
            window.location.reload();
            alert('Excluido com successo!')
          },
          error: function() {
            alert('Erro ao Excluir!');
          }
      });
    }

    function addColaborator(element) {
        const colaboratorId = $("#colaborator-select").val();
        const companyId = $("#company-select").val();

        $.ajax({
          url: '{{ route('companyLink') }}',
          method: 'post',
          data: {
            colaboratorId: colaboratorId,
            companyId: companyId,
          },
          success: function(response) {
            window.location.reload();
            alert('Vinculado com successo!')
          },
          error: function() {
            alert('Erro ao Vincular!');
          }
      });
    }

</script>

<style>
    h11 {
        color: red;
    }

    #logo {
        width: 50%;
        height: 50%;
    }

    .panel-heading {
        font-size: 150%;
    }

</style>
