
    <!-- Header -->
   
              <div class="row">
                <div class="col-xl-3 col-lg-6">
                  <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                      <div class="row">
                        <div class="col">
                          <h5 class="card-title text-uppercase text-muted mb-0">Total Dipinjam</h5>
                          <span class="h2 font-weight-bold mb-0">{{ isset($dipinjam) ? $dipinjam : 0 }}</span>
                        </div>
                        <div class="col-auto">
                          <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                            <i class="fas fa-chart-bar"></i>
                          </div>
                        </div>
                      </div>
                      <p class="mt-3 mb-0 text-muted text-sm">
                        <span>Total dari eksemplar yang sedang dipinjam</span>
                      </p>
                    </div>
                    <div class="col-auto"></div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                  <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                      <div class="row">
                        <div class="col">
                          <h5 class="card-title text-uppercase text-muted mb-0">Transaksi Per Hari</h5>
                          <span class="h2 font-weight-bold mb-0">{{ isset($eksemplar) ? $eksemplar : 0 }}</span>
                        </div>
                        <div class="col-auto">
                          <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                            <i class="fas fa-chart-pie"></i>
                          </div>
                        </div>
                      </div>
                      <p class="mt-3 mb-0 text-muted text-sm">
                        <span>Total Judul Dengan Eksemplar</span>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                  <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                      <div class="row">
                        <div class="col">
                          <h5 class="card-title text-uppercase text-muted mb-0">Total Eksemplar Terlambat</h5>
                          <span class="h2 font-weight-bold mb-0">{{ isset($terlambat) ? $terlambat: 0 }}</span>
                        </div>
                        {{-- <div class="col-auto">
                          <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                            <i class="fas fa-users"></i>
                          </div>
                        </div> --}}
                      </div>
                      <p class="mt-3 mb-0 text-muted text-sm">
                        <span>Total Semua Koleksi Kopian Eksemplar</span>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                      <div class="card-body">
                        <div class="row">
                          <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Belum Diverifikasi</h5>
                            <span class="h2 font-weight-bold mb-0">{{ isset($pinjaman) ? $pinjaman : 0 }}</span>
                          </div>
                          <div class="col-auto">
                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                              <i class="fas fa-chart-bar"></i>
                            </div>
                          </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted text-sm">
                          <span>Total pinjaman yang belum diverifikasi atau diproses</span>
                        </p>
                      </div>
                      <div class="col-auto"></div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>