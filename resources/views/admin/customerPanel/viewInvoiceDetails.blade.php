@extends('layouts.customer_panel')
@section('content')
  <section class="content">
    <div class="row">
      <div class="col-md-12">
          <div class="box box-default">
            <div class="box-body">
              <div class="row">
                <div class="col-md-12 text-right">
                  <div class="btn-group pull-right">
                    <a target="_blank" href="{{URL::to('/')}}/customer-panel/invoice-pdf/{{$saleDataOrder->order_no}}/{{$saleDataInvoice->order_no}}" title="PDF" class="btn btn-default btn-flat">PDF</a>
                    <a target="_blank" href="{{URL::to('/')}}/customer-panel/invoice-print/{{$saleDataOrder->order_no}}/{{$saleDataInvoice->order_no}}" title="Print" class="btn btn-default btn-flat">Print</a>
                  </div>
                </div>
              </div>
            </div>  
            <div class="box-body">
                <div class="row" style="margin-bottom:15px;">
                   <div class="col-md-4">
                    <strong>{{ $settings['company']['company_name'] }}</strong>
                    <h5>{{ $settings['company']['company_street'] }}</h5>
                    <h5>{{ $settings['company']['company_city'] }}, {{ $settings['company']['company_state'] }}</h5>
                    <h5>{{ $settings['company']['company_country_id'] }}, {{ $settings['company']['company_zipCode'] }}</h5>
                  </div>
                  
                  <div class="col-md-4">
                  <strong>{{ trans('message.extra_text.bill_to') }}</strong>
                  <h5>{{ !empty($customerInfo->name) ? $customerInfo->name : ''}}</h5>
                  <h5>{{ !empty($customerInfo->billing_street) ? $customerInfo->billing_street : ''}} </h5>
                  <h5>{{ !empty($customerInfo->billing_state) ? $customerInfo->billing_state : ''}}{{ !empty($customerInfo->billing_city) ? ', '.$customerInfo->billing_city : ''}}</h5>
                  <h5>{{ !empty($customerInfo->billing_country_id) ? $customerInfo->billing_country_id : ''}} {{ !empty($customerInfo->billing_zip_code) ? ', '.$customerInfo->billing_zip_code : ''}}</h5>
                  </div>

                  <div class="col-md-4">
                  <strong>{{ trans('message.table.invoice_no').' # '.$saleDataInvoice->reference }}</strong>
                  <h5>{{ trans('message.invoice.invoice_date')}} : {{formatDate($saleDataInvoice->ord_date)}}</h5>
                  <h5>{{ trans('message.invoice.due_date')}} : {{formatDate($due_date)}}</h5>
                  </div>

                </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="box-body no-padding">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="salesInvoice">
                      <tbody>
                      <tr class="tbl_header_color dynamicRows">
                        <th width="30%" class="text-center">{{ trans('message.table.description') }}</th>
                        <th width="10%" class="text-center">{{ trans('message.table.quantity') }}</th>
                        <th width="10%" class="text-center">{{ trans('message.table.rate') }}({{$currency->symbol}})</th>
                        <th width="10%" class="text-center">{{ trans('message.table.tax') }}(%)</th>
                         <th class="text-center" width="10%">{{ trans('message.table.discount') }}(%)</th>
                        <th width="10%" class="text-center">{{ trans('message.table.amount') }}({{$currency->symbol}})</th>
                      </tr>
                      <?php
                       $itemsInformation = '';
                      ?>
                      @if(count($invoiceData)>0)
                       <?php $subTotal = 0;$units = 0;?>
                        @foreach($invoiceData as $result)
                            <tr>
                              <td class="text-center">{{$result['description']}}</td>
                              <td class="text-center">{{$result['quantity']}}</td>
                              <td class="text-center">{{number_format($result['unit_price'],2,'.',',') }}</td>
                              <td class="text-center">{{number_format($result['tax_rate'],2,'.',',')}}</td>
                              <td class="text-center">{{number_format($result['discount_percent'],2,'.',',')}}</td>
                              <?php
                                $priceAmount = ($result['quantity']*$result['unit_price']);
                                $discount = ($priceAmount*$result['discount_percent'])/100;
                                $newPrice = ($priceAmount-$discount);
                                $subTotal += $newPrice;
                                $units += $result['quantity'];
                                $itemsInformation .= '<div>'.$result['quantity'].'x'.' '.$result['description'].'</div>';
                              ?>
                              <td align="right">{{number_format($newPrice,2,'.',',') }}</td>
                            </tr>
                        @endforeach
                        <tr class="tableInfos"><td colspan="5" align="right">{{ trans('message.table.total_qty') }}</td><td align="right" colspan="2">{{$units}}</td></tr>
                      <tr class="tableInfos"><td colspan="5" align="right">{{ trans('message.table.sub_total') }}</td><td align="right" colspan="2">{{ $currency->symbol.number_format($subTotal,2,'.',',') }}</td></tr>
                      @foreach($taxType as $rate=>$tax_amount)
                      @if($rate != 0)
                      <tr><td colspan="5" align="right">Plus Tax({{$rate}}%)</td><td colspan="2" class="text-right">{{ $currency->symbol.number_format($tax_amount,2,'.',',') }}</td></tr>
                      @endif
                      @endforeach
                      <tr class="tableInfos"><td colspan="5" align="right"><strong>{{ trans('message.table.grand_total') }}</strong></td><td colspan="2" class="text-right"><strong>{{ $currency->symbol.number_format($saleDataInvoice->total,2,'.',',') }}</strong></td></tr>
                      <tr class="tableInfos"><td colspan="5" align="right">{{ trans('message.invoice.paid') }}</td><td colspan="2" class="text-right"> {{ $currency->symbol.number_format($saleDataInvoice->paid_amount,2,'.',',') }}</td></tr>
                      <tr class="tableInfos"><td colspan="5" align="right"><strong>{{ trans('message.invoice.due') }}</strong></td><td colspan="2" class="text-right"><strong>{{ $currency->symbol.number_format(($saleDataInvoice->total-$saleDataInvoice->paid_amount),2,'.',',') }}</strong></td></tr>
                      @endif
                      </tbody>
                    </table>
                    </div>
                    <br><br>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      
      </div>
  </section>
@endsection
@section('js')
<script type="text/javascript">

</script>
@endsection