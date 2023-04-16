<?php


namespace App\Domain\DTO;

use Illuminate\Http\Request;
use ReflectionClass;
use ReflectionProperty;


abstract class DataTransferObject
{
    public function __construct(array $parameters = [])
    {
        $class = new ReflectionClass(static::class);

        foreach ($class->getProperties(ReflectionProperty::IS_PUBLIC) as $reflectionProperty) {
            $property = $reflectionProperty->getName();
            $this->{$property} = $parameters[$property];
        }
    }

    abstract public static function fromRequest(Request $request);
}
