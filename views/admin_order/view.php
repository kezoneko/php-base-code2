<?php include ROOT .'/views/layouts/header_admin.php' ?>

<section>
    <div class="container">
        <div class="row">
            
            <br>

            <div class="breadcrumbs">
                <ul class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/order">Управление заказами</a></li>
                    <li class="active">Просмотр заказа</li>
                </ul>
            </div>

            <h4>Просмотр заказа №<?= $id ?></h4>

            <br>
            
            <h5>Информация о заказе</h5>
            <table class="table table-admin-small table-bordered table-striped">
                <tr>
                    <td>Номер заказа</td>
                    <td><?= $order['id'] ?></td>
                </tr>
                <tr>
                    <td>Имя клиента</td>
                    <td><?= $order['user_name'] ?></td>
                </tr>
                <tr>
                    <td>Телефон клиента</td>
                    <td><?= $order['user_phone'] ?></td>
                </tr>
                <tr>
                    <td>Комментарий клиента</td>
                    <td><?= $order['user_comment'] ?></td>
                </tr>
<?php if ($order['user_id'] != 0): ?>
                <tr>
                    <td>ID клиента</td>
                    <td><?= $order['user_id'] ?></td>
                </tr>
<?php endif ?>
                <tr>
                    <td>Статус заказа</td>
                    <td><?= Order::getStatusText($order['status']) ?></td>
                </tr>
                <tr>
                    <td>Дата заказа</td>
                    <td><?= $order['date'] ?></td>
                </tr>
            </table>

            <h5>Товары в заказе</h5>

            <table class="table table-admin-medium table-bordered table-striped">
                <tr>
                    <th>ID товара</th>
                    <th>Артикул товара</th>
                    <th>Название товара</th>
                    <th>Цена</th>
                    <th>Количество</th>
                </tr>
<?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['id'] ?></td>
                    <td><?= $product['code'] ?></td>
                    <td><?= $product['name'] ?></td>
                    <td><?= $product['price'] ?></td>
                    <td><?= $productsQuantity[$product['id']] ?></td>
                </tr>
<?php endforeach ?>
            </table>

            <a href="/admin/order" class="btn btn-default back"><i class="fa fa-arrow-left"></i> Назад</a>

        </div>
    </div>
</section>

<?php include ROOT .'/views/layouts/footer_admin.php' ?>
