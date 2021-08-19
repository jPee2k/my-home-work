// @ts-check
/* eslint no-restricted-syntax: ["off", "ForOfStatement"] */

// BEGIN (write your solution here)
export default (array) => {
  if (!array.length) {
    return {};
  }

  return array.reduce((acc, [key, value]) => {
    acc[key] = value;
    return acc;
  }, {});
};
// END
