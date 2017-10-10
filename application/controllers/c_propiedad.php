<?php

class C_propiedad extends CI_Controller{
    
    function __construct(){
		parent:: __construct();
        $this->load->model('M_propiedad');
        $this->load->model('M_persona_fisica');
    }

    public function create_propiedad(){
        $data['title']='Propiedad';
        $data['id_persona_fisica'] = $this->M_persona_fisica->getPersonasFisicas();
        $data['id_tipo_propiedad'] = $this->M_propiedad->get_tipo_propiedad();
        $data['id_coto'] = $this->M_propiedad->get_cotos();

        $this->load->view('templates/header');
        $this->load->view('propiedad/create_propiedad',$data);
        $this->load->view('templates/footer');       
    }

    public function add_propiedad(){
		if ($this->input->is_ajax_request()) {
			
            $this->form_validation->set_rules('numero_escritura', 'Numero Escritura', 'required');
            $this->form_validation->set_rules('domicilio', 'Domicilio', 'required');
            $this->form_validation->set_rules('id_coto', 'Coto', 'required|callback_id_coto');
            $this->form_validation->set_rules('id_tipo_propiedad', 'Tipo Propiedad', 'required|callback_id_tipo_propiedad');
            $this->form_validation->set_rules('id_persona_fisica', 'Persona Fisica', 'required|callback_id_persona_fisica');

			if ($this->form_validation->run() === TRUE) {
                $result = $this->M_propiedad->add_propiedad();
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

    public function getPropiedad(){      
        $result = $this->M_propiedad->getPropiedad();
        echo json_encode($result);
        // echo ($result);
    }

    public function verPropiedad(){
        $data['title']='Propiedad';
        $data['id_persona_fisica'] = $this->M_persona_fisica->getPersonasFisicas();
        $data['id_tipo_propiedad'] = $this->M_propiedad->get_tipo_propiedad();
        $data['id_coto'] = $this->M_propiedad->get_cotos();

        $this->load->view('templates/header');
        $this->load->view('propiedad/obtener_propiedad',$data);  
        $this->load->view('templates/footer');        
    }

    public function editPropiedad(){      
        $result = $this->M_propiedad->editPropiedad();
        echo json_encode($result);
        // echo ($result);
    }

    public function updatePropiedad(){ 
        $result = $this->M_propiedad->updatePropiedad();
        echo json_encode($result);
        // echo ($result);
            
    }

    public function id_coto($str){
        if ( $str=='0' ) 
            { 
                $this->form_validation->set_message('id_coto','Selecciona una de las opciones del {field}'); 
                return  FALSE ; 
            } 
        else 
            { 
                return  TRUE ; 
            } 
    }

    public function id_tipo_propiedad($str){
        if ( $str=='0' ) 
            { 
                $this->form_validation->set_message('id_tipo_propiedad','Selecciona una de las opciones del {field}'); 
                return  FALSE ; 
            } 
        else 
            { 
                return  TRUE ; 
            } 
    }

    public function id_persona_fisica($str){
        if ( $str=='0' ) 
            { 
                $this->form_validation->set_message('id_persona_fisica','Selecciona una de las opciones del {field}'); 
                return  FALSE ; 
            } 
        else 
            { 
                return  TRUE ; 
            } 
    }
    

}