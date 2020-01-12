<?php include ROOT .'/views/layouts/header_admin.php' ?>

<section>
    <div class="container">
        <div class="row">
            
            <br>

            <div class="breadcrumbs">
                <ul class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление заказами</li>
                </ul>
            </div>

            <h4>Управление заказами</h4>

            <br>
            
            <table class="table table-bordered table-striped">
                <tr>
                    <th>ID заказа</th>
                    <th>Заказчик</th>
                    <th>Телефон заказчика</th>
                    <th>Комментарий заказчика</th>
                    <th>ID заказчика</th>
                    <th>Дата и время заказа</th>
                    <th>Статус</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
<?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= $order['id'] ?></td>
                    <td><?= $order['user_name'] ?></td>
                    <td><?= $order['user_phone'] ?></td>
                    <td><?= $order['user_comment'] ?></td>
                    <td><?= (isset($order['user_id']) && $order['user_id'] > 0) ? $order['user_id'] .' ('. User::getUserNameById($order['user_id']) .')' : 'Нету' ?></td>
                    <td><?= $order['date'] ?></td>
                    <td><?= Order::getStatusText($order['status']) ?></td>
                    <td><a href="/admin/order/view/<?= $order['id'] ?>"><i class="fa fa-eye"></i></a></td>
                    <td><a href="/admin/order/update/<?= $order['id'] ?>"><i class="fa fa-edit"></i></a></td>
                    <td><a href="/admin/order/delete/<?= $order['id'] ?>"><i class="fa fa-times"></i></a></td>
                </tr>
<?php endforeach ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT .'/views/layouts/footer_admin.php' ?>
