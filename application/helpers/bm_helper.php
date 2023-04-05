<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        #$queryMenu = $ci->db->get_where('menu_sidebar', ['menu' => $menu])->row_array();
        #$menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('access_menu', [
            'role_id' => $role_id,
            'menu_id' => $role_id
        ]);

        if ($ci->session->role_id == 3) {
            redirect('auth/blocked');
        }
    }
}

function menu_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('menu_sidebar', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($role_id == 2) {
            redirect('auth/blocked');
        }
    }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $result = $ci->db->get_where('access_menu', [
        'role_id' => $role_id,
        'menu_id' => $menu_id
    ]);

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}