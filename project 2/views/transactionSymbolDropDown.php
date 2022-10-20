<select name="id">
<?php foreach($transactions as $transaction) : ?>

    <option value="<?php echo $transaction->getStock_id(); ?>"><?php echo $transaction->getId(); ?></option>

<?php endforeach; ?>
    
</select>