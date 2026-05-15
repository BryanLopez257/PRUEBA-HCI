<?php

namespace App\View\Components;

use Illuminate\View\Component;

/**
 * Componente Stepper para Procesos Multi-paso
 * 
 * Mejora UX HCI-002: Control del usuario y navegación clara
 * Permite al usuario entender su progreso en un proceso
 * 
 * @package App\View\Components
 */
class Stepper extends Component
{
    /**
     * Pasos del proceso
     * 
     * @var array
     * Formato: [
     *   ['number' => 1, 'label' => 'Básico', 'icon' => 'info'],
     *   ['number' => 2, 'label' => 'Participantes', 'icon' => 'users'],
     *   ['number' => 3, 'label' => 'Tareas', 'icon' => 'tasks']
     * ]
     */
    public array $steps;

    /**
     * Paso actual (1-indexed)
     * 
     * @var int
     */
    public int $currentStep;

    /**
     * Permitir navegación hacia atrás
     * 
     * @var bool
     */
    public bool $allowBacktrack;

    /**
     * Constructor del componente
     * 
     * @param array $steps Pasos del stepper
     * @param int $currentStep Paso actual (default: 1)
     * @param bool $allowBacktrack Permitir ir a pasos anteriores
     */
    public function __construct(array $steps, int $currentStep = 1, bool $allowBacktrack = true)
    {
        $this->steps = $steps;
        $this->currentStep = $currentStep;
        $this->allowBacktrack = $allowBacktrack;
    }

    /**
     * Determinar estado de un paso
     * 
     * @param int $stepNumber Número del paso
     * @return string Estado: 'completed', 'current', 'pending'
     */
    public function getStepStatus(int $stepNumber): string
    {
        if ($stepNumber < $this->currentStep) {
            return 'completed';
        } elseif ($stepNumber === $this->currentStep) {
            return 'current';
        } else {
            return 'pending';
        }
    }

    /**
     * Calcular porcentaje de progreso
     * 
     * @return int Porcentaje completado (0-100)
     */
    public function getProgress(): int
    {
        $completed = max(0, $this->currentStep - 1);
        $total = count($this->steps);
        return $total > 0 ? round(($completed / $total) * 100) : 0;
    }

    public function render()
    {
        return view('components.stepper');
    }
}
