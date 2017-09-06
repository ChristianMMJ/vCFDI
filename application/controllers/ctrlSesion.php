<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CtrlSesion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('usuario_model');
    }
 
    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado'); 
            $this->load->view('vAdmin');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function onIngreso() {
        try { 
            $data = $this->usuario_model->getAcceso($this->input->post('USUARIO'), $this->input->post('CONTRASENA'));
            if (count($data) > 0) {
                $newdata = array(
                    'USERNAME' => $data[0]->Usuario,
                    'PASSWORD' => $data[0]->Contrasena,
                    'Nombre' => $data[0]->Nombre,
                    'Apellidos' => $data[0]->Apellidos,
                    'ID' => $data[0]->ID,
                    'LOGGED' => TRUE,
                    'TipoAcceso' => $data[0]->TipoAcceso,
                );
                $this->session->mark_as_temp('LOGGED', 28800);
                $this->session->set_userdata($newdata);
                print 1;
            } else {
                print 'ACCESO DENEGADO';
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    
  public function onCambiarContrasena() {
        try {
            extract($this->input->post());
            $DATA = array(
                'Contrasena' => ($Contrasena !== NULL) ? $Contrasena : NULL
            );
            $this->usuario_model->onModificar($ID, $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    
    public function onSalir() {
        try {
            $array_items = array('USERNAME', 'PASSWORD', 'LOGGED');
            $this->session->unset_userdata($array_items);
            header('Location: ' . base_url());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}