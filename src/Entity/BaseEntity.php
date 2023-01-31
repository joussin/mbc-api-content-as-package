<?php

namespace MbcApiContent\Entity;

use Illuminate\Support\Facades\Validator;
use MbcApiContent\Entity\Interfaces\EntityInterface;
use MbcApiContent\Models\ModelInterface;

abstract class BaseEntity implements EntityInterface
{


    public ?ModelInterface $model;


    public function __construct(ModelInterface $model)
    {
        $this->assignProp($model->toArray());

        $this->model = $model;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getModel(): ?ModelInterface
    {
        return $this->model;
    }

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


}