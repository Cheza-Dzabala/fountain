<?php

namespace App\Classes\websystem;

use App\employers;

class clientsClass {

    public function createClient()
    {
        $employers = employers::get();
        return view('clients.new', compact('employers'));
    }



}

?>