<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Beranda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('beranda/index', $data);
        $this->load->view('templates/footer');
    }

    public function chat()
    {
        $data['title'] = 'Chat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('beranda/chat', $data);
        $this->load->view('templates/footer');
    }


    public function note()
    {
        $data['title'] = 'Note';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('beranda/note', $data);
        $this->load->view('templates/footer');
    }


    public function data()
    {
        $data['title'] = 'Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $data['data'] = $this->db->get_where('data_table')->result_array();


        #batas-----------------------------

        $this->form_validation->set_rules('barang', 'Barang', 'required');
        $this->form_validation->set_rules('snis', 'Snis', 'required');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required');
        $this->form_validation->set_rules('seri', 'Seri', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('beranda/data', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'barang' => $this->input->post('barang'),
                'snis' => $this->input->post('snis'),
                'tipe' => $this->input->post('tipe'),
                'seri' => $this->input->post('seri'),

            ];
            $this->db->insert('data_table',  $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New data added!</div>');
            redirect('beranda/data');
        }
    }


    public function hapus($id)
    {
        if ($this->db->delete('data_table', ['id' => $id])) {

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Hapus berhasil!</div>');
            redirect('beranda/data');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Hapus gagal!</div>');
            redirect('beranda/data');
        }
    }
}
