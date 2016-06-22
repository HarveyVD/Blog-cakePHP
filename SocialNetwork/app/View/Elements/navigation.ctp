<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
                <?php echo $this->Html->link(__('Viet'),array('controller'=>'homes','action'=>'index'),array('class' => 'navbar-brand'))?>

        </div>

        <div class="collapse navbar-collapse">
                <?php if ($this->Session->check('Auth.User')): ?>

            <ul class="nav navbar-nav">
                <li><?php echo $this->Html->link(__('Timeline'),array('controller'=>'homes','action'=>'index'))?></li>
                <li><?php echo $this->Html->link(__('Friends'),array('controller'=>'Friend','action'=>'index'))?></li>
                
            </ul>
                <?php
                echo $this->Form->create('User', array(
                    'url' => array('controller' => 'Search','action'=>'Results'),
                    'role' => 'search',
                    'type' => 'get',
                    'class' => 'navbar-form navbar-left', 
                    'inputDefaults'=>array(
                    'label' =>false,   
                    'error' => true,
                    'required'=>false))
                ); 
                ?>
                <?php
                echo $this->Form->input('query', array(
                    'placeholder' => 'Find people',                    
                    'type' => 'text',
                    'class' => 'form-control',
                    'div' => array('class' => 'form-group '))
                );
                ?>
                <?php
                echo $this->Form->submit('Search',array(
                    'class'=>'btn btn-default',
                    'type' => 'submit',
                    'div' => false)
                );
                ?>
                <?php
                echo $this->Form->end();
                
                endif; ?>
            <ul class="nav navbar-nav navbar-right">
                    <?php if ($this->Session->check('Auth.User')): ?>
                <li><?php echo $this->Html->link(__($getname),array('controller'=>'Profile','action'=>'Profile','username' => AuthComponent::user('username')))?></li>
                <li><?php echo $this->Html->link(__('Update Profile'),array('controller'=>'Profile','action'=>'Edit'))?></li>
                
                <li><?php echo $this->Html->link(__('Logout'),array('controller'=>'auth','action'=>'logout'))?></li>
                    <?php else: ?>
                <li><?php echo $this->Html->link(__('Sign up'),array('controller'=>'auth','action'=>'Signup'))?></li>
                <li><?php echo $this->Html->link(__('Sign in'),array('controller'=>'auth','action'=>'Signin'))?></li>
                    <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>