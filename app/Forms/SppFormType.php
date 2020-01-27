<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class SppFormType extends Form
{
    protected $bulan;
    protected $periode;
    protected $tahun_ajaran;
    public function __construct()
    {
        $this->bulan = [
            1 => 'Januari', 
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli', 
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];
        $now = date("Y");
        for($i = $now - 5; $i <= $now + 5 ; $i++ ){
            $this->periode[$i] = $i;
        }
        for($i = $now - 5; $i <= $now + 5 ; $i++ ){
            $a = $i + 1;
            $this->tahun_ajaran[$i.'/'.$a] = $i.'/'.$a;
        }
    }
    public function buildForm()
    {
        $this
            ->add('nama_siswa', 'entity', [
                'rules' => 'required',
                'label' => 'Nama Siswa',
                'class' => 'App\Siswa',
                'data' => [],
                'property' => 'nama_siswa_text',
                'attr' => ['class' => 'uk-select select2'],
                'wrapper' => ['class' =>  "uk-width-1-1" ]          
            ])
            ->add('periode', 'select', [
                'rules' => 'required',
                'label' => 'Periode',
                'choices' => $this->periode,
                'attr' => ['class' => 'uk-select select2'],
                'wrapper' => ['class' =>  "uk-width-1-2" ]          
            ])
            ->add('tahun_ajaran', 'select', [
                'rules' => 'required',
                'label' => 'Tahun Ajaran',
                'choices' => $this->tahun_ajaran,
                'attr' => ['class' => 'uk-select select2'],
                'wrapper' => ['class' =>  "uk-width-1-2" ]          
            ])
            ->add('bulan[]', 'select', [
                'rules' => 'required',
                'label' => 'Bulan',
                'choices' => $this->bulan,
                'attr' => [ 'class'=>"uk-input select2", 'multiple'],
                'wrapper' => ['class' =>  "uk-width-1-2" ]          
            ])
            ->add('tgl_bayar', 'date', [
                'rules' => 'required',
                'label' => 'Tanggal Bayar',
                'attr' => ['class' => 'uk-input flatpicker'],
                'wrapper' => ['class' =>  "uk-width-1-2" ]])
            ->add('bayar', 'text', [
                'rules' => 'required',
                'label' => 'Total Bayar',
                'attr' => ['class' => 'uk-input'],
                'wrapper' => ['class' =>  "uk-width-1-1" ]])
            ->add('Simpan', 'submit', [
                'attr' => ['class' => 'uk-button uk-button-default uk-button-large uk-width-1-1', 'name' => 'Submit', 'value' => 'simpan'],
                'wrapper' => ['class' => 'uk-width-1-1', 'style' => 'margin-top: 1.2vh']
            ])              
            ->add('Submit', 'submit', [
                    'attr' => ['class' => 'uk-button uk-button-primary uk-button-large uk-width-1-1', 'name' => 'Submit', 'value' => 'submit'],
                    'wrapper' => ['class' => 'uk-width-1-1', 'style' => 'margin-top: 1.2vh']
                ]);
    }
}
