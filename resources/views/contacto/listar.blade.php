<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Correo</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contactos as $contacto)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $contacto['nombres'] }}</td>
            <td>{{ $contacto['apellidos'] }}</td>
            <td>{{ $contacto['correo'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>