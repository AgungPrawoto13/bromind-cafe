<?php defined('BASEPATH') OR exit('No redirect script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_in();
        $this->load->model('product_model');
        $this->load->model('web_model');
    }

    public function index()
    {
        $data['website'] = $this->web_model->get_info();
        $data['title'] = 'Product';
        $data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
        
        // Load Library Pagination
        $this->load->library('pagination');
        
        // Search
        if ($this->input->post('submit')) {

            $data['product_type'] = $this->input->post('product_type');
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('product_type', $data['product_type']);
            $this->session->set_userdata('keyword', $data['keyword']);

        } else {
            $data['product_type'] = $this->session->userdata('product_type');
            $data['keyword'] = $this->session->userdata('keyword');
        }
        
        // Config Pagination
        if ($data['product_type'] != null) {
            if ($data['keyword'] != null) {
                $this->db->where('product_type', $data['product_type']);
                $this->db->like('product_name', $data['keyword']);
                $this->db->or_like('price', $data['keyword']);
            } else {
                $this->db->where('product_type', $data['product_type']);
            }
        } else {
            if ($data['keyword'] != null) {
                $this->db->like('product_name', $data['keyword']);
                $this->db->or_like('price', $data['keyword']);
            } else {
                $this->db->select('*');
            }
        }
        $this->db->from('product');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['base_url'] = 'http://localhost/bromind-cafe/product/index';
        $config['num_links'] = 3;
        $config['per_page'] = 10;

        // var_dump($config['total_rows']);
        // die;
        
        // Initialize Pagination
        $this->pagination->initialize($config);
        
        $data['start'] = $this->uri->segment(3);
        $data['product'] = $this->product_model->get_products($config['per_page'], 
        $data['start'], $data['product_type'], $data['keyword']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('product/index', $data);
        $this->load->view('templates/footer');
    }

    public function addProduct()
    {
        $data['website'] = $this->web_model->get_info();
        $data['title'] = 'Product';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $this->form_validation->set_rules('product_type', 'Product Type', 'required');
        $this->form_validation->set_rules('product_name', 'Product Name', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('product_img','Product_img','required|file[jpg]');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('product/add-product', $data);
            $this->load->view('templates/footer');
        } else {
            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['product_img']['name'];
    
            if ($upload_image) {
                $config['upload_path'] = './assets/img/product/';
                $config['allowed_types'] = 'gif|png|jpg|jpeg';
                $config['max_size'] = '5120'; // 5MB
    
                $this->load->library('upload', $config);
    
                // Proses upload
                if ($this->upload->do_upload('product_img')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('product_img', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $product = $this->db->query('SELECT * FROM product')->result_array();
            $a = "PRK";
            $kd_product = $a.sprintf("%03s",count($product));

            $data = [
                'product_id' => $kd_product,
                'product_img' => $new_image,
                'product_type' => $this->input->post('product_type'),
                'product_name' => $this->input->post('product_name'),
                'price' => $this->input->post('price'),
                'description' => $this->input->post('description')
            ];

            $this->db->insert('product', $data);

            $this->session->set_flashdata('message', 
            '<div class="alert alert-success text-center" role="alert">
                Success to add new product!
            </div>');
            redirect('product');
        }
    }

    public function edit($product_id)
    {
        $this->form_validation->set_rules('product_type', 'Product Type', 'required|trim',array('
            required' => 'Type Product harus diisi !'));

        $this->form_validation->set_rules('product_name', 'Product Name', 'required|trim', array('
            required' => 'Nama produk harus diisi !'));

        $this->form_validation->set_rules('price', 'Price', 'required|trim', array('
            required' => 'Harga produk harus diisi !'));

        $this->form_validation->set_rules('description', 'Description', 'required|trim', array('
            required' => 'Deskripsi harus diisi !'));

        $this->form_validation->set_rules('product_img','File','required|trim');

        if($this->form_validation->run() == false){

            $product_id = $this->uri->segment(3);
            $result = $this->product_model->get_product_id($product_id);

            if($result->num_rows() > 0)
            {
                $product = $result->row_array();
                $data = array(
                    'product_id' => $product['product_id'],
                    'product_img' => $product['product_img'],
                    'product_name' => $product['product_name'],
                    'product_type' => $product['product_type'],
                    'price' => $product['price'],
                    'description' => $product['description']
                );
                
                $data['website'] = $this->web_model->get_info();
                $data['title'] = 'Product';
                $data['user'] = $this->db->get_where('user', ['email' =>
                $this->session->userdata('email')])->row_array();

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('product/edit-product', $data);
                $this->load->view('templates/footer');
            } else {
                echo "Data Was Not Found";
            }
        } else {
            $this->saveEdit($product_id);
        }
	}

    private function saveEdit($product_id)
    {
        $data['title'] = 'Save Product';
        $data['product'] = $this->db->get_where('product', array('product_id' => $product_id))->result_array();
        
        // cek jika ada gambar yang akan diupload

        $upload_image = $_FILES['product_img']['name'];

        if($upload_image){

            $config['upload_path'] = './assets/img/product/';
            $config['allowed_types'] = 'gif|png|jpg|jpeg';
            $config['max_size'] = '5120'; // 5MB

            $this->load->library('upload', $config);

            // Proses upload
            if ($this->upload->do_upload('product_img')) {
                
                $old_image = $data['product'][0]['product_img'];

                if ($old_image != 'product.png') {
                    // Hapus file foto lama 
                    unlink(FCPATH . 'assets/img/product/' . $old_image);

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('product_img', $new_image);
                }

            } else {
                echo $this->upload->display_errors();
            }
        }

        $product_id = $this->input->post('product_id');
        $product_type = $this->input->post('product_type');
        $product_name = $this->input->post('product_name');
        $product_img = $new_image;
        $price = $this->input->post('price');
        $description = $this->input->post('description');

        $data = array(
            'product_type' => $product_type,
            'product_name' => $product_name,
            'product_img' => $product_img,
            'price' => $price,
            'description' => $description
        );

        $this->product_model->update('product', $data, 'product_id', $product_id);

        $this->session->set_flashdata('message', 
        '<div class="alert alert-success text-center" role="alert">
            Product has been modified!
        </div>');
        redirect('product');
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        $data = $this->product_model->delete($id);
        
        if($data->num_rows() > 0){

            $this->session->set_flashdata('message', 
                '<div class="alert alert-success text-center" role="alert">
                    Product has been deleted!
                </div>');
            redirect('product');
        } else {

            $this->session->set_flashdata('message', 
                '<div class="alert alert-danger text-center" role="alert">
                    Product not found!
                </div>');
            redirect('product');
        }
    }
}