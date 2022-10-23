<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller
{

    public function post_view()
    {
        $data['title'] = 'Post view';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('post_category/add', $data);
        $this->load->view('templates/footer');
    }


    public function post_add()
    {
        $data['title'] = 'Post category';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('post/add', $data);
        $this->load->view('templates/footer');
    }
}
