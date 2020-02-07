<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Session;

class PrintSppFormType extends Form
{
    protected $siswa;
    protected $type;
    protected $choices;
    protected $semester;
    public function __construct(){
        $this->semester = [
            1 => 'Semester 1',
            2 => 'Semester 2',
        ];
        if(Session::get('role') == '2' or Session::get('role') == '1'){
          $this->siswa = [
              Session::get('detail.nisn') => Session::get('nama_siswa')
            ] ;
          $this->type = 'select';
          $this->choices = 'choices';
        } else {
          $this->siswa = 'App\Siswa';
          $this->type = 'entity';
          $this->choices = 'class';
        }
        $now = date("Y");
    }
    public function buildForm()
    {
        $this->add('nama_siswa', $this->type, [
            'rules' => 'required',
            'label' => 'Nama Siswa',
            $this->choices => $this->siswa,
            'property' => 'nama_siswa_text',
            'attr' => ['class' => 'uk-select select2'],
            'wrapper' => ['class' =>  "uk-width-1-1" ]
        ])
        ->add('periode', 'select', [
            'rules' => 'required',
            'label' => 'Periode',
            'choices' => $this->semester,
            'attr' => ['class' => 'uk-select select2'],
            'wrapper' => ['class' =>  "uk-width-1-1" ]
        ])
        ->add('Print', 'submit', [
            'attr' => ['class' => 'uk-button uk-button-primary uk-button-large uk-width-1-1', 'name' => 'Submit', 'value' => 'pdf'],
            'wrapper' => ['class' => 'uk-width-1-1', 'style' => 'margin-top: 1.2vh']
        ]);
    }
}
