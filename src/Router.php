<?php
namespace App;

class Router {

    /**
     * @var string
     */
    private $viewPath;

    /**
     * @var AltoRouter
     */
    private $router;

    public function __construct(string $viewPath)
    {
        $this->viewPath = $viewPath;
        $this->router = new \AltoRouter();
    }

    public function get(string $url, string $view, ?string $name = null): self
    {
        $this->router->map('GET', $url, $view, $name);

        return $this;
    }

    public function post(string $url, string $view, ?string $name = null): self
    {
        $this->router->map('POST', $url, $view, $name);

        return $this;
    }

    public function match(string $url, string $view, ?string $name = null): self
    {
        $this->router->map('POST|GET', $url, $view, $name);

        return $this;
    }

    public function run(): self
    {
        $match = $this->router->match();
        $view = $match['target'];
        $router = $this->router;
        if( is_array($match) ){
            if (is_callable( $match['target'] ) ) {
                call_user_func_array( $match['target'], $match['params'] );
                return $this; 
            } else {
                ob_start();
                require  $this->viewPath . DIRECTORY_SEPARATOR . $view . '.php';

                $content = ob_get_clean();
                require $this->viewPath . DIRECTORY_SEPARATOR . 'autres/default.php';
                return $this;
            }
        } 
        return $this;
        
        
    }
}
