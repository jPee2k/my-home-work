// @ts-check

import '@testing-library/jest-dom';
import fs from 'fs';
import path from 'path';
import testingLibraryDom from '@testing-library/dom';
import testingLibraryUserEvent from '@testing-library/user-event';

import run from '../src/application.js';

const { screen, within } = testingLibraryDom;
const userEvent = testingLibraryUserEvent.default;
const getElement = {
  openButton: (n) => screen.getByRole('button', { name: `Launch demo modal ${n}` }),
  modal: (n) => document.querySelector(`#exampleModal${n}`),
  closeButton: (modal) => within(modal).getByText('×'),
};

beforeAll(() => {
  const initHtml = fs.readFileSync(path.join('__fixtures__', 'index.html')).toString();
  document.body.innerHTML = initHtml;
  run();
});

test('Modal 1', () => {
  userEvent.click(getElement.openButton(1));
  let modal1 = getElement.modal(1);
  const modal2 = getElement.modal(2);
  expect(modal2).not.toHaveClass('show');
  expect(modal1).toHaveClass('show');
  expect(modal1).toHaveStyle('display: block');

  userEvent.click(getElement.closeButton(modal1));
  modal1 = getElement.modal(1);
  expect(modal1).not.toHaveClass('show');
  expect(modal1).toHaveStyle('display: none');
});

test('Modal 2', () => {
  userEvent.click(getElement.openButton(2));
  const modal1 = getElement.modal(1);
  let modal2 = getElement.modal(2);
  expect(modal1).not.toHaveClass('show');
  expect(modal2).toHaveClass('show');
  expect(modal2).toHaveStyle('display: block');

  userEvent.click(getElement.closeButton(modal2));
  modal2 = getElement.modal(1);
  expect(modal2).not.toHaveClass('show');
  expect(modal2).toHaveStyle('display: none');
});

test('Click another button', () => {
  userEvent.click(getElement.openButton(1));
  const modal2 = getElement.modal(2);

  userEvent.click(getElement.closeButton(modal2));
  const modal1 = getElement.modal(1);
  expect(modal1).toHaveClass('show');
  expect(modal1).toHaveStyle('display: block');
  userEvent.click(getElement.closeButton(modal1));
});

test('Modal 2 again', () => {
  userEvent.click(getElement.openButton(2));
  const modal1 = getElement.modal(1);
  let modal2 = getElement.modal(2);
  expect(modal1).not.toHaveClass('show');
  expect(modal2).toHaveClass('show');
  expect(modal2).toHaveStyle('display: block');

  userEvent.click(getElement.closeButton(modal2));
  modal2 = getElement.modal(1);
  expect(modal2).not.toHaveClass('show');
  expect(modal2).toHaveStyle('display: none');
});
