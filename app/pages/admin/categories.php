<?php if($action == 'add'):?>
    <?php include "categories/categories.add.php"; ?>
<?php elseif($action == 'edit'):?>
    <?php include "categories/categories.edit.php"; ?>
<?php elseif($action == 'delete'):?>
    <?php include "categories/categories.delete.php"; ?>
<?php else:?>
    <h4>
        Categories
        <a href="<?=ROOT?>/admin/categories/add">
            <button class="btn btn-primary">Add Category</button>
        </a>
    </h4>

    <div>
        <table class="table">
            <tr>
                <th>#</th>
                <th>Category</th>
                <th>Slug</th>
                <th>Active</th>
                <th>Action</th>
            </tr>

            <?php
                $limit = 10;
                $offset = ($PAGE['page_number'] - 1) * $limit;

                $query = "select * from categories order by id desc limit $limit offset $offset";
                $rows = query($query);
            ?>

            <?php if(!empty($rows)):?>
                <?php foreach($rows as $row):?>
                    <tr>
                        <td><?=$row['id']?></td>
                        <td><?=esc($row['category'])?></td>
                        <td><?=$row['slug']?></td>
                        <td><?=$row['disabled'] ? 'No' : 'Yes'?></td>
                        <td>
                            <a href="<?=ROOT?>/admin/categories/edit/<?=$row['id']?>">
                                <button class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                            </a>

                            <a href="<?=ROOT?>/admin/categories/delete/<?=$row['id']?>">
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach;?>
            <?php endif;?>
        </table>
        <div class="col-md-12">
            <a href="<?=$PAGE['first_link']?>">
                <button class="btn btn-primary">First Page</button>
            </a>
            <a href="<?=$PAGE['prev_link']?>">
                <button class="btn btn-primary">Prev Page</button>
            </a>
            <a href="<?=$PAGE['next_link']?>">
                <button class="btn btn-primary float-end">Next Page</button>
            </a>
        </div>
    </div>
<?php endif;?>