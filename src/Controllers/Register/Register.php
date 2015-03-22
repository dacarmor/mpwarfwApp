<?php

namespace Controllers\Register;

use Mpwarfw\Component\BaseController\BaseController;
use Mpwarfw\Component\Templating\TwigTemplate;
use Mpwarfw\Component\Response\HttpResponse;
use Mpwarfw\Component\Request\Request;
use Mpwarfw\Component\Container\Container;

class Register extends BaseController {

    private $request;
    private $view;
    private $db;
    
    public function __construct( Request $request ) {

        $this->request = $request;
        $container  = new Container();
        $this->db   = $container->get( 'Database' );
        $this->view = $container->get( 'Twig' );

    }

    public function build() {

        $name = $this->request->session->getValue( 'name' );

        if ( !empty( $name ) ) {

            header( 'location: /profile' );

        }
        else {

            $params = $this->request->post;
            $user_data = array(
                'user'      => $params->getValue( 'user' ),
                'password'  => $params->getValue( 'password' ),
                'password2' => $params->getValue( 'password2' ),
                'name'      => $params->getValue( 'name' ),
                'surname'   => $params->getValue( 'surname' )
            );

            if ( !$this->isRegistered( $user_data['user'] ) && $this->register( $user_data ) ) {

                $this->request->session->setValue( $user_data['user'], 'user' );
                $this->request->session->setValue( $user_data['name'], 'name' );
                $this->request->session->setValue( $user_data['surname'], 'surname' );
                header( 'location: /' );

            }

            else {

                $response = new HttpResponse( $this->view->render( 'Register/Register.twig.tpl', array( 'datetime' => date( 'H:i\h' ) ) ) );

            }

        }

        return $response;

    }

    private function register( $user_data ) {

        foreach( $user_data as $data ) {

            if ( $data == '' ) return false;

        }

        if ( $user_data['password'] != $user_data['password2'] ) {

            return false;

        }

        else {

            unset( $user_data['password2'] );
            return $this->db->insert( 'Users' , $user_data );

        }

    }

    private function isRegistered( $user ) {

        return $this->db->select( 'SELECT * FROM Users WHERE user=:user LIMIT 1', array( 'user' => $user ) );

    }

}