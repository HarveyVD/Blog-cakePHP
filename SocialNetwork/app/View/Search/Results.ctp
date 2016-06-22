<h3>Your search for <?php echo $this->request->query('query')?></h3>
<?php if(!count($users)):?>
<p>No results found, sorry.</p>
<?php else:?>

<div class="row">
    <div class="col-lg-12">
        <?php for($i=0;$i<count($users);$i++):?>
        
            <div class="media">
                <?php 
                echo $this->Html->link(
                        $this->Html->image($avataUrl,array('alt'=>'','class'=>'media-object')),
                                array(
                                    'controller' => 'Profile',
                                    'action' => 'Profile',
                                    'username' => $users[$i]['User']['username']
                                ),array(
                                    'class' => 'pull-left',
                                    'escape' =>FALSE
                                )
                                );
                        
                ?>
                
                <div class="media-body">
                    <h4 class="media-heading">
                        <?php echo $this->Html->link(__($getNameOrUsernames[$i]),array('controller'=>'Profile','action'=>'Profile','username'=> $users[$i]['User']['username']));?>                    
                    </h4>
                    <?php echo $users[$i]['User']['location'];?>                  
                </div>
            </div>
        <?php endfor;?>
        
    </div>
    <?php endif;?>
</div>