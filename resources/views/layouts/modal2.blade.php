<div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sei sicuro di voler cancellare questo operatore ? </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         Se continui l'operatore sarà cancellato: l'azione non è reversibile.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Chiudi</button>
          <form method="POST" action="{{route('operators.destroy', ['operator' => $user->id])}}">
            @csrf
            @method('DELETE')
            <button type="submit" name="button" data-toggle="modal" data-target="#exampleModal{{$user->id}}" class="btn my-btn-delete">
              Cancella<i class="fas fa-trash"></i>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
