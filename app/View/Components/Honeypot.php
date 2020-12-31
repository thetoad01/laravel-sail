<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Honeypot extends Component
{
    var $fieldName, $fieldTimeName;

    public function __construct()
    {
        $this->fieldName = config('honeypot.field_name');
        $this->fieldTimeName = config('honeypot.field_time_name');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return <<<'blade'
            <div class="hidden">
                <input type="text" name="{{ $fieldName }}" id="{{ $fieldName }}">
                <input type="text" name="{{ $fieldTimeName }}" id="{{ $fieldTimeName }}" value="{{ microtime(true) }}" required>
            </div>
        blade;
    }
}
