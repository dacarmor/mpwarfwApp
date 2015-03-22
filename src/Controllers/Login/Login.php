<?php

namespace Controllers\Login;

use Mpwarfw\Component\BaseController\BaseController;
use Mpwarfw\Component\Templating\SmartyTemplate;
use Mpwarfw\Component\Response\HttpResponse;
use Mpwarfw\Component\Request\Request;
use Mpwarfw\Component\Container\Container;

class Login extends BaseController {

    private $request;
    private $view;
    private $db;
    
    public function __construct( Request $request ) {

        $this->request = $request;
        $container  = new Container();
        $this->db   = $container->get( 'Database' );
        $this->view = $container->get( 'Smarty' );

    }

    public function build() {

        $user = $this->request->session->getValue( 'user' );

        if ( !empty( $user ) ) {

            header( 'location: /' );

        }
        else {

            $user = $this->request->post->getValue( 'user' );
            $form_data = array(
                'user'      => $this->request->post->getValue( 'user' ),
                'password'  => $this->request->post->getValue( 'password' ),
            );

            if ( !empty( $user ) ) {

                $user_data = $this->login( $form_data );

                if ( !empty( $user_data ) ) {
                    
                    $this->request->session->setValue( $user_data[0]['user'], 'user' );
                    $this->request->session->setValue( $user_data[0]['name'], 'name' );
                    $this->request->session->setValue( $user_data[0]['surname'], 'surname' );
                    header( 'location: /' );

                }
            
                else {

                    $response = new HttpResponse( $this->view->render( '../src/Templates/Login/Login.smarty.tpl', array( 'datetime' => date( 'H:i\h' ) ) ) );

                }

            }

            else {

                $response = new HttpResponse( $this->view->render( '../src/Templates/Login/Login.smarty.tpl', array( 'datetime' => date( 'H:i\h' ) ) ) );

            }

        }

        return $response;

    }

    private function login( $data ) {

        return $this->db->select( 'SELECT * FROM Users WHERE user=:user AND password=:password LIMIT 1', $data );

    }

    public function logout() {

        $this->request->session->destroy();
        header( 'location: /' );

    }

}