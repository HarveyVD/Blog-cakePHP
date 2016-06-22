<h3>Update your profile</h3>
<div class="row">
    <div class="col-lg-6">
        <?php echo $this->Form->create('User', array(
                'url' => array('controller' => 'Profile','action'=>'Edit'),
                'role' => 'form',
                'type' => 'post',
                'class' => 'form-vertical', 
                'inputDefaults'=>array(
                'label' =>false,   
                'error' => true,
                'required'=>false)));             
        ?>
        <div class="row">
            <div class="col-lg-6">
                <?php echo $this->Form->input('first_name', array(              
                'label' => array('text' => 'First name', 'class' => 'control-label'),
                'class' => 'form-control',
                'div' => array('class' => 'form-group '.($this->Form->isFieldError('first_name') ? 'has-error' : '')),
                'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-block'))));                      
                ?>
            </div>
            <div class="col-lg-6">
                <?php echo $this->Form->input('last_name', array(              
                'label' => array('text' => 'Last name', 'class' => 'control-label'),
                'class' => 'form-control',
                'div' => array('class' => 'form-group '.($this->Form->isFieldError('last_name') ? 'has-error' : '')),
                'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-block'))));                      
                ?>
            </div>
        </div>
        
                <?php echo $this->Form->input('location', array(              
                'label' => array('text' => 'Location', 'class' => 'control-label'),
                'class' => 'form-control',
                'div' => array('class' => 'form-group '.($this->Form->isFieldError('location') ? 'has-error' : '')),
                'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-block'))));                      
                ?>
        
        <?php echo $this->Form->input('id', array('type' => 'hidden','value'=>AuthComponent::user('id'))); ?>
        <?php echo $this->Form->submit('Update',array(
            'class'=>'btn btn-default',
            'div' => array('class' => 'form-group')))
        ?> 
        <?php echo $this->Form->end();?>

        
    </div>
</div>