<section>
    <form action="<?php echo site_url('/careers/save'); ?>" method=" post">
        <input type="hidden" name="id" value="<?php echo isset($career['id']) ? $career['id'] : ''; ?>">
        <div class="form-group mt-3">
            <label for="first-name">Name</label>
            <input id="first-name" class="form-control" type="text" name="name" value="<?php echo isset($career['name']) ? $career['name'] : ''; ?>" required>
        </div>
        <div class="form-group mt-3 pt-2 col-3">
            <input type="submit" class="btn btn-secondary" id="btnSubmit" value="Complete">
        </div>
    </form>
</section>
<br><br><br><br><br><br><br>