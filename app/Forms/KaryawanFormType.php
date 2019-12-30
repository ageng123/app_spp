<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class KaryawanFormType extends Form
{
    public function buildForm()
    {
        $this
            ->add('nik', 'text',  [
                'rules' => 'required|min:9',
                'label' => 'NIK Karyawan',
                'attr' => ['class' => 'uk-input'],
                'wrapper' => ['class' =>  "uk-width-1-2" ]
                
            ])
            ->add('jabatan', 'entity', [
                'rules' => 'required',
                'empty_value' => 'Pilih Jabatan Karyawan',
                'class' => 'App\Role',
                'property' => 'jabatan_text',
                'label' => 'Jabatan Karyawan',
                'attr' => ['class' => 'uk-select'],
                'wrapper' => ['class' =>  "uk-width-1-2" ]          
            ])
            ->add('nama_karyawan_text', 'text',  [
                'rules' => 'required',
                'label' => 'Nama Karyawan',
                'attr' => ['class' => 'uk-input'],
                'wrapper' => ['class' =>  "uk-width-1-1" ]
                
            ])
            ->add('tpt_lahir', 'text',  [
                'rules' => 'required',
                'label' => 'Tempat Lahir',
                'attr' => ['class' => 'uk-input'],
                'wrapper' => ['class' =>  "uk-width-1-2" ]
                
            ])
            ->add('tgl_lahir', 'date', [
                'rules' => 'required',
                'label' => 'Tanggal Lahir',
                'attr' => ['class' => 'uk-input'],
                'wrapper' => ['class' =>  "uk-width-1-2" ]
                
            ])
            ->add('jk', 'select', [
                'rules' => 'required',
                'label' => 'Jenis Kelamin',
                'choices' => ['L' => 'Laki-Laki', 'P' => 'Perempuan'],
                'empty_value' => 'Pilih Jenis Kelamin',
                'attr' => ['class' => 'uk-select'],
                'wrapper' => ['class' =>  "uk-width-1-1" ]          
            ])
            ->add('alamat', 'textarea', [
                'rules' => 'required',
                'label' => 'Alamat Karyawan',
                'attr' => ['class' => 'uk-textarea'],
                'wrapper' => ['class' =>  "uk-width-1-1" ]          
            ])
            ->add('no_telp', 'text',  [
                'rules' => 'required|min: 10',
                'label' => 'No_telp',
                'attr' => ['class' => 'uk-input'],
                'wrapper' => ['class' =>  "uk-width-1-1" ]
                
            ])
            ->add('Submit', 'submit', [
                'attr' => ['class' => 'uk-button uk-button-primary uk-button-large uk-width-1-1', 'name' => 'Submit'],
                'wrapper' => ['class' => 'uk-width-1-1', 'style' => 'margin-top: 1.2vh']
            ]);
    }
}
