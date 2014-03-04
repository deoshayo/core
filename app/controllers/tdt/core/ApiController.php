<?php

namespace tdt\core;

/**
 * ApiController
 *
 * @copyright (C) 2011,2013 by OKFN Belgium vzw/asbl
 * @license AGPLv3
 * @author Jan Vansteenlandt <jan@okfn.be>
 */

class ApiController extends \Controller{

    protected $definition_repository;

    public function __construct(\repositories\interfaces\DefinitionRepositoryInterface $definition_repository){
        $this->definition_repository = $definition_repository;
    }

    public function handle($uri){

        $uri = ltrim($uri, '/');

        // Delegate the request based on the used http method
        $method = \Request::getMethod();

        switch($method){
            case "PUT":
                return $this->put($uri);
                break;
            case "GET":
                return $this->get($uri);
                break;
            case "POST":
            case "PATCH":
                return $this->patch($uri);
                break;
            case "DELETE":
                return $this->delete($uri);
                break;
            case "HEAD":
                return $this->head($uri);
                break;
            default:
                // Method not supported
                \App::abort(405, "The HTTP method '$method' is not supported by this resource.");
                break;
        }
    }

    public function get($uri){
        \App::abort(405, "The HTTP method '$method' is not supported by this resource.");
    }

    public function put($uri){
        \App::abort(405, "The HTTP method '$method' is not supported by this resource.");
    }

    public function patch($uri){
        \App::abort(405, "The HTTP method '$method' is not supported by this resource.");
    }

    public function head($uri){
        \App::abort(405, "The HTTP method '$method' is not supported by this resource.");
    }

    public function delete($uri){
        \App::abort(405, "The HTTP method '$method' is not supported by this resource.");
    }

}