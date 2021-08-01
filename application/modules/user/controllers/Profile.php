<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
  }


  public function index()
  {
    $data = [
      'content'           => 'user/profile/index'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }
}
