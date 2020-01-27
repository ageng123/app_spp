<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class RoleFormType extends Form
{
    public function buildForm()
    {
        $this
            ->add('parent', 'entity', [
                'class' => 'App\Role',
                'empty_value' => 'No Parent',
                'property' => 'jabatan_text',
                'empty_value' => 'No Parent',
                'label' => 'Parent',
                'attr' => ['class' => 'uk-select'],
                'wrapper' => ['class' =>  "uk-width-1-2" ]          
                ])
            ->add('jabatan_text', 'text', [
                'rules' => 'required|min: 1',
                'label' => 'Jabatan',
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
