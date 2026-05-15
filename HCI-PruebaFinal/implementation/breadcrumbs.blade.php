{{-- 
  Componente Breadcrumbs - Vista Blade
  
  Mejora UX: Navegación contextual clara
  Cumple con heurística Nielsen #2: Mapeo sistema-realidad
  
  Uso:
  <x-breadcrumbs :items="$breadcrumbItems" separator="/" />
--}}

<nav aria-label="Breadcrumb" class="bg-white px-6 py-3 border-b border-gray-200">
    <ol class="flex items-center space-x-2 text-sm">
        @foreach($items as $index => $item)
            @if($item['url'])
                {{-- Elemento clickeable --}}
                <li>
                    <a href="{{ $item['url'] }}" 
                       class="text-blue-600 hover:text-blue-800 hover:underline transition-colors"
                       title="{{ $item['label'] }}">
                        {{ $item['label'] }}
                    </a>
                </li>
            @else
                {{-- Página actual (no clickeable) --}}
                <li class="text-gray-700 font-semibold" aria-current="page">
                    {{ $item['label'] }}
                </li>
            @endif

            {{-- Separador (excepto en último elemento) --}}
            @if($index < count($items) - 1)
                <li class="text-gray-400">{{ $separator }}</li>
            @endif
        @endforeach
    </ol>
</nav>

<style>
    /* Estilos para Breadcrumbs */
    nav[aria-label="Breadcrumb"] {
        background: linear-gradient(to right, #f9fafb, #ffffff);
    }

    nav[aria-label="Breadcrumb"] ol li a:hover {
        background-color: rgba(59, 130, 246, 0.1);
        border-radius: 4px;
        padding: 2px 4px;
    }

    /* Accesibilidad */
    nav[aria-label="Breadcrumb"] ol li a:focus {
        outline: 2px solid #0066cc;
        outline-offset: 2px;
        border-radius: 4px;
    }
</style>
