<?php
class DataModel extends CI_Model
{

    public function convertDateToUnix( $date ){

        return date("Y-m-d", strtotime(strtr($date, '/', '-')));

    }

    public function convertDateToFriendly( $date){

        return date("d/m/Y", strtotime(strtr($date, '/', '-')));

    }

}