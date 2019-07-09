<?php
/**
 * 路由基础类
 *
 *
 */

namespace Fast\Main;


class Router
{
    const METHOD_GET = "get";
    const METHOD_POST = "post";
    const METHOD_PUT = "put";
    const METHOD_PATCH = "patch";
    const METHOD_DELETE = "delete";

    protected static $request = [];
    protected static $query = [];
    protected $method;

    protected function __construct()
    {
        // 请求路径+请求参数
        $path = parse_url($_SERVER['REQUEST_URI'])['path'];
        if (!empty($path)) {
            $path = explode('/', $path);
            $path = array_filter($path, function ($e) {
                $e = empty($e) ? false : $e;
                return $e;
            });
        }
        self::$request = $path;

        // 请求方式
        switch ($_SERVER['REQUEST_METHOD']) {
            case "GET":
                $this->method = self::METHOD_GET;
                break;
            case "POST":
                $this->method = self::METHOD_POST;
                break;
            case "PUT":
                $this->method = self::METHOD_PUT;
                break;
            case "PATCH":
                $this->method = self::METHOD_PATCH;
                break;
            case "DELETE" :
                $this->method = self::METHOD_DELETE;
                break;
            default:
                //todo: exception
                break;
        }

        // 请求参数
        if (!empty($_SERVER['QUERY_STRING'])) {
            parse_str($_SERVER['QUERY_STRING'], $query);
            self::$query = $query;
        }
    }

    /**
     * @return Router
     */
    public static function getInstance()
    {
        if (($object = Register::getSys(__CLASS__)) === false) {
            $object = new self();
            Register::setSys(__CLASS__, $object);
        }

        return $object;
    }

    public function request()
    {
    }

    public function obj()
    {
    }

    /**
     *
     * @return string
     */
    public function objFunc()
    {

    }
}