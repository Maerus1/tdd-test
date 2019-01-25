import  Calculator  from '@/util/Calculator.js';

describe('Calcuator.js', () => {
  it('adds two numbers together', () => {
    let calculator = new Calculator();

    let answer = calculator.add(5, 5);
    expect(answer).toEqual(10);
  });
});