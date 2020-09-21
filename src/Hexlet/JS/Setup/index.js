/* eslint-disable no-console */
import _ from 'lodash';

console.log('Hello, World!');
console.log(_.last(['one', 'two', 18]));

const getName = (value) => {
  const clearValue = value.trim();
  return clearValue;
};

console.log(getName('John  '));
