<x-slide.section :title="'Tickets · ' . $agente['agente']">

    <x-slide.table :headers="[
      'Solicitante','Asunto','Ticket','Estatus','Responsable'
    ]">
    
    @foreach($agente['tickets'] as $t)
    <tr>
        <td class="p-2">{{ $t['solicitante'] }}</td>
        <td class="p-2">{{ $t['asunto'] }}</td>
        <td class="p-2">{{ $t['ticket'] }}</td>
        <td class="p-2">{{ $t['estatus'] }}</td>
        <td class="p-2">{{ $t['responsable'] }}</td>
    </tr>
    @endforeach
    
    </x-slide.table>
    </x-slide.section>