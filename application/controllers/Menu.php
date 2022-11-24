<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Menu extends CI_Controller
{
     //untuk memblokir akses langsung dari url
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }


    public function index()
    {
        $data['tittle'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'tittle' => $this->input->post('tittle'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active'),
            ];


           $this->db->insert('user_sub_menu', $data);
           $this->session->set_flashdata(
               'message',
               '<div class="alert alert-success" role="alert">
            New Submenu Added!
          </div>'
           );
           redirect('menu/submenu');
        }
    }
    public function submenu()
    {
        $data['tittle'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Model_menu', 'menu');


        $data['SubMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();


        $this->form_validation->set_rules('tittle', 'Tittle', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'tittle' => $this->input->post('tittle'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active'),
            ]; 
           $this->db->insert('user_sub_menu',$data);
           $this->session->set_flashdata(
               'message',
               '<div class="alert alert-danger" role="alert">
            New Submenu Added!
          </div>'
           );
           redirect('menu/submenu');
          }
        }
        public function submenuedit()
        {
            $this->form_validation->set_rules('tittle', 'tittle', 'required');
            $this->form_validation->set_rules('url', 'url', 'required');
            $this->form_validation->set_rules('icon', 'icon', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">Change falled</div>'
                );
                redirect('menu/submenu');
            } else {
                $data = array(
                    'tittle' => $_post['tittle'],
                    'menu_id' => $_post['menu_id'],
                    'url' => $_post['url'],
                    'icon' => $_post['icon'],
                    'is_active' => $_post['is_active'],

                );


                $this->db->where('id', $_post['id']);  
                $this->db->update('user_sub_menu', $data);
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success" role="alert">Menu Change</div>'
                );
                redirect('menu/submenu');
               }
            }
            public function hapus ($id)
            {
                $this->db->where('id', $id);
                $this->db->delete('user_sub_menu');
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">Sub Menu Deleted</div>'
                );
                redirect('menu/submenu');
            }

            public function menuedit()
            {
                $this->form_validation->set_rules('menu', 'Menu', 'required');
    
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger" role="alert">Change falled</div>'
                    );
                    redirect('menu/index');
                } else {
                    $data = array(
                        'menu' => $_post['menu'],
                    );
    
                    $this->db->where('id', $_post['id']);  
                    $this->db->update('user_menu', $data);
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success" role="alert">Menu Change</div>'
                    );
                    redirect('menu/index');
                   }
                }

            public function hapusmenu($id)
            {
                $this->db->where('id', $id);
                $this->db->delete('user_menu');
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">Menu Deleted</div>'
                );
                redirect('menu/index');
             }
        }

        