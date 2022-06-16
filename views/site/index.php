<div class="container-fluid">
    <div class="row">
        <h1 class="fw-bold text-center">Fatura+</h1>

        <?php
            if (isset($username)) {
        ?>
                <div class="h-100 d-flex align-items-center justify-content-center p-5">
                    <div class="grid">
                        <div class="row">
                            <h2>User ID: <?= $userId ?></h2>
                            <hr>
                            <h2>User Name: <?= $username ?></h2>
                            <hr>
                            <h2>User Role: <?= $userRole ?></h2>
                        </div>
                    </div>
                </div>
        <?php
            }
        ?>


    </div>
</div>