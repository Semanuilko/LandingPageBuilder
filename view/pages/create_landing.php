

<div class="ui vertical stripe segment">
    <div class="ui middle aligned stackable grid container">
        <div class="row">
            <div class="center aligned column">
                <?
                FormBuilder::build()
                ->set_action(PageController::get_link("landing", "create"))
                ->set_method('POST')
                ->add_field([            
                    'name' => 'title',
                    'placeholder' => 'Название',           
                ])
                ->add_field([      
                    'type' => 'select',      
                    'name' => 'type',
                    'options' => [
                        ['text' => 'Товар',
                         'value' => 'good'],
                        ['text' => 'Услуга',
                         'value' => 'service']
                    ],            
                ])    
                ->add_field([            
                    'type' => 'submit',
                    'value' => 'Войти'
                ])     
                ->done()
                ->print();

                ?>
            </div>
        </div>
    </div>
</div>