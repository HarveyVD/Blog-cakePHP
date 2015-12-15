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
 */

$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
           
            
        </title>
        <?php
        echo $this->Html->meta('icon');

        // đây mới là bỏ đi css mặc định của cakephp
//        echo $this->Html->css('cake.generic');
        // nhúng css vào đây thì toàn bộ view sử dụng layout này sẽ được kế thừa
        echo $this->Html->css('bootstrap.min.css');
        echo $this->Html->css('bootstrap-theme.min.css');
        echo $this->Html->css('bootstrap-datetimepicker.min.css');

        echo $this->Html->script('jquery-1.11.3.min.js');
        echo $this->Html->script('en.js');
        echo $this->Html->script('moment.js');
        echo $this->Html->script('bootstrap.min.js');
        echo $this->Html->script('bootstrap-datetimepicker.min.js');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>
        <div id="container">
            <div id="header">
               
            </div>
            <div id="content">

                <?php echo $this->Flash->render(); ?>

                <?php echo $this->fetch('content'); ?>
            </div>
            <div id="footer">
                
            </div>
        </div>
        
    </body>
</html>
