<?php defined('BASEPATH') OR exit('No redirect script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Jika session tidak ada, maka akan dialihkan ke login
        menu_logged_in();
        $this->load->model('menu_model');
        $this->load->model('web_model');
    }

    public function index()
    {
        $data['website'] = $this->web_model->get_info();
        $data['title'] = 'Menu';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $data['menu'] = $this->db->get('menu_sidebar')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('menu_sidebar', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', 
            '<div class="alert alert-success" role="alert">
                New menu added!
            </div>');
            redirect('menu');
        }
    }

    public function submenu()
    {
        $data['website'] = $this->web_model->get_info();
        $data['title'] = 'Submenu';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('menu_sidebar')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('sub_menu', $data);
            $this->session->set_flashdata('message', 
            '<div class="alert alert-success" role="alert">
                New sub menu added!
            </div>');
            redirect('menu/submenu');
        }
    }

    public function edit()
    {
        $id = $this->uri->segment(3);
        $result = $this->menu_model->get_menu_id($id);
        if($result->num_rows() > 0)
        {
            $menu = $result->row_array();
            $data = array(
                'id' => $menu['id'],
                'menu' => $menu['menu']
            );
            
            $data['website'] = $this->web_model->get_info();
            $data['title'] = 'Menu';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit-menu', $data);
            $this->load->view('templates/footer');
        } else {
            echo "Data Was Not Found";
        }
    }
    
    public function save()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('menu', 'Menu Name', 'required');

        $data = array(
            'menu' => $this->input->post('menu')
        );

        $where = array(
            'id' => $this->input->post('id')
        );
        
        $this->menu_model->update($where,$data,'menu_sidebar');

        $this->session->set_flashdata('message', 
        '<div class="alert alert-success" role="alert">
            Menu name has been modified!
        </div>');
        redirect('menu');
    }
    
    public function subEdit()
    {
        $id = $this->uri->segment(3);
        $result = $this->menu_model->get_sub_id($id);
        if($result->num_rows() > 0)
        {
            $submenu = $result->row_array();
            $data = array(
                'id' => $submenu['id'],
                'menu_id' => $submenu['menu_id'],
                'head' => $submenu['title'],
                'icon' => $submenu['icon']
            );
            
            $data['website'] = $this->web_model->get_info();
            $data['title'] = 'Submenu';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            $this->load->model('Menu_model', 'menu');
            
            $data['subMenu'] = $this->menu->getSubMenu();
            $data['menu'] = $this->db->get('menu_sidebar')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit-submenu', $data);
            $this->load->view('templates/footer');
        } else {
            echo "Data Was Not Found";
        }
    }
    
    public function saveSub()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        $this->form_validation->set_rules('head', 'Submenu Title', 'required');
        $this->form_validation->set_rules('icon', 'Text Icon', 'required');

        $data = array(
            'menu_id' => $this->input->post('menu'),
            'title' => $this->input->post('head'),
            'icon' => $this->input->post('icon')
        );

        $where = array(
            'id' => $this->input->post('id')
        );

        // var_dump($where, $data);
        // die;
        
        $this->menu_model->update($where,$data,'sub_menu');

        $this->session->set_flashdata('message', 
        '<div class="alert alert-success" role="alert">
            Submenu has been modified!
        </div>');
        redirect('menu/submenu');
    }
}