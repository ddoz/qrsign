<?php

function autonumberpekerja() {
    $CI =& get_instance();
    $CI->db->select('no_pendaftaran');
    $query = $CI->db->order_by('id','desc')->get('pekerja');
    $new_code = "PKR-00000001";
    if($query->num_rows() > 0) {
        $id_max = explode("-",$query->row()->no_pendaftaran);
        $sort_num = (int) substr($id_max[1], 1, 8);
        $sort_num++;
        $new_code = "PKR-".sprintf("%08s", $sort_num);
    }
    return $new_code;
}
