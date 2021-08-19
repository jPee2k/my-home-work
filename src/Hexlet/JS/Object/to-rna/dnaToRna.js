// @ts-check
/* eslint no-restricted-syntax: ["off", "ForOfStatement"] */

// BEGIN (write your solution here)
export default (dna) => {
  if (!dna.length) {
    return '';
  }

  const map = {
    G: 'C',
    C: 'G',
    T: 'A',
    A: 'U',
  };

  const rna = dna
    .split('')
    .map((symbol) => map[symbol]);

  return rna.includes(undefined) ? null : rna.join('');
};
// END
