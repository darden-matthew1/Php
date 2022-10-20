<select name="email_address">
<?php foreach($user as $users) : ?>

    <option value="<?php echo $users->getEmail_address(); ?>"><?php echo $users->getUsername(); ?></option>

<?php endforeach; ?>
    
</select>