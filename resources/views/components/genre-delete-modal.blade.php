@props(['genre'])

<div class="modal fade" id="genreDeleteModal{{$genre->id}}" tabindex="-1"
    aria-labelledby="genreDeleteModal{{$genre->id}}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fw-bold" id="genreDeleteModal{{$genre->id}}Label">
                    Delete "{{ $genre->name }}"
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body fs-5">
                Are you sure you want to delete "{{ $genre->name }}"?
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary fs-5" data-bs-dismiss="modal">Dismiss</button>
                <form action="{{ route('genres.destroy', $genre) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger fs-5">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>