<template>
  <!-- Put html here -->
  <div class="container">
    <p class="result">{{result}}</p>
    <div class="row justify-content-center">
      <button class="btn btn-secondary" v-on:click="clearEntry">CE</button>
      <button class="btn btn-secondary" v-on:click="clearAll">AC</button>
      <button class="btn btn-secondary" v-on:click="percentage">%</button>
      <button class="btn btn-secondary" v-on:click="factorial">!</button>
      <button class="btn btn-secondary" v-on:click="updateResult(calculator.pi.toString())">pi</button>
    </div>

    <div class="row justify-content-center">
      <button class="number btn btn-secondary" v-on:click="updateResult('7')">7</button>
      <button class="number btn btn-secondary" v-on:click="updateResult('8')">8</button>
      <button class="number btn btn-secondary" v-on:click="updateResult('9')">9</button>
      <button class="operator btn btn-secondary" v-on:click="updateTerms('/')">/</button>
    </div>

    <div class="row justify-content-center">
      <button class="number btn btn-secondary" v-on:click="updateResult('4')">4</button>
      <button class="number btn btn-secondary" v-on:click="updateResult('5')">5</button>
      <button class="number btn btn-secondary" v-on:click="updateResult('6')">6</button>
      <button class="operator btn btn-secondary" v-on:click="updateTerms('*')">*</button>
    </div>
    <div class="row justify-content-center">
      <button class="number btn btn-secondary" v-on:click="updateResult('1')">1</button>
      <button class="number btn btn-secondary" v-on:click="updateResult('2')">2</button>
      <button class="number btn btn-secondary" v-on:click="updateResult('3')">3</button>
      <button class="operator btn btn-secondary" v-on:click="updateTerms('-')">-</button>
    </div>
    <div class="row justify-content-center">
      <button class="number btn btn-secondary" v-on:click="updateResult('0')">0</button>
      <button class="number btn btn-secondary" v-on:click="updateResult('.')">.</button>
      <button class="operator btn btn-secondary" v-on:click="updateTerms('=')">=</button>
      <button class="operator btn btn-secondary" v-on:click="updateTerms('+')">+</button>
    </div>
  </div>
</template>

<script>
import Calculator from "@/util/Calculator.js";
export default {
  name: "Calculator",
  data: function() {
    return {
      result: "",
      resetResult: false,
      calculator: new Calculator()
    };
  },
  methods: {
    updateResult(data) {
      if (this.resetResult) {
        this.result = data;
        this.resetResult = false;
      } else {
        this.result += data;
      }
    },
    updateTerms(data) {
      this.calculator.terms.push(parseFloat(this.result));
      this.resetResult = true;
      if (data !== "=") {
        this.calculator.terms.push(data);
      } else {
        console.log(this.calculator.terms);
        this.result = this.calculator.evaluate();
      }
    },
    clearEntry() {
      this.result = "";
    },
    clearAll() {
      this.calculator.clear();
      this.result = "";
    },
    percentage() {
      this.result = this.calculator.percentage(parseFloat(this.result));
    },
    factorial() {
      this.result = this.calculator.factorial(parseFloat(this.result));
    }
  }
};
</script>

<style scoped>
p {
  color: blueviolet;
}
</style>
