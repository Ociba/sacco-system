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
        @include('layouts.successfulmessage')
            <div class="col-12">
        <div class="card">
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add Profile</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal mt-3" method="post" action="/save-profile" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">User</label>
                    <div class="col-sm-10">
                    <select class="form-control" style="width: 100%;" name="name" required>
                    <option value="">Select Name</option>
                    @foreach($get_users_id as $pick_from_users_table)
                    <option selected="selected" value="{{$pick_from_users_table->id}}">{{ $pick_from_users_table->name }} 
                    </option>
                    @endforeach
                   </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                    <select class="form-control" style="width: 100%;" name="role" required>
                    <option value="">Select Role</option>
                    @foreach($get_role_id as $pick_from_roles_table)
                    <option selected="selected" value="{{$pick_from_roles_table->id}}">{{ $pick_from_roles_table->role }} 
                    </option>
                    @endforeach
                   </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Work</label>
                    <div class="col-sm-10">
                      <textarea type="text" class="form-control" id="inputEmail3" name="work" rows="7" placeholder="write role details" required></textarea>
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
                                    <input type="file" class="default" name="image" accept=".png, .jpg, .jpeg,.PNG"/>
                                    </span>
                                    {{--<a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists btn-danger" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="text-center mb-3">
                <a href="/display-profile"><button type="button" class="btn btn-warning">Back</button></a>
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
