<?php

function autonumberpekerja() {
    $CI =& get_instance();
    $CI->db->select('no_pendaftaran');
    $query = $CI->db->order_by('id','desc')->get('pekerja');
    // $new_code = "PKR-00000001";
    // if($query->num_rows() > 0) {
    //     $id_max = explode("-",$query->row()->no_pendaftaran);
    //     $sort_num = (int) substr($id_max[1], 1, 8);
    //     $sort_num++;
    //     $new_code = "PKR-".sprintf("%08s", $sort_num);
    // }

    $new_code = "1806000000001".date('Y');
    if($query->num_rows()>0) {
        $id_max = $query->row()->no_pendaftaran;
        $sort_num = (int)substr($id_max,4,9);
        $sort_num++;
        $new_code = "1806".sprintf("%09s",$sort_num).date('Y');
    }
    return $new_code;
}
