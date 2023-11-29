<main>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Careers</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <a class="btn btn-primary" href="<?= site_url('/careers/create') ?>">New</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($careers as $career) { ?>
                                <tr>
                                    <td>
                                        <?php echo $career['name'] ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-secondary" href="<?php echo site_url(['careers', 'edit', $career['id']]); ?>">Edit</a>
                                        <a class="btn btn-danger" href="<?php echo site_url(['careers', 'delete', $career['id']]); ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>