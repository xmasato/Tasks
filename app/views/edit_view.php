<h1>Редактирование Задачи</h1>
<div class="container form">
    <form action='/admin/saveEdit' method='POST' enctype='multipart/form-data'>
        <div class="col-md-6 form-line">
            <div class="form-group">
                <label for="exampleInputUsername">Имя пользователя</label>
                <input type="text" class="form-control" name="user-name" value="<?php echo $tasks['name'] ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail">Email Address</label>
                <input type="email" class="form-control" name="user-email" value="<?php echo $tasks['email'] ?>"">
            </div>
            <div class="form-group">
                <label for="telephone">Изображение</label>
                <input type="file" class="form-control" name="uploadfile">
            </div>
        </div>
        <input type="hidden" class="form-control" name="user-id" value="<?php echo $tasks['id'] ?>">
        <input type="hidden" class="form-control" name="user-img" value="<?php echo $tasks['img'] ?>">
        <div class="col-md-6">
            <div class="form-group">
                <label for ="description">Текс Задачи</label>
                <textarea  class="form-control" name="user-text" value="132" rows="10" col="10" wrap="hard"><?php echo $tasks['text'] ?></textarea>
            </div>
        </div>
        <div class="col-lg-12">
            <button type="submit" class="btn btn-default submit" id="button" name="edit" value="edit">Изменить</button>
        </div>
    </form>
</div>


