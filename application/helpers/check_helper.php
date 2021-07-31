<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function sesi_user(){
    $kunci = $this->config->item('thekey');
    return JWT::decode($_COOKIE['log_token'],$kunci);
}