<?php

namespace MainNamespace\App\Entity\Traits;

use MainNamespace\App\Entity\Interfaces\EntityInterface;

trait TemplateEntityParserTrait
{

    protected ?string $template_content = null;

    public function parse(EntityInterface $pageEntity, ?EntityInterface $templateEntity, bool $validateVariables = false) : ?string
    {
        if(is_null($templateEntity))
        {
            throw new \Exception('templateEntity param is null');
        }

        $templateData = $templateEntity->template_data;
        $templateInputData = $pageEntity->template_input_data;

        $this->template_content = is_null($templateEntity->template_content) ? null : $templateEntity->template_content;

        if(is_null($this->template_content ))
        {
            throw new \Exception('Html not found');
        }

        if($output = $this->parseAsArray($templateInputData, $templateData, $validateVariables) )
        {
            return $output;
        }
        return null;
    }


    public function parseAsArray(?array $templateInputData, ?array $templateData, bool $validateVariables = false) : ?string
    {
        if(!$validateVariables){
            if(is_array($templateInputData) &&  is_array($templateData)) {
                return $this->parseHtml($templateInputData);
            }
        }



//
//        else
//        {
//            $validateInputWithArray = $this->validateInputWithArray($pageInputDataAsArray, $templateDataAsArray);
//
//            if(is_array($pageInputDataAsArray) &&  is_array($templateDataAsArray) && $validateInputWithArray) {
//                return $this->parseHtml($pageInputDataAsArray);
//            }
//        }

        return null;
    }


    public function parseHtml(array $templateInputData) : ?string
    {
        $output = $this->template_content;

        foreach ($templateInputData as $key => $value)
        {
            $search = ["{{{$key}}}"];
            $replace =  [$value];
            $output = str_replace($search,$replace, $output);
        }

        return $output;
    }





//
//    public function validateInputWithArray(array $pageInputDataAsArray, array $templateData, bool $sameSize = false) : bool
//    {
//        if($sameSize && !(count($pageInputDataAsArray) == count($templateData)) ){
//            return false;
//        }
//        foreach ($templateData as $mandatoryKeys)
//        {
//            if( !array_key_exists($mandatoryKeys, $pageInputDataAsArray)){
//                return false;
//            }
//        }
//        return true;
//    }

}

