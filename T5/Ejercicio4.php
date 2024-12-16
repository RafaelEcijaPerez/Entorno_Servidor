<?php 
$text = 'Total: £444, 总计: ¥123, 合計: ¥456, Итог: ₽789'; 
?> 
<b>Character count using <code>strlen()</code>:</b>
<?= strlen($text) ?><br>
<b>Character count using <code>mb_strlen()</code>:</b>
<?= mb_strlen($text) ?><br> 
<b>First match of 444 <code>strpos()</code>:</b> 
<?= strpos($text, '444') ?><br> 
<b>First match of 444 <code>mb_strpos()</code>:</b>
<?= mb_strpos($text, '444') ?><br>
