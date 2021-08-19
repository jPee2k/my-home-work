// @ts-check

import scrabble from '../scrabble.js';

describe('scramble', () => {
  test('#test 1', () => {
    expect(scrabble('rkqodlw', 'world')).toBeTruthy();
  });

  test('#test 2', () => {
    expect(scrabble('begsdhhtsexoult', 'hexlet')).toBeTruthy();
  });

  test('#test 3', () => {
    expect(scrabble('katas', 'steak')).toBeFalsy();
  });

  test('#test 4', () => {
    expect(scrabble('nastenka', 'steak')).toBeTruthy();
  });

  test('#test 5', () => {
    expect(scrabble('scriptjava', 'javascript')).toBeTruthy();
  });

  test('#test 6', () => {
    expect(scrabble('javaSprint', 'javascript')).toBeFalsy();
  });

  test('#test 7', () => {
    expect(scrabble('scriptjavest', 'javascript')).toBeFalsy();
  });

  test('#test 8', () => {
    expect(scrabble('', 'javascript')).toBeFalsy();
  });

  test('#test 9', () => {
    expect(scrabble('scriptingjava', 'JavaScript')).toBeTruthy();
  });
});
