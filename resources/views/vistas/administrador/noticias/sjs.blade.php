@php
    $tags = old('tags', isset($noticiaEdit) ? explode(',', $noticiaEdit->etiquetas) : []);
@endphp

<div>
    <label class="block text-sm font-medium text-slate-400 mb-3">Etiquetas (Tags)</label>
    <div
        class="tags-container flex flex-wrap items-center gap-3 p-4 rounded-xl bg-slate-800/70 border-2 border-slate-700 focus-within:ring-4 focus-within:ring-indigo-500/20 transition-all duration-300 hover:border-slate-600"
        id="tags-box">

        @foreach($tags as $tag)
            @php $tag = trim($tag); @endphp
            <span class="tag-item px-3 py-1.5 rounded-lg text-xs font-medium bg-indigo-900/40 text-indigo-300 flex items-center gap-1 border border-indigo-800/50">
                <i class="fas fa-tag text-indigo-400 text-[10px]"></i>
                <span>{{ $tag }}</span>
                <button type="button" class="ml-1.5 text-indigo-400 hover:text-indigo-200 text-xs">
                    <i class="fas fa-times"></i>
                </button>
            </span>
        @endforeach

        <input type="text" id="tag-input" placeholder="Escribe y presiona Enter..."
               class="tag-input flex-1 min-w-[120px] bg-transparent text-sm text-slate-300 placeholder-slate-500 py-1 outline-none">
    </div>
    <p class="mt-2 text-xs text-slate-500">Añade hasta 10 etiquetas para mejorar la clasificación</p>
</div>
