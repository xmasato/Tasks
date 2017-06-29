<?php
foreach ($tasks as $task) {
    $task['text'] = nl2br($task['text']);
    if($task['done'] == 0) {
        echo '<div class="col-md-12 block">';
    } else {
        echo '<div class="col-md-12 block done">';
    }

    echo <<<LIST
        <div class="col-md-6">
            <ul class="task">
                <li class="user-name">{$task['name']}</li>
                <li class="user-email">{$task['email']}</li>
                <li class="user-task">{$task['text']}</li>
            </ul>
        </div>
        <div class="col-md-6"><img src="/{$task['img']}" alt=""></div>
        <div class="col-lg-12" id="btnZindex">
            <button type="submit" class="btn btn-default submit"><a href="/admin/done/?id={$task['id']}">Задача сделана</a></button>
            <button type="submit" class="btn btn-default submit"><a href="/admin/edit/?id={$task['id']}">Редактировать</a></button>
        </div>
</div>
LIST;
}
?>

<div class="col-md-12">

<?php
if ($paginator['currentPage'] != 1) {
    $prevPage = $paginator['currentPage'] - 1;

    echo <<<PREVPAGE
    <a href="{$paginator['link']}{$prevPage}"><span class="glyphicon glyphicon-chevron-left"></span></a>
PREVPAGE;
}

if(!$paginator['pageCnt'] == 0) {

    echo <<<CURRENTPAGE
    <strong><span>{$paginator['currentPage']}</span></strong>
CURRENTPAGE;
} else {
    echo '<h2>Задач нет</h2>';
}

if($paginator['currentPage'] < $paginator['pageCnt']) {
    $lastPage = $paginator['currentPage'] + 1;

    echo <<<NEXTPAGE
    <a href="{$paginator['link']}{$lastPage}"><span class="glyphicon glyphicon-chevron-right"></span></a>
NEXTPAGE;
}
?>
</div>