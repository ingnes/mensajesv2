<style type="text/css" scoped>
    @page {          
      margin: 3%;
      margin-top: 50px;      
    }

    body{
      font-family: 'Arial';
      font-size: 12px;
    }

    table tbody tr td, table thead tr th {
      border: 1px solid #000;
      padding: 10px;
    }

    table tbody tr td, table thead tr th {
      font-size: 12px;
    }   

    table{
      width: 100%;
      border-spacing: 0px;
    }      

    .text-center{
      text-align: center;
    }

    section{
      margin-bottom: 25px;
    }

    h1{
      font-size: 24px;
    }
  </style>


@if ($mensajes->count()) 

    <h1 class="text-center"> Mensajes </h1>

    <table>    
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Mensaje</th>                
            </tr>
        </thead>

        <tbody>       

            @foreach ($mensajes as $m)
                <tr>
                    <td>{{ $m->nombre }}</td>
                    <td>{{ $m->email }}</td>
                    <td>{{ $m->mensaje }}</td>                    
                </tr>
                        
            @endforeach
        
        </tbody>
    </table>

@else
    <table style="width:100%; border:1px solid">
        <tbody>
            <tr> No hay mensajes cargados </tr>
        </tbody>
    </table>

@endif