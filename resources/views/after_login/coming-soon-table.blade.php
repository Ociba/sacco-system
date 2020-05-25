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
    <!-- /.Breadcrumbs -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        
        <!-- /.row -->

        

        <!-- Main row -->
        
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <section class="content">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
    <div class="card">
            <div class="card-header">
            <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
           
            </div>
                <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                @if(in_array('Can search soon message', auth()->user()->getUserPermisions()))
                <form action="/search-member" method="get">
                        <div class="input-group ">
                          <input class="form-control" selected="selected" placeholder="Search using contact" name="contact" id="srch-term" aria-label="Search" required>
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
                @if(in_array('Can add soon message', auth()->user()->getUserPermisions()))
                <a href="/display-coming-soon-form" button type="button" class="btn btn-primary">Add Message</button></a>
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
                  <th>Message</th>
                  <th>Expected Date</th>
                  <th>Created By</th>
                  @if(in_array('Can view soon action', auth()->user()->getUserPermisions()))
                  <th>Action</th>
                  @endif
                </tr>
                </thead>
                <tbody>
                @if ($display_coming_soon_message->currentPage() > 1)
                      @php($i =  1 + (($display_coming_soon_message->currentPage() - 1) * $display_coming_soon_message->perPage()))
                      @else
                      @php($i = 1)
                      @endif
              @foreach ($display_coming_soon_message as $index =>$message)
                  <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $message->message }}</td>
                      <td>{{ $message->expected_date }}</td>
                      <td>{{ $message->name }}</td>
                      @if(in_array('Can edit soon message', auth()->user()->getUserPermisions()))
                      <td>
                        <a href="/display-coming-soon-edit-form/{{$message->id}}" class="mr-2"><span style="color:green;"><i class="fa fa-edit" title="edit"></span></i></a>
                        @endif
                        @if(in_array('Can delete soon message', auth()->user()->getUserPermisions()))
                        <a href="/delete-coming-soon/{{$message->id}}" class="mr-2"><span style="color:red;"><i class="fa fa-trash" title="delete"></i></span></a>
                        @endif
                      </td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
              <div class="row ml-3">
              @if(isset($search_query))
              {{ $display_coming_soon_message->appends(['name' => $search_query])->links() }}
              @else
              {{ $display_coming_soon_message->links() }}
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
