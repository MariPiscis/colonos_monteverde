<?php

class M_persona_moral extends CI_Model {

    public function __construct(){
     $this->load->database();

    }

   public function get_persona_moral($slug = FALSE) {
     if($slug === FALSE){
      $query = $this->db->get('personas_fisicas');
      return $query->result_array();
    }

    $query = $this->db->get_where('personas_fisicas', array('slug' => $slug));
    return $query->row_array();      	
    }

    public function add_personas_moral(){

    $field = array(

      'razon_social'=>$this->input->post('razon_social'),
      'rfc'=>$this->input->post('rfc'),
      'id_persona_fisica'=>$this->input->post('id_persona_fisica'),
      'estados'=>$this->input->post('estados'),
      );

      $this->db->insert('personas_morales', $field);
      if($this->db->affected_rows() > 0){
        return true;
      }else{
        return false;
      }
    }

    public function verPersonasfisicas(){
    $query = $this->db->get('personas_fisicas');
    return $query->result();
    }

    // +++++++++++++++++++++++++++++++++++++++++++++++++++
      // PARA VER LOS DATOS EN LA TABLA 
    public function verPerMorales(){
    $this->db->select('*'); 
    $this->db->from('personas_morales');
    $this->db->join('personas_fisicas','personas_morales.id_persona_fisica=personas_fisicas.id_persona_fisica');

    $query = $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }

  // +++++++++++++++++++++++++++++++++++++++++++++++++++
    // PARA EDITAR LOS DATOS

  public function modificarPmorales(){
    
    $id = $this->input->get('id_persona_moral');
    $this->db->where('id_persona_moral', $id);
    $query = $this->db->get('personas_morales');
    if($query->num_rows() > 0){
      return $query->row();
    }else{
      return false;
    }
  }

  public function updatePmorales(){
    $id = $this->input->post('id_persona_moral');
    $field = array(
      'razon_social'=>$this->input->post('razon_social'),
      'rfc'=>$this->input->post('rfc'),
      'id_persona_fisica'=>$this->input->post('id_persona_fisica'),
      'estados'=>$this->input->post('estados')
      );

    $this->db->where('id_persona_moral', $id);
    $this->db->update('personas_morales', $field);
    if($this->db->affected_rows() > 0){
      return true;
    }else{
      return false;
    }
  }

}