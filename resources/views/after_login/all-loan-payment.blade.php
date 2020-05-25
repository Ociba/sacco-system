<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
    @include('layouts.stylecss')
  <title>Uganda| Sacco system</title>
</head>

<body onload="window.print();" class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  
  @include('layouts.topnavbar')
 
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    @include('layouts.sidebartoptext')

    <!-- Sidebar -->
    @include('layouts.sidebar')
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Breadcrumbs -->
    @include('layouts.breadcrumb')
    <section class="content">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
    <div class="card">
            <div class="card-header">
            <div class="row">
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
           <b>Printed by {{auth()->user()->name}}</b>
            </div>
                <div class="col-lg-5 col-md-5 col-xs-5 col-sm-5">
                <b><p id="demo"></p></b>

              <script>
              document.getElementById("demo").innerHTML = Date();
              </script>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                @if(in_array('Can search all payments', auth()->user()->getUserPermisions()))
                <form action="/search-payments" method="get">
                        <div class="input-group ">
                          <input class="form-control" selected="selected" placeholder="Search by name" name="name" id="srch-term" aria-label="Search" required>
                          <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                        </div>
                </form>
                @endif
                </div>
                </div>
               
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive no-padding">
              <table class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Amount</th>
                  <th>Date</th>
                </tr>
                </thead>
                <tbody>
                @if ($show_all_loan_payments->currentPage() > 1)
                      @php($i =  1 + (($show_all_loan_payments->currentPage() - 1) * $show_all_loan_payments->perPage()))
                      @else
                      @php($i = 1)
                      @endif
              @foreach ($show_all_loan_payments as $index =>$payments)
                  <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $payments->name }}</td>
                      <td>{{ $payments->repayment_amount }}</td>
                      <td>{{ $payments->created_at }}</td>
                      
                  </tr>

                 @endforeach
                 </tbody>
              </table><br>
              <div class="row no-print">
              <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <a href="/print-payments" button class="btn btn-success"><i class="fa fa-print"></i> Print</button></a>
                <div class="pull-right">
                <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                  <i class="fa fa-download"></i> Generate PDF
                </button>
                </div>
              </div>
            </div>
              <div class="row ml-3">
              @if(isset($search_query))
              {{ $show_all_loan_payments->appends(['name' => $search_query])->links() }}
              @else
              {{ $show_all_loan_payments->links() }}
              @endif
            </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          </div>
          </div>
          </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('layouts.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@include('layouts.javascript')
</body>
</html>
