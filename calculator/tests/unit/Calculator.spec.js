import  Calculator  from '@/util/Calculator.js';

describe('Calcuator.js', () => {
  it('adds two numbers', () => {
    let calculator = new Calculator();
    let answer = calculator.add(5, 5);
    expect(answer).toEqual(10);
  });

  it('subtracts two numbers', () => {
    let calculator = new Calculator();
    let answer = calculator.subtract(5, 3);
    expect(answer).toEqual(2);
  });

  it('multiplies two numbers', () => {
    let calculator = new Calculator();
    let answer = calculator.multiply(3, 3);
    expect(answer).toEqual(9);
  });

  it('divides two numbers', () => {
    let calculator = new Calculator();
    let answer = calculator.divide(9, 3);
    expect(answer).toEqual(3);
  });
});