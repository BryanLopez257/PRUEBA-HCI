<?php

namespace App\View\Components;

use Illuminate\View\Component;

/**
 * Componente Breadcrumbs para Navegación Contextual
 * 
 * Mejora UX HCI-001: Visibilidad del estado del sistema
 * Ayuda al usuario a saber dónde está en la aplicación
 * 
 * @package App\View\Components
 */
class Breadcrumbs extends Component
{
    /**
     * Array de elementos del breadcrumb
     * 
     * @var array
     * Formato: [
     *   ['label' => 'Home', 'url' => '/'],
     *   ['label' => 'Dashboard', 'url' => '/dashboard'],
     *   ['label' => 'Pruebas', 'url' => null] // null = página actual
     * ]
     */
    public array $items;

    /**
     * Separador del breadcrumb
     * 
     * @var string
     */
    public string $separator;

    /**
     * Constructor del componente
     * 
     * @param array $items Items del breadcrumb
     * @param string $separator Separador (default: '/')
     */
    public function __construct(array $items = [], string $separator = '/')
    {
        $this->items = $items;
        $this->separator = $separator;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.breadcrumbs');
    }
}
