<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
    @include('layouts.stylecss')
  <title>Uganda | Sacco system</title>
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
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add Members Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal mt-3" method="get" action="/save-members-details" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Town</label>
                    <div class="col-sm-10">
                      <input type="text" selected="selected" class="form-control" id="inputEmail3" name="town"  placeholder="current town" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">County</label>
                    <div class="col-sm-10">
                      <input type="text" selected="selected" class="form-control" id="inputEmail3" name="county" placeholder="cuerrent county/Division" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Residence</label>
                    <div class="col-sm-10">
                      <input type="text" selected="selected" class="form-control" id="inputPassword3" name="residence" placeholder="current Residence/village" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Ocuppation</label>
                    <div class="col-sm-10">
                      <input type="text"selected="selected" class="form-control" id="inputPassword3" name="occupation" placeholder="current occupation" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Date of Joining</label>
                    <div class="col-sm-10">
                      <input type="text" selected="selected" class="form-control" id="inputPassword3" name="date_of_joining" placeholder="Registration date" required>
                    </div>
                  </div>
                  <div class="form-group row">
                        <label class="control-label col-md-2">Image Upload</label>
                        <div class="col-md-9">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-theme02 btn-file">
                                    <span class="fileupload-new btn btn-success"><i class="fa fa-paperclip"></i> Select image</span>
                                    <span class="fileupload-exists btn-purple"><i class="fa fa-undo"></i> Change</span>
                                    <input type="file" class="default" name="avatar" accept=".png, .jpg, .jpeg,.PNG"/>
                                    </span>
                                    {{--<a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists btn-danger" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="text-center mb-3">
                <a href="{{url()->previous()}}"><button type="button" class="btn btn-warning">Back</button></a>
                  <button type="submit" class="btn btn-success ">Save</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
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
