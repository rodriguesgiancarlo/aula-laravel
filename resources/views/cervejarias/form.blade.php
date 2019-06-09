@csrf

<div class="form-group">
    <label for="nome-cervejaria">Nome</label>
    <input type="text" 
           class="form-control" 
           id="nome-cervejaria"
           name="nome"
           value="{{ isset($cervejaria) ? $cervejaria->nome : '' }}">
</div>

<div class="form-group">
    <label for="cnpj-cervejaria">CNPJ</label>
    <input type="text" 
            class="form-control" 
            id="cnpj-cervejaria"
            name="cnpj"
            value="{{ isset($cervejaria) ? $cervejaria->cnpj : '' }}">
</div>

<div class="row">
    <button type="reset" class="btn btn-light mr-2">Limpar campos</button>
    <button type="submit" class="btn btn-success">Enviar</button>
</div>