<div class="space-y-4">
    <div>
        <label class="block font-semibold">Slug</label>
        <input type="text" name="slug"
               value="{{ old('slug', $presentation->slug ?? '') }}"
               class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="block font-semibold">Título</label>
        <input type="text" name="titulo"
               value="{{ old('titulo', $presentation->titulo ?? '') }}"
               class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="block font-semibold">Subtítulo</label>
        <input type="text" name="subtitulo"
               value="{{ old('subtitulo', $presentation->subtitulo ?? '') }}"
               class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="block font-semibold">Periodo</label>
        <input type="text" name="periodo"
               value="{{ old('periodo', $presentation->periodo ?? '') }}"
               class="w-full border rounded px-3 py-2">
    </div>
</div>