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
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive no-padding">
              <table  class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phonenumber</th>
                  <th>Message</th>
                  <th>Image</th>
                  @if(in_array('Can view Approve testimony action', auth()->user()->getUserPermisions()))
                  <th>Action</th>
                  @endif
                </tr>
                </thead>
                <tbody>
                @if ($not_approved_messages->currentPage() > 1)
                      @php($i =  1 + (($not_approved_messages->currentPage() - 1) * $not_approved_messages->perPage()))
                      @else
                      @php($i = 1)
                      @endif
              @foreach ($not_approved_messages as $index =>$testimony)
                  <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $testimony->name }}</td>
                      <td>{{ $testimony->email }}</td>
                      <td>{{ $testimony->phone_number }}</td>
                      <td>{{ $testimony->message }}</td>
                      <td><img src="{{asset('images/profile_pictures/'.$testimony->image)}}" style="width:60px" height="30px" alt=""></td>
                      @if(in_array('Can approve testimony', auth()->user()->getUserPermisions()))
                      <td>
                            <a href="/approve-testimony/{{ $testimony->id }}" data-widget="pay-loan" data-toggle="tooltip"  title="approve">
                            <span style="color:green;"><i class="fa fa-check"></i></span></a>
                            @endif
                            @if(in_array('Can delete testimony', auth()->user()->getUserPermisions()))
                            <a href="/delete-testimony/{{ $testimony->id }}" data-widget="pay-loan" data-toggle="tooltip"  title="delete">
                            <span style="color:red;"><i class="fa fa-times"></i></span></a>
                      </td>
                      @endif
                  </tr>
                 @endforeach
                 </tbody>
              </table>
              <div class="row ml-3">
              @if(isset($search_query))
              {{ $not_approved_messages->appends(['name' => $search_query])->links() }}
              @else
              {{ $not_approved_messages->links() }}
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
