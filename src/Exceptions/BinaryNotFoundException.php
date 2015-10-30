<?php

namespace BudgeIt\ComposerBuilder\Exceptions;

class BinaryNotFoundException extends FileNotFoundException
{

    protected static $message = 'Could not find executable file %s';

}
