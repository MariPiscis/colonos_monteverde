<?php

class CpersonasMorales extends CI_Controller {
	function __construct(){
		parent:: __construct();
      	$this->load->model('M_persona_moral');  

      }


//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	// EMPIEZA LA PARTE DE PERSONA MORAL

		public function create_personas_morales(){
		if ($this->input->is_ajax_request()) {
			
		
		$this->form_validation->set_rules('razon_social', 'Razon social', 'required|min_length[3]|max_length[40]|is_unique[personas_morales.razon_social]');
		$this->form_validation->set_rules('rfc', 'RFC', 'required|exact_length[12]');
		$this->form_validation->set_rules('id_persona_fisica', 'id persona fisica', 'required');
		$this->form_validation->set_rules('estados', 'Estado', 'required');
		
		$this->form_validation->set_message("required", "Campo {field} es Obligatorio" );
		
		if($this->form_validation->run() === TRUE) 
		{
			$result=$this->M_persona_moral->add_personas_moral();
			if($result==true)
				echo "exito";

			else
				echo "error";
		} 
			else{
				echo validation_errors('<li>','</li>');
				}
		}
			else{
				echo show_404();
				}
		}



		public function create_personas_mor(){
		
		$data['persona_fisica'] = $this->M_persona_moral->verPersonasfisicas();
		$data['title']='Personas Morales';

		$this->load->view('templates/header');
		$this->load->view('persona_moral/create_persona_moral', $data);
		$this->load->view('templates/footer');
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// solo enlaza a la otra pagina 
		public function registros_pm(){
		$data['persona_fisica'] = $this->M_persona_moral->verPersonasfisicas();

		$this->load->view('templates/header');
		$this->load->view('persona_moral/registros_pmorales', $data);
		$this->load->view('templates/footer');
	}

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// para ver la tabla 
	public function verPerMorales(){
		$result = $this->M_persona_moral->verPerMorales();
		echo json_encode($result);
	}	

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	// VAMOS A EDITAR
	public function modificarPmorales(){
		$result = $this->M_persona_moral->modificarPmorales();
		echo json_encode($result);
	}

	public function updatePmorales(){
		$result = $this->M_persona_moral->updatePmorales();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

} 