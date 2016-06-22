
<div class="row">
    <div class="col-lg-5">
        <h4>Thông tin cá nhân của <?php echo $getFirstNameOrUsername; ?></h4>
        <div class="media">
                <?php 
                echo $this->Html->link(
                        $this->Html->image($avataUrl,array('alt'=>'','class'=>'media-object')),
                                array(
                                    'controller' => 'Profile',
                                    'action' => 'Profile',
                                    'username' => $user['User']['username']
                                ),array(
                                    'class' => 'pull-left',
                                    'escape' =>FALSE
                                )
                                );
                        
                ?>

            <div class="media-body">
                <h4 class="media-heading">
                        <?php echo $this->Html->link(__($getNameOrUsername),array('controller'=>'Profile','action'=>'Profile','username'=> $user['User']['username']));?>                    
                </h4>
                London.Uk                   
            </div>
        </div>

    </div>
    <div class="col-lg-4 col-lg-offset-3">
        <?php if (count($friendRequestPending)):?>
        <p>Waitting for <?php echo $getNameOrUsername;?> to accept your request</p>
        <?php elseif (count($friendRequestReceived)):?>
        <?php echo $this->Html->link(__('Accept friend request'),array('controller' => 'Friend', 'action' => 'Accept','username' => $username),array('class' => 'btn btn-primary'))?>
        <?php elseif (count($is_friend)):?>
        <p>You and <?php echo $getNameOrUsername;?> are friends</p>
        <?php elseif (AuthComponent::user('id') != $user['User']['id']):?>
        <?php echo $this->Html->link(__('Add as friends'),array('controller' => 'Friend','action' => 'AddFriend','username' => $username),array('class' => 'btn btn-primary'))?>
        <?php endif;?>
        <h4> Bạn bè của <?php echo $getFirstNameOrUsername;?> </h4>

        <?php if(!count($friends)):?>
        <p> <?php echo $getFirstNameOrUsername;?> không có bạn bè ..</p>
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
                        <?php echo $this->Html->link(__($getNameOrUsernames[$i]),array('controller'=>'Profile','action'=>'Profile','username'=> $friend['User']['username']));?>                    
                </h4>
                    <?php echo $friend['User']['location'];?>                  
            </div>
        </div>
        <?php $i++?>
        <?php endforeach;?>

        <?php endif;?>

    </div>
</div>