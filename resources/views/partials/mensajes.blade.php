{{-- Plantilla de mensajes --}}
{{-- 
	El mensaje debe contener:
	tipo
	icono
	titulo
	contenido 
--}}

@if(session()->has('mensaje.contenido'))
<div class="alert alert-{{session('mensaje.tipo')}} alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h4><i class="icon fa {{session('mensaje.icono')}}"></i>¡{{session('mensaje.titulo')}}!</h4>
  {{ session('mensaje.contenido') }}
</div>
@endif