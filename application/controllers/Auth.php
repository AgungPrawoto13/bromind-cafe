<?php defined('BASEPATH') OR exit('No redirect script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation','email');
        $this->load->model('web_model');
        $this->load->library('phpmailer_lib');
    }

    public function index()
    {
        $data['website'] = $this->web_model->get_info();
        // Login Rules
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        // die;

        // Load
        if ($this->form_validation->run() == false) {

            $data['title'] = 'Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');

        } else {
            // Validation Success
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        
        // Jika User dan Customer ada
        if ($user) {

            // Jika email telah diaktivasi
            if ($user['is_active'] == 1) {

                // Verifikasi password 
                if ($user['password'] == $password) {

                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'kd_user' => $user['kd_user'],
                        'name' => $user['name']
                    ];

                    $this->session->set_userdata($data);

                    if ($user['role_id'] == 1){
                        redirect('leader');

                    } else {
                        redirect('casier');
                    }

                }else {
                    $this->session->set_flashdata('message', 
                    '<div class="alert alert-danger alert-message" role="alert">
                        Wrong password! 
                    </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', 
                '<div class="alert alert-danger alert-message" role="alert">
                    This email has not been activated, please check your email to activate! 
                </div>');
                redirect('auth');
            }
            
        } else {
            $this->session->set_flashdata('message', 
            '<div class="alert alert-danger alert-message" role="alert">
                Email not registered! 
                <a href="auth/registration" class="alert-link"> Register now </a>
            </div>');
            redirect('auth');
        }
        
    }

    public function registration()
    {
        if($this->session->customer_role == 3){
            redirect('landing_page');
        } else {
            $data['website'] = $this->web_model->get_info();
            // Registration Rules
            $this->form_validation->set_rules('name', 'Name', 'required|trim');

            $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

            $this->form_validation->set_rules('no_hp', 'No_Hp', 'required|trim');

            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
                'is_unique' => 'This email already registered!'
            ]);

            $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
                'matches' => 'Password not match!',
                'min_length' => 'Password too short!'
            ]);

            $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

            // Load
            if ($this->form_validation->run() == false) {

                $data['title'] = 'Registration';
                $this->load->view('templates/auth_header', $data);
                $this->load->view('auth/registration');
                $this->load->view('templates/auth_footer');

            } else {

                $email = $this->input->post('email', true);
                $user = $this->db->query('SELECT * FROM user')->result_array();
                
                $customer = "CTR";
                $kode = $customer.sprintf("%03s",count($user));

                $data = [
                    'kd_user' => $kode,
                    'name' => htmlspecialchars($this->input->post('name', true)),
                    'address' => $this->input->post('alamat', true),
                    'no_hp' => $this->input->post('no_hp'), 
                    'email' => htmlspecialchars($email),
                    'password' => $this->input->post('password1', true),
                    'role_id' => 3,
                    'is_active' => 1,
                    'date_created' => date('Y-m-d')
                ];
                   
                $this->db->insert('user', $data);

                $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">Account has been created</div>');

                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('kd_user');

        $this->session->set_flashdata('message', 
            '<div class="alert alert-success alert-message text-center" role="alert">
                You have been logged out!
            </div>');

        redirect('auth');
    }

    public function blocked()
    {
        $data['website'] = $this->web_model->get_info();
        $this->load->view('auth/blocked');
    }

    public function forgotPassword()
    {
        $data['website'] = $this->web_model->get_info();
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Forgot Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgot-password');
            $this->load->view('templates/auth_footer');

        } else {

            $email_penerima = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email_penerima, 'is_active' => 1])->row_array();
            $subject = 'Kamu Lupa Password ?';

            if($user == Null){

                $this->session->set_flashdata('message', 
                '<div class="alert alert-danger  alert-message" role="alert">
                    Your email has not registered
                </div>');
                redirect('auth/forgotpassword');
            }
            else {    
                $content = $this->load->view('mail', [
                    'pesan' => $user['password'],
                    'user' => $user['name']], true);   

                $sendmail = [
                    'email_penerima' => $email_penerima,
                    'subject' => $subject,
                    'content' => $content
                ];

                if(empty($attachment['name'])){

                    $send = $this->phpmailer_lib->sendEmail($sendmail);
                } else {
                    $send = $this->phpmailer_lib->sendEmail($sendmail);
                }

                echo '<b>'.$send['status'].'</b><br>';
                echo $send['message'];
                echo "<br><a href='". base_url('auth/forgotpassword') . "'>kembali ke form</a>";
            }

            // $this->session->set_flashdata('message', 
            // '<div class="alert alert-danger alert-message" role="alert">
            //     Email tidak terdaftar !!
            // </div>');
            // redirect('auth/forgotpassword');
            //$this->load->view('mail',$content);
           
        }
    }

    public function resetPassword()
    {
        $data['website'] = $this->web_model->get_info();
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', 
                '<div class="alert alert-danger  alert-message" role="alert">
                    Wrong token, Reset password failed!
                </div>');
                redirect('auth');
            }
            
        } else {
            $this->session->set_flashdata('message', 
                '<div class="alert alert-danger alert-message" role="alert">
                    Wrong email, Reset password failed!
                </div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        $data['website'] = $this->web_model->get_info();
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat password', 'trim|required|min_length[5]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/change-password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', 
                '<div class="alert alert-success alert-message" role="alert">
                    Password has been changed, please login!
                </div>');
            redirect('auth');
        }
    }

    // public function verify()
    // {
    //     $data['website'] = $this->web_model->get_info();
    //     $email = $this->input->get('email');
    //     $token = $this->input->get('token');

    //     $user = $this->db->get_where('user', ['email' => $email])->row_array();

    //     if ($user) {
    //         $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

    //         if ($user_token) {
    //             if (time() - $user_token['date_created'] < (60*60*24)) {
    //                 $this->db->set('is_active', 1);
    //                 $this->db->where('email', $email);
    //                 $this->db->update('user');

    //                 $this->db->delete('user_token', ['email' => $email]);

    //                 $this->session->set_flashdata('message', 
    //                 '<div class="alert alert-success alert-message" role="alert">
    //                     '. $email .' has been activated, please login!
    //                 </div>');
    //                 redirect('auth');
    //             } else {
    //                 $this->db->delete('user', ['email' => $email]);
    //                 $this->db->delete('user_token', ['email' => $email]);

    //                 $this->session->set_flashdata('message', 
    //                 '<div class="alert alert-danger alert-message" role="alert">
    //                     Token has been expired!
    //                 </div>');
    //                 redirect('auth');
    //             }
                
    //         } else {
    //             $this->session->set_flashdata('message', 
    //             '<div class="alert alert-danger alert-message" role="alert">
    //                 Wrong token, activation failed !
    //             </div>');
    //             redirect('auth');
    //         }
            
    //     } else {
    //         $this->session->set_flashdata('message', 
    //         '<div class="alert alert-danger alert-message" role="alert">
    //             Wrong email, activation failed !
    //         </div>');
    //         redirect('auth');
    //     }
        
    // }

    // private function _sendEmail($token, $type)
    // {

    //     $this->load->library('email');

    //     $config = [
    //         'protocol' => 'smtp', //'mail','sendemail', or 'smtp'
    //         'smtp_host' => 'smtp.gmail.com',
    //         'smtp_port' => 465,
    //         'smtp_user' => 'cafebromind@gmail.com',
    //         'smtp_pass' => 'belajarasteroit123',
    //         'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
    //         'mailtype' => 'text', //plaintext 'text' mails or 'html'
    //         'smtp_timeout' => '4', //in second
    //         'charset' => 'iso-8859-1',
    //         'wordwrap' => TRUE
    //     ];

    //     // $this->email->set_newline("\r\n");
    //     // $this->email->from('cafebromind@gmail.com');
    //     // $this->email->to($this->input->post('email'));

    //     // if($type == 'verify'){

    //     //     $this->email->subject('Account Verification');
    //     //     $this->email->message('Click link to active your account : 
    //     //     <a href="'. base_url(). 'auth/verify?email='.$this->input->post('email'). '&token='. urlencode($token). '">Activate</a>');

    //     // } else if ($type == 'forgot'){

    //     //     $this->email->subject('Reset Password');
    //     //     $this->email->message('Click link to reset your password : <a href="'. base_url(). 'auth/resetpassword?email='. $this->input->post('email'). '&token='. urldecode($token). '">Reset Password</a>');
    //     // }


    //     $this->email->initialize($config);
    //     $this->email->from('ardhbisnis1200@gmail.com', 'Ardh Bisnis');
    //     $this->email->to($this->input->post('email'));

    //     if ($type == 'verify') {
    //         $this->email->subject('Account Verification');
    //         $this->email->message('Click link to activate your account : 
    //         <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
    //     } else if ($type == 'forgot') {
    //         $this->email->subject('Reset Password');
    //         $this->email->message('Click link to reset your password : 
    //         <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
    //     }

    //     // if ($this->email->send()) {
    //     //     return true;
    //     // } else {
    //     //     echo $this->email->print_debugger();
    //     //     die;
    //     // }
        
    // }

    // Registration for Leader
    // public function reg_leader()
    // {
    //     $data['website'] = $this->web_model->get_info();
    //     // Registration Rules
    //     $this->form_validation->set_rules('name', 'Name', 'required|trim');
    //     $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
    //         'is_unique' => 'This email already registered!'
    //     ]);
    //     $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
    //         'matches' => 'Password not match!',
    //         'min_length' => 'Password too short!'
    //     ]);
    //     $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

    //     // Load
    //     if ($this->form_validation->run() == false) {
    //         $data['title'] = 'Registration Leader';
    //         $this->load->view('templates/auth_header', $data);
    //         $this->load->view('auth/reg_leader');
    //         $this->load->view('templates/auth_footer');
    //     } else {
    //         // Validation Success
    //         echo 'Data berhasil disimpan';
    //         $data = [
    //             'name' => $this->input->post('name'),
    //             'email' => $this->input->post('email'),
    //             'image' => 'default.png',
    //             'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
    //             'role_id' => 1,
    //             'is_active' => 0,
    //             'date_created' => time()
    //         ];

    //         //  Siapkan token random
    //         $token = base64_encode(random_bytes(32));
    //         $user_token = [
    //             'email' => $email,
    //             'token' => $token,
    //             'date_created' => time()
    //         ];

    //         $this->db->insert('user', $data);
    //         $this->db->insert('user_token', $user_token);

    //         $this->_sendEmail($token, 'verify');

    //         $this->session->set_flashdata('message', 
    //         '<div class="alert alert-success alert-message" role="alert">
    //             Account has been created, please check your email to activate your account!
    //         </div>');
    //         redirect('auth');
    //     }
    // }
}