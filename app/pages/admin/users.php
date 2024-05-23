<?php if($action == 'add'):?>
    
<?php else if($action == 'edit'):?>

<?php else if($action == 'delete'):?>

<?php else:?>
<h4>
    Users
    <button class="btn btn-primary">Add User</button>
</h4>

<div>
    <table class="table">
        <tr>
            <th>#</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Image</th>
            <th>Date</th>
            <th>Action</th>
        </tr>

        <?php
            $query = "select * from users order by id desc";
            $rows = query($query);
        ?>

        <?php if(!empty($rows)):?>
            <?php foreach($rows as $row):?>
                <tr>
                    <td><?=$row['id']?></td>
                    <td><?=esc($row['username'])?></td>
                    <td><?=$row['email']?></td>
                    <td><?=$row['role']?></td>
                    <td>Image</td>
                    <td><?=date("jS M, Y", strtotime($row['date']))?></td>
                    <td>
                        <button class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                    </td>
                </tr>
            <?php endforeach;?>
        <?php endif;?>
    </table>
</div>