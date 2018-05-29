<script type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="application/json" id ='user_info'><?php include('data.json');?></script>
<script>

<?php
class size_graph{

  // Object.prototype.getKeyByValue = function(value){
  //   for(var prop in this){
  //     if(this.hasOwnProperty(prop)){
  //       if(this[prop]===value)
  //         return prop;
  //     }
  //   }
  // }
  public function getKeyByValue(value){
    // for(var prop in this){
    //    if(this.hasOwnProperty(prop)){
    //      if(this[prop]===value)
    //        return prop;
    //    }
    //  }
  }


   var top_size=[];
   var top_length=[];
   var top_shoulder=[];
   var top_chest=[];
   var top_armhole=[];
   var top_arm=[];

   var result = JSON.parse(document.getElementById('user_info').textContent);
   //alert(result);
   for(var i=0; i<result.length; i++){ //length:4
     if(result[i].top){
        top_size.push(result[i].top.size);//s,m,l,user
        top_length.push(result[i].top.length);
        top_shoulder.push(result[i].top.shoulder);
        top_chest.push(result[i].top.chest);
        top_armhole.push(result[i].top.armhole);
        top_arm.push(result[i].top.arm);



        var user_size = [
          {"header" : "",
            "captions" : [
              result[0].top.getKeyByValue(top_length[0]),
              result[0].top.getKeyByValue(top_shoulder[0]),
              result[0].top.getKeyByValue(top_chest[0]),
              result[0].top.getKeyByValue(top_armhole[0]),
              result[0].top.getKeyByValue(top_arm[0])
            ],
            "values" : [
              (top_length[3]/top_length[1]),
              (top_shoulder[3]/top_shoulder[1]),
              (top_chest[3]/top_chest[1]),
              (top_armhole[3]/top_armhole[1]),
              (top_arm[3]/top_arm[1])
            ]
          }
        ];

     }else if(result[i].bottom){


       var user_size = [
         {"header" : "",
           "captions" : [
             result[0].top.getKeyByValue(top_length[0]),
             result[0].top.getKeyByValue(top_shoulder[0]),
             result[0].top.getKeyByValue(top_chest[0]),
             result[0].top.getKeyByValue(top_armhole[0]),
             result[0].top.getKeyByValue(top_arm[0])
           ],
           "values" : [
             0.35,
             0.55,
             0.75,
             0.60,
             0.80
           ]
         }
       ];

     }
   }


public void write(){

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

  for (var s in user_size) {
    $(".content").append('<div class="pentagon" id="interests"><div class="header"></div><canvas class="pentCanvas"/></div>');
    hue[s] = (hueOffset + s * 255/user_size.length) % 255;
  }

  $(".pentagon").each(function(index){
    width = $(this).width();
    height = $(this).height();
    var ctx = $(this).find('canvas')[0].getContext('2d');
    ctx.canvas.width = width;
    ctx.canvas.height = height;
    ctx.font="15px Monospace";
    ctx.textAlign="center";

    /*** LABEL ***/
    color = "rgb(200, 230, 255)";
    ctx.fillStyle = color;
    ctx.fillText(user_size[pentagonIndex].header, width/2, 15);

    ctx.font="15px Monospace";

    /*** PENTAGON BACKGROUND ***/
    for (var i = 0; i < sides; i++) {
      // For each side, draw two segments: the side, and the radius
      ctx.beginPath();
      xy = getXY(i, 0.3);
      colorJitter = 25 + theta*i*2;
      color = "rgba(100, 150, 230, 0.6)";
      ctx.fillStyle = color;
      ctx.strokeStyle = color;
      ctx.moveTo(0.5*width, 0.5*height); //center
      ctx.lineTo(xy.x, xy.y);
      xy = getXY(i+1, 0.3);
      ctx.lineTo(xy.x, xy.y);
      xy = getXY(i, 0.35);
      console.log();
      ctx.fillText(user_size[ pentagonIndex].captions[valueIndex],xy.x, xy.y +6);
      valueIndex++;
      ctx.closePath();
      ctx.fill();
      ctx.stroke();
    }

    valueIndex = 0;
    ctx.beginPath();
    ctx.fillStyle = "rgba(240, 100, 100, 0.3)";
    ctx.strokeStyle = "rgba(40, 0, 0, 0.6)";
    ctx.lineWidth = 5;
    var value = user_size[pentagonIndex].values[valueIndex];
    xy = getXY(i, value * 0.3);
    ctx.moveTo(xy.x,xy.y);
    /*** SKILL GRAPH ***/
    for (var i = 0; i < sides; i++) {
      xy = getXY(i, value * 0.3);
      ctx.lineTo(xy.x,xy.y);
      valueIndex++;
      value = user_size[pentagonIndex].values[valueIndex];
    }
    ctx.closePath();
    ctx.stroke();
    ctx.fill();
    valueIndex = 0;
    pentagonIndex++;
  });

}

}



 ?>
