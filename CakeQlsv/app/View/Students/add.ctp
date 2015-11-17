
<div class="container">
    <h4>Tạo mới sinh viên</h4>
    <div class="row">
        <div class="col-md-6"> 
            <?php
            echo $this->Form->create('Student', array(
                'class' => 'form-horizontal',
                'type' => 'post'
            ));
            ?>
            <div class="form-group">
                <label for="name" class="col-xs-2 control-label">Name</label>
                <div class="col-xs-9">
                    <?php
                    echo $this->Form->input('full_name', array(
                        'class' => 'form-control col-sm-2',
                        'id' => 'name',
                        'placeholder' => "họ và tên",
                        'div' => false,
                        'label' => false
                    ));
                    ?>               
                </div>
            </div>
            <div class="form-group">
                <label for="ngaysinh" class="col-xs-2 col-sm-2 control-label">Birthday</label> 
                <div class='col-sm-10'>                          
                    <div class='input-group date' id='datetimepicker1'>
                        <?php
                        echo $this->Form->input('birth_day', array(
                            'div' => false,
                            'label' => false,
                            'id' => 'ngaysinh',
                            'placeholder' => 'Ngay sinh',
                            'class' => 'form-control',
                            'type' => 'text'
                        ));
                        ?>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>                          
                </div>
            </div> 
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-3">                           
                    <?php
                    echo $this->Form->input('sex', array(
                        'options' => array('nam', 'nu'),
                        'div' => false,
                        'label' => false,
                        'class' => 'form-control',
                    ));
                    ?>
                </div>
            </div>
            <?php 
            $created = date("Y-m-d H:i:s");
            echo $this->Form->Input('created',array(
                'type' => 'hidden',
                'value' => $created
            ))
            ?>
            <?php echo $this->Form->input('Student.referer', array(
                'type' => 'hidden',
                'div' => false,
                'label' => false
            )) ?>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    
                    <button  type="button" onclick="window.location.href = '<?php echo Router::url($referer);?>'">
                        <span class="glyphicon glyphicon-plus"></span> Huy bo
                    </button> 

                    <button type="submit" name="submit" ><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> Lưu</button> 
                </div>
            </div>
            <?php
            
            echo $this->Form->end();
            ?>
        </div>   
    </div>
</div>
</div>
<script>
    $(document).ready(function () {
        $(function () {
            $('#datetimepicker1').datetimepicker
                    ({
                        locale: 'en'
                    });
        });
    });
</script>