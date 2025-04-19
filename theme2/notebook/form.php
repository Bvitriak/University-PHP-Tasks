<form name="form_add" method="post">
    <div class="column">
        <div class="add">
            <label>Введите фамилию</label>
            <input type="text" name="surname" placeholder="Иванов" value="<?=htmlspecialchars($row['surname'] ?? '')?>" required>
        </div>
        <div class="add">
            <label>Введите имя</label>
            <input type="text" name="name" placeholder="Иван" value="<?=htmlspecialchars($row['name'] ?? '')?>" required>
        </div>
        <div class="add">
            <label>Введите отчество</label>
            <input type="text" name="lastname" placeholder="Иванович" value="<?=htmlspecialchars($row['lastname'] ?? '')?>">
        </div>
        <div class="add">
            <label>Выберите пол</label>
            <select name="gender">
                <option value="мужской" <?=($row['gender'] ?? '') == 'мужской' ? 'selected' : ''?>>мужской</option>
                <option value="женский" <?=($row['gender'] ?? '') == 'женский' ? 'selected' : ''?>>женский</option>
            </select>
        </div>
        <div class="add">
            <label>Выберите дату рождения</label>
            <input type="date" name="date" value="<?=htmlspecialchars($row['date'] ?? '')?>" required>
        </div>
        <div class="add">
            <label>Введите номер телефона</label>
            <input type="text" name="phone" placeholder="+7(123)456-78-90" value="<?=htmlspecialchars($row['phone'] ?? '')?>">
        </div>
        <div class="add">
            <label>Введите адрес</label>
            <input type="text" name="location" placeholder="ул. Российская Федерация" value="<?=htmlspecialchars($row['location'] ?? '')?>">
        </div>
        <div class="add">
            <label>Введите email</label>
            <input type="email" name="email" placeholder="name@gmail.com" value="<?=htmlspecialchars($row['email'] ?? '')?>">
        </div>
        <div class="add">
            <label>Напишите комментарий</label>
            <textarea name="comment" placeholder="Ваш текст"><?=htmlspecialchars($row['comment'] ?? '')?></textarea>
        </div>

        <button type="submit" value="<?=$button ?? 'Добавить'?>" name="button" class="form-btn"><?=$button ?? 'Добавить'?></button>
    </div>
</form>
