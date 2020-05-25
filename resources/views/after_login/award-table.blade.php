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
        <div class="col-12">
    <div class="card">
            <div class="card-header">
            <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
            </div>
                <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                @if(in_array('Can search award', auth()->user()->getUserPermisions()))
                <form action="/search-loan" method="get">
                        <div class="input-group ">
                          <input class="form-control" selected="selected" placeholder="Search using account number" name="award" id="srch-term" aria-label="Search" required>
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
                @if(in_array('Can add award', auth()->user()->getUserPermisions()))
                <a href="/display-award-form" button type="button" class="btn btn-primary">Add Award</button></a>
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
                  <th>Title</th>
                  <th>Year</th>
                  <th>Award</th>
                  <th>Image</th>
                  @if(in_array('Can view award Action', auth()->user()->getUserPermisions()))
                  <th>Action</th>
                  @endif
                </tr>
                </thead>
                <tbody>
                @if ($display_awards_inside->currentPage() > 1)
                      @php($i =  1 + (($display_awards_inside->currentPage() - 1) * $display_awards_inside->perPage()))
                      @else
                      @php($i = 1)
                      @endif
              @foreach ($display_awards_inside as $index =>$award)
                  <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $award->title }}</td>
                      <td>{{ $award->year }}</td>
                      <td>{{ $award->award }}</td>
                      <td><img src="{{asset('images/profile_pictures/'.$award->image)}}" style="width:60px" height="30px" alt=""></td>
                      @if(in_array('Can delete award', auth()->user()->getUserPermisions()))
                      <td>
                            <a href="/edit-award/{{ $award->id }}" data-widget="delete" data-toggle="tooltip" title="edit">
                            <span style="color:green;"><i class="fa fa-edit"></i></span></a>
                            <a href="/delete-award/{{ $award->id }}" data-widget="delete" data-toggle="tooltip" title="delete">
                            <span style="color:red;"><i class="fa fa-trash"></i></span></a>
                      </td>
                      @endif
                  </tr>
                 @endforeach
                 </tbody>
              </table>
              <div class="row ml-3">
              @if(isset($search_query))
              {{ $display_awards_inside->appends(['name' => $search_query])->links() }}
              @else
              {{ $display_awards_inside->links() }}
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
