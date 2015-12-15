
<style type="text/css">
    .bs-example{
        margin: 20px;
    }
    .bs-example1{
        margin-left: -20px;
    }
</style>
<?php
//Base url la url , la noi chung ta se truyen cac tham so form Student
$base_url = array('controller' => 'Students', 'action' => 'index');
echo $this->Form->create('Student', array(
    'url' => $base_url,
    'class' => 'form-horizontal',
    'type' => 'get',
));
?>
<div class="bs-example"> 
    <div class="form-group">
        <div class="row">
            <div class="col-xs-2">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                    <?php
                    echo $this->Form->input('full_name', array(
                        'div' => false,
                        'label' => false,
                        'class' => 'form-control',
                        'default' => ''
                    ));
                    ?>
                </div>
            </div>

            <div class="col-xs-1">    
                <?php
                // chú ý tới cách tạo thẻ input trong form, tên input sẽ được tạo tự động ntn?
                echo $this->Form->input('sex', array(
                    'options' => $sex_config,
                    'div' => false,
                    'label' => false,
                    'class' => 'form-control',
                    'empty' => '-------',
                ));
                ?>
            </div>

            <div class="col-xs-2">                     
                <div class='input-group date' id='datetimepicker2'>
                    <?php
                    echo $this->Form->input('date_start', array(
                        'div' => false,
                        'label' => false,
                        'placeholder' => 'Ngay sinh',
                        'class' => 'form-control',
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
                    echo $this->Form->input('date_end', array(
                        'div' => false,
                        'label' => false,
                        'placeholder' => 'Ngay sinh',
                        'class' => 'form-control',
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
    <div class="form-group">
        <div class="col-xs-6">
            <div class="input-group">
                <button class="btn btn-info"><span class="glyphicon glyphicon-search"></span> Tìm kiếm</button>
            </div>
        </div>
        <?php
        // de reset tat ca cac Students form , chung ta chi can redirect toi base_url
        ?>
        <div class="col-xs-2">
            <div class="input-group">

                <div class="bs-example1">
                    <button class="btn btn-info" type="button" onclick="window.location.href = '<?php echo Router::url(array('controller' => 'Students', 'action' => 'add')) ?>'">
                        <span class="glyphicon glyphicon-plus"></span> Tạo mới
                    </button> 
                </div>

            </div>
        </div>
    </div>  
    <?php
    echo $this->Form->end();
    ?>
    <br>
    <div class="row" id="info">
        <br/>
        <div class="col-md-7" id="viewdata">
            <table id="delTable"" class="table table-bordered">
                <thead>
                    <tr>
                        <th><?php echo $this->Paginator->sort('ID'); ?></th>
                        <th><?php echo $this->Paginator->sort('Họ và tên'); ?></th>
                        <th><?php echo $this->Paginator->sort('Giới tính'); ?></th>
                        <th><?php echo $this->Paginator->sort('Ngày sinh'); ?></th>
                        <th><?php echo $this->Paginator->sort('Ngày tạo ra'); ?></th>
                        <th><?php echo $this->Paginator->sort('Ngày chỉnh sửa'); ?></th>
                        <th><?php echo $this->Paginator->sort('Thao tác'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $student): ?>
                    <tr id="<?php echo $student['Student']['id']; ?>">
                        <td><?php echo $student['Student']['id']; ?></td>
                        <td><?php echo $student['Student']['full_name']; ?></td>
                        <td><?php echo $student['Student']['sex']; ?></td>
                        <td><?php echo $student['Student']['birth_day']; ?></td>
                        <td><?php echo $student['Student']['created']; ?></td>
                        <td><?php echo $student['Student']['modified']; ?></td>
                        <td>
                            <button class="btn btn-danger btn-sm update" type="button" onclick="window.location.href = '<?php echo Router::url(array('controller' => 'Students', 'action' => 'edit',$student['Student']['id'])) ?>'">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  
                            </button>
                            <?php
                                echo $this->Form->postLink('<button class="btn btn-warning btn-sm delete"><span class="glyphicon glyphicon-trash"></span></button>', array(
                                    'action' => 'delete', $student['Student']['id']
                                        ), array('escape' => FALSE, 'confirm' => 'Are you sure?')
                                );
                                ?>

                        </td>                                                                          
                    </tr> 
                    <?php endforeach; ?>
                    <?php unset($student); ?>
                </tbody>

            </table>

            <?php echo $this->Paginator->numbers(); ?>	
         <?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?>
	<?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?>	
	<?php echo $this->Paginator->counter(); ?>

        </div>
    </div>
</div>
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
