<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Таблица умножения</title>
</head>

<body>
    <header>
        <div id=”main_menu”><?php 
            echo '<a href=?html_type=TABLE'; // начало ссылки ТАБЛИЧНАЯ ФОРМА
            if(isset($_GET['content']) ) // если параметр content был передан в скрипт
                echo '&content='.$_GET['content']; // добавляем в ссылку второй параметр
            echo ''; // завершаем формирование адреса ссылки и закрываем кавычку
            // если в скрипт был передан параметр html_type и параметр равен TABLE 
            if( array_key_exists('html_type', $_GET) && $_GET['html_type']== 'TABLE' ) 
                echo ' class=”selected”'; // ссылка выделяется через CSS-класс
            echo '>Табличная форма</a> '; // конец ссылки ТАБЛИЧНАЯ ФОРМА

            echo '<a href=?html_type=DIV'; // начало ссылки БЛОКОВАЯ ФОРМА
            if( isset($_GET['content']) ) // если параметр content был передан в скрипт
                echo '&content='.$_GET['content']; // добавляем в ссылку второй параметр
            echo ''; // завершаем формирование адреса ссылки и закрываем кавычку
            // если в скрипт был передан параметр html_type и параметр равен DIV 
            if( array_key_exists('html_type', $_GET) && $_GET['html_type']== 'DIV' ) 
                echo ' class=”selected”'; // ссылка выделяется через CSS-класс
            echo '>Блоковая форма</a>'; // конец ссылки БЛОКОВАЯ ФОРМА
        ?></div>
    </header>
    <main>
    <div id=”product_menu”><?php 
        echo '<a href=/'; // начало ссылки ВСЯ ТАБЛИЦА УМНОЖНЕНИЯ
        if(isset($_GET['html_type']) ) 
                echo '?html_type='.$_GET['html_type']; 
        if( !isset($_GET['content']) ) // если в скрипт НЕ был передан параметр content 
            echo ' class=”selected”'; // ссылка выделяется через CSS-класс
        echo '>Вся таблица умножения</a><br>'; // конец ссылки
        for( $i=2; $i<=9; $i++ ) // цикл со счетчиком от 2 до 9 включительно
            { 
            echo '<a href=?content='.$i. ''; // начало ссылки
            if(isset($_GET['html_type']) ) 
                echo '&html_type='.$_GET['html_type']; 
            // если в скрипт был передан параметр content 
            // и параметр равен значению счетчика
            if( isset($_GET['content']) && $_GET['content']==$i ) 
                echo ' class=”selected”'; // ссылка выделяется через CSS-класс
            echo '>Таблица умножения на '.$i.'</a><br>'; // конец ссылки 
            } 
    ?></div> 

<?php
if (!isset($_GET['html_type']) || $_GET['html_type']== 'TABLE' ) 
    outTableForm(); // выводим таблицу умножения в табличной форме
else 
    outDivForm(); // выводим таблицу умножения в блочной форме


// функция ВЫВОДИТ ТАБЛИЦУ УМНОЖЕНИЯ В ТАБЛИЧНОЙ ФОРМЕ
function outTableForm() 
{ 
    
} 
// функция ВЫВОДИТ ТАБЛИЦУ УМНОЖЕНИЯ В БЛОЧНОЙ ФОРМЕ
function outDivForm () 
{ 
    // если параметр content не был передан в программу
    if( !isset($_GET['content']) ) 
        { 
        for($i=2; $i<10; $i++) // цикл со счетчиком от 2 до 9
            { 
            echo '<div class=”ttRow”>'; // оформляем таблицу в блочной форме
            outRow( $i ); // вызывем функцию, формирующую содержание
            // столбца умножения на $i (на 4, если $i==4) 
            echo '</div>'; 
            } 
        } 
    else 
        { 
        echo '<div class=”ttSingleRow”>'; // оформляем таблицу в блочной форме
        outRow( $_GET['content'] ); // выводим выбранный в меню столбец
        echo '</div>'; 
        } 
} 


// функция ВЫВОДИТ СТОЛБЕЦ ТАБЛИЦЫ УМНОЖЕНИЯ 
function outRow ( $n ) 
{ 
    
    for($i=2; $i<=9; $i++) // цикл со счетчиком от 2 до 9. 
        echo $n.'x'.$i.'='.($i*$n).'<br>'; // выводим строку столбца с тегом
    /*
        echo outNumAsLink($n).'x'.outNumAsLink($i).'='. 
            outNumAsLink($i*$n).'<br>'; 
            */
            
} 


?>

    </main>
    <footer><?php
    //echo''.$_GET['html_type'].'<br>';
    if( !isset($_GET['html_type']) || $_GET['html_type'] === 'TABLE') 
        $s='Табличная верстка. '; // строка с информацией 
    else 
        $s='Блочная верстка. '; 
    if( !isset($_GET['content']) ) 
        $s.='Таблица умножения полностью. '; 
    else 
        $s.='Столбец таблицы умножения на '.$_GET['content']. '. '; 
echo $s.date('d.Y.M h:i:s'); ?>
    </footer>
</body>

</html>