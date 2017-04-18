function Snake() {
  this.position = createVector(0, 0);
  this.speed = createVector(1, 0);
  this.total = 0;
  this.tail = [];

  this.eat = function(pos) {
    return this.position.x === pos.x && this.position.y === pos.y;
  }

  this.dir = function(x, y) {
    if(!((this.speed.x > 0 && x < 0) || (this.speed.y > 0 && y < 0) || (this.speed.x < 0 && x > 0) || (this.speed.y < 0 && y > 0))){
      this.speed.x = x;
      this.speed.y = y;
    }
  }

  this.death = function() {
    return this.tail.toString().includes(this.position.toString()) || this.position.x >= width || this.position.y >= height || this.position.x < 0 || this.position.y < 0;
  }

  this.update = function() {
    this.tail.unshift(createVector(this.position.x, this.position.y));
    this.tail.pop();

    this.position.add(this.speed.mult(scl).limit(12));
  }

  this.show = function() {
    fill(255);
    for (var i = 0; i < this.tail.length; i++) {
      rect(this.tail[i].x, this.tail[i].y, scl, scl);
    }
    rect(this.position.x, this.position.y, scl, scl);
  }
}
