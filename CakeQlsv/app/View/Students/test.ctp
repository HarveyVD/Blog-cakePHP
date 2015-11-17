<?php
print_r($posts);
?>
<html>
    <head>
        <meta http-equiv="Content-Type" charset="UTF-8">
        <link href="" rel="stylesheet" type="text/css"/>
        <!-- Optional theme -->
        <link href="../../../js/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../../js/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../../js/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
        <style type="text/css">
            .bs-example{
                margin: 20px;
            }
        </style>
        <?php
        echo $this->Form->create('Student');
        ?>
    </head>
    <body>
        <?php echo $this->Form->create('ModelName', array(
    'class' => 'form-horizontal',
    'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
        'div' => array('class' => 'control-group'),
        'label' => array('class' => 'control-label'),
        'between' => '<div class="controls">',
        'after' => '</div>',
        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
    )));?>
<fieldset>
<?php echo $this->Form->input('Fieldname', array(
    'label' => array('class' => 'control-label'), // the preset in Form->create() doesn't work for me
    )); ?>
</fieldset>
<?php echo $this->Form->end();?>
        <?php
        echo $this->Form->create('Student');
        ?>
        <div class ="form-group">
            <div class="row">
                <div class="col-xs-2">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input name="search_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Họ và tên">
                    </div>
                </div>
                <div class="col-xs-1">
                    <select class="form-control" name="option">                            
                        <option value="1">Nam</option>
                        <option value="0">Nữ</option>                           
                    </select>
                </div>
                <div class="col-xs-2">                     
                    <div class='input-group date' id='datetimepicker2'>
                        <input type='text' class="form-control" id="ngaysinh" name="date_start" placeholder="Ngày sinh"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>                         
                </div>
                <div class="col-xs-2">                     
                    <div class='input-group date' id='datetimepicker3'>
                        <input type='text' class="form-control" id="ngaysinh" name="date_end" placeholder="Ngày sinh"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>                         
                </div>
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="col-xs-6">
                <div class="input-group">
                    <button type="submit" class="btn btn-info" name="submit">
                        <span class="glyphicon glyphicon-search"></span> Search
                    </button>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="input-group">
                    <a href="INSERT.php">
                        <button type="button" class="btn btn-info" name="taomoi">
                            <span class="glyphicon glyphicon-plus"></span> Tạo mới
                        </button> 
                    </a>
                </div>
            </div>
        </div>    


        <?php
        /**
         * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
         * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
         *
         * Licensed under The MIT License
         * For full copyright and license information, please see the LICENSE.txt
         * Redistributions of files must retain the above copyright notice.
         *
         * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
         * @link          http://cakephp.org CakePHP(tm) Project
         * @package       app.View.Layouts
         * @since         CakePHP(tm) v 0.10.0.1076
         * @license       http://www.opensource.org/licenses/mit-license.php MIT License
          ?>
          <?php echo $this->fetch('content'); ?>

         */
        ?>
        <script src="../../../js/js/jquery-1.11.3.min.js" type="text/javascript"></script>
        <script src="../../../js/js/en.js" type="text/javascript"></script>
        <script src="../../../js/js/moment.js" type="text/javascript"></script>
        <script src="../../../js/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../../js/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

        <script>
            $(document).ready(function () {
                $(function () {
                    $('#datetimepicker2').datetimepicker
                            ({
                                locale: 'en'
                            });
                });
                $(function () {
                    $('#datetimepicker3').datetimepicker
                            ({
                                locale: 'en'
                            });
                });
                $(function () {
                    $('#datetimepicker4').datetimepicker
                            ({
                                locale: 'en'
                            });
                });
            });
        </script>
        <script>
            $(document).ready(function () {
                $('a.delete').click(function () {
                    if (confirm("Bạn có chắc chắn muốn xóa")) {
                        var id = $(this).parent().parent().attr('id');
                        var data = id;
                        var parent = $(this).parent().parent();

                        $.ajax(
                                {
                                    type: "post",
                                    url: "delete_row.php",
                                    dataType: 'text',
                                    data: {
                                        id: id
                                    },
                                    cache: false,
                                    success: function ()
                                    {
                                        parent.fadeOut('slow', function () {
                                            $(this).remove();
                                        });
                                        location.reload();
                                    }

                                }
                        );
                    }
                    ;
                });
            });
        </script>
    </body>
    ?>
</html>