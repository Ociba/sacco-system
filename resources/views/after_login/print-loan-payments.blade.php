<!DOCTYPE html>
<html>

<!-- Mirrored from adminlte.io/themes/AdminLTE/pages/examples/invoice-print.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Nov 2019 13:15:58 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Uganda | Sacco system</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  @include('layouts.stylecss')
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice mr-3">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
      
          <h2 class="page-header">
            <i class="fa fa-leaf"></i> Vetenary Permit.
            <small class="pull-right">Date: </small>
          </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class=" invoice-col">
      <strong>From</strong>
        <address>
        <strong>{{$permit->sellers_name}}</strong><br>
        <strong>District:</strong>{{$permit->from_destination}}<br>
        <strong>ID No:</strong> {{$permit->sellers_ID}}<br>
        <strong>Phone:</strong> {{$permit->contact}}<br>
        </address>
      </div>
      <!-- /.col -->
      <div class=" invoice-col">
      <strong>To</strong>
        <address>col-lg-4 col-md-4 col-xs-4 col-sm-4
        <strong>{{$permit->buyers_name}}</strong><br>
        <strong>District:</strong> {{$permit->to_destination}}<br>
        <strong>ID No:</strong> {{$permit->buyer_ID}}<br>
        <strong>Phone:</strong> {{$permit->buyers_contact}}<br>
        </address>
      </div>
      <!-- /.col -->
      <div class=" invoice-col">
        <b>Invoice <span style="color:red;">#00{{$permit->id}}</span></b><br>
        <br>
        <b>Item No.:</b> {{$permit->Number_of_items}}<br>
          <b>Item:</b> <img src="{{asset('images/profile_pictures/'.$permit->item_image)}}" style="width:60px" height="30px" alt=""><br>
      </div>
      <!-- /.col -->
    </div>
    --}}
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
    <div class="card-body table-responsive no-padding">
              <table class="table">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Amount</th>
                  <th>Date</th>
                </tr>
                </thead>
                <tbody>
                @if ($show_loan_payments_details->currentPage() > 1)
                      @php($i =  1 + (($show_loan_payments_details->currentPage() - 1) * $show_loan_payments_details->perPage()))
                      @else
                      @php($i = 1)
                      @endif
              @foreach ($show_loan_payments_details as $index =>$payments)
                  <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $payments->name }}</td>
                      <td>{{ $payments->repayment_amount }}</td>
                      <td>{{ $payments->created_at }}</td>
                      
                  </tr>
                 @endforeach
                 </tbody>
              </table>
              <div class="row ml-3">
              @if(isset($search_query))
              {{ $show_loan_payments_details->appends(['name' => $search_query])->links() }}
              @else
              {{ $show_loan_payments_details->links() }}
              @endif
            </div>
            </div>
      <!-- /.col -->
    </div>
      <!-- /.col -->
    </div>
    @endforeach
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>

<!-- Mirrored from adminlte.io/themes/AdminLTE/pages/examples/invoice-print.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Nov 2019 13:15:58 GMT -->
</html>