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
                  <span class="pull-right text-danger">{{auth()->user()->countreplyMails()}}</span></a></li>
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
              <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#send" data-toggle="tab">Send Mail</a></li>
                    <li class="nav-item"><a class="nav-link" href="#save" data-toggle="tab">Save Mail</a></li>
                  </ul>
              </div>
              <div class="card-body">
              <div class="tab-content">
              @include('layouts.compose')
              @include('layouts.save-mail')
              </div>
              </div>
              </div>
              <!-- /.row -->
              </section>
              </div>
              <!-- /.card-body -->
              </div>
              <!-- /.card -->
              </div>
              </div>
              </div>
          </section>
        <!-- /.content -->
        
        <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        </aside>
        @include('layouts.footer')
        </div>
      </div>
          @include('layouts.javascript')
          <!-- Page Script -->
          <script>
          $(document).ready(function(){
          $("#messagesForm").on("submit", function(){
          $("#pageloader").fadeIn();
          });//submit
          });
          </script>
    </body>
</html>
