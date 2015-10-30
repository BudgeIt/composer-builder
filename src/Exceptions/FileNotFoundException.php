<?php

namespace BudgeIt\ComposerBuilder\Exceptions;

use Exception;

class FileNotFoundException extends Exception
{

    protected static $message = 'Could not find file %s';

    /**
     * @param $file
     * @return static
     */
    public static function create($file)
    {
        $message = sprintf(static::$message, $file);
        return new static($message);
    }

}
