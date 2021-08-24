const shuffleArray = (array) => {
  const newArray = [...array];
  for (let i = newArray.length - 1; i > 0; i -= 1) {
    const j = Math.floor(Math.random() * (i + 1));
    [newArray[i], newArray[j]] = [newArray[j], newArray[i]];
  }
  return newArray;
};

const chunkVertical = (array, pieceCount = 4) => {
  const result = [];

  for (let j = 0; j < pieceCount; j += 1) {
    result.push([]);
    for (let i = j; array.length > i; i += pieceCount) {
      result[j].push(array[i]);
    }
  }

  return result;
};

const isSolved = (nums) => {
  let countInversions = 0;

  for (let i = 0; i < nums.length; i += 1) {
    for (let j = 0; j < i; j += 1) {
      if (nums[j] > nums[i]) {
        countInversions += 1;
      }
    }
  }

  return countInversions % 2 === 0;
};

const prepareData = () => {
  const numbers = Array.from(Array(15), (v, i) => i + 1);

  let shuffledNums;
  do {
    shuffledNums = shuffleArray(numbers);
  } while (!isSolved(shuffledNums));
  shuffledNums.push(null);

  return chunkVertical(shuffledNums);
};

export const isEqual = (data1, data2) => JSON.stringify(data1) === JSON.stringify(data2);

export default prepareData;
