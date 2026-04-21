<?php

function getAuthor($code, $strcol)
{
    $ci =   get_instance();
    $result = $ci->db->get_where('sinta_authors', ['id' => $code])->row_array();
    if ($result) {
        $response =  $result[$strcol];
    } else {
        $response =  "-";
    }
    return $response;
}

function getAuthorArray($author_ids, $field = 'name')
    {
        if (empty($author_ids)) {
            return '-';
        }

        $CI =& get_instance();

        // Ubah "6677906,6965139" → [6677906, 6965139]
        $ids = array_filter(array_map('trim', explode(',', $author_ids)));

        if (empty($ids)) {
            return '-';
        }

        $CI->db->select($field);
        $CI->db->from('sinta_authors');
        $CI->db->where_in('id', $ids);
        $query = $CI->db->get()->result_array();

        if (!$query) {
            return '-';
        }

        // Ambil hanya field yg diminta
        $result = array_column($query, $field);

        return implode(', ', $result);
    }
    
function getRole($code, $strcol)
{
    $ci =   get_instance();
    $result = $ci->db->get_where('role', ['role_id' => $code])->row_array();
    if ($result) {
        $response =  $result[$strcol];
    } else {
        $response =  "-";
    }
    return $response;
}

function getProdi($code, $strcol)
{
    $ci =   get_instance();
    $result = $ci->db->get_where('mst_prodi', ['id' => $code])->row_array();
    if ($result) {
        $response =  $result[$strcol];
    } else {
        $response =  "-";
    }
    return $response;
}

function getFakultas($code, $strcol)
{
    $ci =   get_instance();
    $result = $ci->db->get_where('mst_fakultas', ['fakultas_id' => $code])->row_array();
    if ($result) {
        $response =  $result[$strcol];
    } else {
        $response =  "-";
    }
    return $response;
}

function p($kode)
{
        $response =  print_r('<pre>'.json_encode($kode, JSON_PRETTY_PRINT).'<pre>').die();
        return $response;
}

function getRupiah($angka)
{
    if($angka){
        $hasil_rupiah = "" . number_format($angka, 0, ',', '.');
    }else{
        $hasil_rupiah = "0";
    }

    return $hasil_rupiah;
}

function getTanggal($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split = explode('-', $tanggal);

    if($tanggal <> "0000-00-00"){
        $response =  $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
    }else if ($tanggal == "0000-00-00") {
        $response =  "-";
    } else {
        $response =  "-";
    }
    return $response;
}

function getBulan($bulan)
{
    switch ($bulan) {
        case 1:
            $bulan = "Januari";
            break;
        case 2:
            $bulan = "Februari";
            break;
        case 3:
            $bulan = "Maret";
            break;
        case 4:
            $bulan = "April";
            break;
        case 5:
            $bulan = "Mei";
            break;
        case 6:
            $bulan = "Juni";
            break;
        case 7:
            $bulan = "Juli";
            break;
        case 8:
            $bulan = "Agustus";
            break;
        case 9:
            $bulan = "September";
            break;
        case 10:
            $bulan = "Oktober";
            break;
        case 11:
            $bulan = "November";
            break;
        case 12:
            $bulan = "Desember";
            break;
    }
    return $bulan;
}