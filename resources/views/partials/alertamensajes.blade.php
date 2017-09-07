{{-- alerta de exito --}}
@if(session()->has('message.content'))
<div class="alert alert-{{session('message.level')}} alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h4>  <i class="icon fa fa-check"></i> Exito!</h4>
  {{ session('message.content') }}
</div>
@endif