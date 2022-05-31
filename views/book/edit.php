<?php require_once './views/layout/header.php'; ?>
    <h2 class="text-left top-space">Book Edit</h2>
    <h2 class="top-space"></h2>
    <form action="./router.php?c=book&a=update&id=<?=$book->id ?>" method="post">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="<?= $book->name ?>"><?php if(isset($book->errors)){ echo $book->errors->on('name');} ?>
        <br>
        <label for="isbn">ISBN</label>
        <input type="text" id="isbn" name="isbn" value="<?= $book->isbn ?>">
        <?php
        if(isset ($book->errors)) {
            if (is_array($book->errors->on('isbn'))) {
                $errors = $book->errors->on('isbn');
                foreach ($errors as $error) {
                    echo $error . '<\br>';
                }
            } else {
                echo $book->errors->on('isbn');
            }
        }
        ?>
        <br>
        <label for="genres">Genre:</label><br>
        <select name="genre_id">
            <?php
            if(isset($genres)){
                foreach($genres as $genre){?>
                    <?php if($genre->id == $book->genre_id) { ?>
                        <option value="<?= $genre->id?>" selected><?= $genre->name;
                            ?> </option>
                    <?php }else { ?>
                        <option value="<?= $genre->id?>"> <?= $genre->name;
                            ?></option>
                    <?php }
                }
            } ?>
        </select>
        <br>
        &nbsp<input class="btn btn-info" role="button" type="submit">
    </form>
    <p>
        <a href="router.php?c=book&a=index" class="btn btn-info" role="button">Back</a>
    </p>
<?php require_once './views/layout/footer.php'; ?>