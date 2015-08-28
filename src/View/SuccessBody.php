<?php
$re = new src\Model\Student(\framework\db::connect(
    \framework\ConfigHolder::getConfig('connection_string'),
    \framework\ConfigHolder::getConfig('user'),
    \framework\ConfigHolder::getConfig('pass')
));
$all = $re->getAll();
?>
<table class="table">
    <thead>
    <tr>
        <th>Имя</th>
        <th>Фамилия</th>
        <th>Пол</th>
        <th>Возраст</th>
        <th>Группа</th>
        <th>Факультет</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($all as $k=>$v) {
        echo '<tr>';
        $id;
        foreach($v as $key=>$value) {
            if ("id" != $key) {
                echo '<td>' . $value . '</td>';
            } else {
                $id = $value;
            }
        }
        echo '<td>'."<a href=\"../controller/removeStudent?id=".$id.'">';
        echo '<div id="browse_app"> ';
        echo '<button class="btn btn-large btn-danger" type="button">Удалить</button>';
        echo '</div></a></td>';
        echo '<td>'."<a href=\"../controller/editView?id=".$id.'">';
        echo '<div id="browse_app"> ';
        echo '<button class="btn btn-large btn-info" type="button">Редактировать</button>';
        echo '</div></a></td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>
<?php
if(isset($r->data['action']) && $r->data['action'] == 'editView') {
    include "StudentEditor.php";
}
include "StudentCreator.php";
?>