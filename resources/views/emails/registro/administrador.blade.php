@component('mail::message')
# Hola {{$datos->datos->contacto}},

<p>Gracias por inscribirte a ElGranMenu</p>
<p>Ahora uno de nuestros asesores te contactará para contarte todos los detalles, y empezar a usar nuestra plataforma.</p>
<p>Te recomendamos estar pendiente de tu email (revisar el spam) y del teléfono que inscribiste.</p>
<br/>
<p>Siempre estaremos atentos a tus comentarios en <i>lanzamiento@elgranmenu.com</i></p>
<br/>
<!--@component('mail::button', ['url' => ''])
Button Text
@endcomponent-->

Cordialmente, <br/>
<b>Equipo {{ config('app.name') }}</b>
@endcomponent
