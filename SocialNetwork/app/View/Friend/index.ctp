
<div class="row">
    <div class="col-lg-6">
        <h3>Bạn bè của bạn</h3>

        <?php if(!count($friends)):?>
        <p> Bạn không có bạn bè</p>
        <?php else:?>
                <?php 
            $i = 0;
            foreach($friends as $friend):?>
                <?php if ($i<count($friends)):?>
                <?php endif;?>
                
        <div class="media">
                <?php 
                echo $this->Html->link(
                        $this->Html->image($avataUrl,array('alt'=>'','class'=>'media-object')),
                                array(
                                    'controller' => 'Profile',
                                    'action' => 'Profile',
                                    'username' => $friend['User']['username']
                                ),array(
                                    'class' => 'pull-left',
                                    'escape' =>FALSE
                                )
                                );
                        
                ?>

            <div class="media-body">
                <h4 class="media-heading">
                        <?php echo $this->Html->link(__($getNameOrUsername[$i]),array('controller'=>'Profile','action'=>'Profile','username'=> $friend['User']['username']));?>                    
                </h4>
                    <?php echo $friend['User']['location'];?>                  
            </div>
        </div>
        
        <?php endforeach;?>

        <?php endif;?>
    </div>
    <div class="col-lg-6">
        <h4>Friend requests</h4>

        <?php if(!count($requests)):?>
        <p> Bạn không có yêu cầu kết bạn nào! </p>
        <?php else:?>
                <?php for($i=0;$i<count($requests);$i++):?>
                
        <div class="media">
                <?php 
                echo $this->Html->link(
                        $this->Html->image($avataUrl,array('alt'=>'','class'=>'media-object')),
                                array(
                                    'controller' => 'Profile',
                                    'action' => 'Profile',
                                    'username' => $requests[$i]['User']['username']
                                ),array(
                                    'class' => 'pull-left',
                                    'escape' =>FALSE
                                )
                                );
                        
                ?>

            <div class="media-body">
                <h4 class="media-heading">
                        <?php echo $this->Html->link(__($getNameOrUsernames[$i]),array('controller'=>'Profile','action'=>'Profile','username'=> $requests[$i]['User']['username']));?>                    
                </h4> 
                    <?php echo $requests[$i]['User']['location'];?>                  
            </div>
        </div>
        
        <?php endfor;?>

        <?php endif;?>
    </div>
</div>