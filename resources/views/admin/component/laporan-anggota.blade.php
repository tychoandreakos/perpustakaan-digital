
    <!-- Header -->
   
    <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Anggota</h5>
                      <span class="h2 font-weight-bold mb-0">{{ isset($buku) ? $buku : 0 }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                        <i class="fas fa-check"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span>Total dari judul buku yang tersedia di koleksi</span>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Anggota Bulan Ini</h5>
                      <span class="h2 font-weight-bold mb-0">{{ isset($bulan) ? $bulan : 0 }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-book"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                  <span>Total Anggota Yang Terdaftar Pada Bulan {{ ucwords($month) }}</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Belum verifikasi</h5>
                      <span class="h2 font-weight-bold mb-0">{{ isset($eksemplar) ? $eksemplar : 0 }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-copy"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span>Total Anggota Yang Belum Terverifikasi</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                      <div class="card-body">
                        <div class="row">
                          <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Total Expired</h5>
                            <span class="h2 font-weight-bold mb-0">{{ isset($eksemplar) ? $eksemplar : 0 }}</span>
                          </div>
                          <div class="col-auto">
                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                              <i class="fas fa-book"></i>
                            </div>
                          </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted text-sm">
                          <span>Total Anggota Yang Sudah Kadaluwarsa</span>
                        </p>
                      </div>
                    </div>
                  </div>
          </div>
        </div>
      </div>
    </div>