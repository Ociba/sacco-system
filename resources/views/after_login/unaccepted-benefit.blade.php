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
            {{--
            <div class="col-4">
            <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-clock"></i></span>
                    </div>
                    <input type="text" class="form-control" id="reservationtime">
                  </div>
                  <!-- /.input group -->
                </div>
            </div>
                <div class="col-4">
                <form class="">
                        <div class="input-group ">
                          <input class="form-control"  placeholder="Search" name="search" id="srch-term" aria-label="Search" required>
                          <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                        </div>
                </form>
                </div>
                <div class="col-4">
                <a href="/addusers" button type="button" class="btn btn-primary">Add User</button></a>
                </div>
                </div>
                --}}
               
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive no-padding">
              <table class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Members Name</th>
                  <th>Benefit</th>
                </tr>
                </thead>
                <tbody>
                @if ($shows_unaccepted_benefit->currentPage() > 1)
                      @php($i =  1 + (($shows_unaccepted_benefit->currentPage() - 1) * $shows_unaccepted_benefit->perPage()))
                      @else
                      @php($i = 1)
                      @endif
              @foreach ($shows_unaccepted_benefit as $index =>$un_accepted_benefit)
                  <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $un_accepted_benefit->name }}</td>
                      <td>{{ $un_accepted_benefit->benefit }}</td>
                  </tr>
                 @endforeach
                 </tbody>
              </table>
              <div class="row ml-3">
              @if(isset($search_query))
              {{ $shows_unaccepted_benefit->appends(['name' => $search_query])->links() }}
              @else
              {{ $shows_unaccepted_benefit->links() }}
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
