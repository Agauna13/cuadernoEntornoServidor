<?php

namespace App\View\Components;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;


class ProductoCard extends Component
{

    public $nombre;
    public $precio;
    public $descripcion;
    /**
     * Create a new component instance.
     */

    /*public function __construct($nombre, $precio, $descripcion)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
    }*/

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.producto-card');
    }
}
