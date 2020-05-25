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
            <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4"></div>
            <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
            @if(in_array('Can search staff datepicker', auth()->user()->getUserPermisions()))
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
                @if(in_array('Can search staff', auth()->user()->getUserPermisions()))
                <form action="/search-staff" method="get">
                        <div class="input-group ">
                          <input class="form-control" selected="selected" placeholder="Search by email" name="email" id="srch-term" aria-label="Search" required>
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
              <table  class="table table-bordered table-hover auto">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Title</th>
                  <th>Contact</th>
                  <th>Email</th>
                </tr>
                </thead>
                <tbody>
                @if ($show_staff->currentPage() > 1)
                      @php($i =  1 + (($show_staff->currentPage() - 1) * $show_staff->perPage()))
                      @else
                      @php($i = 1)
                      @endif
              @foreach ($show_staff as $index =>$sacco_staff)
                  <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $sacco_staff->name }}</td>
                      <td>{{ $sacco_staff->role }}</td>
                      <td>{{ $sacco_staff->contact }}</td>
                      <td>{{ $sacco_staff->email }}</td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
              <div class="row ml-3">
              @if(isset($search_query))
              {{ $show_staff->appends(['name' => $search_query])->links() }}
              @else
              {{ $show_staff->links() }}
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
