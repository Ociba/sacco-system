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
    <section class="content col-lg-12 col-md-12 col-xs-12 col-sm-12">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
    <div class="card col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <div class="card-header">
            <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
            </div>
            <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
            </div>
                <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                @if(in_array('Can search all users', auth()->user()->getUserPermisions()))
                <form action="/search-user" method="get">
                        <div class="input-group ">
                          <input class="form-control"  selected="selected" placeholder="Search By Contact" name="contact" id="srch-term" aria-label="Search" required>
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
                  @if(in_array('Can view Users action', auth()->user()->getUserPermisions()))
                  <th>Action</th>
                  @endif
                </tr>
                </thead>
                <tbody>
                @if ($display_all_users->currentPage() > 1)
                      @php($i =  1 + (($display_all_users->currentPage() - 1) * $display_all_users->perPage()))
                      @else
                      @php($i = 1)
                      @endif
              @foreach ($display_all_users as $index =>$users)
                  <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $users->name }}</td>
                      <td>{{ $users->role }}</td>
                      <td>{{ $users->contact }}</td>
                      <td>{{ $users->email }}</td>
                      @if(in_array('Can edit all user', auth()->user()->getUserPermisions()))
                      <td>
                      <a href="/edit-user/{{ $users->id }}" data-widget="edit" data-toggle="tooltip" title="edit">
                      <span style="color:blue;"><i class="fa fa-edit"></i></span></a>
                      @endif 
                      @if(in_array('Can suspend user', auth()->user()->getUserPermisions()))
                      <a href="/suspend-user/{{ $users->id }}" data-widget="deny" data-toggle="tooltip" title="suspend">
                      <span style="color:red;"><i class="fa fa-trash"></i></span></a>
                           
                      </td>
                      @endif
                  </tr>
                 @endforeach
                </tbody>
              </table>
              <div class="row ml-3">
              @if(isset($search_query))
              {{ $display_all_users->appends(['name' => $search_query])->links() }}
              @else
              {{ $display_all_users->links() }}
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
