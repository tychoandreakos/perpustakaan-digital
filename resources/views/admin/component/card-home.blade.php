
    <!-- Header -->
   
              <div class="row">
                <div class="col-xl-3 col-lg-6">
                  <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                      <div class="row">
                        <div class="col">
                          <h5 class="card-title text-uppercase text-muted mb-0">Total Koleksi</h5>
                          <span class="h2 font-weight-bold mb-0">{{ isset($koleksi) ? $koleksi : 0 }}</span>
                        </div>
                        <div class="col-auto">
                          <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                            <i class="fas fa-book"></i>
                          </div>
                        </div>
                      </div>
                      <p class="mt-3 mb-0 text-muted text-sm">
                        <span>Seluruh koleksi buku di perpustakaan</span>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                  <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                      <div class="row">
                        <div class="col">
                          <h5 class="card-title text-uppercase text-muted mb-0">Total Anggota</h5>
                          <span class="h2 font-weight-bold mb-0">{{ isset($anggota_count) ? $anggota_count : 0 }}</span>
                        </div>
                        <div class="col-auto">
                          <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                            <i class="fas fa-users"></i>
                          </div>
                        </div>
                      </div>
                      <p class="mt-3 mb-0 text-muted text-sm">
                        <span>Seluruh anggota perpustakaan</span>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                  <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                      <div class="row">
                        <div class="col">
                          <h5 class="card-title text-uppercase text-muted mb-0">Eksemplar Keluar</h5>
                          <span class="h2 font-weight-bold mb-0">{{ isset($eksemplar) ? $eksemplar : 0 }}</span>
                        </div>
                        <div class="col-auto">
                          <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                            <i class="fas fa-share"></i>
                          </div>
                        </div>
                      </div>
                      <p class="mt-3 mb-0 text-muted text-sm">
                        <span>Total eksemplar yang sedang dipinjam</span>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                  <div class="card card-stats mb-4 mb-xl-0">
                  <a href="{{ route('anggota.index') }}" class="card-body">
                      <div class="row">
                        <div class="col">
                          <h5 class="card-title text-uppercase text-muted mb-0">Approval Anggota</h5>
                          <span class="h2 font-weight-bold mb-0">{{ $approve }}</span>
                        </div>
                        <div class="col-auto">
                          <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                            <i class="fas fa-address-card"></i>
                          </div>
                        </div>
                      </div>
                      <p class="mt-3 mb-0 text-muted text-sm">
                        <span>Total anggota baru yang belum disetujui</span>
                      </p>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>