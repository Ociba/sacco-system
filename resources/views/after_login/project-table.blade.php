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
            
            </div>
                <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                @if(in_array('Can search project', auth()->user()->getUserPermisions()))
                <form class="" role="search" action="/search-my-saving" method="get" >
                        <div class="input-group ">
                          <input class="form-control" selected="selected" placeholder="Search" name="date_of_saving" id="srch-term" aria-label="Search" required>
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
                @if(in_array('Can add project', auth()->user()->getUserPermisions()))
                <a href="/add-project" button type="button" class="btn btn-primary">Add Project</button></a>
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
                  <th>Project Title</th>
                  <th>Image</th>
                  <th>Craeted By</th>
                </tr>
                </thead>
                <tbody>
                @if ($display_all_projects->currentPage() > 1)
                      @php($i =  1 + (($display_all_projects->currentPage() - 1) * $display_all_projects->perPage()))
                      @else
                      @php($i = 1)
                      @endif
              @foreach ($display_all_projects as $index =>$project)
                  <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $project->project_title }}</td>
                      <td><img src="{{asset('images/profile_pictures/'.$project->image)}}" style="width:60px" height="30px" alt=""></td>
                      <td>{{ $project->name }}</td>
                  </tr>
                 @endforeach
                
                </tbody>
              </table>
              
            </div>
            <div class="row ml-3">
              @if(isset($search_query))
              {{ $display_all_projects->appends(['name' => $search_query])->links() }}
              @else
              {{ $display_all_projects->links() }}
              @endif
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
