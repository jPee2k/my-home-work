import prepareData from './lib.js';

const getActiveIndex = (object, value = 'table-active') => (
  Object.keys(object)
    .find((key) => object[key].classList.contains(value))
);

export const keyPress = (key, $wrapper, activeClassName) => {
  const $active = $wrapper.querySelector(`.${activeClassName}`);
  const $currentRow = $active.parentElement;
  const index = getActiveIndex($currentRow.children);

  const map = {
    ArrowUp: () => {
      const $prevRow = $currentRow.previousElementSibling;
      return $prevRow?.children[index];
    },
    ArrowDown: () => {
      const $nextRow = $currentRow.nextElementSibling;
      return $nextRow?.children[index];
    },
    ArrowLeft: () => $active.previousElementSibling,
    ArrowRight: () => $active.nextElementSibling,
  };
  const $newActive = map[key].call();

  if ($newActive) {
    $active.textContent = $newActive.textContent;
    $active.classList.remove(activeClassName);

    $newActive.textContent = '';
    $newActive.classList.add(activeClassName);
    return true;
  }
  return false;
};

export const renderSteps = (state, $wrapper) => {
  const nouns = state.steps === 1 ? 'step' : 'steps';
  $wrapper
    .querySelector('[data-target="steps"]')
    .textContent = `${state.steps} ${nouns}`;
};

export const renderRecord = (state, $wrapper) => {
  $wrapper
    .querySelector('[data-target="record"]')
    .textContent = `record: ${state.record}`;
};

export const prepareTable = ($wrapper, activeClassName, rows = prepareData()) => {
  const $rows = rows.map((row) => {
    const $elements = row.map((item) => {
      const $td = document.createElement('td');
      $td.textContent = item;

      if (item === null) {
        $td.classList.add('p-3', activeClassName);
      } else {
        $td.classList.add('p-3');
      }

      return $td;
    });

    const $row = document.createElement('tr');
    $row.append(...$elements);
    return $row;
  });

  return $wrapper.querySelector('tbody')
    .replaceChildren(...$rows);
};

export const renderCongrats = ($wrapper, activeClassName) => {
  const rows = [
    [null, null, null, null],
    ['Y', 'o', 'u', null],
    [null, 'W', 'i', 'n'],
    [null, null, null, null],
  ];

  prepareTable($wrapper, activeClassName, rows);
};
