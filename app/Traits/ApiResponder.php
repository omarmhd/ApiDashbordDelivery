<?php

namespace App\Traits;

use Illuminate\Http\Response;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

trait ApiResponder
{
    protected $responseArray = [];

    public function setSuccess($messageOrKey = null, int $code = Response::HTTP_OK)
    {
        $this->setStatus(true, $code, $messageOrKey);
        return $this;
    }

    public function setError($messageOrKey = 'Status Message', int $code = Response::HTTP_OK)
    {
        $this->setStatus(false, $code, $messageOrKey);
        return $this;
    }

    protected function setStatus($success = TRUE, $code = 0, $messageOrKey = 'Status Message')
    {
        $status = array();
        if (is_bool($success)) $status['status']['success'] = $success;
        if (is_int($code)) $status['status']['code'] = $code;
        if (!is_null($messageOrKey) && is_string($messageOrKey)) $status['message'] = $messageOrKey;
        if (count($status)) {
            $this->addResponseArray($status);
        }
        return $this;
    }

    public function addItem($resource = null, $key = "data")
    {
        $this->addResponseArray([$key => $resource]);
        return $this;
    }

    public function addResponseArray($arr = NULL)
    {

        if ($arr && count($arr)) {
            $this->responseArray = array_merge($this->responseArray, $arr);
        }
        return $this;
    }

    private function addPagination($paginator)
    {
        $p = new IlluminatePaginatorAdapter($paginator);
        $pagination = $p->getPaginator()->toArray();
        unset($pagination['data']);

        $this->addResponseArray(['pagination' => $pagination]);
        return $this;
    }
    public function addValidationErrors($condition, \Closure $closure)
    {
        if ($condition) {
            $errors = [];

            foreach ($closure() as $key => $value) {
                $errors[$key] = $value[0];
            }

            $this->responseArray['status']['errors'] = $errors;
        }
        return $this;
    }
    public function getResponse()
    {
        return new Response($this->responseArray);
    }
}
