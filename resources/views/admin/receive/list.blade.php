@extends('layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
      
      <div class="box box-default">
        <div class="box-body">
          <div class="row">
            <div class="col-md-12 col-sm-8 col-xs-12">
             <div class="top-bar-title padding-bottom">{{ trans('message.sidebar.purchase_received') }}</div>
            </div> 
          </div>
        </div>
      </div>

        <div class="box">
           <div class="panel-body">
                <ul class="nav nav-tabs cus" role="tablist">
                    
                    <li  class="active">
                      <a href='{{ url('purchase_receive/list') }}' >{{ trans('message.extra_text.all') }}</a>
                    </li>
                    
                    <li>
                      <a href="{{ url('receive/filter') }}" >{{ trans('message.extra_text.filter') }}</a>
                    </li>

               </ul>
              <div class="clearfix"></div>
           </div>
        </div> 
        

        <!-- Default box -->
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="purchaseList" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th >{{ trans('message.table.receive_no') }} #</th>
                    <th >{{ trans('message.table.purchase_no') }} #</th>
                    <th>{{ trans('message.table.supp_name') }}</th>
                    <th>{{ trans('message.table.receive_qty') }}</th>
                    <th>{{ trans('message.table.receive_date') }}</th>
                    <th width="5%" class="hideColumn">{{ trans('message.table.action') }}</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($receiveList as $data)
                  <tr>
                    
                    <td><a href="{{ url('receive/details/'.$data->receive_no) }}">{{ sprintf("%04d",$data->receive_no) }}</a></td>
                    <td><a href="{{ url('purchase/view-purchase-details/'.$data->order_no) }}">{{ $data->reference }}</a></td>
                    <td><a href="{{ url('edit-supplier/'.$data->supplier_id) }}">{{ $data->supp_name }}</a></td>
                    <td>{{ $data->receive_qty }}</td>
                    <td>{{ formatDate($data->receive_date) }}</td>
                    <td class="hideColumn">
                     @if(Helpers::has_permission(Auth::user()->id, 'edit_purchase'))
                        <a  title="edit" class="btn btn-xs btn-primary" href='{{ url('receive/edit/'.$data->receive_no) }}'><span class="fa fa-edit"></span></a> &nbsp;
                    @endif
                     @if(Helpers::has_permission(Auth::user()->id, 'delete_purchase'))
                        <form method="POST" action="{{ url('receive/delete') }}" accept-charset="UTF-8" style="display:inline">
                            {!! csrf_field() !!}
                            <input type="hidden" name="receive_id" value="{{ $data->receive_no }}">
                            <input type="hidden" name="order_no" value="{{ $data->order_no }}">
                            <button title="delete" class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="{{ trans('message.table.delete_invoice_header') }}" data-message="{{ trans('message.table.delete_invoice') }}">
                                <i class="glyphicon glyphicon-trash"></i> 
                            </button>
                        </form>
                    @endif
                    </td>
                  </tr>
                  @endforeach
                  </tfoot>
                 </table>
            </div>
            
          </div>
              <!-- /.box-body -->
        </div>
        <!-- /.box -->
      
    </section>

@include('layouts.includes.message_boxes')
@endsection
@section('js')
    <script type="text/javascript">
  $(function () {
    $("#purchaseList").DataTable({
      "order": [],
      "columnDefs": [ {
        "targets": 4,
        "orderable": false
        } ],

        "language": '{{Session::get('dflt_lang')}}',
        "pageLength": '{{Session::get('row_per_page')}}'
    });
  });
    </script>
@endsection