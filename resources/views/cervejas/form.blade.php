@csrf

<div class="form-group">
    <label for="nome-cerveja">Nome</label>
    <input type="text" 
           class="form-control" 
           id="nome-cerveja"
           name="nome"
           value="{{ isset($cerveja) ? $cerveja->nome : old('nome') }}"
           autofocus>
</div>


<div class="form-group">
    <label for="cervejaria-cerveja">Cervejaria fabricante</label>
    <select id="cervejaria-cerveja"
            name="cervejaria_id"
            class="form-control">
        <option value="">Selecione...</option>
        @foreach($cervejarias as $cervejaria)
        <option value="{{ $cervejaria->id }}" {{ $cervejaria->id == $cerveja->cervejaria_id || $cervejaria->id == old('cervejaria_id') ? 'selected' : '' }}>{{ $cervejaria->nome }}</option>
        @endforeach
    </select>
</div>


<div class="form-group">
    <label for="ingredientes-cerveja">Ingredientes</label>
    <select id="ingredientes-cerveja"
            name="ingredientes[]"
            class="form-control" 
            multiple>
        @foreach($ingredientes as $ingrediente)
        <option value="{{ $ingrediente->id }}" 
            {{ $cerveja->ingredientes->contains($ingrediente->id) || null != old('ingredientes') && in_array($ingrediente->id, old('ingredientes')) ? 'selected' : '' }}>{{ $ingrediente->nome }}</option>
        @endforeach
    </select>
</div>

<div class="row">
    <button type="reset" class="btn btn-light mr-2">Limpar campos</button>
    <button type="submit" class="btn btn-success">Enviar</button>
</div>