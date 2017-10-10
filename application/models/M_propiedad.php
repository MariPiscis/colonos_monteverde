<?php

class M_propiedad extends CI_Model {

      public function __construct(){

      	$this->load->database();
      	
      }

       public function get_propiedad($slug = FALSE) {

      	if($slug === FALSE){
      		$query = $this->db->get('propiedades');
      		return $query->result_array();
      	}

      	$query = $this->db->get_where('propiedades', array('slug' => $slug));
      	return $query->row_array();
      	
	  }
	  
	  public function add_propiedad(){
		
		$field = array(
			'numero_escritura'=>$this->input->post('numero_escritura'),
			'domicilio'=>$this->input->post('domicilio'),
            'id_coto'=>$this->input->post('id_coto'),
            'id_tipo_propiedad'=>$this->input->post('id_tipo_propiedad'),
            'id_persona_fisica'=>$this->input->post('id_persona_fisica')
			);

		$this->db->insert('propiedades', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function getPropiedad(){
		$this->db->select('*');
		$this->db->from('propiedades');
		$this->db->join('personas_fisicas','personas_fisicas.id_persona_fisica=propiedades.id_persona_fisica');
		$this->db->join('tipo_propiedad','tipo_propiedad.id_tipo_propiedad=propiedades.id_tipo_propiedad');
		$this->db->join('cotos','cotos.id_coto=propiedades.id_coto');

		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_tipo_propiedad(){
		$query=$this->db->get('tipo_propiedad');
		return $query->result();
	}

	public function get_cotos(){
		$query=$this->db->get('cotos');
		return $query->result();
	}

	public function editPropiedad(){
		$id = $this->input->get('id_propiedad');
		$this->db->where('id_propiedad', $id);
		$query = $this->db->get('propiedades');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updatePropiedad(){
		$id = $this->input->post('id_propiedad');
		$field = array(
		'numero_escritura'=>$this->input->post('numero_escritura'),
        'domicilio'=>$this->input->post('domicilio'),
        'id_coto'=>$this->input->post('id_coto'),
        'id_tipo_propiedad'=>$this->input->post('id_tipo_propiedad'),
		'id_persona_fisica'=>$this->input->post('id_persona_fisica')
		);
		$this->db->where('id_propiedad', $id);
		$this->db->update('propiedades', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
    }

}