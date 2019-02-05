<template>
<!-- Put html here -->
<div class='calculator'>
  <p class='result'>{{result}}</p>
  <button v-on:click="clearEntry">CE</button>
  <button v-on:click="clearAll">AC</button>
  <button v-on:click="percentage">%</button>
  <button v-on:click="factorial">!</button>
  <button v-on:click="updateResult(calculator.pi.toString())">pi</button><br/>
  <button v-on:click="updateResult('7')" class='number'>7</button>
  <button v-on:click="updateResult('8')" class='number'>8</button>
  <button v-on:click="updateResult('9')" class='number'>9</button>
  <button v-on:click="updateTerms('/')" class='operator'>/</button><br/>
  <button v-on:click="updateResult('4')" class='number'>4</button>
  <button v-on:click="updateResult('5')" class='number'>5</button>
  <button v-on:click="updateResult('6')" class='number'>6</button>
  <button v-on:click="updateTerms('*')" class='operator'>*</button><br/>
  <button v-on:click="updateResult('1')" class='number'>1</button>
  <button v-on:click="updateResult('2')" class='number'>2</button>
  <button v-on:click="updateResult('3')" class='number'>3</button>
  <button v-on:click="updateTerms('-')" class='operator'>-</button><br/>
  <button v-on:click="updateResult('0')" class='number'>0</button>
  <button v-on:click="updateResult('.')" class='number'>.</button>
  <button v-on:click="updateTerms('=')" class='operator'>=</button>
  <button v-on:click="updateTerms('+')" class='operator'>+</button>
  
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
    },
    clearEntry () {
      this.result = '';
    },
    clearAll () {
      this.calculator.clear();
      this.result = '';
    },
    percentage () {
      this.result = this.calculator.percentage(parseFloat(this.result));
    },
    factorial () {
      this.result = this.calculator.factorial(parseFloat(this.result));
    }
  }
}
</script>

<style scoped>
p {
  color:blueviolet;
}
</style>
