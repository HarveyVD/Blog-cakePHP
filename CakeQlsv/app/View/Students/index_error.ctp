
<?php
// viết cả trang html vào đây, thì chưa hiểu về View của CakePHP rồi, đọc lại phần View và Layout
?>
<html>
    <head>
        <meta http-equiv="Content-Type" charset="UTF-8">
        <link href="" rel="stylesheet" type="text/css"/>
        <?php echo $this->Html->css('bootstrap.min.css') ?>
        <?php echo $this->Html->css('bootstrap-theme.min.css') ?>
        <?php echo $this->Html->css('bootstrap-datetimepicker.min.css') ?>


        <style type="text/css">
            .bs-example{
                margin: 20px;
            }

        </style>
    </head>
    <body>
        <?php
        echo $this->Form->create('Student', array(
            'class' => 'form-horizontal',
            'type' => 'get',
        ));
        ?>
        <fieldset>  
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-2">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <?php
                            echo $this->Form->input('Student', array(
                                'div' => false,
                                'label' => false
                            ));
                            ?>
                        </div>
                    </div>

                    <div class="col-xs-1">    
                        <?php
                        echo $this->Form->input('Student', array(
                            'options' => array('nam', 'nu'),
                            'div' => false,
                            'label' => false
                        ));
                        ?>
                    </div>

                    <div class="col-xs-2">                     
                        <div class='input-group date' id='datetimepicker2'>
                            <?php
                            echo $this->Form->input('Student', array(
                                'div' => false,
                                'label' => false,
                                'placeholder' => 'Ngay sinh',
                            ));
                            ?>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>

                    <div class="col-xs-2">                     
                        <div class='input-group date' id='datetimepicker3'>
                            <?php
                            echo $this->Form->input('Student', array(
                                'div' => false,
                                'label' => false,
                                'placeholder' => 'Ngay sinh'
                            ));
                            ?>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>                         
                    </div>
                </div>
            </div>
            <br>
        </fieldset>
        <?php
        //echo $this->Form->end();
        ?>
        <?php echo $this->Html->script('jquery-1.11.3.min.js') ?>
        <?php echo $this->Html->script('en.js') ?>
        <?php echo $this->Html->script('moment.js') ?>
        <?php echo $this->Html->script('bootstrap.min.js') ?>
        <?php echo $this->Html->script('bootstrap-datetimepicker.min.js') ?>
    </body>
</html>