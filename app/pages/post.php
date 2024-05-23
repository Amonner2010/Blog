<?php include '../app/pages/includes/header.php';?>

<div class="mx-auto col-md-12">
    <main class="p-2">
      <h3 class="mx-4">Blog</h3>
      <div class="row my-2 justify-content-center">
        <?php
          $slug = $url[1] ?? null;
          if($slug) {
            $query = "select posts.*,categories.category from posts join categories on posts.category_id = categories.id where posts.slug = :slug limit 1";
            $row = query_row($query, ['slug'=>$slug]);
          }

          if(!empty($row)) { ?>
                <div class="col-md-12">
                    <div class="g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative">
                        <div class="col-12 d-lg-block">
                            <img src="<?=get_image($row['image'])?>" class="bd-placeholder-img w-100" width="100%"/>
                        </div>
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-success"><?=esc($row['category'] ?? 'Unknown')?></strong>
                            <h3 class="mb-0"><?=esc($row['title'])?></h3>
                            <div class="mb-1 text-muted"><?=date("jS M, Y", strtotime($row['date']))?></div>
                            <p class="mb-auto"><?=nl2br(add_root_to_images($row['content']))?></p>
                        </div>
                    </div>
                </div> 
          <?php } else {
            echo "No items found!";
          }
        ?>
      </div>
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
    </main>
</div>
  <?php include '../app/pages/includes/footer.php';?>