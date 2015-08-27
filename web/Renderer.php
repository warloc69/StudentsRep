<!DOCTYPE html>
<html>
<head>
    <!--meta charset="utf-8"-->
    <title>Created by Sergii</title>
    <link rel="stylesheet" type="text/css" href="/web/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/web/css/bootstrap.css" />
    <link rel="stylesheet" href="/web/css/font-awesome.min.css">
    <script src="/web/js/jquery.min.js"></script>
    <!--script src="/web/js/bootstrap.min.js"></script-->
    <script src="/web/js/bootstrap.js"></script>

</head>
<body>
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
                $re = new framework\Student(\framework\db::connect());
                $all = $re->getAll();
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
                    echo '<td>'."<a href=\"../controller/removeStudent?id=".$id.'">X</a></td>';
                    echo '<td>'."<a href=\"../controller/editView?id=".$id.'">Edit</a></td>';
                    echo '</tr>';
                }
                ?>
        </tbody>
        </table>
        <?php
          if($r->data['action'] == 'editView') {
              include "StudentEditor.php";
          } else
              include "StudentCreator.php";
        ?>

</body>
</html>

