<!DOCTYPE html>
<html>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
    @include('layouts.stylecss')
    <body class="hold-transition skin-blue sidebar-mini fixed">
        <div class="wrapper">
        @include('layouts.topnavbar')
        @include('layouts.sidebar')
        <div class="content-wrapper">
        @include('layouts.content_header')
         @include('layouts.errorsmgs')
        <section class="content">
        <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
        <div class="box">
        <div class="box-header with-border">
        <h3 class="box-title" style="color:blue;">Selected Role</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        @foreach($get_selected_role as $role)
        <h2 style="text-transform:capitalize">{{$role->role}}</h2>
        @endforeach
        <a href="/roles">
        <li class="fa fa-arrow-left"> <span style="color:blue;">back</span></li>
        </a>
        </div>
        </div> 
        <!-- /.col -->
        </div>
        <!-- /.col -->
        <div class="col-lg-8 col-md-8 col-xs-8 col-sm-8">
        <div class="box">
        <div class="box-header with-border">
        <h3 class="box-title" style="color:blue;">Permissions</h3>
        </div>
        <div class="box-body card table-responsive no-padding">
        <table class="table table-hover">
        <tr>
        <th>Role</th>
        <th>Permission(s)</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if ($get_all_permissions->currentPage() > 1)
        @php($i =  1 + (($get_all_permissions->currentPage() - 1) * $get_all_permissions->perPage()))
        @else
        @php($i = 1)
        @endif
        @foreach ($get_all_permissions as $permission)
        <tr>
        <td>{{ $i++ }}</td>
        <td>{{$permission->permission}}</td>
        <form action="/unsign-permission/{{$permission->id}}" method="POST">
        @csrf
        <td>
        <button class="btn btn-primary" type="submit"><span class="text-white">Remove</span></button>
        </td>
        </form>
        </tr>
        @endforeach
        </tbody>
        </table>
        <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <div class="col-lg-8 col-md-8 col-xs-8 col-sm-8">
        @if(isset($search_query))
        {{ $get_all_permissions->appends(['name' => $search_query])->links() }}
        @else
        {{ $get_all_permissions->links() }}
        @endif
        </div>
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 pull-right">
        <a href="/checkbox_permissions/{{request()->route()->id}}" button type="text" name="permission" class="form-control  btn btn-primary">
        <li class="fa fa-plus"> Permissions</li>
        </button>
        </a>
        </div>
        </div>
        <!-- /.box-body -->
        </div>
        </div>
        <!-- /.col -->
        </section>
        </div> 
        @include('layouts.footer')
        @include('layouts.settings')
        </div>
        @include('layouts.javascript')
    </body>
</html>