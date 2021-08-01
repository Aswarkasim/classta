<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Kursus extends CI_Controller
{

    public function index()
    {

        $data = [
            'content'  => 'home/kursus/index'
        ];
        $this->load->view('home/layout/wrapper', $data, FALSE);
        // $this->load->view('home/index');
    }

    public function detail()
    {

        $data = [
            'content'  => 'home/kursus/detail'
        ];
        $this->load->view('home/layout/wrapper', $data, FALSE);
    }
}
