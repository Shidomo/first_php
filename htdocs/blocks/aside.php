<aside>
    <div class="info">
        <h2>Интересные факты</h2>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nisi, laboriosam animi amet molestiae, aperiam sunt illum, itaque in possimus facere consequatur blanditiis reprehenderit accusantium praesentium dolore earum soluta velit perferendis.</p>
    </div>
    <img src="https://itproger.com/img/intensivs/back-end.svg">
    
    <div class="live-chat">
    <?php 
            $sql = 'SELECT * FROM `chat` ORDER BY `id` ASC';
            $query = $pdo->prepare($sql);
            $query->execute();
            $users = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($users as $el) {
                echo '<div class="post">
                <p>'.$el['message'].'</p>
                </div>';
            }
        ?>    
    </div>
         <form>
            <label for="chat">Мини чатик</label>
            <textarea name="chat" id="chat"></textarea>
            <button type="button" id="add_chat">Отправить</button>
            <div class="error-mess" id="error-block"></div>
        </form>       

</aside>
