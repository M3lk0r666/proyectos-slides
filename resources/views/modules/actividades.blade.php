{{-- <x-slide.section title="Actividades del Proyecto">
    <x-slide.table :headers="[
        'Item','Actividad','Descripción','Estado','Dateline','Comentarios','Responsable'
        ]">
        @foreach($actividades as $a)
        <tr>
            <td class="p-2">{{ $a['item'] }}</td>
            <td class="p-2">{{ $a['tema'] }}</td>
            <td class="p-2">{{ $a['descripcion'] }}</td>
            <td class="p-2">{{ $a['estado'] }}</td>
            <td class="p-2">{{ $a['dateline'] }}</td>
            <td class="p-2">{{ $a['comentarios'] }}</td>
            <td class="p-2">{{ $a['responsable'] }}</td>
        </tr>
        @endforeach
    </x-slide.table>
</x-slide.section> --}}
@isset($actividades)
<x-slide.section title="Actividades del Proyecto">
    <x-slide.table :headers="[ 'Item','Actividad','Descripción','Estado','Dateline','Comentarios','Responsable' ]">
        @foreach($actividades as $a)
            <tr>
                <td class="p-2">{{ $a['item'] }}</td>
                <td class="p-2">{{ $a['tema'] }}</td>
                <td class="p-2">{{ $a['descripcion'] }}</td>
                <td class="p-2">{{ $a['estado'] }}</td>
                <td class="p-2">{{ $a['dateline'] }}</td>
                <td class="p-2">{{ $a['comentarios'] }}</td>
                <td class="p-2">{{ $a['responsable'] }}</td>
            </tr>
        @endforeach
    </x-slide.table>
</x-slide.section>
@endisset