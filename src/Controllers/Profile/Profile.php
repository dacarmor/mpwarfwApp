<?php

namespace Controllers\Profile;

use Mpwarfw\Component\BaseController\BaseController;
use Mpwarfw\Component\Templating\TwigTemplate;
use Mpwarfw\Component\Response\HttpResponse;
use Mpwarfw\Component\Request\Request;
use Mpwarfw\Component\Container\Container;

class Profile extends BaseController {

    private $request;
    private $view;
    private $db;
    
    public function __construct( Request $request ) {

        $this->request = $request;
        $container  = new Container();
        $this->db   = $container->get( 'Database' );
        $this->view = $container->get( 'Twig' );

    }

    public function build( $user ) {

        $session_user = $this->request->session->getValue( 'user' );

        // El usuario no está logueado
        if ( empty( $session_user ) ) {

            header( 'location: /login' );

        }

        // URL intentando acceder a un usuario incorrecto
        else if ( $user != $session_user ) {

            header( 'location: /profile/'.$session_user );

        }

        // Usuario correcto
        else {

            $user_data = array(
                'name'      => $this->request->post->getValue( 'name' ),
                'surname'   => $this->request->post->getValue( 'surname' ),
                'password'  => $this->request->post->getValue( 'password' ),
                'password2' => $this->request->post->getValue( 'password2' )
            );

            if ( $this->formValidation( $user_data ) ) { // Form OK

                $this->request->session->setValue( $user_data['name'], 'name' );
                $this->request->session->setValue( $user_data['surname'], 'surname' );
                $this->update( $user_data, $session_user );
                $values = array(
                    'user'     => $session_user,
                    'name'     => $user_data['name'],
                    'surname'  => $user_data['surname']
                );

            }
            else {

                $values = array(
                    'user'     => $session_user,
                    'name'     => $this->request->session->getValue( 'name' ),
                    'surname'  => $this->request->session->getValue( 'surname' )
                );

            }
            $response = new HttpResponse( $this->view->render( 'Profile/Profile.twig.tpl', $values ) );
            return $response;

        }

    }

    private function formValidation( $user_data ) {

        foreach ( $user_data as $key => $data ) {

            if ( ( $key == 'name' || $key == 'surname' ) && $data == '' ) return false;

        }

        if ( $user_data['password'] != $user_data['password2'] ) return false;
        return true;

    }

    private function update( $user_data, $user ) {

        unset( $user_data['password2'] );
        if ( $user_data['password'] == '' ) unset( $user_data['password'] );
        return $this->db->update( 'Users' , $user_data, array( 'user' => $user ) );

    }

}