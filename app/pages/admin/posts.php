<?php if($action == 'add'):?>
    <?php include "posts/posts.add.php"; ?>
<?php elseif($action == 'edit'):?>
    <?php include "posts/posts.edit.php"; ?>
<?php elseif($action == 'delete'):?>
    <?php include "posts/posts.delete.php"; ?>
<?php else:?>
    <h4>
        Posts
        <a href="<?=ROOT?>/admin/posts/add">
            <button class="btn btn-primary">Add Post</button>
        </a>
    </h4>

    <div>
        <table class="table">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Image</th>
                <th>Date</th>
                <th>Action</th>
            </tr>

            <?php
                $limit = 10;
                $offset = ($PAGE['page_number'] - 1) * $limit;

                $query = "select * from posts order by id desc limit $limit offset $offset";
                $rows = query($query);
            ?>

            <?php if(!empty($rows)):?>
                <?php foreach($rows as $row):?>
                    <tr>
                        <td><?=$row['id']?></td>
                        <td><?=esc($row['title'])?></td>
                        <td><?=$row['slug']?></td>
                        <td>
                            <img src="<?=get_image($row['image'])?>" style="height: 100px; object-fit: cover; width: 100px;"/>
                        </td>
                        <td><?=date("jS M, Y", strtotime($row['date']))?></td>
                        <td>
                            <a href="<?=ROOT?>/admin/posts/edit/<?=$row['id']?>">
                                <button class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                            </a>

                            <a href="<?=ROOT?>/admin/posts/delete/<?=$row['id']?>">
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