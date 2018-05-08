<?php

class Schools_model extends CI_Model
{


    public function __construct()
    {

        $this->load->database();

    }


    public function get_schools($where="",$request="",$limit="",$offset=""){

        $this->db->select('*');
        $this->db->limit($limit, $offset);
        if( $where == null ) {
            $query = $this->db->get('mploy_schools');
            $count = $this->db->from('mploy_schools')->count_all_results();
        } else {
            $query = $this->db->get_where('mploy_schools', $where);
            $count = $this->db->from('mploy_schools')->where($where)->count_all_results();
        }
        return array('data' => $query->result(), 'count' => $count);

        /*$query = $this->db->get('mploy_schools');
        return $query->result_array();*/

    }

    public function get_school($id){

       $query = $this->db->get_where('mploy_schools',array('id' => $id));
       return $query->row_array();

    }







}