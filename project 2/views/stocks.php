<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock List</title>
</head>

<body>

<!--table tags lay things out and they have rows and colums but the columns are called data-->
    <table>

    <!--tr stands for table rows-->
        <tr>

        <!--th is table header which is a special type of data-->
<th>Symbol</th>
<th>Name</th>
<th>Current Price</th>
<th>ID</th>


        </tr>
        <?php

        //stocks as stock means that for each rows what would you like you call it and in this case it is being named stock
foreach($stocks as $stock) : ?>
    
    <tr>   
    <!--td is table data which is the colums for the table-->
<td><?php echo $stock->getSymbol(); ?></td>
<td><?php echo $stock->getName(); ?></td>
<td><?php echo $stock->getCurrent_price(); ?></td>
<td><?php echo $stock->getId(); ?></td>
<!--the index name must match with the name in mysql-->
    </tr>
    
    
    <?php
endforeach;
//you can end foreach loop instead of doing curly brackets earlier
    ?>
    </table>

</br>
<h2>Add or Update Stocks</h2>
<form action="stocks.php" method="post">
    <label>Symbol</label>
    <input type="text" name="symbol"/><br>
    <label>Name</label>
    <input type="text" name="name"/><br>
    <label>Current Price</label>
    <input type ="text" name="current_price"/><br>
    <input type ="hidden" name ='action' value="insert_or_update">
    <input type ="radio" name="insert_or_update" value="insert" checked>Add Stock<br>
    <input type ="radio" name="insert_or_update" value="update" >Update Stock<br>
    <label>&nbsp;</label>
    <input type="submit" name="Add Stock"/><br>
</form>

    
    <h2>Delete Stocks</h2>
<form action="stocks.php" method="post">
    <label>Symbol</label>
    <?php include("stockSymbolDropDown.php"); ?>
    <input type ="hidden" name ='action' value='delete'>
    <label>&nbsp;</label>
    <input type="submit" name="Delete Stock"/><br>
    </form>
</br>
</br>
</br>

</body>

</html>