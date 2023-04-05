            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; BroMind Cafe <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
    
    <!-- Page level custom scripts -->
    <!-- <script src="<= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
    <script src="<= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script> -->

    <!-- AJAX -->
    <script>
        // Choose image profile
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });

        // Checkbox role user
        $('.form-check-input').on('click', function() {
            const menuId = $(this).data('menu');
            const roleId = $(this).data('role');

            $.ajax({
                url: "<?= base_url('leader/changeaccess'); ?>",
                type: 'post',
                data: {
                    menuId: menuId,
                    roleId: roleId
                },
                success: function() {
                    document.location.href = "<?= base_url('leader/roleaccess/'); ?>" + roleId;
                }
            });
        });
    </script>

    <!-- CHART INCOME & SPENDING -->
    <script>
    const incSpenChart = new Chart(document.getElementById('incSpenChart').getContext('2d'), {
        type: 'line',
        data: {
            // labels: ['red', 'green', 'blue'],
            labels: [
                <?php if (count($report) > 0) {
                    foreach ($report as $rpt) {
                        echo "'" . $rpt['date_created'] . "', ";
                    }
                }?>
            ],
            datasets: [{
                label: 'Pendapatan',
                data: [
                    <?php if (count($report) > 0) {
                        foreach ($report as $rpt) {
                            echo $rpt['income'] . ", ";
                        }
                    }?>
                ],
                backgroundColor: [
                    <?php for ($cl=0;$cl<count($report);$cl++){
                        echo "'#2797FF'" . ",";
                    }?>
                ],
                borderColor: [
                    '#2797FF'
                ],
                clip: {
                    left: 0,
                    top: 0,
                    right: 5,
                    bottom: 0
                },
                fill: false,
                lineTension: 0.1,
                pointRadius: 3,
                pointBackgroundColor: "#007AEA",
                pointBorderColor: "#007AEA",
                pointHoverRadius: 4.5,
                pointHoverBackgroundColor: "white",
                pointHoverBorderColor: "#007AEA",
                pointHoverBorderWidth: 3,
                pointHitRadius: 10,
                pointBorderWidth: 3
            }, {
                label: 'Pengeluaran',
                data: [
                    <?php if (count($report) > 0) {
                        foreach ($report as $rpt) {
                            echo $rpt['spending'] . ", ";
                        }
                    }?>
                ],
                backgroundColor: [
                    <?php for ($cl=0;$cl<count($report);$cl++){
                        echo "'#FF3535'" . ",";
                    }?>
                ],
                borderColor: [
                    '#FF3535'
                ],
                clip: {
                    left: 0,
                    top: 0,
                    right: 5,
                    bottom: 0
                },
                fill: false,
                lineTension: 0.2,
                pointRadius: 3,
                pointBackgroundColor: "#FF0000",
                pointBorderColor: "#FF0000",
                pointHoverRadius: 4.5,
                pointHoverBackgroundColor: "white",
                pointHoverBorderColor: "#FF0000",
                pointHoverBorderWidth: 3,
                pointHitRadius: 10,
                pointBorderWidth: 3
            }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 0,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            callback: function(value, index, values) {
                                return 'Rp ' + value;
                            },
                            beginAtZero: true
                        },
                        gridLines: {
                            color: "#9B9B9B",
                            zeroLineColor: "#9B9B9B",
                            drawBorder: true,
                            borderDash: [5],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#5C5C5C",
                    titleMarginBottom: 10,
                    titleFontColor: '#3A3A3A',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                    label: function(tooltipItem, data) {
                        var label = data.datasets[tooltipItem.datasetIndex].label || '';

                        if (label) {
                            label += ': Rp ';
                        }
                        label += Math.round(tooltipItem.yLabel * 100) / 100;
                        return label;
                    }
                }
            }
        }
    });
    </script>

    <!-- CHART PROFIT -->
    <script>
    const profitChart = new Chart(document.getElementById('profitChart').getContext('2d'), {
        type: 'line',
        data: {
            // labels: ['red', 'green', 'blue'],
            labels: [
                <?php 
                if (count($report) > 0) {
                    foreach ($report as $rpt) {
                        echo "'" . $rpt['date_created'] . "', ";
                    }
                }?>
            ],
            datasets: [{
                label: 'Profit',
                data: [
                    <?php if (count($report) > 0) {
                        foreach ($report as $rpt) {
                            echo $rpt['profit'] . ", ";
                        }
                    }?>
                ],
                backgroundColor: [
                    <?php for ($cl=0;$cl<count($report);$cl++){
                        echo "'#00E232'" . ",";
                    }?>
                ],
                borderColor: [
                    '#00E232'
                ],
                clip: {
                    left: 0,
                    top: 0,
                    right: 5,
                    bottom: 0
                },
                fill: false,
                lineTension: 0.1,
                pointRadius: 3,
                pointBackgroundColor: "#00A925",
                pointBorderColor: "#00A925",
                pointHoverRadius: 4.5,
                pointHoverBackgroundColor: "white",
                pointHoverBorderColor: "#00A925",
                pointHoverBorderWidth: 3,
                pointHitRadius: 10,
                pointBorderWidth: 3
            }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 0,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            callback: function(value, index, values) {
                                return 'Rp ' + value;
                            },
                            beginAtZero: true
                        },
                        gridLines: {
                            color: "#9B9B9B",
                            zeroLineColor: "#9B9B9B",
                            drawBorder: true,
                            borderDash: [5],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#5C5C5C",
                    titleMarginBottom: 10,
                    titleFontColor: '#3A3A3A',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                    label: function(tooltipItem, data) {
                        var label = data.datasets[tooltipItem.datasetIndex].label || '';

                        if (label) {
                            label += ': Rp ';
                        }
                        label += Math.round(tooltipItem.yLabel * 100) / 100;
                        return label;
                    }
                }
            }
        }
    });
    </script>

    <!-- CHART PIE FAVORITE PRODUCT -->
    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Pie Chart Example
        var ctx = document.getElementById("favProduct");
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [
                    <?php 
                        foreach ($food as $fd) {
                            echo "'" . $fd['product_name'] . "', ";
                        }
                    ?>
                ],
                datasets: [{
                    data: [
                        <?php 
                            foreach ($food as $fd) {
                                echo $fd['price'] . ", ";
                            }
                        ?>
                    ],
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 2,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 0,
            },
        });

    </script>

</body>

</html>