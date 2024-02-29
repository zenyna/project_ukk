
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Eat'n</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?= base_url('elaadmin-master') ?>/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?= base_url('elaadmin-master') ?>/css/style.css">
    <link rel="stylesheet" href="<?= base_url('elaadmin-master') ?>/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/datatables/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url ('bootstrap') ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('autoNumeric') ?>/scr/AutoNumeric.js">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
</head>

<body>
    <div class="content">
        <div class="animated fadeIn">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Penjualan</strong>
                </div>
            </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="row">

                        <div class="col-4">
                                <div class="form-group">
                                    <label>No Faktur</label>
                                    <label class="form-control" id="no_faktur"><?= $no_faktur ?></label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <label class="form-control" id="tanggal"><?= date('d M Y') ?></label>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label>Jam</label>
                                        <label class="form-control" id="jam"></label>
                                </div>
                            </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card card-primary card-outline">
                            <div class="card-body color-pallete text-right">
                                <label class="display-4 text-green">Rp. <?=number_format ($grand_total,0)?></label>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                    <?php 
                                    echo form_open('add');
                                    ?>
                                        <div class="row">
                                            <div class="col-3 input-group">
                                                <input name="nama_menu" id="nama_menu" class="form-control" placeholder="Menu" autocomplete="off">
                                                <span class="input-group-append">
                                                    <a class="btn btn-info btn-sm mr-1" data-toggle="modal" data-target="#cari-menu">
                                                        <i class="fa fa-search"></i>
                                                    </a>
                                                    <button type="reset" class="btn btn-danger btn-sm mr-1">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </span>
                                            </div>

                                            <div class="col-2">
                                            <input type="hidden" name="id_menu" id="id_menu"class="form-control">
                                                <input name="nama_menu" id="nama_menu" class="form-control" placeholder="nama menu" readonly>
                                            </div>
                                            <div class="col-2">
                                                <input name="nama_kategori" class="form-control" placeholder="kategori" readonly>
                                            </div>
                                            <div class="col-2">
                                                <input name="harga" class="form-control" placeholder="harga" readonly>
                                            </div>
                                            <div class="col-1">
                                                <input id="qty" type="number" min="1" value="1" name="qty" class="form-control text-center" placeholder="qty">
                                            </div>
                                            <div class="col-2">
                                                <button type="submit" class="btn btn-info btn-sm mr-1"><i class="fa fa-shopping-basket"></i></button>
                                                <button type="reset" class="btn btn-info btn-sm mr-1"><i class="fa fa-refresh"></i></button>
                                                <a class="btn btn-info btn-sm mr-1" data-toggle="modal" data-target="#pembayaran" ><i class="fa fa-shopping-cart"></i></a>
                                            </div>
                                        </div>
                                        <?php echo form_close() ?>
                                    </div>
                                            </div>

                                            <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>ID Menu</th>
                                                    <th>Nama Menu</th>
                                                    <th>Kategori</th>
                                                    <th>Harga</th>
                                                    <th width="100px">Qty</th>
                                                    <th>Total</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($cart as $key => $value) { ?>
                                                    <tr>
                                                        <td><?= $value['id'] ?></td>
                                                        <td><?= $value['name'] ?></td>
                                                        <td><?= $value['options']['nama_kategori'] ?></td>
                                                        <td class="text-right">Rp. <?= number_format($value['price'], 0) ?></td>
                                                        <td class="text-center"><?= $value['qty'] ?> </td>
                                                        <td class="text-right">Rp. <?= number_format($value['subtotal'], 0) ?> </td>
                                                        <td class="text-center">
                                                            <a href="" class="text-danger"><i class="fa fa-times"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                                        </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                
<!-- cari menu -->
<div class="modal fade" id="cari-menu">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pencarian Data menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <table id="tables" class="table table-bordered table-striped text-sm">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>ID Menu</th>
                            <th>Nama Menu</th>
                            <th>Harga </th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($menu as $key => $value) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['id_menu'] ?></td>
                                <td><?= $value['nama_menu'] ?></td>
                                <td class="text-right">Rp. <?= number_format($value['harga'], 0)  ?></td>
                                <td class="text-center">
                                <button onclick="PilihMenu('<?=$value['nama_menu']?>')" class="btn btn-success">Pilih</button>


                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Modal Payment -->
<div class="modal fade" id="pembayaran">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pembayaran</h4>
              <a class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </a>
            </div>
            <div class="modal-body">
              <?php echo form_open('pembayaran') ?>

              <div class="form-group">
                <label for="">Subtotal</label>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Rp.</span>
                  </div>
                <input name="grand_total" id="grand_total" value="<?=number_format ($grand_total,0)?>" class="form-control form-control-lg text-right text-success" readonly>
              </div>
              </div>

              <div class="form-group">
                <label for="">Bayar</label>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Rp.</span>
                  </div>
                <input name="bayar" id="bayar" class="form-control form-control-lg text-right text-warning" autocomplete="off">
              </div>
              </div>

              <div class="form-group">
                <label for="">Kembali</label>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Rp.</span>
                  </div>
                <input name="kembali" id="kembali" class="form-control form-control-lg text-right text-danger" readonly>
              </div>
              </div>

              
            </div>
            <div class="modal-footer justify-content-between">
              <button class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <button class="btn btn-primary btn-flat"><i class="fas fa-save"></i>Bayar</button>
            </div>
            <?php echo form_close() ?>
          </div>
  <!-- Modal-content  -->
  </div>
  <!-- Modal-dialog  -->
  </div>


    

     <!-- Footer -->
     <?=$this->include('layout/footer');?>
     <!-- /Footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="<?= base_url('elaadmin-master') ?>/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="<?= base_url('elaadmin-master') ?>/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="<?= base_url('elaadmin-master') ?>/js/init/fullcalendar-init.js"></script>

    <script src="<?= base_url() ?>/Datatables/js/datatables.min.js"></script>
    <script src="<?= base_url() ?>/Datatables/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/Datatables/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>/Datatables/js/buttons.bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/Datatables/js/jszip.min.js"></script>
    <script src="<?= base_url() ?>/Datatables/js/vfs_fonts.js"></script>
    <script src="<?= base_url() ?>/Datatables/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>/Datatables/js/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>/Datatables/js/buttons.colVis.min.js"></script>
    <script src="<?= base_url() ?>/Datatables/init/datatables-init.js"></script>
    <script src="<?= base_url('autoNumeric') ?>/src/AutoNumeric.js"></script>
    <script src="<?= base_url() ?>/js/sweetalert2.all.min.js"></script>

    <!-- Data Tables -->
    <script type="text/javascript">
        $(document).ready(function() {
          $('#tables').DataTable();
      } );
  </script>
    <!-- /Data Tables -->

    <!-- Auto Numeric -->
<script>
    new AutoNumeric('#harga',{
    digitGroupSeparator:',',
decimalplaces: 0
  });
</script>
  <!-- /Auto Numeric -->

  <!-- js -->
  <script>
$(document).ready(function () {
    $('#nama_menu').focus();
    $('#nama_menu').keydown(function (e) {  
    let nama_menu = $ ('#nama_menu').val();
        if (e.keyCode == 13) {
            e.preventDefault();
            if (nama_menu.length == 0){
                Swal.fire("Nama Menu Tidak Ada!");
            } else {
                CekMenu();
            }
        }
    });
     //hitung kembalian
     $('#bayar').keyup(function(e) {
        HitungKembalian();
      });
});


function CekMenu(){
        $.ajax({
            type: "POST",
            url: "<?= base_url('ceko') ?>",
            data: {
                nama_menu: $('#nama_menu').val(),
            },
            dataType: "JSON",
            success: function (response) {
                if (response.nama_menu == '') {
                    Swal.fire("Nama Menu Tidak Ada!");
                } else {
                    $('[name="id_menu"]').val(response.id_menu);
                    $('[name="nama_menu"]').val(response.nama_menu);
                    $('[name="nama_kategori"]').val(response.nama_kategori);
                    $('[name="harga"]').val(response.harga);
                    $('#qty').focus();
                } 
            }
        });
    }

    function PilihMenu(nama_menu) {
    $('#nama_menu').val(nama_menu);
    $('#cari-menu').modal('hide');
    $('#nama_menu').focus();
  }

  function Pembayaran() {
  $('#pembayaran').modal('show');
}
  
new AutoNumeric('bayar', {
      digitGroupSeparator:',',
      decimalPlaces:0
    });

    function HitungKembalian() {
      let grand_total = $('#grand_total').val().replace(/[^.\d]/g, '').toString();
      let bayar = $('#bayar').val().replace(/[^.\d]/g, '').toString();

      let kembali =parseFloat(bayar) - parseFloat(grand_total);
      $('#kembali').val(kembali);
    
    new AutoNumeric('#kembali', {
      digitGroupSeparator:',',
      decimalPlaces:0
    });
  }
</script>

<script>
  window.onload = function() {
    startTime();
  }

  function startTime() {
    var today = new Date(), h,m,s;
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('jam').innerHTML = h + ":" + m + ":" + s;
    var t = setTimeout(function() {
      startTime();
    }, 1000);
  }

    function checkTime(i){
      if (i < 10) {
        i = "0" + i
      }
      return i;
    }
</script>


    <!--Local Stuff-->
    <script>
        jQuery(document).ready(function($) {
            "use strict";

            // Pie chart flotPie1
            var piedata = [
                { label: "Desktop visits", data: [[1,32]], color: '#5c6bc0'},
                { label: "Tab visits", data: [[1,33]], color: '#ef5350'},
                { label: "Mobile visits", data: [[1,35]], color: '#66bb6a'}
            ];

            $.plot('#flotPie1', piedata, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        innerRadius: 0.65,
                        label: {
                            show: true,
                            radius: 2/3,
                            threshold: 1
                        },
                        stroke: {
                            width: 0
                        }
                    }
                },
                grid: {
                    hoverable: true,
                    clickable: true
                }
            });
            // Pie chart flotPie1  End
            // cellPaiChart
            var cellPaiChart = [
                { label: "Direct Sell", data: [[1,65]], color: '#5b83de'},
                { label: "Channel Sell", data: [[1,35]], color: '#00bfa5'}
            ];
            $.plot('#cellPaiChart', cellPaiChart, {
                series: {
                    pie: {
                        show: true,
                        stroke: {
                            width: 0
                        }
                    }
                },
                legend: {
                    show: false
                },grid: {
                    hoverable: true,
                    clickable: true
                }

            });
            // cellPaiChart End
            // Line Chart  #flotLine5
            var newCust = [[0, 3], [1, 5], [2,4], [3, 7], [4, 9], [5, 3], [6, 6], [7, 4], [8, 10]];

            var plot = $.plot($('#flotLine5'),[{
                data: newCust,
                label: 'New Data Flow',
                color: '#fff'
            }],
            {
                series: {
                    lines: {
                        show: true,
                        lineColor: '#fff',
                        lineWidth: 2
                    },
                    points: {
                        show: true,
                        fill: true,
                        fillColor: "#ffffff",
                        symbol: "circle",
                        radius: 3
                    },
                    shadowSize: 0
                },
                points: {
                    show: true,
                },
                legend: {
                    show: false
                },
                grid: {
                    show: false
                }
            });
            // Line Chart  #flotLine5 End
            // Traffic Chart using chartist
            if ($('#traffic-chart').length) {
                var chart = new Chartist.Line('#traffic-chart', {
                  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                  series: [
                  [0, 18000, 35000,  25000,  22000,  0],
                  [0, 33000, 15000,  20000,  15000,  300],
                  [0, 15000, 28000,  15000,  30000,  5000]
                  ]
              }, {
                  low: 0,
                  showArea: true,
                  showLine: false,
                  showPoint: false,
                  fullWidth: true,
                  axisX: {
                    showGrid: true
                }
            });

                chart.on('draw', function(data) {
                    if(data.type === 'line' || data.type === 'area') {
                        data.element.animate({
                            d: {
                                begin: 2000 * data.index,
                                dur: 2000,
                                from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                to: data.path.clone().stringify(),
                                easing: Chartist.Svg.Easing.easeOutQuint
                            }
                        });
                    }
                });
            }
            // Traffic Chart using chartist End
            //Traffic chart chart-js
            if ($('#TrafficChart').length) {
                var ctx = document.getElementById( "TrafficChart" );
                ctx.height = 150;
                var myChart = new Chart( ctx, {
                    type: 'line',
                    data: {
                        labels: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul" ],
                        datasets: [
                        {
                            label: "Visit",
                            borderColor: "rgba(4, 73, 203,.09)",
                            borderWidth: "1",
                            backgroundColor: "rgba(4, 73, 203,.5)",
                            data: [ 0, 2900, 5000, 3300, 6000, 3250, 0 ]
                        },
                        {
                            label: "Bounce",
                            borderColor: "rgba(245, 23, 66, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(245, 23, 66,.5)",
                            pointHighlightStroke: "rgba(245, 23, 66,.5)",
                            data: [ 0, 4200, 4500, 1600, 4200, 1500, 4000 ]
                        },
                        {
                            label: "Targeted",
                            borderColor: "rgba(40, 169, 46, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(40, 169, 46, .5)",
                            pointHighlightStroke: "rgba(40, 169, 46,.5)",
                            data: [1000, 5200, 3600, 2600, 4200, 5300, 0 ]
                        }
                        ]
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        }

                    }
                } );
            }
            //Traffic chart chart-js  End
            // Bar Chart #flotBarChart
            $.plot("#flotBarChart", [{
                data: [[0, 18], [2, 8], [4, 5], [6, 13],[8,5], [10,7],[12,4], [14,6],[16,15], [18, 9],[20,17], [22,7],[24,4], [26,9],[28,11]],
                bars: {
                    show: true,
                    lineWidth: 0,
                    fillColor: '#ffffff8a'
                }
            }], {
                grid: {
                    show: false
                }
            });
            // Bar Chart #flotBarChart End
        });
    </script>
</body>
</html>
