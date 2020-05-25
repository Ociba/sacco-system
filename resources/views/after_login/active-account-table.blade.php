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
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
    <div class="card">
            <div class="card-header">
            <div class="row">
                </div>
               
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive no-padding">
              <table class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Owners Name</th>
                  <th>Contact</th>
                  <th>account Name</th>
                  <th>Account Number</th>
                  <th>Total Saving</th>
                  <th>Shares</th>
                </tr>
                </thead>
                <tbody>
                @if ($display_active_account_details->currentPage() > 1)
                      @php($i =  1 + (($display_active_account_details->currentPage() - 1) * $display_active_account_details->perPage()))
                      @else
                      @php($i = 1)
                      @endif
              @foreach ($display_active_account_details as $index =>$account)
                  <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $account->owners_name }}</td>
                      <td>{{ $account->contact }}</td>
                      <td>{{ $account->account_name }}</td>
                      <td>{{ $account->account_number }}</td>
                      <td>{{ $account->total}}</td>
                      <td>{{ auth()->user()->calculateSharesForEachMember() }}</td>
                  </tr>
                 
                </tbody>
              </table>
              <div class=" row pull-right mr-1">
            <strong>Current Total Amount is Shs.{{auth()->user()->calculateSharesForEachMember() + $account->total}}</strong>
            @endforeach
            </div>
              <div class="row ml-3">
              @if(isset($search_query))
              {{ $display_active_account_details->appends(['name' => $search_query])->links() }}
              @else
              {{ $display_active_account_details->links() }}
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
