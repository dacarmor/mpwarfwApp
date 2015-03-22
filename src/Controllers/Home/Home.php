<?php

namespace Controllers\Home;

use Controllers\Login\Login;
use Mpwarfw\Component\BaseController\BaseController;
use Mpwarfw\Component\Templating\TwigTemplate;
use Mpwarfw\Component\Response\HttpResponse;
use Mpwarfw\Component\Request\Request;
use Mpwarfw\Component\Container\Container;

class Home extends BaseController {

    private $request;
    private $view;
    
    public function __construct( Request $request ) {

        $this->request = $request;
        $container  = new Container();
        $this->view = $container->get( 'Twig' );

    }

    public function build( $params = null ) {

        $session_user = $this->request->session->getValue( 'user' );

        if ( !empty( $session_user ) ) {

            $values = array(
                'user'    => $this->request->session->getValue( 'user' ),
                'name'    => $this->request->session->getValue( 'name' ),
                'surname' => $this->request->session->getValue( 'surname' )
            );
            $response = new HttpResponse( $this->view->render( 'Home/Home.twig.tpl', $values ) );

        }
        else {

            $goto = new Login( $this->request );
            $response = $goto->build();

        }
        
        return $response;

    }

}