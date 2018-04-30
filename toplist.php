<?php include('top.inc'); ?>

<?php 

// ProductList
$productList = $this->tList;

// the length of productList
$cnt = $productList->getLength();

?>
   <main role="main">

      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
          	<div class="col-md-12">
          		<h2 class="text-center">TOP</h2>
          	</div>
          </div>
          <div class="row">
            <?php 
              for($i=0; $i< $cnt; $i++) {

                $p = $productList->get($i);

                echo(
                  '<div class="col-md-4">
                    <div class="card mb-4">
                    <form name="product" method="POST" action="index.php?action=detail">
                      <div class="product-image-container">
                      <input type="image" name="submit" class="product-img-top  rounded" src="img/'. $p->getId() .'.png">
                        <div class="overlay rounded-top">
                          <div class="text">' . $p->getName() . '</div>
                        </div>
                      </div>
                      <div class="product-card-body">
                        <p class="card-text text-black">' . $p->getName() .'<em class="text-muted float-right"> ₩' . $p->getPrice() . '</em></p>
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <input type="hidden" name="pname" value="' . $p->getName() . '" >
                            <input type="hidden" name="price" value="' . $p->getPrice() . '" >
                            <input type="hidden" name="pid" value="' . $p->getId() . '" >
                          </div>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>');
              }

            ?>
        </div>
    </main>

<?php include('bottom.inc'); ?>