<?php

namespace BudgeIt\ComposerBuilder;

interface InstallerInterface
{

    /**
     * Get an identifier for this installer
     *
     * @return string
     */
    public function getName();

}
