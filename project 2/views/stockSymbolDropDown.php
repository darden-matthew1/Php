
<select name="symbol">
<?php foreach($stocks as $stock) : ?>

    <option value="<?php echo $stock->getSymbol(); ?>"><?php echo $stock->getName(); ?></option>

<?php endforeach; ?>
    
</select>