    <script type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="application/json" id ='user_info'><?php include('data.json');?></script>
    <!-- <script type="application/json" src="data.json" id='user_info'></script> -->
    <script>

    // Object.prototype.getKeyByValue = function(value){
    //   for(var prop in this){
    //     if(this.hasOwnProperty(prop)){
    //       if(this[prop]===value)
    //         return prop;
    //     }
    //   }
    // }


     var size_name=[];
     var result = JSON.parse(document.getElementById('user_info').textContent);
     for(var i=0; i<result.length; i++){
       alert(result[i].top);
     }
    // console.log('dddd');
     // for(var i =0; i<result.length; i++){
     //   size_name.push(result[i].size);
     // }
     //
     // for(var i in size_name){
     //   alert(size_name[i]);
     // }

    //  alert(result[0].getKeyByValue('S'));

    // alert(data);
     //console.log(result);
     //alert(result.length)


    var user_size = [
      {"header" : "sss",
        "captions" : [
          "총장",
          "어깨",
          "가슴",
          "암홀",
          "소매"
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
    </script>

    </script>
