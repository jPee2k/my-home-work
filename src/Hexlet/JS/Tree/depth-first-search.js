// import {mkdir, mkfile, getChildren, isFile, getName} from '@hexlet/immutable-fs-trees';
const {mkdir, mkfile, getChildren, isFile, getName, getMeta} = require('@hexlet/immutable-fs-trees');
const {_} = require('lodash');

const tree = mkdir('/', [
  mkdir('etc', [
    mkfile('bashrc'),
    mkfile('consul.cfg'),
  ]),
  mkfile('hexletrc'),
  mkdir('bin', [
    mkfile('ls'),
    mkfile('cat'),
  ]),
]);

const depthFirstSearch = (tree) => {
  // Распечатываем содержимое узла
  console.log(getName(tree));
  // Если это файл, то возвращаем управление
  if (isFile(tree)) {
    return;
  }

  // Получаем детей
  const children = getChildren(tree);

  // Применяем функцию dfs ко всем дочерним элементам
  // Множество рекурсивных вызовов в рамках одного вызова функции
  // называется древовидной рекурсией
  children.forEach(depthFirstSearch);
};

const changeOwner = (tree, owner) => {
  const name = getName(tree);
  const meta = _.cloneDeep(getMeta(tree));

  meta.owner = owner;

  if (isFile(tree)) {
    return mkfile(name, meta);
  }

  const children = getChildren(tree).map((child) => {
    return changeOwner(child, owner);
  });

  return mkdir(name, children, meta);
};

// console.log(JSON.stringify(changeOwner(tree, 'jPee')));
