<?php

namespace BudgeIt\ComposerBuilder\Installers;

use BudgeIt\ComposerBuilder\InstallerInterface;

class Npm implements InstallerInterface
{

    /**
     * Get an identifier for this installer
     *
     * @return string
     */
    public function getName()
    {
        return 'npm';
    }

}
