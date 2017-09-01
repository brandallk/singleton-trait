# README #

Singleton trait variant that can accept a variable-length argument list in
the constructor. Prevents direct/indirect attempts to reinstatiate.

Does not include a __construct method. A constructor located here could
not assign argument values to class properties.

Instantiating class must implement a private __construct method. (See example
below.)

## Example Usage:

```
<?php

class SingletonInstance
{
    use SingletonTrait;

    /**
     * The singleton instance's argument list.
     *
     * @var array
     */
    private $initArgs;

    /**
     * Accepts a variable-length argument list into the constructor.
     *
     * @return void
     */
    private function __construct($initArgs)
    {
        $this->initArgs = (array) $initArgs;
    }

    // Example method that uses the $initArgs array
    public function doSomethingWith($someValue)
    {
        echo "Doing something with ";
        foreach ( $this->initArgs as $arg ) {
            echo "{$arg} ";
        }
        echo " and {$someValue}.";
    }

}
```

Any number of arguments can be passed to the constructor when the
singleton is created:

```
<?php

$inst = SingletonInstance::getInstance("initArg1", "initArg2");

$testMessage = $inst->doSomethingWith("someOtherValue");
// → Doing something with initArg1 initArg2 and someOtherValue.

```


Attempts to create a new instance will fail (because it's a singleton):

```
<?php

$inst2 = new SingletonInstance("an attempted 2nd SingletonInstance");
// → Fatal error: Call to private SingletonInstance::__construct()

```
