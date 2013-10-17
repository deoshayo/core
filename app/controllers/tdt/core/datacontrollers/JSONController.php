<?php

namespace tdt\core\datacontrollers;

use tdt\core\datasets\Data;
use Symfony\Component\HttpFoundation\Request;

/**
 * JSON Controller
 * @copyright (C) 2011,2013 by OKFN Belgium vzw/asbl
 * @license AGPLv3
 * @author Jan Vansteenlandt <jan@okfn.be>
 * @author Michiel Vancoillie <michiel@okfn.be>
 */
class JSONController implements IDataController {

    public function readData($source_definition, $parameters = null){

        $data = file_get_contents($source_definition->uri);

        if($data){

            $php_object = json_decode($data);

            $data_result = new Data();
            $data_result->data = $php_object;
            return $data_result;
        }

        \App::abort(452, "Can't get any (json) data from the given URI ($uri).");
    }
}