<?php include ROOT .'/views/layouts/header_admin.php' ?>

<section>
    <div class="container">
        <div class="row">
            
            <br>

            <div class="breadcrumbs">
                <ul class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/order">Управление заказами</a></li>
                    <li class="active">Редактировать заказ</li>
                </ul>
            </div>

            <h4>Редактировать заказ №<?= $id ?></h4>

<?php if (isset($errors) && is_array($errors)):?>
    <?php foreach ($errors as $error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
    <?php endforeach ?>
<?php endif ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">
                        
                        <p>Имя заказчика</p>
                        <input type="text" name="user_name" placeholder="" value="<?= $order['user_name'] ?>">

                        <p>Телефон заказчика</p>
                        <input type="text" name="user_phone" placeholder="" value="<?= $order['user_phone'] ?>">

                        <p>Комментарий заказчика</p>
                        <input type="text" name="user_comment" placeholder="" value="<?= $order['user_comment'] ?>">

                        <p>Дата и время заказа</p>
                        <input type="text" name="date" placeholder="" value="<?= $order['date'] ?>">

                        <p>Статус</p>
                        <select name="status" id="status">
                            <option value="1"<?= ($order['status'] == 1) ? ' selected' : '' ?>>Обработан</option>
                            <option value="0"<?= ($order['status'] == 0) ? ' selected' : '' ?>>Не обработан</option>
                        </select>

                        <br><br>

                        <input type="submit" name="submit" value="Сохранить" class="btn btn-default">

                        <br><br>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT .'/views/layouts/footer_admin.php' ?>
