<?php

namespace BudgeIt\ComposerBuilder;

use Symfony\Component\Process\ProcessBuilder;

trait ProcessBuilderTrait
{

    /** @var ProcessBuilder */
    protected $processBuilder;

    /**
     * @return ProcessBuilder
     */
    public function getProcessBuilder()
    {
        return $this->processBuilder;
    }

    /**
     * @param ProcessBuilder $processBuilder
     *
     * @return $this
     */
    public function setProcessBuilder(ProcessBuilder $processBuilder)
    {
        $this->processBuilder = $processBuilder;

        return $this;
    }

}
