<?php

namespace MainNamespace\App\Entity\Traits;

use Illuminate\Support\Facades\Validator;

trait HydrateEntityTrait
{

    public function assignProp($modelAsArray) : array
    {
        return array_combine(
            array_keys($modelAsArray),
            array_map(
                function($key, $value) {

                    $oldValue = isset($this->$key) ? $this->$key : null;

                    if(empty(($value)))
                    {
                        $value = $oldValue;
                    }

                    $this->$key =  $value;

                    return $value;
                },
                array_keys($modelAsArray),
                array_values($modelAsArray)
            )
        );
    }


    public function cleanProp(mixed $newValue, \Closure $callable) : mixed
    {
        return $callable($newValue);
    }






    /**
     * @param array $arrayToValidate
     * @param array $rules
     * @param bool $throwException
     * @return bool
     * @throws \Exception
     */
    public function validate(array $arrayToValidate, array $rules, bool $throwException = false) : bool
    {
        $validator = Validator::make($arrayToValidate, $rules); // ->validate();

        if ($validator->fails()) {
            if($throwException)
            {
                throw new \Exception('Error validating : ' .json_encode($validator->errors()));
            }
            return false;
        } else {
            return true;
        }
    }


//    public function __get(string $key) : mixed
//    {
//        if( !isset($this->$key) ){
//            return "null";
//        } else {
//            return $this->$key;
//        }
//    }
//
//
//    public function __set(string $key, mixed $value): void
//    {
//        $this->$key = $value;
//    }
//
//
//    public function __isset(string $key) : bool
//    {
//        return isset($this->$key);
//    }
//
//
//
//    public function __call($method, $arguments)
//    {
//        $snakeName = Str::snake($method);
//        // get set has
//        $subMethod = substr($snakeName, 0, 3);
//        // prop
//        $propertyName = substr($snakeName, 4);
//
//        switch ($subMethod) {
//            case "get":
//                return $this->$propertyName;
//            case "set":
//                $this->$propertyName = $arguments[0];
//                break;
//            case "has":
//                return isset($this->$propertyName);
//            default:
//                throw new \Exception("Undefined method $method");
//        }
//    }


}

