<?php require_once './views/layout/header.php'; ?>
    <h2 class="top-space"></h2>
    <h1 class="center"><b>Create book</b></h1>
    <form action="./router.php?c=book&a=store" method="post">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="<?php if(isset($book)) { echo $book->name; }?>"><?php if(isset($book->errors)){ echo $book->errors->on('name'); }?>
        <br>
        <label for="isbn">ISBN</label>
        <input type="text" id="isbn" name="isbn"><?php
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
        <label for="genre_id">Genre:</label><br>
        <select name="genre_id">
            <?php if(isset($genres)){
                foreach($genres as $genre){?>
                <option value="<?= $genre->id?>"> <?= $genre->name; ?></option>
            <?php }
            }?>
        </select>
        <br>
        &nbsp<input class="btn btn-info" role="button" type="submit">&nbsp<a href="router.php?c=book&a=index" class="btn btn-info" role="button">Cancel</a>
    </form>
<?php require_once './views/layout/footer.php'; ?>