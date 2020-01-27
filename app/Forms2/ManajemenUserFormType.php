<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ManajemenUserFormType extends Form
{
    public function buildForm()
    {
        $this
            ->add('nomor_induk', 'text', [
                'rules' => 'required|min: 1',
                'label' => 'Nomor Induk',
                'data' => [],
                'label_attr' => ['class' => 'uk-form-label'],
                'attr' => ['class' => 'uk-input'],
                'wrapper' => ['class' =>  "uk-width-1-1" ]
            ])
            ->add('username', 'text', [
                'rules' => 'required|min: 1',
                'label' => 'Username',
                'data' => [],
                'label_attr' => ['class' => 'uk-form-label'],
                'attr' => ['class' => 'uk-input'],
                'wrapper' => ['class' =>  "uk-width-1-1" ]
            ])
            ->add('password_text', 'password', [
                'label' => 'Password',
                'data' => [],
                'label_attr' => ['class' => 'uk-form-label'],
                'attr' => ['class' => 'uk-input'],
                'wrapper' => ['class' =>  "uk-width-1-1" ]
            ])
            ->add('Submit', 'submit', [
                'attr' => ['class' => 'uk-button uk-button-primary uk-button-large uk-width-1-1', 'name' => 'Submit'],
                'wrapper' => ['class' => 'uk-width-1-1', 'style' => 'margin-top: 1.5vh']
            ]);
    }
}
