<?php

    function estructurarObjeto($objeto_stdclass, $clase) {
        $objeto = new $clase();

        $reflectionClass = new ReflectionClass($clase);
        $properties = $reflectionClass->getProperties();

        foreach ($properties as $property) {
            $property_name = $property->getName();
            $setter_method = 'set' . ucfirst($property_name);

            if (method_exists($objeto, $setter_method) && isset($objeto_stdclass->$property_name)) {
                $objeto->$setter_method($objeto_stdclass->$property_name);
            }
        }

        return $objeto;
    }
