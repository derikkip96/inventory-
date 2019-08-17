@extends('layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">

      <div class="box box-default">
        <div class="box-body">
          <div class="row">
            <div class="col-md-8">
             <div class="top-bar-title padding-bottom">{{ trans('message.table.item') }}</div>
            </div> 
            @if(Helpers::has_permission(Auth::user()->id, 'add_item'))
            <div class="col-md-2 top-left-btn">
                <a href="{{ URL::to('itemimport') }}" class="btn btn-block btn-default btn-flat btn-border-purple"><span class="fa fa-upload"> &nbsp;</span>{{ trans('message.extra_text.import_new_item') }}</a>
            </div>

            <div class="col-md-2 top-right-btn">
                <a href="{{ url('create-item/item') }}" class="btn btn-block btn-default btn-flat btn-border-orange"><span class="fa fa-plus"> &nbsp;</span>{{ trans('message.extra_text.add_new_item') }}</a>
            </div>
            @endif
          </div>
        </div>
      </div>

      <!-- Top Box-->
      <div class="box">
        <div class="box-body">
          <div class="col-md-2 col-xs-6 border-right text-center">
              <h3 class="bold">{{$itemData}}</h3>
              <span class="text-info bold">{{ trans('message.table.item') }}</span>
          </div>
          <div class="col-md-2 col-xs-6 border-right text-center">
              <h3 class="bold">{{!empty($itemQuantity->total_item) ? $itemQuantity->total_item : 0 }}</h3>
              <span class="text-info bold">{{ trans('message.extra_text.quantity') }}</span>
          </div>


          <div class="col-md-3 col-xs-6 border-right text-center">
              <h3 class="bold">{{ Session::get('currency_symbol').number_format($costValueQtyOnHand,2,'.',',')}}</h3>
              <span class="text-info">{{ trans('message.report.on_hand_cost_value') }}</span>
          </div>
          <div class="col-md-3 col-xs-6 border-right text-center">
              <h3 class="bold">{{ Session::get('currency_symbol').number_format($retailValueOnHand ,2,'.',',')}}</h3>
              <span class="text-info">{{ trans('message.report.on_hand_retail_value') }} </span>
          </div>
          <div class="col-md-2 col-xs-6 text-center">
              <h3 class="bold">
                @if($profitValueOnHand<0)
                -{{Session::get('currency_symbol').number_format(abs($profitValueOnHand),2,'.',',')}}
                @else
                 {{Session::get('currency_symbol').number_format(abs($profitValueOnHand),2,'.',',')}}
                @endif
              </h3>
              <span class="text-info">{{ trans('message.report.on_hand_profit_value') }}</span>
          </div>


        </div>
        <br>
      </div><!--Top Box End-->


      <div class="box">
            <div class="box-header">
              <a href="{{ URL::to('itemdownloadcsv/csv') }}"><button class="btn btn-default btn-flat btn-border-info"><span class="fa fa-download"> &nbsp;</span>{{ trans('message.table.download_csv') }}</button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              {!! $dataTable->table() !!}
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->
    </section>
@endsection
@section('js')
{!! $dataTable->scripts() !!}
@endsection