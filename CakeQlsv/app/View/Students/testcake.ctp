<?php
echo $this->Form->input('field', array(
    'options' => array(1, 2, 3, 4, 5),
    'empty' => '(choose one)'
));