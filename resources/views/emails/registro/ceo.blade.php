@component('mail::message')
# Tenemos un nuevo inscrito

<ul>
    <li>Restaurante: {{$datos->datos->restaurante}}</li>
    <li>Contacto: {{$datos->datos->contacto}}</li>
    <li>Email: {{$datos->datos->email}}</li>
    <li>Teléfono: {{$datos->datos->telefono}}</li>
</ul>


Gracias,<br>
{{ config('app.name') }}
@endcomponent
