{{-- 
  Componente Stepper - Vista Blade
  
  Mejora UX: Navegación de procesos multi-paso
  Cumple con heurística Nielsen #1: Visibilidad del estado
  
  Uso:
  <x-stepper :steps="$steps" :currentStep="$currentStep" :allowBacktrack="true" />
--}}

<div class="w-full bg-white px-6 py-8 border-b border-gray-200">
    {{-- Barra de progreso visual --}}
    <div class="mb-8">
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm font-medium text-gray-700">Progreso</span>
            <span class="text-sm font-semibold text-blue-600">{{ $getProgress() }}%</span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden">
            <div class="bg-blue-600 h-full rounded-full transition-all duration-300"
                 style="width: {{ $getProgress() }}%"></div>
        </div>
    </div>

    {{-- Pasos visuales --}}
    <div class="flex items-center justify-between">
        @foreach($steps as $index => $step)
            @php
                $stepNumber = $index + 1;
                $status = $getStepStatus($stepNumber);
                $isClickable = $allowBacktrack && $stepNumber < $currentStep;
            @endphp

            <div class="flex flex-col items-center {{ $index !== count($steps) - 1 ? 'flex-1' : '' }}">
                {{-- Círculo del paso --}}
                <button 
                    @if($isClickable) onclick="goToStep({{ $stepNumber }})" @endif
                    @if(!$isClickable) disabled @endif
                    class="
                        relative z-10 flex items-center justify-center
                        w-12 h-12 rounded-full font-semibold text-sm
                        transition-all duration-200 mb-2
                        @if($status === 'completed')
                            bg-green-500 text-white hover:bg-green-600 {{ $isClickable ? 'cursor-pointer' : 'cursor-default' }}
                        @elseif($status === 'current')
                            bg-blue-600 text-white ring-4 ring-blue-200 cursor-default
                        @else
                            bg-gray-200 text-gray-500 cursor-default
                        @endif
                    "
                    aria-label="Paso {{ $stepNumber }}: {{ $step['label'] }}"
                    aria-current="{{ $status === 'current' ? 'step' : 'false' }}">
                    @if($status === 'completed')
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    @else
                        {{ $stepNumber }}
                    @endif
                </button>

                {{-- Etiqueta del paso --}}
                <span class="text-xs font-medium text-center text-gray-700 max-w-[80px]">
                    {{ $step['label'] }}
                </span>
            </div>

            {{-- Línea conectora entre pasos --}}
            @if($index !== count($steps) - 1)
                <div class="flex-1 h-1 mx-2 mb-8 {{ $index < $currentStep - 1 ? 'bg-green-500' : 'bg-gray-300' }} rounded transition-colors duration-300"></div>
            @endif
        @endforeach
    </div>

    {{-- Información adicional --}}
    <div class="mt-6 text-center text-sm text-gray-600">
        Paso <span class="font-semibold text-blue-600">{{ $currentStep }}</span> 
        de <span class="font-semibold">{{ count($steps) }}</span>
    </div>
</div>

<script>
    function goToStep(stepNumber) {
        // Emitir evento o hacer post para cambiar de paso
        console.log('Ir a paso:', stepNumber);
        // Implementar según necesidad de la aplicación
    }
</script>

<style>
    /* Animación de progreso */
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    div[aria-label*="Paso"] {
        animation: slideIn 0.3s ease-out;
    }
</style>
