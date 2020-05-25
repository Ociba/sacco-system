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
            @if(in_array('Can search using kin datepicker', auth()->user()->getUserPermisions()))
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
                @if(in_array('Can search next of kin', auth()->user()->getUserPermisions()))
                <form action="/search-kin" method="get">
                        <div class="input-group">
                          <input class="form-control" selected="selected" placeholder="Search by next of kin names" name="names" id="srch-term" aria-label="Search" required>
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
                @if(in_array('Can add next of kin', auth()->user()->getUserPermisions()))
                <a href="/add_next_of_kin" button type="button" class="btn btn-primary">Add Next of Kin</button></a>
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
                  <th>Members Name</th>
                  <th>Next Of Kin</th>
                  <th>Relationship</th>
                  @if(in_array('Can view next of kin Action', auth()->user()->getUserPermisions()))
                  <th>Action</th>
                  @endif
                </tr>
                </thead>
                <tbody>
                @if ($display_nextofkin_details->currentPage() > 1)
                      @php($i =  1 + (($display_nextofkin_details->currentPage() - 1) * $display_nextofkin_details->perPage()))
                      @else
                      @php($i = 1)
                      @endif
              @foreach ($display_nextofkin_details as $index =>$next_of_kin)
                  <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $next_of_kin->name }}</td>
                      <td>{{ $next_of_kin->names }}</td>
                      <td>{{ $next_of_kin->relationship }}</td>
                      @if(in_array('Can edit next of kin', auth()->user()->getUserPermisions()))
                      <td>
                      <a href="/edit-next-of-kin/{{$next_of_kin->id}}" data-widget="edit" data-toggle="tooltip" title="edit">
                      <span style="color:blue;"><i class="fa fa-edit"></i></span></a>
                      </td>
                      @endif
                  </tr>
                 @endforeach
                </tbody>
              </table>
              <div class="row ml-3">
              @if(isset($search_query))
              {{ $display_nextofkin_details->appends(['name' => $search_query])->links() }}
              @else
              {{ $display_nextofkin_details->links() }}
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
