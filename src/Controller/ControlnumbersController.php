<?php

namespace App\Controller;

use App\Controller\AppController;

class ControlNumbersController extends AppController {

    public function index() {
        $this->set(compact('index'));
    }

    public function verifyPhoneNumber() {
        // check if the conrol number is valid and not consummed 
        $this->set(compact('verifyPhoneNumber'));
    }

    public function getService() {
        // redirect to the page 
        $this->set(compact('getService')); // load the requested service step by step instructions
    }

}
