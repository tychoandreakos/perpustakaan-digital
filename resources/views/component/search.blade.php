  <!-- hello -->
  <div class="jumbotron bg-danger text-white">
    <div class="pl-5 pr-5" style="margin-top: -40px;">
        <h5 class="ml-3 mb-3 text-center text-white">Halo {{ ucwords(Auth::user()->name) }} Cari buku apa hari ini?</h5>
        <form action="{{ route('cari') }}" method="get">
            <div class="input-group rounded-pill p-1 bg-light">
            <input type="search" autocomplete="off" value="{{ isset($cari) ? $cari : '' }}" name="cari"
                    placeholder="Masukkan satu atau lebih kata kunci dari judul pengarang, atau subyek"
                    style="box-shadow: none;" aria-describedby="button-addon3"
                    class="form-control bg-light border-0 ml-2" required>
                <div class="input-group-append border-0">
                    <button id="button-addon3" type="submit" class="btn btn-link text-danger"><i
                            class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>