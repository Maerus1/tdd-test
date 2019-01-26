import  Calculator  from '@/util/Calculator.js';

describe('Calcuator.js', () => {
  it('adds two numbers', () => {
    let calculator = new Calculator();
    calculator.add(5, 5)
    expect(calculator.result).toEqual(10);
  });

  it('subtracts two numbers', () => {
    let calculator = new Calculator();
    calculator.subtract(5, 3)
    expect(calculator.result).toEqual(2);
  });

  it('multiplies two numbers', () => {
    let calculator = new Calculator();
    calculator.multiply(3, 3)
    expect(calculator.result).toEqual(9);
  });

  it('divides two numbers', () => {
    let calculator = new Calculator();
    calculator.divide(9, 3)
    expect(calculator.result).toEqual(3);
  });

  it('clears the result', () => {
    let calculator = new Calculator();
    calculator.add(4, 4);
    calculator.clear();
    expect(calculator.result).toEqual(0);
  });

  it('has operation variables', () => {
    let calculator = new Calculator();
    expect(calculator.operator).toBeNull();
    expect(calculator.terms).toBeDefined();
  });

  it('evaluates all terms', () => {
    let calculator = new Calculator();
    calculator.terms.push(4, '+', 6, '/', 5, '*', 6);
    calculator.evaluate();
    expect(calculator.result).toEqual(12);
  });
}); 