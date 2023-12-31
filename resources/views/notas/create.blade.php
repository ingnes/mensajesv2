<!-- Modal -->
<div class="modal" id="modalAddNote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nueva nota para el mensaje #{{ $mensaje->id }}</h5>
          <button type="button" class="btn btn-danger btn-sm closeModal" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
        </div>

        <form action="{{ route('notas.store')}}" method="POST" id="frmAddNote" >
            {!! csrf_field() !!}
            <input type="hidden" name="idMensaje" value="{{$mensaje->id}}" />
        <div class="modal-body">           
                @include('notas.fields', ['btnText' => 'Grabar'])                
        </div>
                
        </form>     
      </div>
    </div>
</div>



