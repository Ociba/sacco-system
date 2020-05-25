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
                @if(in_array('Can search call', auth()->user()->getUserPermisions()))
                <form action="/search-call" method="get">
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
                </div>
               
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive no-padding">
              <table  class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Question</th>
                  <th>Email</th>
                  <th>Contact</th>
                  @if(in_array('Can view call Action', auth()->user()->getUserPermisions()))
                  <th>Action</th>
                  @endif
                </tr>
                </thead>
                <tbody>
                @if ($display_call_backs_requests->currentPage() > 1)
                      @php($i =  1 + (($display_call_backs_requests->currentPage() - 1) * $display_call_backs_requests->perPage()))
                      @else
                      @php($i = 1)
                      @endif
              @foreach ($display_call_backs_requests as $index =>$calls)
                  <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $calls->name }}</td>
                      <td>{{ $calls->question }}</td>
                      <td>{{ $calls->email }}</td>
                      <td>{{ $calls->contact }}</td>
                      @if(in_array('Can delete call', auth()->user()->getUserPermisions()))
                      <td>
                            <a href="/approve-calback/{{ $calls->id }}" data-widget="delete" data-toggle="tooltip" title="delete">
                            <span style="color:red;"><i class="fa fa-trash"></i></span></a>
                      </td>
                      @endif
                  </tr>
                 @endforeach
                 </tbody>
              </table>
              <div class="row ml-3">
              @if(isset($search_query))
              {{ $display_call_backs_requests->appends(['name' => $search_query])->links() }}
              @else
              {{ $display_call_backs_requests->links() }}
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
