<?php

namespace BudgeIt\ComposerBuilder;

interface BuildToolInterface
{

    /**
     * Get an identifier for this build tool
     *
     * @return string
     */
    public function getName();

}
