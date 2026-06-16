{{--
    Componente: delete-modal
    Mostra un modal Bootstrap di conferma prima di eliminare una risorsa
    
--}}
@props(['id', 'title', 'itemName', 'route'])

<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            {{-- Header con icona di avviso --}}
            <div class="modal-header">
                <h5 class="modal-title text-danger">
                    <i class="bi bi-exclamation-triangle me-2"></i>{{ $title }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
            </div>

            {{-- Messaggio di conferma con nome elemento --}}
            <div class="modal-body">
                Vuoi eliminare <strong>{{ $itemName }}</strong>? L'operazione non è reversibile.
            </div>

            {{-- Azioni: annulla o conferma eliminazione --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Annulla</button>
                <form action="{{ $route }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash3 me-1"></i>Elimina definitivamente
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
