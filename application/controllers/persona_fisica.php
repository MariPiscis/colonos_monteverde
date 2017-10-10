<?php
class Persona_fisica extends CI_Controller{

    function __construct(){
		parent:: __construct();
        $this->load->model('M_persona_fisica');
    }
    
    public function create_personas_fisicas(){
        $data['title']='Personas Fisicas';
        $data['tipo_dueno'] = $this->M_persona_fisica->get_tipo_dueno();
        $this->load->view('templates/header');
        $this->load->view('persona_fisica/create_persona_fisica', $data);
        $this->load->view('templates/footer');       
    }

    public function add_personas_fisicas(){
		if ($this->input->is_ajax_request()) {
			
            $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[3]|max_length[20]|alpha|trim');
            $this->form_validation->set_rules('apellido_paterno', 'Apellido Paterno', 'required|min_length[3]|max_length[20]|alpha|trim');
            $this->form_validation->set_rules('curp', 'Curp', 'required|exact_length[18]|alpha_numeric|is_unique[personas_fisicas.curp]');
            $this->form_validation->set_rules('tipo_dueno', 'Tipo Dueño', 'required|callback_tipo_dueno_validando');
            $this->form_validation->set_rules('telefono', 'Telefono', 'required|is_unique[personas_fisicas.telefono]|numeric|exact_length[10]');
            $this->form_validation->set_rules('correo_electronico', 'Correo Electronico', 'required|valid_email|is_unique[personas_fisicas.correo_electronico]');
            $this->form_validation->set_rules('estado', 'Estado de Persona Fisica', 'required|callback_estado_validando');

			if ($this->form_validation->run() === TRUE) {
                $result = $this->M_persona_fisica->add_personas_fisicas();
                    if($result==true)
                        echo ('exito');
                    else
                        echo ('error');
            }
			else{
				echo validation_errors('<li>','</li>');
            }    
		}
		else
		{
			show_404();
        }
    }
    
    
    public function estado_validando($str){
        if ( $str=='0' ) 
            { 
                $this->form_validation->set_message('estado_validando','Selecciona una de las opciones del {field}'); 
                return  FALSE ; 
            } 
        else 
            { 
                return  TRUE ; 
            } 
    }

    
    public function tipo_dueno_validando($str){
        if ( $str=='0' ) 
            { 
                $this->form_validation->set_message('tipo_dueno_validando','Selecciona una de las opciones del  {field}'); 
                return  FALSE ; 
            } 
        else 
            { 
                return  TRUE ; 
            } 
    }

    public function getPersonasFisicas(){      
        $result = $this->M_persona_fisica->getPersonasFisicas();
        echo json_encode($result);
        // echo ($result);
    }

    public function verPersonasFisicas(){
        $data['tipo_dueno'] = $this->M_persona_fisica->get_tipo_dueno();
        $this->load->view('templates/header');
        $this->load->view('persona_fisica/obtener_personas_fisicas',$data);  
        $this->load->view('templates/footer');        
    }

    public function editPersonasFisicas(){      
        $result = $this->M_persona_fisica->editPersonasFisicas();
        echo json_encode($result);
        // echo ($result);
    }

    public function updatePersonasFisicas(){ 
        $result = $this->M_persona_fisica->updatePersonasFisicas();
        echo json_encode($result);
        // echo ($result);
            
    }
}

