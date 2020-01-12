<?php include ROOT .'/views/layouts/header_admin.php' ?>

<section>
    <div class="container">
        <div class="row">
            
            <br>

            <div class="breadcrumbs">
                <ul class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/category">Управление категориями</a></li>
                    <li class="active">Редактировать категорию</li>
                </ul>
            </div>

            <h4>Редактировать категорию №<?= $id ?></h4>

<?php if (isset($errors) && is_array($errors)):?>
    <?php foreach ($errors as $error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
    <?php endforeach ?>
<?php endif ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">
                        
                        <p>Название категории</p>
                        <input type="text" name="name" placeholder="" value="<?= $category['name'] ?>">

                        <p>Порядковый номер</p>
                        <input type="text" name="sort_order" placeholder="" value="<?= $category['sort_order'] ?>">

                        <p>Статус</p>
                        <select name="status" id="status">
                            <option value="1"<?= ($category['status'] == 1) ? ' selected' : '' ?>>Отображается</option>
                            <option value="0"<?= ($category['status'] == 0) ? ' selected' : '' ?>>Скрыт</option>
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
