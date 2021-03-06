<?php

trait SingletonTrait
{

    /**
     * @var reference to singleton instance
     */
    private static $instance;
    
    /**
     * Creates a new instance of a singleton class (via late static binding),
     * accepting a variable-length argument list.
     *
     * @return self
     */
    final public static function getInstance()
    {
        if ( !isset(static::$instance)) {

            static::$instance = new static(func_get_args());
        }

        return static::$instance;
    }

    /**
     * Prevents cloning the singleton instance.
     *
     * @return void
     */
    final private function __clone() {}

    /**
     * Prevents unserializing the singleton instance.
     *
     * @return void
     */
    final private function __wakeup() {}

}
