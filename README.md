# PHP Singleton Trait #

A singleton trait variant that can accept a variable-length argument list in
the constructor. Prevents direct/indirect attempts to reinstatiate.

Does not itself include the __construct method. Any class using the trait must
implement a private __construct method. (See example below.)

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
    private $args;

    /**
     * Accepts a variable-length argument list into the constructor.
     *
     * @return void
     */
    private function __construct($args)
    {
        $this->args = (array) $args;
    }

    // Example method that uses the $args array
    public function doSomethingWith($someValue)
    {
        echo "Doing something with ";
        foreach ( $this->args as $arg ) {
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

$inst = SingletonInstance::getInstance("arg1", "arg2");

$testMessage = $inst->doSomethingWith("someOtherValue");
// → Doing something with arg1 arg2 and someOtherValue.

```


Attempts to create a new instance will fail (because it's a singleton):

```
<?php

$inst2 = new SingletonInstance("an attempted 2nd SingletonInstance");
// → Fatal error: Call to private SingletonInstance::__construct()

```
