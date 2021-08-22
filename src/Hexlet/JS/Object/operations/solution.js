// @ts-check
/* eslint no-restricted-syntax: ["off", "ForOfStatement"] */

import _ from 'lodash';

// BEGIN (write your solution here)
export default (data1, data2) => {
  const unionKeys = _.union(Object.keys(data1), Object.keys(data2));
  const result = unionKeys.map((key) => {
    if (!_.has(data1, key)) {
      return [key, 'added'];
    }

    if (!_.has(data2, key)) {
      return [key, 'deleted'];
    }

    if (!_.isEqual(data1[key], data2[key])) {
      return [key, 'changed'];
    }

    return [key, 'unchanged'];
  });

  return Object.fromEntries(result);
};

// END
