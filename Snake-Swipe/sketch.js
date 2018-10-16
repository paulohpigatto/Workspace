const url = 'http://localhost:3000/'

let s;
let scl = 12;
let food;
let highscore = 0;
let name;

function setup() {
  setNickname();

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
    registerScore();
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

async function setNickname(){
  name = (localStorage.getItem('name')) ? localStorage.getItem('name') : prompt("Insert your nickname");

  localStorage.setItem('name', name);

  $("#warnings").text(`Using nickname ${name}`);

  let response = await axios.post(url.concat(`player/${name}`));

  $("#warnings").html(`Using nickname: ${name}<br/>Account ID: ${response.data.id}`);

  getUserStats();
}

async function registerScore(){
  let response = await axios.post(url.concat(`score/${name}?amount=${s.tail.length}`));
}

async function getUserStats(){
  let response = await axios.get(url.concat(`balance/${name}`));

  $("#userData").html(`
    Total score: ${response.data.stats.totalScore}<br/>
    High score: ${response.data.stats.highScore}<br/>
    ${response.data.msg}
  `);
}