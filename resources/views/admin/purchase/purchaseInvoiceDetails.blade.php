@extends('layouts.app')
@section('content')
  <section class="content">

    <div class="box box-default">
      <div class="box-body">
        <div class="row">
          <div class="col-md-10">
           <div class="top-bar-title padding-bottom">{{ trans('message.extra_text.purchase') }}</div>
          </div> 
          <div class="col-md-2">
            @if(Helpers::has_permission(Auth::user()->id, 'add_purchase'))
              <a href="{{ url('purchase/add') }}" class="btn btn-block btn-default btn-flat btn-border-orange"><span class="fa fa-plus"> &nbsp;</span>{{ trans('message.extra_text.new_purchase') }}</a>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8">
          <div class="box box-default">
          <div class="box-body">
                <div class="btn-group pull-right">
                  <button title="Email" type="button" class="btn btn-default btn-flat" data-toggle="modal" data-target="#emailPurchase">{{ trans('message.extra_text.email') }}</button>

                  <a target="_blank" href="{{URL::to('/')}}/purchase/print/{{$purchData->order_no}}" title="Print" class="btn btn-default btn-flat">{{ trans('message.extra_text.print') }}</a>
                  <a target="_blank" href="{{URL::to('/')}}/purchase/pdf/{{$purchData->order_no}}" title="PDF" class="btn btn-default btn-flat">{{ trans('message.extra_text.pdf') }}</a>
                   @if(Helpers::has_permission(Auth::user()->id, 'edit_purchase'))
                  <a href="{{URL::to('/')}}/purchase/edit/{{$purchData->order_no}}" title="Edit" class="btn btn-default btn-flat">{{ trans('message.extra_text.edit') }}</a>
                    @endif
                    @if(Helpers::has_permission(Auth::user()->id, 'delete_purchase'))
                  <form method="POST" action="{{ url("purchase/delete/$purchData->order_no") }}" accept-charset="UTF-8" style="display:inline">
                      {!! csrf_field() !!}
                      <button class="btn btn-default btn-flat delete-btn" title="{{ trans('message.table.delete')}}" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="{{ trans('message.invoice.delete_purchase') }}" data-message="{{ trans('message.invoice.delete_purchase_confirm') }}">
                         {{ trans('message.extra_text.delete') }}
                      </button>
                  </form>
                    @endif
                </div>
          </div>

            <div class="box-body">
              <div class="row">
                
                  <div class="col-md-4">
                    <strong>{{ Session::get('company_name') }}</strong>
                    <h5 class="">{{ Session::get('company_street') }}</h5>
                    <h5 class="">{{ Session::get('company_city') }}, {{ Session::get('company_state') }}</h5>
                    <h5 class="">{{ Session::get('company_country_id') }}, {{ Session::get('company_zipCode') }}</h5>
                    <h5 class="">{{ Session::get('vat_no') }}</h5>

                  </div>

                <div class="col-md-4">
                  <strong>{{!empty($purchData->supp_name) ? $purchData->supp_name : ''}}</strong>
                  <h5>{{ !empty($purchData->address) ? $purchData->address : ''}}</h5>
                  <h5>{{ !empty($purchData->city) ? $purchData->city : ''}}{{ !empty($purchData->state) ? ', '.$purchData->state : ''}}</h5>
                  <h5>{{ !empty($purchData->country) ? $purchData->country : '' }}{{ !empty($purchData->zipcode) ? ', '.$purchData->zipcode : '' }}</h5>
                </div>

                <div class="col-md-4">
                    <strong>{{ trans('message.table.invoice_no').' # '.$purchData->reference }}</strong>
                    <h5>{{ trans('message.extra_text.location')}} : {{$purchData->location_name}}</h5>
                    <h5>{{ trans('message.table.date')}} : {{formatDate($purchData->ord_date)}}</h5>
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
                        <th width="10%" class="text-center">{{ trans('message.table.rate') }}({{Session::get('currency_symbol')}})</th>
                        <th width="10%" class="text-center">{{ trans('message.table.tax') }}(%)</th>
                        <th width="10%" class="text-right">{{ trans('message.table.amount') }}</th>
                      </tr>
                      <?php
                       $itemsInformation = '';
                      ?>
                      @if(count($invoiceItems)>0)
                       <?php $subTotal = 0;$units = 0;?>
                        @foreach($invoiceItems as $result)
                            <tr>
                              <td class="text-center">{{$result->description}}</td>
                              <td class="text-center">{{$result->quantity_received}}</td>
                              <td class="text-center">{{number_format($result->unit_price,2,'.',',') }}</td>
                              <td class="text-center">{{$result->tax_rate}}</td>
                              <?php
                                $priceAmount = ($result->quantity_received*$result->unit_price);
                                $subTotal += $priceAmount;
                                $units += $result->quantity_received;
                                $itemsInformation .= '<div>'.$result->quantity_received.'x'.' '.$result->description.'</div>';
                              ?>
                              <td align="right">{{ Session::get('currency_symbol').number_format($priceAmount,2,'.',',') }}</td>
                            </tr>
                        @endforeach
                        <tr class="tableInfos"><td colspan="4" align="right">{{ trans('message.table.total_qty') }}</td><td align="right" colspan="2">{{$units}}</td></tr>
                      <tr class="tableInfos"><td colspan="4" align="right">{{ trans('message.table.sub_total') }}</td><td align="right" colspan="2">{{ Session::get('currency_symbol').number_format($subTotal,2,'.',',') }}</td></tr>
                      @foreach($taxType as $rate=>$tax_amount)
                      @if($rate != 0)
                      <tr><td colspan="4" align="right">Plus Tax({{$rate}}%)</td><td colspan="2" class="text-right">{{ Session::get('currency_symbol').number_format($tax_amount,2,'.',',') }}</td></tr>
                      @endif
                      @endforeach
                      <tr class="tableInfos"><td colspan="4" align="right"><strong>{{ trans('message.table.grand_total') }}</strong></td><td colspan="2" class="text-right"><strong>{{ Session::get('currency_symbol').number_format($purchData->total,2,'.',',') }}</strong></td></tr>
                      @endif
                      </tbody>
                    </table>
                    </div>
                    <br>
                    <strong>{{ trans('message.table.note') }} : </strong>
                    <br>
                    {{$purchData->comments}}
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      @include('layouts.includes.purchase_page_right_option')   
    </div>
  </section>
  




 <!--Purchase Email Modal start-->
    <div id="emailPurchase" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <form id="purchase_form" method="POST" action="{{url('purchase/email-purchase-info')}}">
        <input type="hidden" value="{{csrf_token()}}" name="_token" id="token">
        <input type="hidden" value="{{ $purchData->order_no }}" name="order_no">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">{{ trans('message.email.email_invoice_info')}}</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="email">{{ trans('message.email.send_to')}}:</label>
              <input type="email" value="{{$purchData->email}}" class="form-control" name="email" id="email">
            </div>
            <?php
            $subjectInfo = str_replace('{reference}', $purchData->reference, $emailInfo->subject);
            $subjectInfo = str_replace('{company_name}', Session::get('company_name'), $subjectInfo);
            ?>
            <div class="form-group">
              <label for="subject">{{ trans('message.email.subject')}}:</label>
              <input type="text" class="form-control" name="subject" id="subject" value="{{$subjectInfo}}">
            </div>
              <div class="form-groupa">
                  <?php
                  $bodyInfo = str_replace('{supplier_name}', $purchData->supp_name, $emailInfo->body);
                  $bodyInfo = str_replace('{reference}', $purchData->reference, $bodyInfo);
                  $bodyInfo = str_replace('{total_amount}', $purchData->total, $bodyInfo);

              
                  $bodyInfo = str_replace('{billing_street}', $purchData->address, $bodyInfo);
                  $bodyInfo = str_replace('{billing_city}', $purchData->city, $bodyInfo);
                  $bodyInfo = str_replace('{billing_state}', $purchData->state, $bodyInfo);
                  $bodyInfo = str_replace('{billing_zip_code}', $purchData->zipcode, $bodyInfo);
                  $bodyInfo = str_replace('{billing_country}', $purchData->country, $bodyInfo);  

                  $bodyInfo = str_replace('{company_name}', Session::get('company_name'), $bodyInfo);
                  $bodyInfo = str_replace('{purchase_summery}', $itemsInformation, $bodyInfo);                      
                  ?>
                  <textarea id="compose-textarea" name="message" id='message' class="form-control editor" style="height: 200px">{{$bodyInfo}}</textarea>
              </div>
              <div class="form-group">
                <div class="checkbox">
                  <label><input type="checkbox" name="purchase_pdf" checked><strong>{{$purchData->reference}}</strong></label>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">{{ trans('message.email.close')}}</button><button type="submit" class="btn btn-primary btn-sm">{{ trans('message.email.send')}}</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  <!--Purchase Email Modal end -->
  @include('layouts.includes.message_boxes')
@endsection

@section('js')
<script type="text/javascript">
  $(function () {
        $(".editor").wysihtml5();
      });
  $('#purchase_form').validate({
        rules: {
            email: {
                required: true
            },
            subject:{
               required: true,
            },
            message:{
               required: true,
            }                   
        }
    }); 
</script>
@endsection