                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 text-center"><?= $title; ?></h1>

                    <h6 class="text-dark mb-4 font-weight-bold"><?= date('l, d F Y') ?></h6>
                    <!-- Statictic Today -->
                    <div class="row mb-4">
                        <!-- Pendapatan Online -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Pendapatan Online</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                Rp <?= number_format($today['on_income'],0,"","."); ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments-dollar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pendapatan Offline -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-secondary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                Pendapatan Offline</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                Rp <?= number_format($today['off_income'],0,"","."); ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-hand-holding-usd fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Pendapatan -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Pendapatan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                Rp <?= number_format($today['income'],0,"","."); ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Pengeluaran -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Total Pengeluaran</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                Rp <?= number_format($today['spending'],0,"","."); ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-credit-card fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product Favorite -->
                        <div class="col-md-6 col-xl-5 mb-4 mx-auto">
                            <div class="card border-bottom-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Makanan Favorit</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?= $today['food']; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-utensils fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Baverage Favorite -->
                        <div class="col-md-6 col-xl-5 mb-4 mx-auto">
                            <div class="card border-bottom-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Minuman Favorit</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?= $today['baverg']; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-mug-hot fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h6 class="text-dark mb-4 font-weight-bold">Statistik pendapatan dan pengeluaran harian</h6>
                    <!-- Content Row -->
                    <div class="row">

                        <!-- PROFIT CHART -->
                        <div class="col-sm-12 col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-italic text-dark text-center">Pendapatan bersih</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="profitChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- INCOME & SPENDING CHART -->
                        <div class="col-sm-12 col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-italic text-dark text-center">Pendapatan & Pengeluaran</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="incSpenChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Donut Chart -->
                        <!-- <div class="col-lg-5 mx-auto">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown 
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-italic text-dark text-center">Produk Favorit</h6>
                                </div>
                                <!-- Card Body 
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="favProduct"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->