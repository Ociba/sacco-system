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
                   
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <div class="card">
                            <div class="row">
                                @include('layouts.successfulmessage')
                            </div>
                        <section class="content">
                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4"></div>
                            <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                            <form action="/assign-permissions/{{request()->route()->id}}" method="POST">
                            @csrf
                            <div class="box box-primary">
                            <div class="form-group row md-form">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                            <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4"></div>
                            <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                                <div class="form-group row">
                                    <ul class="list-unstyled" id="myDiv">
                                        <li><input type="checkbox" id="select_all"/> All Permissions</li>
                                        @if ($select_all_permissions->currentPage() > 1)
                                        @php($i =  1 + (($select_all_permissions->currentPage() - 1) * $select_all_permissions->perPage()))
                                        @else
                                        @php($i = 1)
                                        @endif
                                        @foreach($select_all_permissions as $picking_from_database)
                                        <div class="checkbox">
                                            <label>
                                            <input type="checkbox" class="checkbox checkbox-primary" name="user_permisions[]" value="{{$picking_from_database->id}}" /> {{ $picking_from_database->permission }}
                                            </label>
                                        </div>
                                        @endforeach
                                        @if(isset($search_query))
                                    {{ $select_all_permissions->appends(['name' => $search_query])->links() }}
                                    @else
                                    {{ $select_all_permissions->links() }}
                                    @endif
                                    </ul>
                                </div>
                                <div class="form-group row">
                                    <button type="button" class="btn btn-warning mr-1"><a href="/roles" style="color:white;">Back</a></button>
                                    
                                    <button type="submit" class="btn btn-primary ">Save</button>
                                </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4"></div>
                                </div>
                            </div>
                            </div>
                    </form>
                    </div>
                        </section>
                        </div>
                        <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4"></div>
                        </div>
                        </div>
                        
                </section>
                <!-- /.content -->

            <!-- /.content-wrapper -->
            @include('layouts.footer')
            <!-- Control Sidebar -->
        </div>
        <!-- ./wrapper -->
        @include('layouts.javascript')
    </body>
</html>