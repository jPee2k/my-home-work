// @ts-check

import dnaToRna from '../dnaToRna.js';

test('dnaToRna', () => {
  expect(dnaToRna('ACGTGGTCTTAA')).toBe('UGCACCAGAAUU');
  expect(dnaToRna('CCGTA')).toBe('GGCAU');
  expect(dnaToRna('')).toBe('');
  expect(dnaToRna('ACNTG')).toBeNull();
});
