@extends('adminlte::page')

@section('title', 'Ver mensaje')

@section('content')

<div class="container">
    <h1 class="text-center">Notificaciones</h1>
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <h3 class="text-center alert-success text-white">Leídas</h3>           
            @if ($readNotifications->count())            
                {{-- {!! csrf_field() !!}               --}}
                <table class="table table-bordered table-stripped">
                  <tbody>
                  <tr>
                    <td></td>
                    <td> <input type="checkbox" name="chktodas[]"> <label for="chkTodas">Marcar todas no leidas</label></td>
                  </tr>
                  
                    @foreach ($readNotifications as $rn)                   
                          <tr>
                            <td> {{ $rn->data[0]['mensaje'] }}</td>
                            <td> <input type="checkbox" name="chknotl[{{$rn->id}}]" id="chk_{{$rn->id}}" class="checkleido" value="{{$rn->id}}"> <label for="chknotl"> Marcar como no leida</label></td>                    
                          </tr>                     
                    @endforeach  
                </tbody>              
              </table>
             
            @endif
        </div>

        <div class="col-md-6 col-sm-6">
            <h3 class="text-center alert-danger text-white">No leídas</h3>
            @if ($unreadNotifications->count())              
                {{-- {!! csrf_field() !!} --}}
                  <table class="table table-bordered table-stripped">
                    <tr>
                      <td></td>
                      <td> <input type="checkbox" name="chktodas[]"> <label for="chkTodas">Marcar todas leidas</label></td>
                    </tr>
                    <tbody>
                        @foreach ($unreadNotifications as $urn)                          
                              <tr>
                                <td> {{ $urn->data[0]['mensaje'] }}</td>
                                <td> <input type="checkbox" name="chknot[{{$urn->id}}]" id="chk_{{$urn->id}}" class="checknoleido" value="{{$urn->id}}"> <label for="chknot"> Marcar como leida</label></td>                    
                              </tr>
                         
                        @endforeach  
                    </tbody>              
                  </table>              
            @endif
        </div>

    </div>
</div>


@endsection


@section('js')

<script type="text/javascript">

    jQuery(document).ready(function () 
    { 

      $('.checknoleido').change(function() {

        var notificacion_id =$(this).val();
        var token = '{{csrf_token()}}';
        var data={id:notificacion_id,_token:token}; 

        if(this.checked) {
          //marcar como leido
          // alert($(this).val());
            $.ajax({
                type: "patch",
                url:"notificaciones/read/"+ notificacion_id,
                data: data,
                success: function (data) {
                    console.log('ok');
                    window.location.href = "notificaciones";
                }
            });
        }
        

      });


      $('.checkleido').change(function() {

        var notificacion_id =$(this).val();
        var token = '{{csrf_token()}}';
        var data={id:notificacion_id,_token:token};

        if(this.checked) {
          //marcar como no leido
          $.ajax({
              type: "patch",
              url:"notificaciones/unread/"+ notificacion_id,
              data: data,
              success: function (data) {
                  console.log('ok');
                  window.location.href = "notificaciones";
              }
          });
        }
          

      });
    
    });
  
</script>

   
@stop

