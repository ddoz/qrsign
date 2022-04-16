<?php


class BUILDER {


    /**
     * 
     * @param array
     * 
     * table : string 
     * primary_key : string default : id optional
     * hide_col : array optional
     * delete_url : string optional
     * update_url : string optional
     * detail_url : string optional
     * 
     */
    public static function buildTable($param = array()) {
        $CI =& get_instance();
        error_reporting(E_ALL);
        $column = [];
        $header = [];
        $body = [];
        $primary_key = "id";
        $action = [];

        // validate array key
        if (!array_key_exists('table', $param)) {
            return "Parameter 'table' wajib.";
            exit();
        } 

        // get table column
        $fields = $CI->db->list_fields($param['table']);
        foreach ($fields as $field)
        {
            $column[] = $field;
        }

        // hide column
        if(array_key_exists("hide_col",$param)) {
            if(is_array($param['hide_col'])) {
                foreach($param['hide_col'] as $pr) {
                    if(in_array($pr,$column)) {
                        if (($key = array_search($pr, $column)) !== false) {
                            unset($column[$key]);
                        }
                    }
                }
            }
        }

        // get primary key 
        if(array_key_exists("primary_key",$param)) {
            $primary_key = $param['primary_key'];
        }
        
        if(array_key_exists("delete_url",$param)) {
            $delete_url = $param["delete_url"];
            $action['delete'] = $delete_url;
        }

        if(array_key_exists("update_url",$param)) {
            $update_url = $param["update_url"];
            $action['update'] = $update_url;
        }

        if(array_key_exists("detail_url",$param)) {
            $detail_url = $param["detail_url"];
            $action['detail'] = $detail_url;
        }

        // build header 
        foreach($column as $col) {
            $val = str_replace('_',' ',ucwords($col,'_'));;
            $header[] = $val;
        }

        // build body
        $body = $CI->db->get($param['table'])->result();

        // wrap to output
        $output = array(
            "column" => $column,
            "primary_key" => $primary_key,
            "header" => $header,
            "body" => $body,
            "action" => $action
        );

        return $output;
    }

}