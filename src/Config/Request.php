<?php namespace Config;

class Request
{
    private $controller;
    private $method;
    private $parameters;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $requestMethod = $this->getRequestMethod();

        $url = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL);


        /**
         * Apache:
         * $url = filter_input(INPUT_GET, 'REQUEST_METHOD', FILTER_SANITIZE_URL);
         *
         * Otro:
         * $url = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL);
         */

        /**
         * La función filter_input() obtiene una variable externa y opcionalmente la filtra.
         * Esta función se utiliza para validar las variables de fuentes inseguras, como la entrada de un usuario.
         */

        //esto tambien tuve que agregar para que me direccione correctamente al login
        $url = str_replace('GoToEvent', '', $url);



        $urlToArray = explode("/", $url);


        /**
         * Devuelve un array de string, siendo cada uno un substring del segundo parametro pasado formado
         * por la división realizada por los delimitadores indicados en el primer paramtro.
         */

        /**
         * echo '<pre>';
         * print_r($ArregloUrl);
         * echo '</pre>';
         */

        $arrayUrl = array_filter($urlToArray);
        /**
         * Filtra elementos de un array usando una función de devolución de llamada.
         * Recorre cada valor de array, pasándolos a la función callback.
         * Si la función callback devuelve true, el valor actual desde array es devuelto al array resultante.
         * Las claves del array se conservan.
         */

        if (empty($arrayUrl)) {
            // Si Arreglo Url esta vacio, cargo el controlador por defecto y  cargo el index por defecto.
            $this->controller = 'view';
            $this->method = 'index';
        } else {
            // Quito el primer elemento del array y lo uso como controlador y el segundo lo uso como metodo
            $this->controller = ucwords(array_shift($arrayUrl));
            $this->method = array_shift($arrayUrl);
        }

        if ($requestMethod == 'GET') {
            if (!empty($arrayUrl)) {
                $this->parameters = $arrayUrl;
            }
        } else {
            if (!empty($_POST)) {
                $this->parameters = $_POST;
            }
        }
    }

    /**
     * Devuelve el método HTTP
     * con el que se hizo el
     * Request
     *
     * @return String
     */
    public static function getRequestMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * Devuelve el controlador
     * con el que se hizo el
     * Request
     *
     * @return String
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Devuelve el método
     * con el que se hizo el
     * Request
     *
     * @return String
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Devuelve los atributos
     * con el que se hizo el
     * Request
     *
     * @return /Array
     */
    public function getParameters()
    {
        return $this->parameters;
    }
}
