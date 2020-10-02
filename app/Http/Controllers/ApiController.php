<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index($expertId)
    {
        $clientsData = \DB::table('clients')->where('expert', $expertId)->get();
        $clients = json_decode($clientsData, true);

        foreach ($clients as $clientKey => $clientValue) {
          $elapsed_time = $this->dateDiff($clientValue['created_at']);

          $scoring = ($clientValue['requested_amount'] / $clientValue['net_income']) * $elapsed_time;
          
          $clients[$clientKey]['scoring'] = $scoring;
        }

        $clients = $this->orderByScoring($clients, 'scoring');

        return $clients;
    }

    private function dateDiff($date) {
        $starttime = strtotime($date);
        $endtime = microtime(true);
        return round(($endtime - $starttime) / 1000, 2);
    }

    private function orderByScoring ($toOrderArray, $field, $inverse = true) {
        $position = array();
        $newRow = array();
        foreach ($toOrderArray as $key => $row) {
            $position[$key]  = $row[$field];
            $newRow[$key] = $row;
        }
        if ($inverse) {
            arsort($position);
        }
        else {
            asort($position);
        }
        $returnArray = array();
        foreach ($position as $key => $pos) {
            $returnArray[] = $newRow[$key];
        }
        return $returnArray;
    }
}
