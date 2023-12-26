@if ($mensajes->count())

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