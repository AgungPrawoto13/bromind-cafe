<?php
class Landingp_model extends CI_Model
{
	public function page()
	{
		return $this->db->get('page')->result_array();
	}

	public function website()
	{
		return $this->db->get('website')->result_array();
	}

	public function story()
	{
		return $this->db->get('story')->result_array();
	}

	public function new_product()
	{
		return $this->db->query("SELECT * FROM produk ORDER BY id_produk desc limit 3")->result();
	}

	public function all_product()
	{
		return $this->db->get('produk')->result();
	}

	public function cart()
	{
		return $this->db->query('SELECT * FROM `cart` inner join produk on cart.id_produk = produk.id_produk')->result();
	}

	public function order()
	{
		return $this->db->query('SELECT name_produk FROM `cart` inner join produk on cart.id_produk = produk.id_produk')->result_array();
	}

	public function total_cart()
	{
		return $this->db->query('SELECT sum(price) AS total FROM `cart` inner join produk on cart.id_produk = produk.id_produk')->row();
	}

	public function save_cart($data)
	{
		return $this->db->insert('cart',$data);
	}

	public function remove_cart($data)
	{
		return $this->db->delete('cart',$data);
	}

	public function insert_message($data)
	{
		return $this->db->insert('contact',$data);
	}
}