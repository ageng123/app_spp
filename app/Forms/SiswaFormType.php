<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;


class SiswaFormType extends Form
{
    public function buildForm()
    {
        $this->add('nisn', Field::TEXT, [
            'rules' => 'required|min:9|max:15',
            'label' => 'NIM Siswa',
            'data' => [],
            'label_attr' => ['class' => 'uk-form-label'],
            'attr' => ['class' => 'uk-input', 'max' => '13'],
            'wrapper' => ['class' =>  "uk-width-1-1" ]
        ])
        ->add('nama_siswa_text', Field::TEXT, [
            'rules' => 'required',
            'label' => 'Nama Siswa',
            'attr' => ['class' => 'uk-input'],
            'wrapper' => ['class' =>  "uk-width-1-1" ]

        ])
        ->add('tpt_lahir', Field::TEXT, [
            'rules' => 'required',
            'label' => 'Tempat Lahir',
            'attr' => ['class' => 'uk-input'],
            'wrapper' => ['class' =>  "uk-width-1-2" ]

        ])
        ->add('tgl_lahir', Field::DATE, [
            'rules' => 'required',
            'label' => 'Tanggal Lahir',
            'attr' => ['class' => 'uk-input'],
            'wrapper' => ['class' =>  "uk-width-1-2" ]

        ])
        ->add('alamat', Field::TEXTAREA, [
            'rules' => 'required',
            'label' => 'Alamat Siswa',
            'attr' => ['class' => 'uk-textarea'],
            'wrapper' => ['class' =>  "uk-width-1-1" ]
        ])
        ->add('jk', 'select', [
            'rules' => 'required',
            'label' => 'Jenis Kelamin',
            'choices' => ['L' => 'Laki-Laki', 'P' => 'Perempuan'],
            'empty_value' => 'Pilih Jenis Kelamin',
            'attr' => ['class' => 'uk-select'],
            'wrapper' => ['class' =>  "uk-width-1-1" ]
        ])
        ->add('jurusan', 'entity', [
            'rules' => 'required',
            'class' => 'App\Jurusan',
            'property' => 'jurusan_text',
            'label' => 'Jurusan',
            'attr' => ['class' => 'uk-select'],
            'wrapper' => ['class' =>  "uk-width-1-2" ]
        ])
        ->add('kelas', 'entity', [
            'rules' => 'required',
            'label' => 'Kelas',
            'class' => 'App\Kelas',
            'property' => 'kelas_text',
            'attr' => ['class' => 'uk-select'],
            'wrapper' => ['class' =>  "uk-width-1-2" ]
        ])
        ->add('id_orangtua', Field::TEXT, [
            'rules' => 'required',
            'label' => 'Nomor Induk Kependudukan Wali Murid',
            'attr' => ['class' => 'uk-textarea'],
            'wrapper' => ['class' =>  "uk-width-1-1" ]
        ])
        ->add('nama_orangtua_text', Field::TEXT, [
            'rules' => 'required',
            'label' => 'Nama Wali Murid',
            'attr' => ['class' => 'uk-textarea'],
            'wrapper' => ['class' =>  "uk-width-1-1" ]
        ])
        ->add('no_telp', Field::TEXT, [
            'rules' => 'required',
            'label' => 'No. Telp Wali Murid',
            'attr' => ['class' => 'uk-textarea'],
            'wrapper' => ['class' =>  "uk-width-1-1" ]
        ])
        ->add('Submit', 'submit', [
            'attr' => ['class' => 'uk-button uk-button-primary uk-button-large uk-width-1-1', 'name' => 'Submit'],
            'wrapper' => ['class' => 'uk-width-1-1', 'style' => 'margin-top: 1.2vh']
        ]);
    }
}
