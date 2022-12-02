<?php
class Etiket
{
    protected $api    = "";
    protected $url    = "";

    public function __construct()
    {
        $__dIP    = $_SERVER['REMOTE_ADDR'];
        //echo $__dIP;

        if ($__dIP == "::1" || $__dIP == "localhost") {
            $this->url = "http://localhost/chr_dashboards/api/";
        } else {
            $this->url = "https://dashboard.corphr.com/chr_dashboards/api/";
        }
    }

    public function view_data($id, $table)
    {
        $params_etiket        = "view_data|" . $id . "|" . $table . "|";

        $curl = curl_init($this->url . "data_etiket.php?p=" . $params_etiket);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return json_decode($err, true);
        } else {
            return json_decode($response, true);
        }
    }
}
