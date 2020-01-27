<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class KelasFormType extends Form
{
    public function buildForm()
    {
        $this
            ->add('kelas_text', 'text', [
                'rules' => 'required|min:1',
                'label' => 'Kelas',
                'data' => [],
                'label_attr' => ['class' => 'uk-form-label'],
                'attr' => ['class' => 'uk-input'],
                'wrapper' => ['class' =>  "uk-width-1-1" ]
            ])
            ->add('Submit', 'submit', [
                'attr' => ['class' => 'uk-button uk-button-primary uk-button-large uk-width-1-1', 'name' => 'Submit'],
                'wrapper' => ['class' => 'uk-width-1-1', 'style' => 'margin-top: 1.2vh']
            ]);
    }
}
