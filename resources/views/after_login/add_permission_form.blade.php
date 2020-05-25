<!DOCTYPE html>
    <html>

    <!-- Mirrored from adminlte.io/themes/AdminLTE/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Nov 2019 13:14:10 GMT -->
    <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
    @include('layouts.styling')
    <body class="hold-transition skin-blue sidebar-mini fixed">
    <div class="wrapper">

    @include('layouts.topnavbar')
    <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('layouts.content_header')

        <!-- Main content -->
        <section class="content">
        <hr>
        <div class="row">
        @include('layouts.successfulmsg')
        </div>


        <div class="row">
        <div class="col-sm-12">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
        <div class="box box-info">
                <div class="box-header with-border">
                <h3 class="box-title">Permission Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="/save-permission-details" method="get">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 col-form-labe">permission</label>

                    <div class="col-sm-6">
                        <input type="text" class="form-control col-sm-13" id="inputEmail3" name="permission" placeholder="Enter your permission" required>
                    </div>
                    </div>

                    <div class="col-sm-2"></div>
                    <div class="col-sm-4">
                    <button type="submit" class="btn btn-warning ajax"><a href="/permissions" style="color:white;">Back</a></button>
                    <button type="submit" class="btn btn-info ajax">Save</button>
                    </div>
                </div>    
                </form>
            </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
        </section>
        <!-- /.content -->
    </div>
    </div>
    <!-- /.content-wrapper -->

        @include('layouts.footer')

    <!-- Control Sidebar -->
    @include('layouts.settings')

    </div>
    <!-- ./wrapper -->

    @include('layouts.javascript')
    </body>

    <!-- Mirrored from adminlte.io/themes/AdminLTE/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Nov 2019 13:14:59 GMT -->
    </html>
