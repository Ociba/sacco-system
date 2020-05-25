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
            <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
            @if(in_array('Can search domant account using date picker', auth()->user()->getUserPermisions()))
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
                @if(in_array('Can search domant account', auth()->user()->getUserPermisions()))
                <form action="/search-domant" method="get">
                        <div class="input-group ">
                          <input class="form-control"  placeholder="Search" name="account_number" id="srch-term" aria-label="Search" required>
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
                </div>
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
                  <th>Total Amount</th>
                  @if(in_array('Can view domant account Action', auth()->user()->getUserPermisions()))
                  <th>Action</th>
                  @endif
                </tr>
                </thead>
                <tbody>
                @if ($display_domant_account_details->currentPage() > 1)
                      @php($i =  1 + (($display_domant_account_details->currentPage() - 1) * $display_domant_account_details->perPage()))
                      @else
                      @php($i = 1)
                      @endif
              @foreach ($display_domant_account_details as $index =>$domant_account)
                  <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $domant_account->owners_name }}</td>
                      <td>{{ $domant_account->contact }}</td>
                      <td>{{ $domant_account->account_name }}</td>
                      <td>{{ $domant_account->account_number }}</td>
                      <td>{{ $domant_account->total }}</td>
                      @if(in_array('Can edit domant account', auth()->user()->getUserPermisions()))
                      <td>
                      <a href="/edit-domant-account/{{ $domant_account->id }}" data-widget="edit" data-toggle="tooltip" title="edit">
                      <span style="color:blue;"><i class="fa fa-edit"></i></span></a>
                      @endif
                      @if(in_array('Can delete domant account', auth()->user()->getUserPermisions()))
                      <a href="/update-account/{{$domant_account->id}}"  title="update">
                      <span style="color:green;"><i class="fa fa-check"></i></span></a>
                        
                      </td>
                      @endif
                  </tr>
                 @endforeach
                 </tbody>
              </table>
              <div class="row ml-3">
              @if(isset($search_query))
              {{ $display_domant_account_details->appends(['name' => $search_query])->links() }}
              @else
              {{ $display_domant_account_details->links() }}
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
