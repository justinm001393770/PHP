<?php if(is_array($results) && count($results) > 0): ?>
<table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Corporation</th>
                    <th>Incorp Date Time</th>
                    <th>Email</th>
                    <th>Zipcode</th>
                    <th>Owner</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>
                    <td><?php echo $row['incorp_dt']; ?></td>
                    <td><?php echo $row['email']; ?></td> 
                    <td><?php echo $row['zipcode']; ?></td> 
                    <td><?php echo $row['owner']; ?></td> 
                    <td><?php echo $row['phone']; ?></td> 
                     </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
<?php else: ?>
    <p>No data to display</p>
<?php endif; ?>