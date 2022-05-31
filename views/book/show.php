<?php require_once './views/layout/header.php'; ?>
    <h2 class="text-left top-space">Book Show</h2>
    <h2 class="top-space"></h2>
    <div class="row">
        <div class="col-sm-12">
            <table class="table tablestriped"><thead><th><h3>Id</h3></th><th><h3>Name</h3></th><th><h3>ISBN</h3></th><th><h3>Genre</h3></th><th><h3>User Actions</h3></th></thead>
                <tbody>
                    <tr>
                        <td><?=$book->id?></td>
                        <td><?=$book->name?></td>
                        <td><?=$book->isbn?></td>
                        <td><?= $book->genre->name ?></td>
                        <td>
                            <!--<a href="router.php?c=book&a=show&id=<?=$book->id ?>"
                               class="btn btn-info" role="button">Show</a>-->
                            <a href="router.php?c=book&a=edit&id=<?=$book->id ?>"
                               class="btn btn-info" role="button">Edit</a>
                            <a href="router.php?c=book&a=destroy&id=<?=$book->id ?>"
                               class="btn btn-warning" role="button">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-6">
            <p>
                <a href="router.php?c=book&a=index" class="btn btn-info" role="button">Back</a>
            </p>
        </div>
    </div> <!-- /row -->
<?php require_once './views/layout/footer.php'; ?>