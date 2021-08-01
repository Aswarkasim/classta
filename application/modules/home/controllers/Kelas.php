<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{

    public function index()
    {

        $data = [
            'content'  => 'home/kursus/index'
        ];
        $this->load->view('home/layout/wrapper', $data, FALSE);
        // $this->load->view('home/index');
    }

    function start()
    {
        $data = [
            'content'  => 'home/kelas/start'
        ];
        $this->load->view('home/layout/wrapper', $data, FALSE);

        // $this->load->view('home/kelas/start');
    }
}
