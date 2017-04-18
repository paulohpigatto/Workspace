var s;
var scl = 12;
var food;
var highscore = 0;

function setup() {
  var canvas = createCanvas(600, 600);
  s = new Snake();
  frameRate(12);
  pickLocation();

  canvas.mousePressed(setup, loop());
}

function pickLocation() {
  food = createVector(floor(random(width/scl)), floor(random(height/scl)));
  food.mult(scl);
}

function draw() {
  background(51);

  textSize(18);
  textFont("Lucida Grande");
  fill(255);
  text("Score: " + s.tail.length, 1, 15);
  text("Highscore: " + highscore, 1, 35);

  if(s.death()){
    textSize(28);
    textFont("Lucida Grande");
    fill(255);
    text("Game Over", 250, 280);
    textSize(22);
    text("Click to start again", 235, 330);
    noLoop();
  } else{
    if (s.eat(food)) {
      s.tail.push(createVector(s.x, s.y));
      pickLocation();
    }
    s.update();
    s.show();
  }

  fill(255, 0, 100);
  rect(food.x, food.y, scl, scl);

  highscore = s.tail.lenght > highscore ? s.tail.length : highscore;
}

function keyPressed() {
  if (keyCode === UP_ARROW) {
    s.dir(0, -1);
  } else if (keyCode === DOWN_ARROW) {
    s.dir(0, 1);
  } else if (keyCode === RIGHT_ARROW) {
    s.dir(1, 0);
  } else if (keyCode === LEFT_ARROW) {
    s.dir(-1, 0);
  }
  // else if(keyCode === 32){
  // 	s.total++;
  // 	s.tail.push(createVector(s.x, s.y));
  // }
}
