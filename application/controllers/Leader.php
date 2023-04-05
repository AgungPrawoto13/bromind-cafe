<?php defined('BASEPATH') OR exit('No redirect script access allowed');

class Leader extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Jika session tidak ada, maka akan dialihkan ke login
        is_logged_in();
        $this->load->model('employee_model');
        $this->load->model('report_model');
        $this->load->model('product_model');
        $this->load->model('web_model');
    }

    public function index()
    {
        $data['website'] = $this->web_model->get_info();
        $data['title'] = 'Dashboard Leader';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['report'] = array_reverse($this->report_model->get_report());
        $data['today'] = $this->report_model->today_reports();
        $data['food'] = $this->product_model->get_food();
        $data['fav_food'] = $this->report_model->fav_food();

        // var_dump($data['fav_food']);
        // die;
        // this_day();
       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('leader/index', $data);
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
        $this->load->view('leader/profile', $data);
        $this->load->view('templates/footer');
    }

    public function editProfile()
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
            $this->load->view('leader/edit-profile', $data);
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
            '<div class="alert alert-success" role="alert">
                Profile success to update!
            </div>');
            redirect('leader/profile');
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
            $this->load->view('leader/change-password', $data);
            $this->load->view('templates/footer');

        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', 
                '<div class="alert alert-danger" role="alert">
                    Wrong current password!
                </div>');
                redirect('admin/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', 
                    '<div class="alert alert-danger" role="alert">
                        New password cannot be the same as current password!
                    </div>');
                    redirect('leader/changepassword');
                } else {
                    //$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    
                    $this->db->set('password', $new_password);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', 
                    '<div class="alert alert-success" role="alert">
                        Password has been changed!
                    </div>');
                    redirect('leader/changepassword');
                }
            }
        }
    }

    // public function account()
    // {
    //     $data['website'] = $this->web_model->get_info();
    //     $data['title'] = 'Leader Account';
    //     $data['user'] = $this->db->get_where('user', ['email' =>
    //     $this->session->userdata('email')])->row_array();
        
    //     $data['leader'] = $this->employee_model->get_leaderaccount();

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('leader/account', $data);
    //     $this->load->view('templates/footer');
    // }

    public function delAccount()
    {
        $id = $this->uri->segment(3);
        $this->employee_model->del_user($id);
        
        $this->session->set_flashdata('message', 
            '<div class="alert alert-success" role="alert">
                Fake Leader has been deleted!
            </div>');
        redirect('leader/account');
    }

    public function employees()
    {
        $data['website'] = $this->web_model->get_info();
        $data['title'] = 'Employees';
        $data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
        
        $data['employe'] = $this->employee_model->get_employee();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('leader/employees', $data);
        $this->load->view('templates/footer');
    }

    public function delEmployee()
    {
        $id = $this->uri->segment(3);
        $this->employee_model->del_user($id);
        
        $this->session->set_flashdata('message', 
            '<div class="alert alert-success text-center" role="alert">
                Leader has been deleted!
            </div>');
        redirect('leader/employees');
    }

    public function role()
    {
        $data['website'] = $this->web_model->get_info();
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $data['role'] = $this->db->get('role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('leader/role', $data);
        $this->load->view('templates/footer');
    }

    public function roleAccess($role_id)
    {
        $data['website'] = $this->web_model->get_info();
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $data['role'] = $this->db->get_where('role', ['id' => $role_id])->row_array();
        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('menu_sidebar')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('leader/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('access_menu', $data);
        } else {
            $this->db->delete('access_menu', $data);
        }
        
        $this->session->set_flashdata('message', 
            '<div class="alert alert-success" role="alert">
                Access has been changed!
            </div>');
    }
}