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
      </div>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-12">
    <div class="box">
            <div class="card-header">
            <div class="row">
                </div>
               
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="/display-mailbox" class="btn btn-primary btn-block margin-bottom">Back to Inbox</a>

          <div class="box box-solid card pt-2 mb-2 p-2 pl-2">
            <div class="box-header with-border">
              <h3 class="box-title">Compose</h3>
            </div>
            <div class="box-body">
              <ul class="list-unstyled list-group list-group-unbordered">
                <li class="list-group-item"><a href="/display-mailbox" class="btn-default"><i class="fa fa-inbox"></i> Inbox
                  <span class="btn btn-primary pull-right">{{auth()->user()->countReceivedMails()}}</span></a></li>
                <li class="list-group-item"><a href="/display-sent" class="btn-default"><i class="fa fa-envelope-o"></i> Sent
                <span class="pull-right text-success">{{auth()->user()->countSentMails()}}</span></a></li>
                <li class="list-group-item"><a href="/display-draft" class="btn-default"><i class="fa fa-file-text-o"></i> Drafts
                <span class="pull-right text-primary">{{auth()->user()->countDraftMails()}}</span></a></li>
                <li class="list-group-item"><a href="/display-junk" class="btn-default"><i class="fa fa-filter"></i> Junk
                 <span class="btn btn-warning pull-right">{{auth()->user()->countJunkMails()}}</span></a>
                </li>
                <li class="list-group-item"><a href="/display-trash" class="btn-default"><i class="fa fa-trash-o"></i> Trash
                <span class="pull-right text-danger">{{auth()->user()->countTrashMails()}}</span></a></li>
                <li class="list-group-item"><a href="/display-reply" class="btn-default"><i class="fa fa-mail-reply-all"></i> Replies
                <span class="pull-right text-blue">{{auth()->user()->countreplyMails()}}</span></a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          <div class="box box-solid card pt-2 mb-2 p-2 pl-2">
            <div class="box-header with-border">
              <h3 class="box-title">Labels</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <ul class="list-unstyled list-group list-group-unbordered">
                <li class="list-group-item"><a href="#" class="btn-default"><i class="fa fa-circle-o text-red"></i> Important</a></li>
                <li class="list-group-item"><a href="#" class="btn-default"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
                <li class="list-group-item"><a href="#" class="btn-default"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9 card pt-2 mb-2 p-2 pl-2">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Reply Message</h3>
            </div>
            <!-- /.box-header -->
            @foreach($reply_mail as $replies)
            <form action="/save-reply" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
            <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Mail</label>
                    <div class="col-sm-10">
                    <select class="form-control" style="width: 100%;" name="message" required>
                    <option value="">Select Message</option>
                    @foreach($pick_message as $pick_from_mail_table)
                    <option selected="selected" value="{{$pick_from_mail_table->id}}">{{ $pick_from_mail_table->message }} 
                    </option>
                    @endforeach
                   </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Profile</label>
                    <div class="col-sm-10">
                    <select class="form-control" style="width: 100%;" name="image" required>
                    <option value="">Select Profile</option>
                    @foreach($pick_profile as $pick_from_profiles_table)
                    <option selected="selected" value="{{$pick_from_profiles_table->id}}">{{ $pick_from_profiles_table->image }} 
                    </option>
                    @endforeach
                   </select>
                    </div>
                  </div>
              <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Reply</label>
                    <textarea id="compose-textarea" name="reply" class="form-control" style="height: 300px">
                     
                      
                    </textarea>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send Reply</button>
              </div>
              
            </div>
            <!-- /.box-footer -->
          </div>
          </form>
          @endforeach
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          </div>
          </div>
          </section>
    <!-- /.content -->
  </div>
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  @include('layouts.footer')
</div>
@include('layouts.javascript')
<!-- Page Script -->
<script>
  $(function () {
    //Add text editor
    $("#compose-textarea").wysihtml5();
  });
</script>
</body>
</html>
