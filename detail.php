<?php
include('top.inc');
?>
<style type="text/css">
  .content {
    margin: auto;
    text-align: center;
  }

  #c {
    margin: auto;
  }

  .header {
    text-align: center;
    width: 100%;
    margin: auto;
    height: 25px;
  }

  .pentagon {
    width: 400px;
    height: 400px;
    margin: auto;
    padding: 3px 3px 28px 3px;
    display:inline-block;
  }
</style>



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
        $sizeList = $sizeList . '<th scope="row" id="' . $top->getSize() . '">' . $top->getSize() . '</th>';
        $sizeList = $sizeList . '<td id="' . $top->getSize() .'_length">' . $top->getTopLength() . '</td>';
        $sizeList = $sizeList . '<td id="' . $top->getSize() .'_shoulder">' . $top->getShoulder() . '</td>';
        $sizeList = $sizeList . '<td id="' . $top->getSize() .'_chest">' . $top->getChest() . '</td>';
        $sizeList = $sizeList . '<td id="' . $top->getSize() .'_armhole">' . $top->getArmhole() . '</td>';
        $sizeList = $sizeList . '<td id="' . $top->getSize() .'_arm">' . $top->getArm() . '</td>';
        $sizeList = $sizeList . '</tr>';

        $optionList = $optionList . '<option value="' . $top->getSize() . '">' . $top->getSize() . '</option>';


      }

      // User size info
      // if session has id
      if(isset($_SESSION['id'])) {
        $uService = new UserService();
        $u = $uService->getUser($_SESSION['id']);

        $sizeList = $sizeList . '<tr style="color:darkred; font-weight:bold;">';
        $sizeList = $sizeList . '<th scope="row" id="U">' . $u->getName() . '</th>';
        $sizeList = $sizeList . '<td id="U_length">' . $u->getTopLength() . '</td>';
        $sizeList = $sizeList . '<td id="U_shoulder">' . $u->getShoulder() . '</td>';
        $sizeList = $sizeList . '<td id="U_chest">' . $u->getChest() . '</td>';
        $sizeList = $sizeList . '<td id="U_armhole">' . $u->getArmhole() . '</td>';
        $sizeList = $sizeList . '<td id="U_arm">' . $u->getArm() . '</td>';
        $sizeList = $sizeList . '</tr>';

      }

      break;

    case 'B':
      $sizeListTitle = array("총장", "허리", "엉덩이", "허벅지", "밑위");

      for($i=$this->detailList->getLength()-1; $i>=0; $i--) {

        $bottom = $this->detailList->get($i);

        $sizeList = $sizeList . '<tr>';
        $sizeList = $sizeList . '<th scope="row" id="' . $bottom->getSize() . '">' . $bottom->getSize() . '</th>';
        $sizeList = $sizeList . '<td id="' . $bottom->getSize() .'_length">' . $bottom->getBottomLength() . '</td>';
        $sizeList = $sizeList . '<td id="' . $bottom->getSize() .'_waist">' . $bottom->getWaist() . '</td>';
        $sizeList = $sizeList . '<td id="' . $bottom->getSize() .'_hip">' . $bottom->getHip() . '</td>';
        $sizeList = $sizeList . '<td id="' . $bottom->getSize() .'_thigh">' . $bottom->getThigh() . '</td>';
        $sizeList = $sizeList . '<td id="' . $bottom->getSize() .'_crotch">' . $bottom->getCrotch() . '</td>';
        $sizeList = $sizeList . '</tr>';

        $optionList = $optionList . '<option value="' . $bottom->getSize() . '">' . $bottom->getSize() . '</option>';

      }


      // User size info
      // if session has id
      if(isset($_SESSION['id'])) {
        $uService = new UserService();
        $u = $uService->getUser($_SESSION['id']);

        $sizeList = $sizeList . '<tr  style="color:darkred; font-weight:bold;">';
        $sizeList = $sizeList . '<th scope="row" id="U">' . $u->getName() . '</th>';
        $sizeList = $sizeList . '<td id="U_length">' . $u->getBottomLength() . '</td>';
        $sizeList = $sizeList . '<td id="U_waist">' . $u->getWaist() . '</td>';
        $sizeList = $sizeList . '<td id="U_hip">' . $u->getHip() . '</td>';
        $sizeList = $sizeList . '<td id="U_thigh">' . $u->getThigh() . '</td>';
        $sizeList = $sizeList . '<td id="U_crotch">' . $u->getCrotch() . '</td>';
        $sizeList = $sizeList . '</tr>';
      }

      break;

    case 'D':
      $sizeListTitle = array("총장", "어깨", "가슴", "암홀", "소매");

      for($i=$this->detailList->getLength()-1; $i>=0; $i--) {

        $dress = $this->detailList->get($i);

        $sizeList = $sizeList . '<tr>';
        $sizeList = $sizeList . '<th scope="row" id="' . $dress->getSize() . '">' . $dress->getSize() . '</th>';
        $sizeList = $sizeList . '<td id="' . $dress->getSize() . '_length">' . $dress->getDressLength() . '</td>';
        $sizeList = $sizeList . '<td id="' . $dress->getSize() . '_shoulder">' . $dress->getShoulder() . '</td>';
        $sizeList = $sizeList . '<td id="' . $dress->getSize() . '_chest">' . $dress->getChest() . '</td>';
        $sizeList = $sizeList . '<td id="' . $dress->getSize() . '_armhole">' . $dress->getArmhole() . '</td>';
        $sizeList = $sizeList . '<td id="' . $dress->getSize() . '_arm">' . $dress->getArm() . '</td>';
        $sizeList = $sizeList . '</tr>';

        $optionList = $optionList . '<option value="' . $dress->getSize() . '">' . $dress->getSize() . '</option>';

      }

      // User size info
      // if session has id
      if(isset($_SESSION['id'])) {
        $uService = new UserService();
        $u = $uService->getUser($_SESSION['id']);
        $dressLength = $u->getTopLength() + $u->getBottomLength();
        $sizeList = $sizeList . '<tr style="color:darkred; font-weight:bold;">';
        $sizeList = $sizeList . '<th scope="row" id="U">' . $u->getName() . '</th>';
        $sizeList = $sizeList . '<td id="U_length">' . $dressLength . '</td>';
        $sizeList = $sizeList . '<td id="U_shoulder">' . $u->getShoulder() . '</td>';
        $sizeList = $sizeList . '<td id="U_chest">' . $u->getChest() . '</td>';
        $sizeList = $sizeList . '<td id="U_armhole">' . $u->getArmhole() . '</td>';
        $sizeList = $sizeList . '<td id="U_arm">' . $u->getArm() . '</td>';
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
                  <div class="container py-5">
                    <h4> <?php echo $product->getName(); ?> </h4><br>
                    <p class="text-muted">Code: <?php echo $product->getId(); ?></p> <input id="type" type="hidden" value="<?php echo $type?>">
                    <p class="text-muted">Price: ₩ <?php echo $product->getPrice(); ?></p>
                  </div>
              </div>
              <div class="col-md-6"> <!--"javascript:changeSlectValue(this.value)"-->
                       <div class="py-3">
                       <h5 class="detail-size-title" style="display: inline; margin-right: 15px;">Size</h5>

                      <select id="size_select" class="form-control form-control-lg col-md-3" style="display: inline;">
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
                <div class="col-md content">
                <script src='https://code.jquery.com/jquery-3.3.1.js'></script>
                <script>


                  $("document").ready(function(){

                    var total_result=[];
                    var user_size=[]; //S, 총장, 어깨, 가슴, 암홀, 소매길이
                      //S, 총장, 허리, 엉덩이, 허벅지, 밑위
                    var clothes_S=[]; //S, 가슴, 암홀, 어깨, 총장, 소매길이
                      //S, 엉덩이, 허벅지, 허리, 밑위, 총장
                    var clothes_M=[];
                    var clothes_L=[];

                    // 치수 전체를 저장할 변수
                    var clothes_size=[];
                    // 사용자의 신체 치수를 저장할 변수
                    var type = document.getElementById('type').value; //T,B,D


                    // 선택된 사이즈 저장할 변수
                    var size = document.getElementById('size_select').value;
                    console.log('size: '+size);


                    // 의류의 코드로 구분
                    switch(type) {
                      case 'D':
                      case 'T':
                        user_size[0] = document.getElementById('U_length').innerHTML;
                        user_size[1] = document.getElementById('U_shoulder').innerHTML;
                        user_size[2] = document.getElementById('U_chest').innerHTML;
                        user_size[3] = document.getElementById('U_armhole').innerHTML;
                        user_size[4] = document.getElementById('U_arm').innerHTML;

                        clothes_S[0] = 'S';
                        clothes_S[1] = document.getElementById('S_chest').innerHTML;
                        clothes_S[2] = document.getElementById('S_armhole').innerHTML;
                        clothes_S[3] = document.getElementById('S_shoulder').innerHTML;
                        clothes_S[4] = document.getElementById('S_length').innerHTML;
                        clothes_S[5] = document.getElementById('S_arm').innerHTML;

                        clothes_M[0] = 'M';
                        clothes_M[1] = document.getElementById('M_chest').innerHTML;
                        clothes_M[2] = document.getElementById('M_armhole').innerHTML;
                        clothes_M[3] = document.getElementById('M_shoulder').innerHTML;
                        clothes_M[4] = document.getElementById('M_length').innerHTML;
                        clothes_M[5] = document.getElementById('M_arm').innerHTML;

                        clothes_L[0] = 'L';
                        clothes_L[1] = document.getElementById('L_chest').innerHTML;
                        clothes_L[2] = document.getElementById('L_armhole').innerHTML;
                        clothes_L[3] = document.getElementById('L_shoulder').innerHTML;
                        clothes_L[4] = document.getElementById('L_length').innerHTML;
                        clothes_L[5] = document.getElementById('L_arm').innerHTML;

                        switch(size) {
                            // size에 저장된 값으로 해당 사이즈의 치수 값들을 테이블에서 가져와 콘솔에 출력
                            case 'S':
                              clothes_size[0] = document.getElementById('S_length').innerHTML;
                              clothes_size[1] = document.getElementById('S_shoulder').innerHTML;
                              clothes_size[2] = document.getElementById('S_chest').innerHTML;
                              clothes_size[3] = document.getElementById('S_armhole').innerHTML;
                              clothes_size[4] = document.getElementById('S_arm').innerHTML;
                            break;

                            case 'M':
                              clothes_size[0] = document.getElementById('M_length').innerHTML;
                              clothes_size[1] = document.getElementById('M_shoulder').innerHTML;
                              clothes_size[2] = document.getElementById('M_chest').innerHTML;
                              clothes_size[3] = document.getElementById('M_armhole').innerHTML;
                              clothes_size[4] = document.getElementById('M_arm').innerHTML;
                            break;

                            case 'L':
                              clothes_size[0] = document.getElementById('L_length').innerHTML;
                              clothes_size[1] = document.getElementById('L_shoulder').innerHTML;
                              clothes_size[2] = document.getElementById('L_chest').innerHTML;
                              clothes_size[3] = document.getElementById('L_armhole').innerHTML;
                              clothes_size[4] = document.getElementById('L_arm').innerHTML;
                            break;
                        }
                      break;

                      case 'B':
                            user_size[0] = document.getElementById('U_length').innerHTML;
                            user_size[1] = document.getElementById('U_waist').innerHTML;
                            user_size[2] = document.getElementById('U_hip').innerHTML;
                            user_size[3] = document.getElementById('U_thigh').innerHTML;
                            user_size[4] = document.getElementById('U_crotch').innerHTML;

                            clothes_S[0] = 'S';
                            clothes_S[1] = document.getElementById('S_hip').innerHTML;
                            clothes_S[2] = document.getElementById('S_thigh').innerHTML;
                            clothes_S[3] = document.getElementById('S_waist').innerHTML;
                            clothes_S[4] = document.getElementById('S_crotch').innerHTML;
                            clothes_S[5] = document.getElementById('S_length').innerHTML;

                            clothes_M[0] = 'M';
                            clothes_M[1] = document.getElementById('M_hip').innerHTML;
                            clothes_M[2] = document.getElementById('M_thigh').innerHTML;
                            clothes_M[3] = document.getElementById('M_waist').innerHTML;
                            clothes_M[4] = document.getElementById('M_crotch').innerHTML;
                            clothes_M[5] = document.getElementById('M_length').innerHTML;

                            clothes_L[0] = 'L';
                            clothes_L[1] = document.getElementById('L_hip').innerHTML;
                            clothes_L[2] = document.getElementById('L_thigh').innerHTML;
                            clothes_L[3] = document.getElementById('L_waist').innerHTML;
                            clothes_L[4] = document.getElementById('L_crotch').innerHTML;
                            clothes_L[5] = document.getElementById('L_length').innerHTML;


                            switch(size) {
                            // size에 저장된 값으로 해당 사이즈의 치수 값들을 테이블에서 가져와 콘솔에 출력
                            case 'S':
                              clothes_size[0] = document.getElementById('S_length').innerHTML;
                              clothes_size[1] = document.getElementById('S_waist').innerHTML;
                              clothes_size[2] = document.getElementById('S_hip').innerHTML;
                              clothes_size[3] = document.getElementById('S_thigh').innerHTML;
                              clothes_size[4] = document.getElementById('S_crotch').innerHTML;
                            break;

                            case 'M':
                              clothes_size[0] = document.getElementById('M_length').innerHTML;
                              clothes_size[1] = document.getElementById('M_waist').innerHTML;
                              clothes_size[2] = document.getElementById('M_hip').innerHTML;
                              clothes_size[3] = document.getElementById('M_thigh').innerHTML;
                              clothes_size[4] = document.getElementById('M_crotch').innerHTML;
                            break;

                            case 'L':
                              clothes_size[0] = document.getElementById('L_length').innerHTML;
                              clothes_size[1] = document.getElementById('L_waist').innerHTML;
                              clothes_size[2] = document.getElementById('L_hip').innerHTML;
                              clothes_size[3] = document.getElementById('L_thigh').innerHTML;
                              clothes_size[4] = document.getElementById('L_crotch').innerHTML;
                            break;
                            }
                      break;

                      default:
                      break;
                    }

                    var result_1 = compareSize(type, user_size, clothes_S);
                    var result_2 = compareSize(type, user_size, clothes_M);
                    var result_3 = compareSize(type, user_size, clothes_L);

                    total_result = getMaxValue(result_1, result_2, result_3); //total_result[0]
                    $("#size_select").val(total_result[0]);
                    size = total_result[0];

                    switch(type) {
                      case 'D':
                      case 'T':
                        user_size[0] = document.getElementById('U_length').innerHTML;
                        user_size[1] = document.getElementById('U_shoulder').innerHTML;
                        user_size[2] = document.getElementById('U_chest').innerHTML;
                        user_size[3] = document.getElementById('U_armhole').innerHTML;
                        user_size[4] = document.getElementById('U_arm').innerHTML;

                        clothes_S[0] = 'S';
                        clothes_S[1] = document.getElementById('S_chest').innerHTML;
                        clothes_S[2] = document.getElementById('S_armhole').innerHTML;
                        clothes_S[3] = document.getElementById('S_shoulder').innerHTML;
                        clothes_S[4] = document.getElementById('S_length').innerHTML;
                        clothes_S[5] = document.getElementById('S_arm').innerHTML;

                        clothes_M[0] = 'M';
                        clothes_M[1] = document.getElementById('M_chest').innerHTML;
                        clothes_M[2] = document.getElementById('M_armhole').innerHTML;
                        clothes_M[3] = document.getElementById('M_shoulder').innerHTML;
                        clothes_M[4] = document.getElementById('M_length').innerHTML;
                        clothes_M[5] = document.getElementById('M_arm').innerHTML;

                        clothes_L[0] = 'L';
                        clothes_L[1] = document.getElementById('L_chest').innerHTML;
                        clothes_L[2] = document.getElementById('L_armhole').innerHTML;
                        clothes_L[3] = document.getElementById('L_shoulder').innerHTML;
                        clothes_L[4] = document.getElementById('L_length').innerHTML;
                        clothes_L[5] = document.getElementById('L_arm').innerHTML;

                        switch(size) {
                            // size에 저장된 값으로 해당 사이즈의 치수 값들을 테이블에서 가져와 콘솔에 출력
                            case 'S':
                              clothes_size[0] = document.getElementById('S_length').innerHTML;
                              clothes_size[1] = document.getElementById('S_shoulder').innerHTML;
                              clothes_size[2] = document.getElementById('S_chest').innerHTML;
                              clothes_size[3] = document.getElementById('S_armhole').innerHTML;
                              clothes_size[4] = document.getElementById('S_arm').innerHTML;
                            break;

                            case 'M':
                              clothes_size[0] = document.getElementById('M_length').innerHTML;
                              clothes_size[1] = document.getElementById('M_shoulder').innerHTML;
                              clothes_size[2] = document.getElementById('M_chest').innerHTML;
                              clothes_size[3] = document.getElementById('M_armhole').innerHTML;
                              clothes_size[4] = document.getElementById('M_arm').innerHTML;
                            break;

                            case 'L':
                              clothes_size[0] = document.getElementById('L_length').innerHTML;
                              clothes_size[1] = document.getElementById('L_shoulder').innerHTML;
                              clothes_size[2] = document.getElementById('L_chest').innerHTML;
                              clothes_size[3] = document.getElementById('L_armhole').innerHTML;
                              clothes_size[4] = document.getElementById('L_arm').innerHTML;
                            break;
                        }
                      break;

                      case 'B':
                            user_size[0] = document.getElementById('U_length').innerHTML;
                            user_size[1] = document.getElementById('U_waist').innerHTML;
                            user_size[2] = document.getElementById('U_hip').innerHTML;
                            user_size[3] = document.getElementById('U_thigh').innerHTML;
                            user_size[4] = document.getElementById('U_crotch').innerHTML;

                            clothes_S[0] = 'S';
                            clothes_S[1] = document.getElementById('S_hip').innerHTML;
                            clothes_S[2] = document.getElementById('S_thigh').innerHTML;
                            clothes_S[3] = document.getElementById('S_waist').innerHTML;
                            clothes_S[4] = document.getElementById('S_crotch').innerHTML;
                            clothes_S[5] = document.getElementById('S_length').innerHTML;

                            clothes_M[0] = 'M';
                            clothes_M[1] = document.getElementById('M_hip').innerHTML;
                            clothes_M[2] = document.getElementById('M_thigh').innerHTML;
                            clothes_M[3] = document.getElementById('M_waist').innerHTML;
                            clothes_M[4] = document.getElementById('M_crotch').innerHTML;
                            clothes_M[5] = document.getElementById('M_length').innerHTML;

                            clothes_L[0] = 'L';
                            clothes_L[1] = document.getElementById('L_hip').innerHTML;
                            clothes_L[2] = document.getElementById('L_thigh').innerHTML;
                            clothes_L[3] = document.getElementById('L_waist').innerHTML;
                            clothes_L[4] = document.getElementById('L_crotch').innerHTML;
                            clothes_L[5] = document.getElementById('L_length').innerHTML;


                            switch(size) {
                            // size에 저장된 값으로 해당 사이즈의 치수 값들을 테이블에서 가져와 콘솔에 출력
                            case 'S':
                              clothes_size[0] = document.getElementById('S_length').innerHTML;
                              clothes_size[1] = document.getElementById('S_waist').innerHTML;
                              clothes_size[2] = document.getElementById('S_hip').innerHTML;
                              clothes_size[3] = document.getElementById('S_thigh').innerHTML;
                              clothes_size[4] = document.getElementById('S_crotch').innerHTML;
                            break;

                            case 'M':
                              clothes_size[0] = document.getElementById('M_length').innerHTML;
                              clothes_size[1] = document.getElementById('M_waist').innerHTML;
                              clothes_size[2] = document.getElementById('M_hip').innerHTML;
                              clothes_size[3] = document.getElementById('M_thigh').innerHTML;
                              clothes_size[4] = document.getElementById('M_crotch').innerHTML;
                            break;

                            case 'L':
                              clothes_size[0] = document.getElementById('L_length').innerHTML;
                              clothes_size[1] = document.getElementById('L_waist').innerHTML;
                              clothes_size[2] = document.getElementById('L_hip').innerHTML;
                              clothes_size[3] = document.getElementById('L_thigh').innerHTML;
                              clothes_size[4] = document.getElementById('L_crotch').innerHTML;
                            break;
                            }
                      break;

                      default:
                      break;
                    }





                    console.log('최종: '+total_result[0], Math.round(total_result[1]*100)/100);



                    drawGraph(user_size, clothes_size, size, type);


                    // 셀렉트 박스의 값이 변경될 때마다 작동하는 부분
                    $('#size_select').on('change', function(){
                      var index = document.getElementById('size_select');
                        size = index.options[index.selectedIndex].value;
                        console.log("* 선택 사이즈: " + size);


                      //  compareSize(size, user_size, clothes_size); //*****

                    // 의류의 코드로 구분
                    switch(type) {
                      case 'D':
                      case 'T':
                        user_size[0] = document.getElementById('U_length').innerHTML;
                        user_size[1] = document.getElementById('U_shoulder').innerHTML;
                        user_size[2] = document.getElementById('U_chest').innerHTML;
                        user_size[3] = document.getElementById('U_armhole').innerHTML;
                        user_size[4] = document.getElementById('U_arm').innerHTML;

                        switch(size) {
                            // size에 저장된 값으로 해당 사이즈의 치수 값들을 테이블에서 가져와 콘솔에 출력
                            case 'S':
                              clothes_size[0] = document.getElementById('S_length').innerHTML;
                              clothes_size[1] = document.getElementById('S_shoulder').innerHTML;
                              clothes_size[2] = document.getElementById('S_chest').innerHTML;
                              clothes_size[3] = document.getElementById('S_armhole').innerHTML;
                              clothes_size[4] = document.getElementById('S_arm').innerHTML;
                            break;

                            case 'M':
                              clothes_size[0] = document.getElementById('M_length').innerHTML;
                              clothes_size[1] = document.getElementById('M_shoulder').innerHTML;
                              clothes_size[2] = document.getElementById('M_chest').innerHTML;
                              clothes_size[3] = document.getElementById('M_armhole').innerHTML;
                              clothes_size[4] = document.getElementById('M_arm').innerHTML;
                            break;

                            case 'L':
                              clothes_size[0] = document.getElementById('L_length').innerHTML;
                              clothes_size[1] = document.getElementById('L_shoulder').innerHTML;
                              clothes_size[2] = document.getElementById('L_chest').innerHTML;
                              clothes_size[3] = document.getElementById('L_armhole').innerHTML;
                              clothes_size[4] = document.getElementById('L_arm').innerHTML;
                            break;
                        }
                      break;

                      case 'B':
                            user_size[0] = document.getElementById('U_length').innerHTML;
                            user_size[1] = document.getElementById('U_waist').innerHTML;
                            user_size[2] = document.getElementById('U_hip').innerHTML;
                            user_size[3] = document.getElementById('U_thigh').innerHTML;
                            user_size[4] = document.getElementById('U_crotch').innerHTML;

                            switch(size) {
                            // size에 저장된 값으로 해당 사이즈의 치수 값들을 테이블에서 가져와 콘솔에 출력
                            case 'S':
                              clothes_size[0] = document.getElementById('S_length').innerHTML;
                              clothes_size[1] = document.getElementById('S_waist').innerHTML;
                              clothes_size[2] = document.getElementById('S_hip').innerHTML;
                              clothes_size[3] = document.getElementById('S_thigh').innerHTML;
                              clothes_size[4] = document.getElementById('S_crotch').innerHTML;
                            break;

                            case 'M':
                              clothes_size[0] = document.getElementById('M_length').innerHTML;
                              clothes_size[1] = document.getElementById('M_waist').innerHTML;
                              clothes_size[2] = document.getElementById('M_hip').innerHTML;
                              clothes_size[3] = document.getElementById('M_thigh').innerHTML;
                              clothes_size[4] = document.getElementById('M_crotch').innerHTML;
                            break;

                            case 'L':
                              clothes_size[0] = document.getElementById('L_length').innerHTML;
                              clothes_size[1] = document.getElementById('L_waist').innerHTML;
                              clothes_size[2] = document.getElementById('L_hip').innerHTML;
                              clothes_size[3] = document.getElementById('L_thigh').innerHTML;
                              clothes_size[4] = document.getElementById('L_crotch').innerHTML;
                            break;
                            }
                      break;

                      default:
                      break;
                    }


                      console.log("* 선택된 사이즈의 상세 치수들 ");
                      for(var i = 0; i < 5; i++)
                        console.log(clothes_size[i]);

                      console.log("* 사용자의 상세 치수들 ");
                      for(var i = 0; i < 5; i++)
                        console.log(user_size[i]);
;
                      // 그래프 그리는 함수
                      drawGraph(user_size, clothes_size, size, type);
                    });
                  });

                  function getMaxValue(result1, result2, result3){
                    var a = [result1[0], result1[1]];
                    var b = [result2[0], result2[1]];
                    var c = [result3[0], result2[1]];
                		var max = a;
                		max = (a[1] > b[1] && a[1] > c[1]) ? a : (b[1] > c[1]) ? b : c;
                    return max;
                  }

                  function compareAbsValue(val1, val2){
                    if((val1/val2)>1)
                      return Math.abs(2-(val1/val2));
                    else
                      return val1/val2;
                  }

                  //clothes-S,M,L을 받음
                  function compareSize(type, user_size, clothes_size){
                    var result=[];
                    switch(type){
                      case 'T':
                      case 'D':
                        result.push(clothes_size[0]); //s,m,l
                        var val_1 = compareAbsValue(user_size[2],clothes_size[1])*0.4; //가슴(40%)
                        var val_2 = compareAbsValue(user_size[3],clothes_size[2])*0.25; //암홀(25%)
                        var val_3 = compareAbsValue(user_size[1],clothes_size[3])*0.2; //어깨(20%)
                        var val_4 = compareAbsValue(user_size[0],clothes_size[4])*0.075; //총장(7.5%)
                        var val_5 = compareAbsValue(user_size[4],clothes_size[5])*0.075; //소매길이(7.5%)

                        var total_val = val_1+val_2+val_3+val_4+val_5;

                        result.push(total_val);
                        return result;
                        break;

                      case 'B': //엉덩이 허벅지  허리 밑위 총장
                        result.push(clothes_size[0]); //s,m,l
                        var val_1 = compareAbsValue(user_size[2],clothes_size[1])*0.4; //엉덩이(40%)
                        var val_2 = compareAbsValue(user_size[3],clothes_size[2])*0.25; //허벅지(25%)
                        var val_3 = compareAbsValue(user_size[1],clothes_size[3])*0.2; //허리(20%)
                        var val_4 = compareAbsValue(user_size[4],clothes_size[4])*0.075; //밑위(7.5%)
                        var val_5 = compareAbsValue(user_size[0],clothes_size[5])*0.075; //총장(7.5%)
                        var total_val = val_1+val_2+val_3+val_4+val_5;
                        result.push(total_val);
                        return result;
                        break;

                    }
                  }

                  // 그래프를 그리는 함수  (사용자 치수 배열, 옷 치수 배열, 옷 사이즈, 의류 분류)
                  // 계속 갱신 되어야 한다. (나중에 onChange() 안에서 호출해야함.)
                  function drawGraph(user, clothes, size, type) {
                    var title = [];
                    switch(type) {
                      case 'D':
                      case 'T':
                        title[0] = "총장";
                        title[1] = "어깨";
                        title[2] = "가슴";
                        title[3] = "암홀";
                        title[4] = "소매";
                        break;
                      case 'B':
                        title[0] = "총장";
                        title[1] = "허리";
                        title[2] = "엉덩이";
                        title[3] = "허벅지";
                        title[4] = "밑위";
                        break;
                        default:
                        break;
                    }

                    var skills = [
                      {"header" : size,
                        "captions" : [
                          title[0],
                          title[1],
                          title[2],
                          title[3],
                          title[4]
                        ],
                        "values" : [
                          user[0]/clothes[0],
                          user[1]/clothes[1],
                          user[2]/clothes[2],
                          user[3]/clothes[3],
                          user[4]/clothes[4]
                        ]
                      }
                    ];

                    var pentagonIndex = 0;
                    var valueIndex = 0;
                    var width = 0;
                    var height = 0;
                    var radOffset = Math.PI/2
                    var sides = 5; // Number of sides in the polygon
                    var theta = 2 * Math.PI/sides; // radians per section

                    function getXY(i, radius) {
                      return {"x": Math.cos(radOffset +theta * i) * radius*width + width/2,
                        "y": Math.sin(radOffset +theta * i) * radius*height + height/2};
                    }

                    var hue = [];
                    var hueOffset = 25;

                    for (var s in skills) {

                      $(".content").replaceWith('<div class="pentagon" id="interests"><div class="header"></div><canvas class="pentCanvas"/></div>');
                      hue[s] = (hueOffset + s * 255/skills.length) % 255;
                    }

                    $(".pentagon").each(function(index){
                      width = $(this).width();
                      height = $(this).height();
                      var ctx = $(this).find('canvas')[0].getContext('2d');
                      ctx.canvas.width = width;
                      ctx.canvas.height = height;
                      ctx.font="20px Arial";
                      ctx.textAlign="center";

                      /*** LABEL ***/
                      color = "rgb(50, 67, 91)";
                      ctx.fillStyle = "rgba(0, 0, 0, 1)";
                      ctx.fillText(skills[pentagonIndex].header, width/2, 15);

                      ctx.font="13px Arial";

                      // 배경을 그리는 부분
                      /*** PENTAGON BACKGROUND ***/
                      for (var i = 0; i < sides; i++) {
                        // For each side, draw two segments: the side, and the radius
                        ctx.beginPath();
                        xy = getXY(i, 0.3);
                        colorJitter = 50 + theta*i*2;
                        color = "rgb(92, 118, 160)";
                        ctx.fillStyle = color;
                        ctx.strokeStyle = "white";
                        ctx.moveTo(0.5*width, 0.5*height); //center
                        ctx.lineTo(xy.x, xy.y);
                        xy = getXY(i+1, 0.3);
                        ctx.lineTo(xy.x, xy.y);
                        xy = getXY(i, 0.37);
                        console.log();
                        ctx.fillText(skills[ pentagonIndex].captions[valueIndex],xy.x, xy.y +5);
                        valueIndex++;
                        ctx.closePath();
                        ctx.fill();
                        ctx.stroke();
                      }

                      // 사용자 그래프를 그리는 부분
                      valueIndex = 0;
                      ctx.beginPath();
                      ctx.fillStyle = "rgba(0, 0, 0, 0.2)";
                      ctx.strokeStyle = "rgba(0, 0, 0, 0.3)";
                      ctx.lineWidth = 5;
                      var value = skills[pentagonIndex].values[valueIndex];
                      xy = getXY(i, value * 0.3);
                      ctx.moveTo(xy.x,xy.y);
                      /*** SKILL GRAPH ***/
                      for (var i = 0; i < sides; i++) {
                        xy = getXY(i, value * 0.3);
                        ctx.lineTo(xy.x,xy.y);
                        valueIndex++;
                        value = skills[pentagonIndex].values[valueIndex];
                      }
                      ctx.closePath();
                      ctx.stroke();
                      ctx.fill();
                      valueIndex = 0;
                      pentagonIndex=0;
                    });
                  }

                </script>
                </div>
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
        </div>
    </div>
    </main>
<?php include('bottom.inc'); ?>
