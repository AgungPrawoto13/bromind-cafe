<?php defined('BASEPATH') OR exit('No redirect script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_in();
        $this->load->model('report_model');
        $this->load->model('product_model');
        $this->load->model('web_model');
    }

    public function index()
    {
        $data['website'] = $this->web_model->get_info();
        $data['title'] = 'Report';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        // Load Library Pagination
        $this->load->library('pagination');
        
        // Config Pagination
        $this->db->from('report');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['base_url'] = 'http://localhost/bromind-cafe/report/index';
        $config['num_links'] = 3;
        $config['per_page'] = 5;
        
        // Initialize Pagination
        $this->pagination->initialize($config);
        
        $data['start'] = $this->uri->segment(3);
        $data['report'] = $this->report_model->get_reports(
        $config['per_page'], $data['start']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('report/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['website'] = $this->web_model->get_info();
        $data['title'] = 'Report';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['food'] = $this->product_model->get_food();
        $data['baverage'] = $this->product_model->get_baverage();
        
        $this->form_validation->set_rules('fav_food', 'Favorite Food', 'required');
        $this->form_validation->set_rules('fav_baverg', 'Favorite Baverage', 'required');
        $this->form_validation->set_rules('on_income', 'Online Income', 'required');
        $this->form_validation->set_rules('off_income', 'Offline Income', 'required');
        $this->form_validation->set_rules('spending', 'Spending', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('report/add-report', $data);
            $this->load->view('templates/footer');
        } else {

            $on_income = $this->input->post('on_income');
            $off_income = $this->input->post('off_income');
            $spending = $this->input->post('spending');
            $income = $on_income + $off_income;
            $profit = $income - $spending;

            $report = $this->db->query('SELECT * FROM report')->result_array();
            $kd_rpt = "RPT";
            $no_urut = count($report);

            $kode = $kd_rpt.sprintf("%02s", $no_urut);
            
            $data = [
                'report_id' => $kode,
                'food' => $this->input->post('fav_food'),
                'baverg' => $this->input->post('fav_baverg'),
                'on_income' => $on_income,
                'off_income' => $off_income,
                'income' => $income,
                'spending' => $spending,
                'profit' => $profit,
                'date_created' => date('Y-m-d')
            ];

            $this->db->insert('report', $data);

            $this->session->set_flashdata('message', 
            '<div class="alert alert-success" role="alert">
                Success to add new report!
            </div>');
            redirect('report');
        }
    }

    public function edit()
    {
        $id = $this->uri->segment(3);
        $result = $this->report_model->get_report_id($id);
        
        if($result->num_rows() > 0)
        {
            $report = $result->row_array();
            $on_income = $report['on_income'];
            $off_income = $report['off_income'];
            $spending = $report['spending'];
            $income = $on_income + $off_income;
            $profit = $income - $spending;

            $data = array(
                'report_id' => $report['report_id'],
                'food' => $report['food'],
                'baverg' => $report['baverg'],
                'on_income' => $on_income,
                'off_income' => $off_income,
                'spending' => $spending,
                'income' => $income,
                'profit' => $profit
            );
            
            // var_dump($data);
            // die;
            
            $data['website'] = $this->web_model->get_info();
            $data['title'] = 'Report';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();
            $data['product_food'] = $this->product_model->get_food();
            $data['product_baverg'] = $this->product_model->get_baverage();

            // var_dump($data['food']);
            // die;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('report/edit-report', $data);
            $this->load->view('templates/footer');
        } else {
            echo "Data Was Not Found";
        }
    }
    
    public function save()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('fav_food', 'Favorite Food', 'required');
        $this->form_validation->set_rules('fav_baverg', 'Favorite Baverage', 'required');
        $this->form_validation->set_rules('on_income', 'Online Income', 'required');
        $this->form_validation->set_rules('off_income', 'Offline Income', 'required');
        $this->form_validation->set_rules('spending', 'Spending', 'required');

        $on_income = $this->input->post('on_income');
        $off_income = $this->input->post('off_income');
        $spending = $this->input->post('spending');
        $income = $on_income + $off_income;
        $profit = $income - $spending;

        $data = array(
            'food' => $this->input->post('fav_food'),
            'baverg' => $this->input->post('fav_baverg'),
            'on_income' => $on_income,
            'off_income' => $off_income,
            'income' => $income,
            'spending' => $spending,
            'profit' => $profit
        );

        // var_dump($data);
        // die;

        $where = array(
            'report_id' => $this->input->post('id')
        );
        
        $this->product_model->update('report', $data, $where);

        $this->session->set_flashdata('message', 
        '<div class="alert alert-success" role="alert">
            Report has been modified!
        </div>');
        redirect('report');
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        $data = $this->report_model->get_report_id($id);

        if($data->num_rows() > 0){

            $this->report_model->delete($id);
        
            $this->session->set_flashdata('message', 
                '<div class="alert alert-success text-center" role="alert">
                    Report has been deleted!
                </div>');

            redirect('report');

        } else {

            $this->session->set_flashdata('message', 
                '<div class="alert alert-danger text-center" role="alert">
                    Report not found
                </div>');

            redirect('report');
        }
    }
}