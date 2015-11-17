
<style type="text/css">
    .bs-example{
        margin: 20px;
    }
</style>
<?php
echo $this->Form->create('Student', array(
    'controller' => 'Students',
    'action' => 'search',
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
                    echo $this->Form->input('search_name', array(
                        'div' => false,
                        'label' => false,
                        'class' => 'form-control',
                    ));
                    ?>
                </div>
            </div>

            <div class="col-xs-1">    
                <?php
                // chú ý tới cách tạo thẻ input trong form, tên input sẽ được tạo tự động ntn?
                echo $this->Form->input('option', array(
                    'options' => array('nam', 'nu'),
                    'div' => false,
                    'label' => false,
                    'class' => 'form-control',
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
                <button class="btn btn-info" type="submit"><span class="glyphicon glyphicon-search"></span> Tìm kiếm</button>
            </div>
        </div>

        <div class="col-xs-3">
            <div class="input-group">
                <button class="btn btn-info" type="button" onclick="window.location.href = '<?php echo Router::url(array('controller' => 'Students', 'action' => 'add')) ?>'">
                    <span class="glyphicon glyphicon-plus"></span> Tạo mới
                </button> 
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
                        <th><?php echo $this->Paginator->sort('id', 'STT'); ?></th>
                        <th><?php echo $this->Paginator->sort('full_name', 'Ho va ten'); ?></th>
                        <th><?php echo $this->Paginator->sort('sex', 'gioi tinh'); ?></th>
                        <th><?php echo $this->Paginator->sort('birth_day', 'ngay sinh'); ?></th>
                        <th><?php echo $this->Paginator->sort('created', 'Ngay tao ra'); ?></th>
                        <th><?php echo $this->Paginator->sort('modified', 'ngay chinh sua'); ?></th>
                        <th>Thao tac</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $student): ?>
                        <tr id="<?php echo $student['Student']['id']; ?>">
                            <td><?php echo $student['Student']['id']; ?></td>
                            <td><?php echo $student['Student']['full_name']; ?></td>
                            <td><?php echo $student['Student']['sex']; ?></td>
                            <td><?php echo $student['Student']['birth_day']; ?></td>
                            <td><?php echo $student['Student']['created']; ?></td>
                            <td><?php echo $student['Student']['modified']; ?></td>
                            <td>

                                <button  type="button" class="btn btn-danger btn-sm update" onclick="window.location.href = '<?php echo Router::url(array('action' => 'edit', $student['Student']['id'])) ?>'">
                                    <span class="glyphicon glyphicon-pencil"></span> 
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

                </tbody>

            </table>
            <?php
            //show the first page
            echo $this->Paginator->first('< first');
            // Shows the page numbers
            echo $this->Paginator->numbers();

            // Shows the next and previous links
            echo $this->Paginator->prev(
                    '« Previous', null, null, array('class' => 'disabled')
            );
            echo $this->Paginator->next(
                    'Next »', null, null, array('class' => 'disabled')
            );

            
            //show the last page
            echo $this->Paginator->last('last >');
            ?>
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
