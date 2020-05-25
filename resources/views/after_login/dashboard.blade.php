<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
    @include('layouts.stylecss')
  <title>Uganda | Sacco system</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  @include('layouts.topnavbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <li class="fas fa-lightbulb-o"></li>
      <span class="brand-text font-weight-light">SACCO</span>
    </a>

    <!-- Sidebar -->
    @include('layouts.sidebar')
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('layouts.breadcrumb')
    <section class="content">
      <div class="container-fluid">
        @include('layouts.cards')
      </div>
      <div class="row mr-3">
                        <div class="col-md-6" style="background-color:white;">
                            <!-- AREA CHART -->
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                <h3 class="box-title">Graph Showing Loans borrowed Per Month</h3> 
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body chart-responsive">
                                    <canvas id="lineChart"></canvas>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                            <!-- DONUT CHART -->
                            <div class="box box-danger">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Savings, Expenses, Accounts Amount, Benefits</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body chart-responsive">
                                <canvas id="labelChart" style="height: 300px;"></canvas>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col (LEFT) -->
                        <div class="col-md-6" style="background-color:white;">
                            <!-- LINE CHART -->
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Number Of Benefit Per Month</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body chart-responsive">
                                    <canvas id="barChart"></canvas>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                            <!-- BAR CHART -->
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Staff And Registered Sacco Members</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body chart-responsive">
                                    <canvas id="users"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
    </section>
    <!-- /.content -->
  </div>
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  @include('layouts.footer')
</div>
<!-- ./wrapper -->
@include('layouts.javascript')
<script>
            //line
            var ctxL = document.getElementById("lineChart").getContext('2d');
            var myLineChart = new Chart(ctxL, {
            type: 'line',
            data: {
            labels: {!! json_encode(auth()->user()->getLoansBorrowedMonths()) !!},
            datasets: [{
            label: "Number Of Loans per month",
            data: [{!! auth()->user()->getJanuaryLoans() !!},{!! auth()->user()->getFebrauryLoans() !!},{!! auth()->user()->getMarchLoans() !!},
            {!! auth()->user()->getAprilLoans() !!},{!! auth()->user()->getMayLoans() !!},{!! auth()->user()->getJuneLoans() !!},
            {!! auth()->user()->getJulyLoans() !!},{!! auth()->user()->getAugustLoans() !!}
        ,{!! auth()->user()->getSeptemberLoans() !!},{!! auth()->user()->getOctoberLoans() !!},{!! auth()->user()->getNovemberLoans() !!},{!! auth()->user()->getDecemberLoans() !!}],
            backgroundColor: [
            'rgba(105, 0, 132, .2)',
            ],
            borderColor: [
            'rgba(200, 99, 132, .7)',
            ],
            borderWidth: 2
            },
            ]
            },
            options: {
            responsive: true
            }
            });
            
            
            //bar
            var ctxB = document.getElementById("barChart").getContext('2d');
            var myBarChart = new Chart(ctxB, {
            type: 'bar',
            data: {
            labels: {!! json_encode(auth()->user()->getTotalBenefitPerMonth()) !!},
            datasets: [{
            label: 'Benefit per month',
            data: [{!! auth()->user()->getBenefitInJanuary() !!},{!! auth()->user()->getBenefitInFebruary() !!},{!! auth()->user()->getBenefitInMarch() !!},
            {!! auth()->user()->getBenefitInApril() !!},{!! auth()->user()->getBenefitInMay() !!},{!! auth()->user()->getBenefitInJune() !!},{!! auth()->user()->getBenefitInjuly() !!},{!! auth()->user()->getBenefitInAugust() !!}
             ,{!! auth()->user()->getBenefitInSeptember() !!},{!! auth()->user()->getBenefitInOctober() !!},{!! auth()->user()->getBenefitInNovember() !!},{!! auth()->user()->getBenefitInDecember() !!}],
            backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
            }]
            },
            options: {
            scales: {
            yAxes: [{
            ticks: {
            beginAtZero: true
            }
            }]
            }
            }
            });
           
            var ctxP = document.getElementById("users").getContext('2d');
            var myPieChart = new Chart(ctxP, {
            plugins: [ChartDataLabels],
            type: 'pie',
            data: {
            labels: ["Staff", "Members"],
            datasets: [{
                data: [{{ auth()->user()->getStaffInSacco()}},{{ auth()->user()->getRegisteredSaccoMembers()}}],
                backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
            }]
            },
            options: {
            responsive: true,
            legend: {
                position: 'right',
                labels: {
                padding: 20,
                boxWidth: 10
                }
            },
            plugins: {
                datalabels: {
                formatter: (value, ctx) => {
                    let sum = 0;
                    let dataArr = ctx.chart.data.datasets[0].data;
                    dataArr.map(data => {
                    sum += data;
                    });
                  let percentage = (value * 100 / sum).toFixed(2) + "%";
                    return percentage;
                },
                color: 'white',
                labels: {
                title: {
                font: {
                    size: '16'
                }
                }
            }
            }
            }
            }
            });
        

      
        //pie chart 
        $(function () {
        var ctxP = document.getElementById("labelChart").getContext('2d');
            var myPieChart = new Chart(ctxP, {
            plugins: [ChartDataLabels],
            type: 'pie',
            data: {
            labels: ["Saving", "Expenses","Loan Amount Borrowed","Benefit"],
            datasets: [{
                data: [{!! auth()->user()->getTotalAmountInSavingss()!!},{!! auth()->user()->getTotalExpenses()!!},
                {!! auth()->user()->getTotalLoanAmountBorrowed()!!},{!! auth()->user()->getTotalBenefits()!!}],
                backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#00A65A", "#4D5360"],
                hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
            }]
            },
            options: {
            responsive: true,
            legend: {
                position: 'right',
                labels: {
                padding: 20,
                boxWidth: 10
                }
            },
            plugins: {
                datalabels: {
                    formatter: (value, ctx) => {
                    let sum = 0;
                    let dataArr = ctx.chart.data.datasets[0].data;
                    dataArr.map(data => {
                        sum += data;
                    });
                    let percentage = (value * 100 / sum).toFixed(1) + "%";
                    return percentage;
                },
                color: 'white',
                labels: {
                    title: {
                        font: {
                        size: '16'
                        }
                    }
                    }
                }
            }
            }
            })
          })
            </script>
        
</body>
</html>
