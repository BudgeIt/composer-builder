<?php

namespace BudgeIt\ComposerBuilder\Exceptions;

class BinaryNotFoundException extends FileNotFoundException
{

    protected static $file_not_found_message = 'Could not find executable file %s';

}
