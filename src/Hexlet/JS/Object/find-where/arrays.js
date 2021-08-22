// @ts-check
/* eslint no-restricted-syntax: ["off", "ForOfStatement"] */
// BEGIN (write your solution here)
export default (coll, term) => {
  const entries = Object.entries(term);

  const result = entries.reduce((acc, [key, value]) => (
    acc.filter((item) => item[key] === value)
  ), coll);

  return result.length ? result[0] : null;
};
// END
