<?php

namespace App\Controllers;

class Acara extends BaseController
{
  public function index()
  {
    //Cara 1 : Query Builder
    $builder = $this->db->table('acara');
    $query = $builder->get()->getResult();
    $data['acara'] = $query;
    return view('acara/get', $data);
  }

  public function create()
  {
    return view('acara/add');
  }

  public function store()
  {
    $validate = $this->validate([
      'name_acara' => [
        'rules' => 'required|min_length[3]',
        'errors' => [
          'required' => 'Nama acara tidak boleh kosong.',
          'min_length' => 'Nama acara minimal 3 karakter.',
        ],
      ],
      'date_acara' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tanggal acara tidak boleh kosong.',
        ],
      ],
    ]);

    if (!$validate) {
      return redirect()
        ->back()
        ->withInput();
    }

    $data = $this->request->getPost();
    $this->db->table('acara')->insert($data);

    if ($this->db->affectedRows() > 0) {
      return redirect()
        ->to('/acara')
        ->with('success', 'Data berhasil ditambahkan');
    }
  }
  public function edit($id = null)
  {
    if ($id != null) {
      $query = $this->db->table('acara')->getWhere(['id_acara' => $id]);
      if ($query->resultID->num_rows > 0) {
        $data['acara'] = $query->getRow();
        return view('acara/edit', $data);
      } else {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
      }
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  public function update($id)
  {
    $validate = $this->validate([
      'name_acara' => [
        'rules' => 'required|min_length[3]',
        'errors' => [
          'required' => 'Nama acara tidak boleh kosong.',
          'min_length' => 'Nama acara minimal 3 karakter.',
        ],
      ],
      'date_acara' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tanggal acara tidak boleh kosong.',
        ],
      ],
    ]);
    if (!$validate) {
      return redirect()
        ->back()
        ->withInput();
    }

    $data = $this->request->getPost();
    unset($data['_method']);
    $this->db
      ->table('acara')
      ->where(['id_acara' => $id])
      ->update($data);
    return redirect()
      ->to('/acara')
      ->with('success', 'Data berhasil diupdate');
  }
  public function destroy($id)
  {
    $this->db
      ->table('acara')
      ->where(['id_acara' => $id])
      ->delete();
    return redirect()
      ->to('/acara')
      ->with('success', 'Data berhasil dihapus');
  }
}
