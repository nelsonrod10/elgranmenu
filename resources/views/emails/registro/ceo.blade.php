@component('mail::message')
# Un nuevo inscrito

<p>Se acaba de inscribir</p>
<ul>
    <li>Restaurante: {{$datos->datos->restaurante}}</li>
    <li>Contacto: {{$datos->datos->contacto}}</li>
    <li>Email: {{$datos->datos->email}}</li>
    <li>Teléfono: {{$datos->datos->telefono}}</li>
</ul>


Gracias,<br>
{{ config('app.name') }}
@endcomponent
