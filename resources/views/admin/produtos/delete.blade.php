<!-- Modal Structure -->
<div id="delete-{{ $produto->id }}" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">delete</i> Tem certeza</h4>
        <div class="row">
          
        <p>Tem Certeza que deseja eliminar <b>{{ $produto->nome }}</b> ?</p>
       
        <a href="#!" class="modal-close waves-effect waves-green btn blue right">Cancelar</a> 
        <form action="{{ route('admin.produto.delete', ['produto'=>$produto->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="modal-close waves-effect waves-green btn red left">Eliminar</button>
        </form>
    </div>    
  </div>