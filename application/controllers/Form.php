<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form extends CI_Controller
{


	public function index()
	{
		$data['title'] = "Form";

		$data['level_agent'] = $this->db->get('dbo_agen_level');

		$data2['isi'] = $this->load->view('form_input_agen', $data, true);
		$this->load->view('main_view', $data2);
	}

	public function form_action()
	{
		$config = array(
			array(
				'field' => 'no_lisensi',
				'label' => 'no_lisensi',
				'rules' => 'required',
				'error' => array(
					'required' => '*%s harus diisi.',
				)
			),
			array(
				'field' => 'nama_agen',
				'label' => 'nama_agen',
				'rules' => 'required',
				'error' => array(
					'required' => '*%s harus diisi.',
				)
			),
			array(
				'field' => 'level_agen',
				'label' => 'level_agen',
				'rules' => 'required',
				'error' => array(
					'required' => '*%s harus diisi.',
				)
			),
			array(
				'field' => 'wilayah_kerja',
				'label' => 'wilayah_kerja',
				'rules' => 'required',
				'error' => array(
					'required' => '*%s harus diisi.',
				)
			),
		);

		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == TRUE) {
			$no_lisensi = $this->input->post('no_lisensi');
			$nama_agen = $this->input->post('nama_agen');
			$level_agen = $this->input->post('level_agen');
			$wilayah_kerja = $this->input->post('wilayah_kerja');
			$status = $this->input->post('status');
			if ($status != '') {
				$status_aktif = '1';
			} else {
				$status_aktif = '0';
			}

			$create = array(
				'no_lisensi' => $no_lisensi,
				'nama_agen' => $nama_agen,
				'id_agen_level' => $level_agen,
				'wilayah_kerja' => $wilayah_kerja,
				'status'		=> $status_aktif,
				'status_tgl' => date('d-M-Y'),
			);
			$insert = $this->db->insert('dbo_agen', $create);

			if ($insert) {
				$this->session->set_flashdata('msg', '<div class="alert
				alert-success" role="alert">Berhasil Insert</div>');
				redirect('form');
			} else {
				$this->session->set_flashdata('msg', '<div class="alert
			alert-danger" role="alert">Data tidak berhasil insert</div>');
				redirect('form');
			}
		} else {
			$this->session->set_flashdata('msg', '<div class="alert
			alert-danger" role="alert">Data tidak boleh kosong</div>');
			redirect('form');
		}
	}
	public function struktur_agen()
	{
		$data['title'] = "Input Agen";
		$data['nama_agen'] = $this->db->get('dbo_agen');

		$data2['isi'] = $this->load->view('struktur_agen', $data, true);
		$this->load->view('main_view', $data2);
	}

	public function struktur_agen_action()
	{
		$config = array(
			array(
				'field' => 'nama_agen',
				'label' => 'nama_agen',
				'rules' => 'required',
				'error' => array(
					'required' => '*%s harus diisi.',
				)
			),
			array(
				'field' => 'atasan',
				'label' => 'atasan',
				'rules' => 'required',
				'error' => array(
					'required' => '*%s harus diisi.',
				)
			),
			array(
				'field' => 'berlaku_mulai',
				'label' => 'berlaku_mulai',
				'rules' => 'required',
				'error' => array(
					'required' => '*%s harus diisi.',
				)
			),
			array(
				'field' => 'berlaku_akhir',
				'label' => 'berlaku_akhir',
				'rules' => 'required',
				'error' => array(
					'required' => '*%s harus diisi.',
				)
			),
		);

		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == TRUE) {
			$nama_agen = $this->input->post('nama_agen');
			$atasan = $this->input->post('atasan');
			$berlaku_mulai = $this->input->post('berlaku_mulai');
			$berlaku_akhir = $this->input->post('berlaku_akhir');
			$status = $this->input->post('status');
			if ($nama_agen == '4') {
				$this->session->set_flashdata('msg', '<div class="alert
				alert-danger" role="alert">Agent Level RM tidak boleh punya atasan</div>');
				redirect('form/struktur_agen');
			} elseif ($nama_agen == $atasan) {
				$this->session->set_flashdata('msg', '<div class="alert
				alert-danger" role="alert">Nama agen tidak boleh sama dengan nama atasan</div>');
				redirect('form/struktur_agen');
			}
			if ($status != '') {
				$status_aktif = 'A';
			} else {
				$status_aktif = 'N';
			}
			$create = array(
				'id_agen' => $nama_agen,
				'parent_id' => $atasan,
				'berlaku_mulai' => $berlaku_mulai,
				'berlaku_akhir' => $berlaku_akhir,
				'status' => $status_aktif,
			);
			print_r($create);
			die();

			$berhasil = $this->db->insert('dbo_agen_struktur', $create);
			if ($berhasil) {
				$this->session->set_flashdata('msg', '<div class="alert
				alert-success" role="alert">Berhasil Insert</div>');
				redirect('form/struktur_agen');
			} else {
				$this->session->set_flashdata('msg', '<div class="alert
			alert-danger" role="alert">Data tidak berhasil insert</div>');
				redirect('form/struktur_agen');
			}
		} else {
			$this->session->set_flashdata('msg', '<div class="alert
			alert-danger" role="alert">Data tidak boleh kosong</div>');
			redirect('form/struktur_agen');
		}
	}
	public function report_agen()
	{
		$data['title'] = "Input Agen";
		$data['wilayah_kerja'] = $this->input->get('wilayah_kerja', true);
		$data['status'] = $this->input->get('status', true);
		if ($data['wilayah_kerja'] != '') {
			$this->db->where('wilayah_kerja', $data['wilayah_kerja']);
		}
		if ($data['status'] != '') {
			$this->db->where('status', $data['status']);
		}

		$data['query_count']	= $this->db->query($this->db->get_compiled_select('dbo_agen', FALSE));

		$suffix 				= "?wilayah_kerja=" . $data['wilayah_kerja'] . "&status=" . $data['status'];

		$data['query']	= $this->db->query($this->db->get_compiled_select());

		$this->db->select('wilayah_kerja');
		$this->db->group_by('wilayah_kerja');
		$data['wilayah_kerja'] = $this->db->get('dbo_agen');
		$data['country'] = array();
		foreach ($this->db->get_where('dbo_agen')->result_array() as $row) {
			$data['country'][$row['wilayah_kerja']][] = $row; //group rows by country
		}


		$data2['isi'] = $this->load->view('report_agen', $data, true);
		$this->load->view('main_view', $data2);
	}
}
