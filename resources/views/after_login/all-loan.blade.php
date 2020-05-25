<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
    @include('layouts.stylecss')
  <title>Uganda| Sacco system</title>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
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
      @include('layouts.successfulmessage')
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
    <div class="card">
            <div class="card-header">
            <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
            @if(in_array('Can search loan using date picker', auth()->user()->getUserPermisions()))
            <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-clock"></i></span>
                    </div>
                    <input type="text" class="form-control" id="reservationtime">
                  </div>
                  <!-- /.input group -->
                </div>
            @endif
            </div>
                <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                @if(in_array('Can search loan', auth()->user()->getUserPermisions()))
                <form action="/search-loan" method="get">
                        <div class="input-group ">
                          <input class="form-control" selected="selected" placeholder="Search using account number" name="account_number" id="srch-term" aria-label="Search" required>
                          <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                        </div>
                </form>
              @endif
                </div>
                <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                @if(in_array('Can subscribe loan', auth()->user()->getUserPermisions()))
                <a href="/create-loan" button type="button" class="btn btn-primary">Subscribe loan</button></a>
                @endif
                </div>
                </div>
               
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive no-padding">
              <table  class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>loanAmount</th>
                  <th>Date Issued</th>
                  <th>amountPaid</th>
                  <th>datePaid</th>
                  <th>Balance</th>
                  @if(in_array('Can view loan Action', auth()->user()->getUserPermisions()))
                  <th>Action</th>
                  @endif
                </tr>
                </thead>
                <tbody>
                @if ($display_all_loan->currentPage() > 1)
                      @php($i =  1 + (($display_all_loan->currentPage() - 1) * $display_all_loan->perPage()))
                      @else
                      @php($i = 1)
                      @endif
              @foreach ($display_all_loan as $index =>$active_loan)
                  <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $active_loan->name }}</td>
                      <td>{{ $active_loan->amount }}</td>
                      <td>{{ $active_loan->date_of_issuing }}</td>
                      <td>{{ $active_loan->repayment_amount }}</td>
                      <td>{{ $active_loan->created_at }}</td>
                      <td>{{ $active_loan->balance }}</td>
                      @if(in_array('Can delete loan', auth()->user()->getUserPermisions()))
                      <td>
                            <a href="/update-loan/{{ $active_loan->id }}" data-widget="delete" data-toggle="tooltip" title="delete">
                            <span style="color:red;"><i class="fa fa-trash"></i></span></a>
                      </td>
                      @endif
                  </tr>
                 @endforeach
                 </tbody>
              </table>
              <div class="row ml-3">
              @if(isset($search_query))
              {{ $display_all_loan->appends(['name' => $search_query])->links() }}
              @else
              {{ $display_all_loan->links() }}
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
