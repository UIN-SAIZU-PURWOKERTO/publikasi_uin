<?php
$ci =   get_instance();

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        $ci->session->set_flashdata('flashinfo', 'Sesi berakhir, anda telah logout');
        redirect('auth');
    }
}


function sendTemplateView($flag, $view, $data)
{
    $ci =   get_instance();

    $data["user_info"] = $ci->db->get_where('users', ['email' => $ci->session->userdata('username')])->row_array();
    // print_r($data["user_info"]);
    // die();

    if($flag == 1){ //Normal
        $ci->load->view('templates/header', $data);
        $ci->load->view('templates/navbar', $data);
        // $ci->load->view('templates/sidebar', $data);
        $ci->load->view('templates/pre_content', $data);
        $ci->load->view($view, $data);
        $ci->load->view('templates/footer', $data);
    }
    else if($flag == 2){ //Login
        $ci->load->view('templates/auth_header', $data);
        $ci->load->view($view, $data);
        $ci->load->view('templates/auth_footer', $data);
    }
}

function checklistData($id_hari, $id_clinicalpathway, $id_harga_kegiatan)
{
    $ci = get_instance();

    $ci->db->where('id_hari', $id_hari);
    $ci->db->where('id_clinicalpathway', $id_clinicalpathway);
    $ci->db->where('id_harga_kegiatan', $id_harga_kegiatan);

    $result = $ci->db->get('t_clinicalpathway_detail');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } else if (isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'UNKNOWN';
    }

    return $ipaddress;
}