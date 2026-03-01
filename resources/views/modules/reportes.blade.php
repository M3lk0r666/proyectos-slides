<x-slide.section title="Reportes">
    <x-slide.table :headers="[
     'Item','Cliente','Responsable','Rev. Interna','Entrega','Rev. Cliente','Responsable Sesión'
    ]">
    @foreach($reportes as $r)
    <tr>
    <td class="p-2">{{ $r['item'] }}</td>
    <td class="p-2">{{ $r['cliente'] }}</td>
    <td class="p-2">{{ $r['responsable_elaboracion'] }}</td>
    <td class="p-2">{{ $r['fecha_revision_interna'] }}</td>
    <td class="p-2">{{ $r['fecha_entrega_cliente'] }}</td>
    <td class="p-2">{{ $r['fecha_revision_cliente'] }}</td>
    <td class="p-2">{{ $r['responsable_sesion'] }}</td>
    </tr>
    @endforeach
    </x-slide.table>
    </x-slide.section>