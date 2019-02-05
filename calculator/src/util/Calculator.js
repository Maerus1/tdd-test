export default class Calculator {
  constructor(){
    this.result = 0;
    this.terms = [];
  }
  get pi() {
    return 3.141592653589793;
  };
  //basic operations
  add = (x, y) => this.result = x + y;

  subtract = (x, y) => this.result = x - y;

  multiply = (x, y) => this.result = x * y;

  divide = (x, y) => this.result = x / y;

  clear() {
    this.result = 0;
    this.terms = [];
  };
  
  clearEntry = () => this.terms.pop();
  
  evaluate(){
    let operation = [];
    for(let i in this.terms){
      
      if(operation.length < 3){
        operation.push(this.terms[i]);
      }
      if(operation.length === 3){
        switch(operation[1]){
          case '+':
            operation = [this.add(operation[0], operation[2])];
            break;
          case '-':
            operation = [this.subtract(operation[0], operation[2])];
            break;
          case '*':
            operation = [this.multiply(operation[0], operation[2])];
            break;
          case '/':
            operation = [this.divide(operation[0], operation[2])];
            break;
        }
      }
    }
    this.terms = [];
    return this.result = operation[0];
  }

  percentage = (num) => this.divide(num, 100);

  factorial(num) {
    if(num > 1){
      return this.result = num * this.factorial(num - 1);
    }
    else{
      return 1;
    }
  }

}