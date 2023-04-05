<?php defined('BASEPATH') OR exit('No redirect script access allowed');

class Website extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_in();
        $this->load->model('web_model');
        $this->load->model('product_model');
    }

    public function index()
    {
        $data['title'] = 'Information';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['website'] = $this->web_model->get_info();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('website/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $id = $this->uri->segment(3);
        $result = $this->web_model->get_info_id($id);
        if($result->num_rows() > 0)
        {
            $web = $result->row_array();
            $data = array(
                'id' => $web['id'],
                'logo' => $web['logo'],
                'head' => $web['head'],
                'loc_img' => $web['loc_img'],
                'location' => $web['location'],
                'maps' => $web['maps'],
                'senju' => $web['senju'],
                'sabtu' => $web['sabtu'],
                'weekend' => $web['weekend'],
                'fb' => $web['fb'],
                'ig' => $web['ig'],
                'yt' => $web['yt'],
                'wa' => $web['wa']
            );
            
            $data['website'] = $this->web_model->get_info();
            $data['title'] = 'Information';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('website/edit-info', $data);
            $this->load->view('templates/footer');
        } else {
            echo "Data Was Not Found";
        }
    }
    
    public function save()
    {
        $data['title'] = 'Save Information';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('head', 'Head Website', 'required|trim');
        $this->form_validation->set_rules('location', 'Location', 'required|trim');
        $this->form_validation->set_rules('maps', 'Maps', 'required|trim');
        $this->form_validation->set_rules('senju', 'Senin -Jum`at', 'required|trim');
        $this->form_validation->set_rules('sabtu', 'Sabtu', 'required|trim');
        $this->form_validation->set_rules('weekend', 'Minggu', 'required|trim');
        $this->form_validation->set_rules('fb', 'Facebook', 'required|trim');
        $this->form_validation->set_rules('ig', 'Minggu', 'required|trim');
        $this->form_validation->set_rules('yt', 'Youtube', 'required|trim');
        $this->form_validation->set_rules('wa', 'Whatsapp', 'required|trim');
        
        // cek jika ada gambar yang akan diupload
        $upload_image = $_FILES['logo']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|png|jpg';
            $config['max_size'] = '5120'; // 5MB
            $config['upload_path'] = './assets/img/website/';

            $this->load->library('upload', $config);

            // Proses upload
            if ($this->upload->do_upload('logo')) {
                $old_image = $data['web']['logo'];
                if ($old_image != 'logo.png') {
                    // Hapus file foto lama 
                    unlink(FCPATH . 'assets/img/website/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('logo', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        
        $upload_image = $_FILES['loc_img']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|png|jpg';
            $config['max_size'] = '5120'; // 5MB
            $config['upload_path'] = './assets/img/website/';

            $this->load->library('upload', $config);

            // Proses upload
            if ($this->upload->do_upload('loc_img')) {
                $old_image = $data['web']['loc_img'];
                if ($old_image != 'location.png') {
                    // Hapus file foto lama 
                    unlink(FCPATH . 'assets/img/website/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('loc_img', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $id = $this->input->post('id');
        $head = $this->input->post('head');
        $location = $this->input->post('location');
        $maps = $this->input->post('maps');
        $senju = $this->input->post('senju');
        $sabtu = $this->input->post('sabtu');
        $weekend = $this->input->post('weekend');
        $fb = $this->input->post('fb');
        $ig = $this->input->post('ig');
        $yt = $this->input->post('yt');
        $wa = $this->input->post('wa');

        $data = array(
            'head' => $head,
            'location' => $location,
            'maps' => $maps,
            'senju' => $senju,
            'sabtu' => $sabtu,
            'weekend' => $weekend,
            'fb' => $fb,
            'ig' => $ig,
            'yt' => $yt,
            'wa' => $wa
        );

        $where = array(
            'id' => $id
        );

        $this->web_model->update($where,$data,'website');

        $this->session->set_flashdata('message', 
        '<div class="alert alert-success text-center" role="alert">
            Success to update website information!
        </div>');
        redirect('website');
    }

    // STORY
    public function story()
    {
        $data['website'] = $this->web_model->get_info();
        $data['title'] = 'Story';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['story'] = $this->web_model->get_story();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('website/story', $data);
        $this->load->view('templates/footer');
    }

    public function editStory()
    {
        $id = $this->uri->segment(3);
        $result = $this->web_model->get_story_id($id);
        if($result->num_rows() > 0)
        {
            $story = $result->row_array();
            $data = array(
                'id' => $story['id'],
                'image' => $story['image'],
                'p1' => $story['p1'],
                'p2' => $story['p2']
            );
            
            $data['website'] = $this->web_model->get_info();
            $data['title'] = 'Story';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('website/edit-story', $data);
            $this->load->view('templates/footer');
        } else {
            echo "Data Was Not Found";
        }
    }

    public function saveStory()
    {
        $data['title'] = 'Save Story';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('p1', 'First Paragraph', 'required');
        $this->form_validation->set_rules('p2', 'Second Paragraph', 'required');
        
        // cek jika ada gambar yang akan diupload
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|png|jpg';
            $config['max_size'] = '5120'; // 5MB
            $config['upload_path'] = './assets/img/website/';

            $this->load->library('upload', $config);

            // Proses upload
            if ($this->upload->do_upload('image')) {
                $old_image = $data['story']['image'];
                if ($old_image != $this->input->post('image')) {
                    // Hapus file foto lama 
                    unlink(FCPATH . 'assets/img/website/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $id = $this->input->post('id');
        $p1 = $this->input->post('p1');
        $p2 = $this->input->post('p2');

        $data = array(
            'p1' => $p1,
            'p2' => $p2,
        );

        $where = array(
            'id' => $id
        );

        $this->web_model->update($where,$data,'story');

        $this->session->set_flashdata('message', 
        '<div class="alert alert-success" role="alert">
            Success to update Our Story!
        </div>');
        redirect('website/story');
    }

    // MESSAGE
    public function message()
    {
        $data['website'] = $this->web_model->get_info();
        $data['title'] = 'Message';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        // Load Library Pagination
        $this->load->library('pagination');
        
        // Config Pagination
        $this->db->from('message');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['base_url'] = 'http://localhost/bromind-cafe/website/message/index';
        $config['num_links'] = 3;
        $config['per_page'] = 9;
        
        // Initialize Pagination
        $this->pagination->initialize($config);
        
        $data['start'] = $this->uri->segment(4);
        $data['message'] = $this->web_model->get_message();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('website/message', $data);
        $this->load->view('templates/footer');
    }
    
    // PROMO
    public function promo()
    {
        $data['website'] = $this->web_model->get_info();
        $data['title'] = 'Promo';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['promo'] = $this->web_model->get_promo();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('website/promo', $data);
        $this->load->view('templates/footer');
    }

    public function editPromo()
    {
        $id = $this->uri->segment(3);
        $result = $this->web_model->get_promo_id($id);
        if($result->num_rows() > 0)
        {
            $promo = $result->row_array();
            $data = array(
                'id' => $promo['id'],
                'promo_img' => $promo['promo_img'],
                'promo_name' => $promo['promo_name'],
                'promo_detail' => $promo['promo_detail'],
                'period' => $promo['period']
            );
            
            $data['website'] = $this->web_model->get_info();
            $data['title'] = 'Promo';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('website/edit-promo', $data);
            $this->load->view('templates/footer');
        } else {
            echo "Data Was Not Found";
        }
    }

    public function savePromo()
    {
        $data['title'] = 'Save Promo';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('promo_name', 'Promo Name', 'required');
        $this->form_validation->set_rules('promo_detail', 'Promo Details', 'required');
        $this->form_validation->set_rules('period', 'Period', 'required');
        $this->form_validation->set_rules('status','Status', 'required');
        
        // cek jika ada gambar yang akan diupload
        $upload_image = $_FILES['promo_img']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|png|jpg';
            $config['max_size'] = '5120'; // 5MB
            $config['upload_path'] = './assets/img/website/';

            $this->load->library('upload', $config);

            // Proses upload
            if ($this->upload->do_upload('promo_img')) {
                $old_image = $data['promo']['promo_img'];
                if ($old_image != $this->upload->do_upload('promo_img')) {
                    // Hapus file foto lama 
                    unlink(FCPATH . 'assets/img/website/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('promo_img', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $id = $this->input->post('id');
        $promo_name = $this->input->post('promo_name');
        $promo_detail = $this->input->post('promo_detail');
        $period = $this->input->post('period');
        $status = $this->input->post('status');

        $data = array(
            'promo_name' => $promo_name,
            'promo_detail' => $promo_detail,
            'period' => $period,
            'status' => $status
        );

        $where = array(
            'id' => $id
        );

        $this->web_model->update($where,$data,'promo');

        $this->session->set_flashdata('message', 
        '<div class="alert alert-success text-center" role="alert">
            Success to update Our Story!
        </div>');
        redirect('website/promo');
    }

    // FEATURED PRODUCT
    public function featured()
    {
        $data['website'] = $this->web_model->get_info();
        $data['title'] = 'Featured Product';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['featured'] = $this->web_model->get_featured();
        // var_dump($data['featured']);
        // die;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('website/featured', $data);
        $this->load->view('templates/footer');
    }

    public function editFeatured()
    {
        $id = $this->uri->segment(3);
        $result = $this->web_model->get_ftr_id($id);
        if($result->num_rows() > 0)
        {
            $featured = $result->row_array();
            $data = array(
                'id' => $featured['id'],
                'product_id' => $featured['product_id']
            );

            $data['website'] = $this->web_model->get_info();
            $data['title'] = 'Featured';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();
            
            $data['list'] = $this->product_model->get_product();
            // var_dump($data['fitur']);
            // die;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('website/edit-featured', $data);
            $this->load->view('templates/footer');
        } else {
            echo "Data Was Not Found";
        }
    }

    public function saveFtr()
    {
        $data['title'] = 'Save Featured';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('list', 'Featured', 'required');
        
        $id = $this->input->post('id');
        $product_id = $this->input->post('list');

        $data = array(
            'product_id' => $product_id
        );

        $where = array(
            'id' => $id
        );

        // var_dump($where,$data);
        // die;

        $this->web_model->update($where,$data,'featured');

        $this->session->set_flashdata('message', 
        '<div class="alert alert-success" role="alert">
            Success to Change Featured Product!
        </div>');
        redirect('website/featured');
    }
}