<?php

namespace BudgeIt\ComposerBuilder\Exceptions;

use Exception;

class ProcessFailedException extends Exception
{

    protected static $messageLineTop = 'Process for %s failed!';
    protected static $messageLineFullCommand = 'Full command run: %s';
    protected static $messageLineErrorText = "Error output:\n\n%s";

    public static function create($command, $fullCommand = null, $errorText = null)
    {
        $message = sprintf(static::$messageLineTop, $command);
        if ($fullCommand) {
            $message .= "\n  " . sprintf(static::$messageLineFullCommand, $fullCommand);
        }
        if ($errorText) {
            $message .= "\n  " . sprintf(static::$messageLineErrorText, $errorText);
        }
        return new static($message);
    }

}
