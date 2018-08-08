

<div class="ui vertical stripe segment">
    <div class="ui middle aligned stackable grid container">
        <div class="row">
            <div class="center aligned column">
                <?
                FormBuilder::build()
                ->set_action(PageController::get_link("login", "auth"))
                ->set_method('POST')
                ->add_field([            
                    'name' => 'login',
                    'placeholder' => 'Логин',           
                ])
                ->add_field([            
                    'name' => 'password',
                    'placeholder' => 'Пароль',            
                ])    
                ->add_field([            
                    'type' => 'submit',
                    'value' => 'Войти'
                ])     
                ->done()
                ->print();


                FormBuilder::build()
                ->set_action(PageController::get_link("login", "register"))
                ->set_method('POST')
                ->add_field([            
                    'name' => 'login',
                    'placeholder' => 'Логин',           
                ])
                ->add_field([            
                    'name' => 'password',
                    'placeholder' => 'Пароль',            
                ])    
                ->add_field([            
                    'type' => 'submit',
                    'value' => 'Зарегистрироваться'
                ])     
                ->done()
                ->print();

                ?>
            </div>
        </div>
    </div>
</div>