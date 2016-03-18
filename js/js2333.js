//第一题
function Person (name) {
	this.name = name;
    Person.count++; 
    Person.getCount=function(){
    return Person.count;}
     }
Person.prototype={
	toString:function(){return this.name;}
}
Person.count = 0;
var ling = new Person('ling');
var long = new Person('long');
console.log(ling.toString());
console.log(Person.count); 

//第二题
function Complex(x,y){
	this.x=x;
	this.y=y;
	console.log(typeof(x));
	console.log(typeof(y));
}
Complex.prototype.mul=function(that){
	    var c=this.x * that.x -this.y * that.y;
	    var d=this.x * that.y+ this.y * that.x;
		return new Complex(c,d);
	}
Complex.prototype.add=function(that){
	var e = this.x+that.x;
	var f = this.y+that.y;
	return new Complex(e,f);
}
Complex.prototype.mag=function(){
	var g = Math.sqrt(this.x*this.x+this.y*this.y);
	return g;
}
Complex.prototype.neg=function(){
	return new Complex(-this.x,-this.y);
}
Complex.prototype.equal=function(that){
	if (that.x==this.x&&that.y==this.y) return(true);
	else return(false);
}
Complex.prototype.toString=function(){
	return "实部是："+ this.x+","+"虚部是："+this.y;
}

var num1 = new Complex(1, -1);
var num2 = new Complex(-1, 1);
console.log(num2.toString());
num1.add(num2);
num1.mag();
num1.neg();
num1.equal(num2);

