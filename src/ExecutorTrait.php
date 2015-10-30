<?php

namespace BudgeIt\ComposerBuilder;

use BudgeIt\ComposerBuilder\Exceptions\BinaryNotFoundException;
use BudgeIt\ComposerBuilder\Exceptions\ProcessFailedException;
use Composer\IO\IOInterface;
use Composer\Util\ProcessExecutor;
use Symfony\Component\Process\ExecutableFinder;
use Symfony\Component\Process\Process;

trait ExecutorTrait
{

    protected $binaries = [];

    protected function findBinary($command)
    {
        if (!isset($this->binaries[$command])) {
            $this->binaries[$command] = (new ExecutableFinder())->find($command);
            if (!$this->binaries[$command]) {
                throw BinaryNotFoundException::create($command);
            }
        }
        return $this->binaries[$command];
    }

    protected function execute($command, array $args, IOInterface $io = null, $workingDirectory = null)
    {
        $processExecutor = new ProcessExecutor($io);
        array_unshift($args, $this->findBinary($command));
        $args = array_map([$processExecutor, 'escape'], $args);
        $outputHandler = function ($type, $data) use ($io) {
            if (!$io->isVerbose()) {
                return;
            }
            switch ($type) {
                case Process::ERR:
                    $io->writeError($data);
                    break;
                case Process::OUT:
                default:
                    $io->write($data);
                    break;
            }
        };
        $fullCommand = implode(' ', $args);
        if ($processExecutor->execute($fullCommand, $outputHandler, $workingDirectory) > 0) {
            throw ProcessFailedException::create($command, $fullCommand, $processExecutor->getErrorOutput());
        }
    }

}
