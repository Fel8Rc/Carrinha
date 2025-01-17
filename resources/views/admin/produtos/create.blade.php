<!-- Modal Structure -->
<div id="create" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">playlist_add_circle</i> Novo produto</h4>
      <form action="{{ route('admin.produto.store') }}" method="POST" class="col s12" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">

        <div class="row">
          <div class="input-field col s6">
            <input placeholder="nome" id="nome" name="nome" type="text" class="validate">
            <label for="nome">Nome</label>
          </div>
          <div class="input-field col s6">
            <input id="preco" name="preco" type="number" class="validate">
            <label for="preco">Preço</label>
          </div>
          <div class="input-field col s12">
            <input id="descricao" name="descricao" type="text" class="validate">
            <label for="descricao">Descrição</label>
          </div>

          <div class="input-field col s12">
            <select name="id_categoria">
              <option value="" disabled selected>Escolha uma Opção</option>
              @foreach ($categorias as $categoria)
              <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
              @endforeach
              </select>
            <label>Categoria</label>
          </div>

          <div class="file-field input-field col s12">
            <div class="btn">
              <span>Imagem</span>
              <input type="file" name="imagem">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text">
            </div>
          </div>
        </div> 
       
        <a href="#!" class="modal-close waves-effect waves-green btn blue right">Cancelar</a>
        <button type="submit" class="waves-effect waves-green btn green left">Cadastrar</button>
    </div>
    
  </form>
  </div>