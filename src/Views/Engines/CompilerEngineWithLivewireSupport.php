<?php

namespace Facade\Ignition\Views\Engines;

use Livewire\ComponentConcerns\RendersLivewireComponents;
use Throwable;

class CompilerEngineWithLivewireSupport extends CompilerEngine
{
    use RendersLivewireComponents;

    protected function handleViewException(Throwable $e, $obLevel)
    {
        if ($this->shouldBypassExceptionForLivewire($e, $obLevel)) {
            PhpEngine::handleViewException($e, $obLevel);

            return;
        }

        parent::handleViewException($e, $obLevel);
    }
}
