<!DOCTYPE html>
@include("navbar")

<body>
    <form class="form-horizontal" method="post" action="{{ route('companyRegister') }}">
        <fieldset>
            <div class="panel panel-primary">
                <div class="panel-heading">Cadastro de Empresas - Editar {{ $company->corporate_name }}</div>
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
                            <input value="{{ $company->corporate_name ?? '' }}" id="corporate-name" name="corporate-name" placeholder=""
                                class="form-control input-md" required type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="cnpj">CNPJ <h11>*</h11></label>
                        <div class="col-md-2">
                            <input value="{{ $company->cnpj ?? '' }}" id="cnpj" name="cnpj" placeholder="Apenas números" class="form-control input-md"
                                required type="text" maxlength="14" pattern="[0-9]+$">
                        </div>
                        <label class="col-md-1 control-label" for="name">Telefone<h11>*</h11></label>
                        <div class="col-md-2">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input value="{{ $company->phone ?? '' }}" id="phone" name="phone" class="form-control" placeholder="XX XXXXX-XXXX"
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
                                <input value="{{ $company->email ?? '' }}" id="email" name="email" class="form-control" placeholder="email@email.com"
                                    type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="CEP">CEP</label>
                        <div class="col-md-2">
                            <input value="{{ $company->cep ?? '' }}" id="cep" name="cep" placeholder="Apenas números" class="form-control input-md"
                                value="" type="number" maxlength="8" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" pattern="[0-9]+$">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="street">Endereço</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">Rua</span>
                                <input value="{{ $company->rua ?? '' }}" id="street" name="rua" class="form-control" placeholder="" type="text">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group">
                                <span class="input-group-addon">Nº </span>
                                <input value="{{ $company->number ?? '' }}" id="number" maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="number" class="form-control" placeholder="" type="number">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-addon">Bairro</span>
                                <input value="{{ $company->district ?? '' }}" id="district" name="district" class="form-control" placeholder="" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="city"></label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">Cidade</span>
                                <input value="{{ $company->city ?? '' }}" id="city" name="city" class="form-control" placeholder="" type="text">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group">
                                <span class="input-group-addon">Estado</span>
                                <input value="{{ $company->estate ?? '' }}" id="estate" name="estate" class="form-control" placeholder="" type="text">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="Cadastrar"></label>
                    <div class="col-md-8">
                        <button id="register" name="register" class="btn btn-success" type="Submit">Salvar</button>
                        <button id="cancel" name="clean" class="btn btn-danger" onclick="window.location.reload();">Limpar</button>
                    </div>
                </div>
            </div>
            </div>
        </fieldset>
    </form>
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
