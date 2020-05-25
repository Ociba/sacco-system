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
          <a href="/display-compose" class="btn btn-primary btn-block margin-bottom">Compose</a>

          <div class="box box-solid card pt-2 mb-2 p-2 pl-2">
            <div class="box-header with-border">
              <h3 class="box-title">Read Mail</h3>
            </div>
            <div class="box-body no-padding">
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
          <div class="box card pt-2 mb-2 p-3 pl-2">
            <div class="box-header with-border">
              <h3 class="box-title">Labels</h3>
            </div>
            <div class="box-body with-border">
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
        <div class="col-md-9 pt-2 mb-2 p-2 pl-2">
        @foreach($read_mail as $read_mail)
        <form action="/delete-mail/{{$read_mail->id}}" method="get">
        @csrf
          <div class="box box-primary card">
            <div class="box-header with-border">
              <h3 class="box-title">Read Mail</h3>
              <div class="box-tools pull-right">
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3 style="text-decoration:itlic;">{{$read_mail->subject}}</h3>
                <h5 style="color:blue;">From: {{$read_mail->name}}
                  <span class="mailbox-read-time pull-right">{{ date('F d, Y', strtotime($read_mail->created_at))}} {{ date('g:ia', strtotime($read_mail->created_at))}}</span></h5>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                    <i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
                    <i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
                    <i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                  <i class="fa fa-print"></i></button>
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p><b>Hello {{auth()->user()->name}},</b></p>

                <p>{{$read_mail->message}}</p>

                <p>Thanks,<br><b>{{$read_mail->name}}</b></p>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <ul class="mailbox-attachments clearfix">
                <li>
                  <span class="mailbox-attachment-icon" style="color:red;"><i class="fa fa-file-pdf-o"></i></span>

                  <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>{{$read_mail->attachment}}</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <div class="hidden-print">
                          <a href="{{asset('/forms/'.$read_mail->attachment)}}" class="btn btn-default pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                        </div>
                  </div>
                </li>
                <li>
              </ul>
            </div>
            @endforeach
            @foreach($display_replied_mails as $replies)
            <div class="direct-chat-messages">
                <!-- Message. Default to the left -->
                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">{{$replies->name}}</span>
                    <span class="direct-chat-timestamp pull-right">{{ date('F d, Y', strtotime($replies->created_at))}} {{ date('g:ia', strtotime($replies->created_at))}}</span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="{{asset('images/profile_pictures/'.$replies->image)}}" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    {{$replies->reply}}
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
              </div>
            @endforeach
            <!-- /.box-footer -->
            <div class="box-footer">
            
              <div class="pull-right">
                <a href="/display-reply-form/{{$read_mail->id}}" button type="button" class="btn btn-primary"><i class="fa fa-reply"></i> Reply</button></a>
                {{--
                <button type="button" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
              </div>
              --}}
              <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button>
              {{--<button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>--}}
            </div>
            <!-- /.box-footer -->
          </div>
          </form>
          
          <!-- /. box -->
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
</body>
</html>
