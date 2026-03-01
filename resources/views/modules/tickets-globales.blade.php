<x-slide.section title="Tickets Globales">

<x-slide.table :headers="[
  'Agente','Asignados','Cerrados','1ra Resp.','Espera Cliente',
  'En Curso','Pendiente'
]">

{{-- @foreach($tickets['agentes'] as $a)
<tr>
    <td class="p-2 font-semibold">{{ $a['nombre'] }}</td>
    <td class="p-2 text-center">{{ $a['asignados'] }}</td>
    <td class="p-2 text-center">{{ $a['cerrados'] }}</td>
    <td class="p-2 text-center">{{ $a['primera_respuesta'] }}</td>
    <td class="p-2 text-center">{{ $a['espera_cliente'] }}</td>
    <td class="p-2 text-center">{{ $a['en_curso'] }}</td>
    <td class="p-2 text-center">{{ $a['pendiente'] }}</td>
</tr>
@endforeach --}}
@isset($tickets['agentes'])
    @foreach($tickets['agentes'] as $a)
        <tr>
            <td class="p-2 font-semibold">{{ $a['nombre'] }}</td>
            <td class="p-2 text-center">{{ $a['asignados'] }}</td>
            <td class="p-2 text-center">{{ $a['cerrados'] }}</td>
            <td class="p-2 text-center">{{ $a['primera_respuesta'] }}</td>
            <td class="p-2 text-center">{{ $a['espera_cliente'] }}</td>
            <td class="p-2 text-center">{{ $a['en_curso'] }}</td>
            <td class="p-2 text-center">{{ $a['pendiente'] }}</td>
        </tr>
    @endforeach
@endisset

{{-- <tr class="font-bold border-t">
    <td class="p-2">Totales</td>
    <td class="p-2 text-center">{{ $tickets['totales']['asignados'] }}</td>
    <td class="p-2 text-center">{{ $tickets['totales']['cerrados'] }}</td>
    <td class="p-2 text-center">{{ $tickets['totales']['primera_respuesta'] }}</td>
    <td class="p-2 text-center">{{ $tickets['totales']['espera_cliente'] }}</td>
    <td class="p-2 text-center">{{ $tickets['totales']['en_curso'] }}</td>
    <td class="p-2 text-center">{{ $tickets['totales']['pendiente'] }}</td>
</tr> --}}
@isset($tickets['totales'])
<tr class="font-bold border-t">
    <td class="p-2">Totales</td>
    <td class="p-2 text-center">{{ $tickets['totales']['asignados'] }}</td>
    <td class="p-2 text-center">{{ $tickets['totales']['cerrados'] }}</td>
    <td class="p-2 text-center">{{ $tickets['totales']['primera_respuesta'] }}</td>
    <td class="p-2 text-center">{{ $tickets['totales']['espera_cliente'] }}</td>
    <td class="p-2 text-center">{{ $tickets['totales']['en_curso'] }}</td>
    <td class="p-2 text-center">{{ $tickets['totales']['pendiente'] }}</td>
</tr>
@endisset

</x-slide.table>
</x-slide.section>