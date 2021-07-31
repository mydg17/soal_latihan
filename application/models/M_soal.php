<?php
defined('BASEPATH') or exit('No direct script access allowed');
use GuzzleHttp\Client;

class M_soal extends CI_Model
{

    private $client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'https://latnew.test/api/',
            'auth'  => [ 'admin', '1234' ]
        ]);
    }

    //rest client
    public function getSoal(){
        $response = $this->_client->request( 'GET','soal', [
            'query' => [
                'X-API-KEY' => 'key-tutor007'
            ]
        ]);

        $result = $response->getBody()->getContents() ;
        return $result;
    }

    public function getSoal_byID( $id ){
        $response = $this->_client->request( 'GET','soal', [
            'query' => [
                'X-API-KEY' => 'key-tutor007',
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true) ;
        return $result;
    }

    public function createSoal( ){
        $data = [
            'id_soal'  =>  $this->input->post('id_soal'),
            'text_soal'  =>  $this->input->post('text_soal'),
            'id_user'     =>  $this->input->post('id_user'),
            'id_paket_soal'      =>  $this->input->post('id_paket_soal'),
            'X-API-KEY' => 'key-tutor007'
        ];

        $response = $this->_client->request( 'POST','soal', [
            'form_params' => $data
        ]);
        
        $result = json_decode($response->getBody()->getContents(), true) ;
        return $result;
    }

    public function deleteSoal( $id ){
        $response = $this->_client->request( 'DELETE','soal', [
            'form_params' => [
                'X-API-KEY' => 'key-tutor007',
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true) ;
        return $result;
    } 
    
    public function editSoal( ){
        $data = [
            'id_soal'  =>  $this->input->post('id'),
            'text_soal'  =>  $this->input->post('text_soal'),
            'id_user'     =>  $this->input->post('id_user'),
            'id_paket_soal'      =>  $this->input->post('id_paket_soal'),
            'X-API-KEY' => 'key-tutor007'
        ];

        $response = $this->_client->request( 'PUT','soal', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true) ;
        return $result;
        
    }

    public function insMultiOpsi( ){
        $data = [
            'id_soal'  =>  $this->input->post('id'),
            'text_soal'  =>  $this->input->post('text_soal'),
            'id_user'     =>  $this->input->post('id_user'),
            'id_paket_soal' =>  $this->input->post('id_paket_soal'),
            'id_pilgan'      =>  $this->input->post('id_pilgan'),
            'text_pilgan'      =>  $this->input->post('text_pilgan'),
            'order_pilgan'      =>  $this->input->post('order_pilgan'),
            'X-API-KEY' => 'key-tutor007'
        ];

        $response = $this->_client->request( 'POST','latsol', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true) ;
        return $result;
    }

    public function getPaketan_byID( $id ){
        $response = $this->_client->request( 'GET','Latsol', [
            'query' => [
                'X-API-KEY' => 'key-tutor007',
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true) ;
        return $result;
    }
    
}
