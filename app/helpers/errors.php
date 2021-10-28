<?php if(count($Auth->errors) > 0): ?>
    <div class="alert-danger pl-3 pb-2 pt-2 gggg" role="alert">
        <?php foreach($Auth->errors as $error): ?>
        <li><?php echo $error; ?></li>
        <?php endforeach; ?>
    </div>
    <div class="pb-4"></div>
<?php endif; ?>