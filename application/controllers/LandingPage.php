<?php defined('BASEPATH') OR exit('No redirect script access allowed');

class LandingPage extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
		$this->load->model('data_bromind','bro');
		$this->load->model('web_model','full');
		$this->load->model('product_model','product');
	}

	public function index()
	{
		$data['judul'] = 'Landing Page';
        $data['page'] = $this->bro->get('page');
        $data['story'] = $this->bro->get('story');
        $data['website'] = $this->full->get_info();
        $data['featured'] = $this->full->get_featured();
		$data['promo'] = $this->bro->get_where('promo','status',1);
        $data['product'] = $this->product->get_product();
		
        $this->load->view('landing-page/asset/header', $data);
        $this->load->view('landing-page/asset/navbar', $data);
        $this->load->view('landing-page/index', $data);
        $this->load->view('landing-page/asset/modal');
        $this->load->view('landing-page/asset/footer');
	}
	
	public function menu()
	{
		$data['judul'] = 'Menu';
        $data['page'] = $this->bro->get('page');
        $data['story'] = $this->bro->get('story');
        $data['website'] = $this->full->get_info();
        $data['product'] = $this->product->get();
        
        $this->load->view('landing-page/asset/header', $data);
        $this->load->view('landing-page/asset/navbar', $data);
        $this->load->view('landing-page/menu', $data);
        $this->load->view('landing-page/asset/modal');
        $this->load->view('landing-page/asset/footer');
	}
	
	public function food()
	{
		$data['judul'] = 'Menu';
        $data['page'] = $this->bro->get('page');
        $data['story'] = $this->bro->get('story');
        $data['website'] = $this->full->get_info();
        $data['product'] = $this->product->get_food();
		
		// var_dump($data['story']);
		// die;
        
        $this->load->view('landing-page/asset/header', $data);
        $this->load->view('landing-page/asset/navbar', $data);
        $this->load->view('landing-page/food', $data);
        $this->load->view('landing-page/asset/modal');
        $this->load->view('landing-page/asset/footer');
	}
	
	public function baverage()
	{
		$data['judul'] = 'Menu';
        $data['page'] = $this->bro->get('page');
        $data['story'] = $this->bro->get('story');
        $data['website'] = $this->full->get_info();
        $data['product'] = $this->product->get_baverage();
		
		// var_dump($data['story']);
		// die;
        
        $this->load->view('landing-page/asset/header', $data);
        $this->load->view('landing-page/asset/navbar', $data);
        $this->load->view('landing-page/baverage', $data);
        $this->load->view('landing-page/asset/modal');
        $this->load->view('landing-page/asset/footer');
	}

	public function story()
	{
		$data['judul'] = 'Story';
        $data['page'] = $this->bro->get('page');
        $data['story'] = $this->bro->get('story');
        $data['website'] = $this->full->get_info();
        $data['product'] = $this->product->get_product();
		
		// var_dump($data['story']);
		// die;
        
        $this->load->view('landing-page/asset/header', $data);
        $this->load->view('landing-page/asset/navbar', $data);
        $this->load->view('landing-page/story', $data);
        $this->load->view('landing-page/asset/modal');
        $this->load->view('landing-page/asset/footer');
	}
    
	public function contact()
	{
        $data['judul'] = 'Contact Us';
        $data['page'] = $this->bro->get('page');
        $data['story'] = $this->bro->get('story');
        $data['website'] = $this->full->get_info();
        $data['product'] = $this->product->get();

        $this->form_validation->set_rules('name', 'Full Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('message', 'Message', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('landing-page/asset/header', $data);
            $this->load->view('landing-page/asset/navbar', $data);
            $this->load->view('landing-page/contact', $data);
            $this->load->view('landing-page/asset/modal');
            $this->load->view('landing-page/asset/footer');
        } else {

            $message = $this->db->query('SELECT * FROM message')->result_array();
            $no_urut = count($message);

            $kode = "MSG".sprintf("%02s",$no_urut);

            $data = [
                'message_id' => $kode,
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'comment' => $this->input->post('message'),
                'date_created' => date('Y-m-d')
            ];
            
            $this->db->insert('message', $data);

            $this->session->set_flashdata('message', 
            '<div class="alert alert-success text-center" role="alert">
                Message success send !
            </div>');

            redirect('LandingPage/contact');
        }
    }

    public function tes()
    {

        $post = $this->input->post();
        echo "<pre>";
        $mbledos = explode(',',$post['product_id']);
        $product = array_filter($mbledos);

        $tes = explode(',', $post['qty']);
        $qty = array_filter($tes);

        foreach ($product as $key => $p ) {

            $this->db->update('product', ['ordered' => $qty[$key]] ,array('product_id' => $p));

            $s = $this->db->get_where('product',['product_id' => $p])->row();
            $t[] = $s->product_name . ':' . $qty[$key];
            
            
        }

        $a = implode(',',$t);
        echo json_encode(['status' => true]);
        //redirect('https://api.whatsapp.com/send?phone=+6287744379926&text=saya ingin memesan produk+');
    }
}