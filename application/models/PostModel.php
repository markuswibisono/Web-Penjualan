<?php
class PostModel extends CI_Controller {
//   function getCategory(){
//     $this->db->select("*"); 
//     $this->db->from('tb_category');
//     $query = $this->db->get();
//     return $query->result();
//  }

 function getDataUser(){
    $this->db->select("*"); 
    $this->db->from('tb_user');
    $query = $this->db->get();
    return $query->result();
 }

 function inputData($name,$alamat,$kota,$email,$phone) {
        // $this->db->insert('tb_user',$data);
    $query="INSERT INTO `tb_user`( `name`, `alamat`, `kota`, `email`, `phone`) 
		VALUES ('$name','$alamat','$kota','$email','$phone')";
		$this->db->query($query);
  }

  function getDetailUser($id) {
    $this->db->select("*"); 
    $this->db->from('tb_user');
    $this->db->where('name', $id);
    $query = $this->db->get();
    return $query->result();
  }

  function getDataProduk(){
    $this->db->select("*"); 
    $this->db->from('tb_master');
    $query = $this->db->get();
    return $query->result();
 }

  function updateUser($id, $textName, $textAlamat, $textKota, $textEmail, $textPhone){
    $data = array(
      'name' => $textName,
      'alamat' => $textAlamat,
      'kota' => $textKota,
      'email' => $textEmail,
      'phone' => $textPhone
    );
    $this->db->where('name', $id); 
    $this->db->update('tb_user', $data);
  }

function row_delete_user($id)
{
  $this->db->where('name', $id);
  $this->db->delete('tb_user'); 
}

    // function getInfoEditBuku(){
    //     $hsl=$this->db->query("SELECT * FROM master_buku");
    //         foreach ($hsl->result() as $data) {
    //             $hasil=array(
    //                 'name' => $data->name
    //             );
    //         }
    //     return $hasil;
    //  }

    //  function editData($nameBook, $data){
    //     $this->db->where('namaBuku', $nameBook);
    //     $this->db->update('master_buku', $data);
    // }

    // function row_delete($id)
    // {
    //     $this->db->where('namaBuku', $id);
    //     $this->db->delete('master_buku'); 
    // }

    // function countDataMaster()
    // {
    //     $this->db->select('*');
    //     $this->db->from('master_buku');
    //     $countDataTable = $this->db->get()->num_rows();
    //     return $countDataTable;
    // }
}
?>