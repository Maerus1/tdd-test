<template>
<!-- Put html here -->
<div class='calculator'>
  <p class='result'>{{result}}</p>
  <button v-on:click="updateResult('7')">7</button>
  <button v-on:click="updateResult('8')">8</button>
  <button v-on:click="updateResult('9')">9</button>
  <button v-on:click="updateTerms('/')">/</button><br/>
  <button v-on:click="updateResult('4')">4</button>
  <button v-on:click="updateResult('5')">5</button>
  <button v-on:click="updateResult('6')">6</button>
  <button v-on:click="updateTerms('*')">*</button><br/>
  <button v-on:click="updateResult('1')">1</button>
  <button v-on:click="updateResult('2')">2</button>
  <button v-on:click="updateResult('3')">3</button>
  <button v-on:click="updateTerms('-')">-</button><br/>
  <button v-on:click="updateResult('0')">0</button>
  <button v-on:click="updateResult('.')">.</button>
  <button v-on:click="updateTerms('=')">=</button>
  <button v-on:click="updateTerms('+')">+</button>
</div>
</template>

<script>
import  Calculator  from '@/util/Calculator.js';
export default {
  name: "Calculator",
  data: function() {
    return {
      result: '',
      resetResult: false,
      calculator: new Calculator()
    }
  },
  methods: {
    updateResult (data) {
      if(this.resetResult){
        this.result = data
        this.resetResult = false;
      }
      else{
        this.result += data;
      }
      return this.result;
    },
    updateTerms (data) {
      this.calculator.terms.push(parseFloat(this.result));
      this.resetResult = true;
      if(data !== '='){
        this.calculator.terms.push(data);
      }
      else{
        console.log(this.calculator.terms);
        this.result = this.calculator.evaluate();
      }
    }
  }
}
</script>

<style scoped>
p {
  color:blueviolet;
}
</style>
