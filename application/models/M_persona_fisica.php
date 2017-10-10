<?php

class M_persona_fisica extends CI_Model {

      public function __construct(){

      	$this->load->database();

      }

      public function get_persona_fisica($slug = FALSE) {

      	if($slug === FALSE){
      		$query = $this->db->get('personas_fisicas');
      		return $query->result_array();
      	}

      	$query = $this->db->get_where('personas_fisicas', array('slug' => $slug));
      	return $query->row_array();
	  }
	  
	  public function add_personas_fisicas(){
		
		$field = array(
			'nombre'=>$this->input->post('nombre'),
			'apellido_paterno'=>$this->input->post('apellido_paterno'),
            'apellido_materno'=>$this->input->post('apellido_materno'),
            'curp'=>$this->input->post('curp'),
            'tipo_dueno'=>$this->input->post('tipo_dueno'),
			'telefono'=>$this->input->post('telefono'),
			'correo_electronico'=>$this->input->post('correo_electronico'),
			'estado'=>$this->input->post('estado')
			);

		$this->db->insert('personas_fisicas', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function get_tipo_dueno(){
		$query=$this->db->get('tipo_dueno');
		return $query->result();
	}

	public function getPersonasFisicas(){
		$this->db->select('*');
		$this->db->from('personas_fisicas');
		$this->db->join('tipo_dueno','personas_fisicas.tipo_dueno=tipo_dueno.id_tipo_dueno');

		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function editPersonasFisicas(){
		$id = $this->input->get('id_persona_fisica');
		$this->db->where('id_persona_fisica', $id);
		$query = $this->db->get('personas_fisicas');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updatePersonasFisicas(){
		$id = $this->input->post('id_persona_fisica');
		$field = array(
		'nombre'=>$this->input->post('nombre'),
        'apellido_paterno'=>$this->input->post('apellido_paterno'),
        'apellido_materno'=>$this->input->post('apellido_materno'),
        'curp'=>$this->input->post('curp'),
		'tipo_dueno'=>$this->input->post('tipo_dueno'),
		'telefono'=>$this->input->post('telefono'),
		'correo_electronico'=>$this->input->post('correo_electronico'),
		'estado'=>$this->input->post('estado')
		);
		$this->db->where('id_persona_fisica', $id);
		$this->db->update('personas_fisicas', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
    }
}