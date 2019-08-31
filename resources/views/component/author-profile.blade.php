            <!-- Meta -->
            <div class="row align-items-center py-5 border-top border-bottom">
                <div class="col-auto">

                    <!-- Avatar -->
                    <div class="mr-2">
                        <i class="text-muted fa fa-user" aria-hidden="true"></i>
                    </div>

                </div>
                <div class="col ml-n5">

                    <!-- Name -->
                    <h6 class="text-uppercase mb-0">
                        {{ ucwords($result->admin->name) }}
                    </h6>

                    <!-- Date -->
                    <time class="font-size-sm text-muted" datetime="2019-05-20">
                        Dipublikasikan pada {{ $result->created_at }}
                    </time>

                </div>
                <div class="col-auto">

                    <!-- Share -->
                    <span class="h6 text-uppercase text-muted d-none d-md-inline mr-4">
                        Share:
                    </span>

                    <!-- Icons -->
                    <ul class="d-inline list-unstyled list-inline list-social">
                        <li class="list-inline-item list-social-item" style="font-size: 25px">
                            {!! Share::currentPage()->facebook() !!}
                        </li>
                        <li class="list-inline-item list-social-item" style="font-size: 25px">
                            {!! Share::currentPage()->twitter() !!}
                        </li>
                        </li>
                    </ul>

                </div>
            </div>

            </div>
            </div> <!-- / .row -->
            </div> <!-- / .container -->
            </section>
