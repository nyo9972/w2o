
<div class="content">
<!DOCTYPE html>
@include("navbar")

<body>
    <form class="form-horizontal" method="post" action="{{ route('colaboratorRegister') }}">
        <fieldset>
            <div class="panel panel-primary">
                <div class="panel-heading">Cadastro de Colaboradores</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-11 control-label">
                            <p class="help-block">
                                <h11>*</h11> Campo Obrigatório
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="name">Nome Completo <h11>*</h11></label>
                        <div class="col-md-8">
                            <input id="name" name="name" placeholder=""
                                class="form-control input-md" required type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="email">Email <h11>*</h11></label>
                        <div class="col-md-5">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input id="email" required name="email" class="form-control"
                                    placeholder="email@email.com" type="text"
                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                            </div>
                        </div>
                        <label class="col-md-1 control-label" for="birth">Nascimento</label>
                        <div class="col-md-2">
                            <input id="birth" name="birth" placeholder="DD/MM/AAAA" class="form-control input-md"
                                type="text" maxlength="10" OnKeyPress="format('##/##/####', this)" onBlur="showhide()">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="phone">Telefone <h11>*</h11></label>
                        <div class="col-md-2">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input id="phone" name="phone" class="form-control" placeholder="XX XXXXX-XXXX"
                                    required="" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
                                    OnKeyPress="format('## #####-####', this)">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="Cadastrar"></label>
                <div class="col-md-8">
                    <button id="register" name="register" class="btn btn-success" type="Submit">Cadastrar</button>
                    <button id="cancel" name="cancel" class="btn btn-danger" onclick="window.location.reload();">Cancelar</button>
                </div>
            </div>
            </div>
            </div>
        </fieldset>
    </form>
</body>
</div>

<div>
    <div class="panel-heading">Lista de empresas</div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">E-Mail</th>
            <th scope="col">Nascimento</th>
            <th scope="col">Telefone</th>
            <th scope="col">Empresa</th>
          </tr>
        </thead>
        <tbody>
            @foreach($colaborators as $colaborator)
            @php
            $company = App\Models\Companies::find($colaborator->company);
            @endphp
          <tr>
            <td>{{ $colaborator->name ?? 'sem dados' }}</td>
            <td>{{ $colaborator->email ?? 'sem dados' }}</td>
            <td>{{ $colaborator->birth ?? 'sem dados' }}</td>
            <td>{{ $colaborator->phone ?? 'sem dados' }}</td>
            <td>{{ $company->corporate_name ?? 'sem dados' }}</td>
            <td><button data-id="{{ $colaborator->id}}" onclick="edit(this)" class="btn btn-primary">Editar</button></td>
            <td><button data-id="{{ $colaborator->id}}" onclick="destroy(this)" class="btn btn-danger">Excluir</button></td>
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
          url: '{{ route('colaboratorEdit') }}',
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
          url: '{{ route('colaboratorDestroy') }}',
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
