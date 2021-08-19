// @ts-check

import findWhere from '../arrays.js';

test('testFindWhere', () => {
  const data = [
    { title: 'Book of Fooos', author: 'FooBar', year: 1111 },
    { title: 'Cymbeline', author: 'Shakespeare', year: 1611 },
    { title: 'The Tempest', author: 'Shakespeare', year: 1611 },
    { title: 'Book of Foos Barrrs', author: 'FooBar', year: 2222 },
    { title: 'Still foooing', author: 'FooBar', year: 3333 },
    { title: 'Happy Foo', author: 'FooBar', year: 4444 },
  ];

  const expected1 = { title: 'Cymbeline', author: 'Shakespeare', year: 1611 };
  const where1 = { author: 'Shakespeare', year: 1611 };
  expect(findWhere(data, where1)).toEqual(expected1);

  const where2 = { author: 'undefined', year: 1611 };
  expect(findWhere(data, where2)).toBeNull();

  const expected3 = { title: 'Happy Foo', author: 'FooBar', year: 4444 };
  const where3 = { year: 4444 };
  expect(findWhere(data, where3)).toEqual(expected3);

  const expected4 = { title: 'The Tempest', author: 'Shakespeare', year: 1611 };
  const where4 = { author: 'Shakespeare', year: 1611, title: 'The Tempest' };
  expect(findWhere(data, where4)).toEqual(expected4);
});
