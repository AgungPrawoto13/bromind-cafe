<?php defined('BASEPATH') OR exit('No redirect script access allowed');

class Web_model extends CI_Model
{
    public function get_info()
    {
        return $this->db->get('website')->result_array();
    }

    public function get_info_id($id)
    {
        $query = $this->db->get_where('website', array('id' => $id));
        return $query;
    }

    public function update($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function get_story()
    {
        return $this->db->get('story')->result_array();
    }
    
    public function get_story_id($id)
    {
        $query = $this->db->get_where('story', array('id' => $id));
        return $query;
    }
    
    public function get_message()
    {
        return $this->db->get('message')->result_array();
    }

    // public function get_message()
    // {
    //     $this->db->order_by('date_created', 'DESC');
    //     return $this->db->get('message')->result_array();
    // }

    public function get_promo()
    {
        return $this->db->get('promo')->result_array();
    }

    public function get_promo_id($id)
    {
        $query = $this->db->get_where('promo', array('id' => $id));
        return $query;
    }

    public function get_featured()
    {
        $query = $this->db->query("SELECT `featured`.`id`, `product`.`product_name`, `product`.`price`, `product`.`product_img` 
                                     FROM `featured` 
                                     JOIN `product` 
                                       ON `featured`.`product_id`=`product`.`product_id`");
        return $query->result_array();
    }

    public function get_ftr_id($id)
    {
        $query = $this->db->get_where('featured', array('id' => $id));
        return $query;
    }
}