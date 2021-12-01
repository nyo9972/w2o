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
                            <input value="{{ $colaborator->name }}" id="name" name="name" placeholder=""
                                class="form-control input-md" required type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="email">Email <h11>*</h11></label>
                        <div class="col-md-5">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input value="{{ $colaborator->email }}" id="email" required name="email" class="form-control"
                                    placeholder="email@email.com" type="text"
                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                            </div>
                        </div>
                        @php
                           $data = implode('/', array_reverse(explode('-', $colaborator->birth)));
                        @endphp
                        <label class="col-md-1 control-label" for="birth">Nascimento</label>
                        <div class="col-md-2">
                            <input value="{{ $data }}" id="birth" name="birth" placeholder="DD/MM/AAAA" class="form-control input-md"
                                type="text" maxlength="10" OnKeyPress="format('##/##/####', this)" onBlur="showhide()">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="phone">Telefone <h11>*</h11></label><button onclick="whatsapp()" class="btn btn-success fa fa-whatsapp" aria-hidden="true"> Whatsapp</button>
                        <div class="col-md-2">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input value="{{ $colaborator->phone }}" id="phone" name="phone" class="form-control" placeholder="XX XXXXX-XXXX"
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
                    <button id="register" name="register" class="btn btn-success" type="Submit">Salvar</button>
                    <button id="cancel" name="cancel" class="btn btn-danger" onclick="window.location.reload();">Cancelar</button>
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

    function whatsapp(){
       const phone = $("#phone").val()
       window.open('https://api.whatsapp.com/send?phone=' + phone);
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
