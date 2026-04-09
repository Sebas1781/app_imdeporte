@props(['documentos' => [], 'categoria', 'color' => '#7B2D8E'])

<div class="space-y-6">
    {{-- Cabecera con título de categoría --}}
    <div class="flex items-center justify-between">
        <h3 class="text-2xl font-bold text-gray-800">
            {{ $categoria->nombre }} — Trámites y Servicios
        </h3>
    </div>

    {{-- Buscador --}}
    <div>
        <input type="text" 
               id="search-tramites" 
               placeholder="Buscar trámite..."
               class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[{{ $color }}] focus:border-transparent transition">
    </div>

    {{-- Tabla de Documentos --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full">
            <thead style="background-color: {{ $color }};">
                <tr>
                    <th class="text-center px-6 py-4 font-semibold text-white text-sm w-12">#</th>
                    <th class="text-left px-6 py-4 font-semibold text-white text-sm">Trámite / Servicio</th>
                    <th class="text-right px-6 py-4 font-semibold text-white text-sm w-24">Archivo</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100" id="documentos-tbody">
                @forelse($documentos as $index => $doc)
                <tr class="hover:bg-gray-50 transition documento-row-public">
                    {{-- # --}}
                    <td class="text-center px-6 py-4 text-gray-600 font-semibold text-sm">
                        {{ $index + 1 }}
                    </td>

                    {{-- Título --}}
                    <td class="text-left px-6 py-4">
                        <p class="font-medium text-gray-800 text-sm">{{ $doc->nombre }}</p>
                    </td>

                    {{-- Ver (Botón) --}}
                    <td class="text-right px-6 py-4">
                        <a href="{{ $doc->archivo }}" 
                           target="_blank" 
                           rel="noopener"
                           style="background-color: {{ $color }};"
                           class="inline-flex items-center gap-2 text-white font-semibold py-2 px-4 rounded-lg text-sm transition hover:opacity-90">
                            <i class="fas fa-file-alt text-sm"></i> Ver
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-6 py-16 text-center text-gray-400">
                        <i class="fas fa-file text-3xl mb-3 block text-gray-200"></i>
                        <p class="font-medium">No hay trámites disponibles.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
    const searchInput = document.getElementById('search-tramites');
    const documentoRows = document.querySelectorAll('.documento-row-public');

    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            documentoRows.forEach(row => {
                const title = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                if (title.includes(searchTerm) || searchTerm === '') {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }

    function closeCategory() {
        // Scroll suave hacia arriba
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
</script>
