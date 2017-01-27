<?php

namespace BudgeIt\ComposerBuilder\Exceptions;

use Exception;

class FileNotFoundException extends Exception
{

    protected static $file_not_found_message = 'Could not find file %s';

    /**
     * @param $file
     * @return static
     */
    public static function create($file)
    {
        $message = sprintf(static::$file_not_found_message, $file);
        return new static($message);
    }

}
