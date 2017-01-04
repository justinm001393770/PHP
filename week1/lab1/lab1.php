<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <table border = 1;>
           <tbody>
        <?php for($tr = 1; $tr <= 10; $tr++):?>
            <tr> <!-- -->
            <?php for($td = 1; $td <= 10; $td++):?>
                <?php $randColor = '#'.strtoupper(dechex(rand(0x000000, 0xFFFFFF))); //Creates the random color for each individual table set, which is why it's in the loop instead of outside'?>
                <!--Creates the table and styles it with css--><td style="background-color:<?php echo $randColor;?>"><?php echo $randColor ?><br /><span style="color:#ffffff;"><?php echo $randColor ?></span> </td>
            <?php endfor;//Alternate syntax ?>                
            </tr>
        <?php endfor; ?>
                </tbody>
        </table>
    </body>
</html>
