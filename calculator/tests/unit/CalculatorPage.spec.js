import { shallowMount } from "@vue/test-utils";
import Calculator from "@/components/Calculator.vue";

describe('Calculator', () => {
  it('renders the component correctly',() => {
    const wrapper = shallowMount(Calculator);
    expect(wrapper.find('.result').text()).toEqual('');
  })
  it('updates the result message when updated', () => {
    const wrapper = shallowMount(Calculator);
    
    wrapper.vm.updateResult(7);
    //running the method in turn updates the value of the html element
    expect(wrapper.find('.result').text()).toEqual('7');
    
  })
  it('pushes values to the calculator terms', () => {
    const wrapper = shallowMount(Calculator);

    wrapper.vm.updateResult(4);
    wrapper.vm.updateResult(5);
    wrapper.vm.updateTerms('+');

    expect(wrapper.vm.calculator.terms).toEqual([45, '+']);

    wrapper.vm.updateResult(9);
    wrapper.vm.updateTerms('=');
    expect(wrapper.vm.calculator.terms).toEqual([]);
    expect(wrapper.find('.result').text()).toEqual('54');
  })
})
