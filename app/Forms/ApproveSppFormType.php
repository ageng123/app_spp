<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ApproveSppFormType extends Form
{
    public function buildForm()
    {
        $this->add('approve', 'submit', [
            'attr' => ['class' => 'uk-button uk-button-primary uk-button-large uk-width-1-1', 'name' => 'Submit', 'value' => 'approve'],
            'wrapper' => ['class' => 'uk-width-1-2', 'style' => 'margin-top: 1.2vh']
        ])->add('Reject', 'submit', [
            'attr' => ['class' => 'uk-button uk-button-danger uk-button-large uk-width-1-1', 'name' => 'Submit', 'value' => 'reject'],
            'wrapper' => ['class' => 'uk-width-1-2', 'style' => 'margin-top: 1.2vh']
        ]);
    }
}
