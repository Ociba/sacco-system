<div class="tab-pane" id="save">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Save Mail</h3>
        </div>
        <!-- /.box-header -->
        <form action="/save-unsent-mails" id="messagesForm" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <input class="form-control" name="name" placeholder="To:" required>
                </div>
                <div class="form-group">
                    <input class="form-control" name="subject" placeholder="Subject:" required>
                </div>
                <div class="form-group">
                    <textarea id="compose-textarea" name="message" class="form-control" style="height: 300px" required>
                    
                    </textarea>
                </div>
                <div class="form-group">
                    <div class="btn btn-default btn-file">
                    <i class="fa fa-paperclip"></i> Attachment
                    <input type="file" name="attachment">
                    </div>
                    <p class="help-block">Max. 32MB</p>
                </div>
            </div>
            <div class="box-footer">
                <div class="pull-right">
                    <button type="submit" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
                </div>
                <button type="reset" action="/display-compose" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
            </div>
        </form>
    </div>
</div>
          