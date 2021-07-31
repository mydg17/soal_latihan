<?php
defined('BASEPATH') or exit('No direct script access allowed');
use GuzzleHttp\Client;

class M_paket extends CI_Model
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
    public function getPaket(){
        $response = $this->_client->request( 'GET','paket', [
            'query' => [
                'X-API-KEY' => 'key-tutor007'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true) ;
        return $result;
    }

    public function getPaket_byID( $id ){
        $response = $this->_client->request( 'GET','paket', [
            'query' => [
                'X-API-KEY' => 'key-tutor007',
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true) ;
        return $result;
    }

    public function createPaket( ){
        $data = [
            'id_paket_soal'  =>  $this->input->post('id_paket_soal'),
            'nama_paket'  =>  $this->input->post('nama_paket'),
            'X-API-KEY' => 'key-tutor007'
        ];

        $response = $this->_client->request( 'POST','Paket', [
            'form_params' => $data
        ]);
        
        $result = json_decode($response->getBody()->getContents(), true) ;
        return $result;
    }

    public function deletePaket( $id ){
        $response = $this->_client->request( 'DELETE','Paket', [
            'form_params' => [
                'X-API-KEY' => 'key-tutor007',
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true) ;
        return $result;
    } 
    
    public function editPaket( ){
        $data = [
            'id_paket_soal'  =>  $this->input->post('id'),
            'nama_paket'  =>  $this->input->post('text_soal'),
            'X-API-KEY' => 'key-tutor007'
        ];

        $response = $this->_client->request( 'PUT','Paket', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true) ;
        return $result;
        
    }
}
