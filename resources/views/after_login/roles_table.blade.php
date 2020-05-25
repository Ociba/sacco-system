<!DOCTYPE html>
<html>
    <!-- Added by HTTrack -->
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <!-- /Added by HTTrack -->
    @include('layouts.stylecss')
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
            @include('layouts.topnavbar')
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    @include('layouts.sidebartoptext')

    <!-- Sidebar -->
    @include('layouts.sidebar')
    <!-- /.sidebar -->
  </aside>
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                @include('layouts.breadcrumb')
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <div class="card">
                            <div class="row">
                               {{-- @include('layouts.errorsmgs')--}}
                            </div>
                        <section class="content">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                                    <div class="box">
                                        <div class="box-header with-border">
                                            <h3 class="box-title" style="color:blue;">Note</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            Select Assign/Remove Permission besides the role on the right side
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                                    <div class="box">
                                        <div class="box-header with-border">
                                            <h3 class="box-title" style="color:blue;">Users</h3>
                                        </div>
                                        <div class="box-body table-responsive no-padding">
                                            <table class="table table-hover">
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Role</th>
                                                    <th>Click to Proceed</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($get_all_roles->currentPage() > 1)
                                                    @php($i =  1 + (($get_all_roles->currentPage() - 1) * $get_all_roles->perPage()))
                                                    @else
                                                    @php($i = 1)
                                                    @endif
                                                    @foreach ($get_all_roles as $role)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{$role->role}}</td>
                                                        <td>
                                                        <a href="/assign-or-remove-permissions/{{$role->id}}"><span class="text-green">Assign/Remove Permission</span></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @if(isset($search_query))
                                            {{ $get_all_roles->appends(['name' => $search_query])->links() }}
                                            @else
                                            {{ $get_all_roles->links() }}
                                            @endif
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                </div>
                               </div>
                            </div>
                        </section>
                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            @include('layouts.footer')
            <!-- Control Sidebar -->
        </div>
        <!-- ./wrapper -->
        @include('layouts.javascript')
    </body>
</html>