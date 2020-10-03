<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller {

    public function index($expertId) {
        // obtener lista de clientes asociados al experto indicado en la URL
        $clientsData = \DB::table('clients')->where('expert', $expertId)->get();

        // convertimos el JSON en un array
        $clients = json_decode($clientsData, true);

        foreach ($clients as $clientKey => $client) {
          // calcular horas transcurridas
          $elapsed_time = $this->dateDiff($client['created_at']);

          // calcular el scoring
          $scoring = ($client['requested_amount'] / $client['net_income']) * $elapsed_time;
          
          // se añade el scoring al array del cliente
          $clients[$clientKey]['scoring'] = $scoring;
        }

        // reordenar el array por el scoring de mayor a menor
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
