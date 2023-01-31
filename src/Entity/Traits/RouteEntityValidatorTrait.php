<?php

namespace MbcApiContent\Entity\Traits;


trait RouteEntityValidatorTrait
{

    /**
     * validateControllerName($routeModelAsArray['controllerName'], self::DEFAULT_NAMESPACE)
     * return null : not set, false: invalid format, true: well formated
     *
     * @param string|null $controllerName
     * @param string $default_namespace
     * @param bool $throwException
     * @return bool
     * @throws \Exception
     */
    public function validateControllerName(?string $controller_name, string $default_namespace, bool $throwException = false) : bool
    {

        if (!is_null($controller_name)) {

            if (!\str_contains($controller_name, '\\')) {
                $controller_name = $default_namespace . $controller_name;
            }

            $validate = class_exists($controller_name);

            if($throwException && !$validate)
            {
                throw new \Exception('controller not found at ' . $controller_name );
            }

            return $validate;
        }
        return true;
    }


    /**
     * validateControllerAction($routeModelAsArray['controller_name'], $routeModelAsArray['controller_action'], self::DEFAULT_NAMESPACE)
     * return null : not set, false: invalid format, true: well formated
     *
     * @param string|null $controller_name
     * @param string|null $controller_action
     * @param string $default_namespace
     * @param bool $throwException
     * @return bool
     * @throws \Exception
     */
    public function validateControllerAction(?string $controller_name, ?string $controller_action, string $default_namespace, bool $throwException = false) : bool
    {

        if (!is_null($controller_name) && !is_null($controller_action)) {

            if (!\str_contains($controller_name, '\\')) {
                $controller_name = $default_namespace . $controller_name;
            }

            $validate = method_exists($controller_name, $controller_action);

            if($throwException && !$validate)
            {
                throw new \Exception('controller action not found at ' . $controller_name.'@'.$controller_action );
            }

            return $validate;
        }
        return true;
    }





}

