<h1>Add Blog</h1>
<?php
// ch� � t?i d�ng n�y, n� s? t?o ra th? form d?ng html, nh�n v�o giao di?n ch?y s? th?y
// m?c ??nh cakephp n?u kh�ng truy?n v�o tham s? t?o form ki?u get th� n� lu�n t?o ra m?c ??nh form ki?u post
echo $this->Form->create('Post'); //Post ? ?�y ch�nh l� Post trong model
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->end('Save Post');
?>