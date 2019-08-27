<?php

namespace TickTackk\DeveloperTools\Test;

use ReflectionClass;
use ReflectionException;
use ReflectionObject;

/**
 * Trait PhpHelperTrait
 *
 * @package TickTackk\DeveloperTools\Test
 */
trait PhpHelperTrait
{
    /**
     * @param $object
     * @param string $name
     *
     * @return mixed
     * @throws ReflectionException
     */
    protected static function getPropertyAsPublic($object, string $name)
    {
        $class = new ReflectionClass($object);
        $property = $class->getProperty($name);
        $property->setAccessible(true);

        return $property->getValue($object);
    }

    /**
     * @param $object
     * @param string $name
     * @param $value
     * @throws ReflectionException
     */
    protected static function setInaccessibleProperty($object, string $name, $value) : void
    {
        $refObject = new ReflectionObject($object);
        $refProperty = $refObject->getProperty($name);
        $refProperty->setAccessible(true);
        $refProperty->setValue($object, $value);
    }
}