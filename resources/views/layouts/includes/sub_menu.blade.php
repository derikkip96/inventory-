<!-- Profile Image -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">{{trans('message.header.general_setting')}}</h3>
  </div>
  <div class="box-body no-padding" style="display: block;">
    <ul class="nav nav-pills nav-stacked">
      
      <li {{ isset($list_menu) &&  $list_menu == 'category' ? 'class=active' : ''}} ><a href="{{ URL::to("item-category")}}">{{ trans('message.sidebar.item_category') }}</a></li>

      @if(Helpers::has_permission(Auth::user()->id, 'manage_unit'))
      <li {{ isset($list_menu) &&  $list_menu == 'unit' ? 'class=active' : ''}} ><a href="{{ URL::to("unit")}}">{{ trans('message.extra_text.units') }}</a></li>
      @endif

      @if(Helpers::has_permission(Auth::user()->id, 'manage_db_backup'))
      <li {{ isset($list_menu) &&  $list_menu == 'backup' ? 'class=active' : ''}}><a href="{{ URL::to("backup/list")}}">{{ trans('message.extra_text.db_backup') }}</a></li>
      @endif
      
      @if(Helpers::has_permission(Auth::user()->id, 'manage_email_setup'))
      <li {{ isset($list_menu) &&  $list_menu == 'email_setup' ? 'class=active' : ''}}><a href="{{ URL::to("email/setup")}}">{{ trans('message.extra_text.email_setup') }}</a></li>
      @endif
      
      
    </ul>
  </div>
  <!-- /.box-body -->
</div>