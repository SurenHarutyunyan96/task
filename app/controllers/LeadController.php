<?php

namespace App\Controllers;

use App\Models\Lead;
use App\Request;

class LeadController extends Controller
{
    public function index()
    {
        return $this->render('index');
    }

    public function index2()
    {
        return $this->render('index2');
    }

    public function banner()
    {
        try {

            $request = (new Request)->getBody();
            $data = ['ip_address' => $this->getIPAddress(), 'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? '', 'page_url' => $request['source']];
            $lead = new Lead();
            $find = $lead->find($data);
            if ($find && isset($find['id']))
                $lead->update($find['id'], $data);
            else
                $lead->create($data);

        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }

    }


    private function getIPAddress()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

}