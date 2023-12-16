<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function index(){

     
      $this->view('pages/index');
    }

    public function ticket_form(){


      $this->view('pages/ticket_form');
    }
      public function ticket(){


          $this->view('pages/ticket');
      }
  }