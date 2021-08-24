// @ts-check
import {
  keyPress, renderSteps, prepareTable, renderRecord, renderCongrats,
} from './view.js';
import { isEqual } from './lib.js';

const getCurrentTableData = ($wrapper) => {
  const $rows = $wrapper.querySelectorAll('tbody tr');
  return [...$rows].flatMap(($row) => {
    const $items = $row.querySelectorAll('td');
    return [...$items].map((item) => (item.textContent
      ? parseInt(item.textContent, 10)
      : null));
  });
};

const isWin = (state, $wrapper) => {
  const result = getCurrentTableData($wrapper);
  return isEqual(result, state.combination);
};

export default () => {
  const activeClassName = 'table-active';
  const state = {
    isWin: false,
    steps: 0,
    record: 0,
    combination: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, null],
  };

  const $wrapper = document.querySelector('.gem-puzzle table');
  const $button = $wrapper.querySelector('button');

  const onKeyPress = (evt) => {
    switch (evt.key) {
      case 'ArrowUp':
        if (keyPress(evt.key, $wrapper, activeClassName)) {
          state.steps += 1;
        }
        break;
      case 'ArrowDown':
        if (keyPress(evt.key, $wrapper, activeClassName)) {
          state.steps += 1;
        }
        break;
      case 'ArrowLeft':
        if (keyPress(evt.key, $wrapper, activeClassName)) {
          state.steps += 1;
        }
        break;
      case 'ArrowRight':
        if (keyPress(evt.key, $wrapper, activeClassName)) {
          state.steps += 1;
        }
        break;
      default:
        break;
    }

    renderSteps(state, $wrapper);

    if (isWin(state, $wrapper)) {
      if (state.record > state.steps || state.record === 0) {
        state.record = state.steps;
        renderRecord(state, $wrapper);
      }

      renderCongrats($wrapper, activeClassName);
      $wrapper.removeEventListener('keyup', onKeyPress);
    }
  };

  const resetTable = () => {
    state.steps = 0;

    prepareTable($wrapper, activeClassName);
    renderSteps(state, $wrapper);
    $wrapper.addEventListener('keyup', onKeyPress);
  };

  $wrapper.addEventListener('keyup', onKeyPress);
  $button.addEventListener('click', resetTable);
  prepareTable($wrapper, activeClassName);
};
