<div class="modal fade" id="modal-delete-{{ $category->id }}">
    <div class="modal-dialog">
        <form action="{{ url('/categories/' . $category->id) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Hapus Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Menghapus Data Ini?</p>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-outline-danger">Hapus</button>
              </div>
            </div>
        </form>
    </div>
  </div>