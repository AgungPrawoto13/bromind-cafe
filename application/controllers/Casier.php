<?php defined('BASEPATH') OR exit('No redirect script access allowed');

class Casier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Jika session tidak ada, maka akan dialihkan ke login
        is_logged_in();
        $this->load->model('report_model');
        $this->load->model('product_model');
        $this->load->model('web_model');
    }

    public function index()
    {
        $data['website'] = $this->web_model->get_info();
        $data['title'] = 'Dashboard Casier';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['report'] = array_reverse($this->report_model->get_report());
        $data['today'] = $this->report_model->today_reports();
        $data['food'] = $this->product_model->get_food();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['website'] = $this->web_model->get_info();
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('templates/footer');
    }

    public function editprofile()
    {
        $data['website'] = $this->web_model->get_info();
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $this->form_validation->set_rules('name', 'Full name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit-profile', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];
    
            if ($upload_image) {
                $config['allowed_types'] = 'gif|png|jpg';
                $config['max_size'] = '5120'; // 5MB
                $config['upload_path'] = './assets/img/profile/';
    
                $this->load->library('upload', $config);
    
                // Proses upload
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.png') {
                        // Hapus file foto lama 
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
                
            }
            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', 
            '<div class="alert alert-success alert-message" role="alert">
                Profile success to update!
            </div>');
            redirect('admin/profile');
        }
    }

    public function changePassword()
    {
        $data['website'] = $this->web_model->get_info();
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[5]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Repeat New Password', 'required|trim|min_length[5]|matches[new_password1]');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/change-password', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', 
                '<div class="alert alert-danger alert-message" role="alert">
                    Wrong current password!
                </div>');
                redirect('admin/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', 
                    '<div class="alert alert-danger alert-message" role="alert">
                        New password cannot be the same as current password!
                    </div>');
                    redirect('admin/changepassword');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', 
                    '<div class="alert alert-success alert-message" role="alert">
                        Password has been changed!
                    </div>');
                    redirect('admin/changepassword');
                }
            }
            
        }
    }
}