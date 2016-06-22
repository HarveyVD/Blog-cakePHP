<h3>Sign up</h3>
<div class="row">
    <div class="col-lg-6">
        <?php echo $this->Form->create('User', array('class' => 'form-vertical', 
            'inputDefaults'=>array(
                'label' =>false,   
                'error' => true,
                'required'=>false)));             
        ?>

        <?php echo $this->Form->input('email', array(              
            'label' => array('text' => 'Your email address', 'class' => 'control-label'),
            'class' => 'form-control',
            'div' => array('class' => 'form-group '.($this->Form->isFieldError('email') ? 'has-error' : '')),
            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-block'))));                      
        ?>
        
        
        <?php echo $this->Form->input('username', array(
                'label' => array('text' => 'Choose a username', 'class' => 'control-label'),
                'class' => 'form-control',
                'div' => array('class' => 'form-group '.($this->Form->isFieldError('username') ? 'has-error' : '')),
                'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-block'))));
        ?>
                       
        <?php echo $this->Form->input('password', array(
                'label' => array('text' => 'Choose a password', 'class' => 'control-label'),
                'class' => 'form-control',
                'div' => array('class' => 'form-group '.($this->Form->isFieldError('password') ? 'has-error' : '')),
                'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-block'))
        ));?>                        
        
        <?php echo $this->Form->submit('Signup',array(
            'class'=>'btn btn-default',
            'div' => array('class' => 'form-group')))
        ?> 
            
        <?php echo $this->Form->end();?>
    </div>
</div>