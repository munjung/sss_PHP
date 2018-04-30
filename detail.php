<?php include('top.inc'); ?>

<?php
  // get Product id and classify its type 
  // the first letter of id is its type
  // T:Top, B:Bottom, D:Dress

  // get the first instance of array to display name, price, code
  $product = $this->detailList->get(0);

  $sizeListTitle = null;
  $sizeList = null;

  $optionList = null;

  $type = substr($product->getId(), 0, 1);
  switch ($type) {

    case 'T':
      $sizeListTitle = array("총장", "어깨", "가슴", "암홀", "소매");

      for($i=$this->detailList->getLength()-1; $i>=0; $i--) {

        $top = $this->detailList->get($i);

        $sizeList = $sizeList . '<tr>';
        $sizeList = $sizeList . '<th scope="row">' . $top->getSize() . '</th>';
        $sizeList = $sizeList . '<td>' . $top->getTopLength() . '</td>';
        $sizeList = $sizeList . '<td>' . $top->getShoulder() . '</td>';
        $sizeList = $sizeList . '<td>' . $top->getChest() . '</td>';
        $sizeList = $sizeList . '<td>' . $top->getArmhole() . '</td>';
        $sizeList = $sizeList . '<td>' . $top->getArm() . '</td>';
        $sizeList = $sizeList . '</tr>';

        $optionList = $optionList . '<option>' . $top->getSize() . '</option>';

      }

      // User size info
      // if session has id
      if(isset($_SESSION['id'])) {
        $uService = new UserService();
        $u = $uService->getUser($_SESSION['id']);

        $sizeList = $sizeList . '<tr  style="color:darkred; font-weight:bold;">';
        $sizeList = $sizeList . '<th scope="row">' . $u->getName() . '</th>';
        $sizeList = $sizeList . '<td>' . $u->getTopLength() . '</td>';
        $sizeList = $sizeList . '<td>' . $u->getShoulder() . '</td>';
        $sizeList = $sizeList . '<td>' . $u->getChest() . '</td>';
        $sizeList = $sizeList . '<td>' . $u->getArmhole() . '</td>';
        $sizeList = $sizeList . '<td>' . $u->getArm() . '</td>';
        $sizeList = $sizeList . '</tr>';
      }      

      break;

    case 'B':
      $sizeListTitle = array("총장", "허리", "엉덩이", "허벅지", "밑위");

      for($i=$this->detailList->getLength()-1; $i>=0; $i--) {

        $bottom = $this->detailList->get($i);

        $sizeList = $sizeList . '<tr>';
        $sizeList = $sizeList . '<th scope="row">' . $bottom->getSize() . '</th>';
        $sizeList = $sizeList . '<td>' . $bottom->getBottomLength() . '</td>';
        $sizeList = $sizeList . '<td>' . $bottom->getWaist() . '</td>';
        $sizeList = $sizeList . '<td>' . $bottom->getHip() . '</td>';
        $sizeList = $sizeList . '<td>' . $bottom->getThigh() . '</td>';
        $sizeList = $sizeList . '<td>' . $bottom->getCrotch() . '</td>';
        $sizeList = $sizeList . '</tr>';

        $optionList = $optionList . '<option>' . $bottom->getSize() . '</option>';

      }  

      // User size info
      // if session has id
      if(isset($_SESSION['id'])) {
        $uService = new UserService();
        $u = $uService->getUser($_SESSION['id']);

        $sizeList = $sizeList . '<tr  style="color:darkred; font-weight:bold;">';
        $sizeList = $sizeList . '<th scope="row">' . $u->getName() . '</th>';
        $sizeList = $sizeList . '<td>' . $u->getBottomLength() . '</td>';
        $sizeList = $sizeList . '<td>' . $u->getWaist() . '</td>';
        $sizeList = $sizeList . '<td>' . $u->getHip() . '</td>';
        $sizeList = $sizeList . '<td>' . $u->getThigh() . '</td>';
        $sizeList = $sizeList . '<td>' . $u->getCrotch() . '</td>';
        $sizeList = $sizeList . '</tr>';
      }        

      break;

    case 'D':
      $sizeListTitle = array("총장", "어깨", "가슴", "암홀", "소매");

      for($i=$this->detailList->getLength()-1; $i>=0; $i--) {

        $dress = $this->detailList->get($i);

        $sizeList = $sizeList . '<tr>';
        $sizeList = $sizeList . '<th scope="row">' . $dress->getSize() . '</th>';
        $sizeList = $sizeList . '<td>' . $dress->getDressLength() . '</td>';
        $sizeList = $sizeList . '<td>' . $dress->getShoulder() . '</td>';
        $sizeList = $sizeList . '<td>' . $dress->getChest() . '</td>';
        $sizeList = $sizeList . '<td>' . $dress->getArmhole() . '</td>';
        $sizeList = $sizeList . '<td>' . $dress->getArm() . '</td>';
        $sizeList = $sizeList . '</tr>';

        $optionList = $optionList . '<option>' . $dress->getSize() . '</option>';

      }

      // User size info
      // if session has id
      if(isset($_SESSION['id'])) {
        $uService = new UserService();
        $u = $uService->getUser($_SESSION['id']);
        $dressLength = $u->getTopLength() + $u->getBottomLength();
        $sizeList = $sizeList . '<tr  style="color:darkred; font-weight:bold;">';
        $sizeList = $sizeList . '<th scope="row">' . $u->getName() . '</th>';
        $sizeList = $sizeList . '<td>' . $dressLength . '</td>';
        $sizeList = $sizeList . '<td>' . $u->getShoulder() . '</td>';
        $sizeList = $sizeList . '<td>' . $u->getChest() . '</td>';
        $sizeList = $sizeList . '<td>' . $u->getArmhole() . '</td>';
        $sizeList = $sizeList . '<td>' . $u->getArm() . '</td>';
        $sizeList = $sizeList . '</tr>';            
      }

      break;
    
    default:
      # code...
      break;
  }

?>

    <main role="main">
    <div class="album py-5">
        <div class="container">
          <div class="row py-5">
             <div class="col-md-6">
                  <div class="card mb-6">
                    <img class="product-img-top rounded" src="img/<?php echo $product->getId();?>.png"">
                  </div>
              </div>
              <div class="col-md-6">
                 <h4> <?php echo $product->getName(); ?> </h4>
                 <p class="text-muted">Code: <?php echo $product->getId(); ?> </p>
                 <p class="text-muted">Price: ₩ <?php echo $product->getPrice(); ?> </p>
                 <div class="py-3">
                 <h5 class="detail-size-title">Size</h5>
                  <select class="form-control form-control-lg col-md-2">
                    <?php echo $optionList; ?>
                  </select>
                  </div>
                  <table class="table table-sm py-3">
                    <thead>
                      <tr class="table-title">
                        <th scope="col">Size</th>
                        <?php 
                          for($i = 0; $i < count($sizeListTitle); $i++) {
                            echo '<th scope="col">' . $sizeListTitle[$i] . '</th>';
                          }
                        ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php echo $sizeList; ?>
                    </tbody>
                </table>
                <div class="text-center py-5">
                  <button type="button" class="btn btn-lg btn-sub">
                    <img class="btn-img" src="assets/card.png">
                    Buy
                  </button>
                  <button type="button" class="btn btn-lg btn-emp">
                    <img class="btn-img" src="assets/cart.png">
                    Cart
                  </button>
                </div>
              </div>
          </div>
          <div class="row">
          </div>
        </div>
    </div>
    </main>

<?php include('bottom.inc'); ?>