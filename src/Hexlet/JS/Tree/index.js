// import {mkdir, mkfile, getChildren, isFile, getName} from '@hexlet/immutable-fs-trees';
const {mkdir, mkfile, getChildren, isFile, getName, getMeta} = require('@hexlet/immutable-fs-trees');
const path = require('path');
const _ = require('lodash');

const tree = mkdir('/', [
  mkdir('etc', [
    mkfile('bashrc'),
    mkfile('consul.cfg'),
  ]),
  mkfile('hexletrc'),
  mkdir('bin', [
    mkfile('.ls'),
    mkfile('cat'),
    mkdir('.trash', [], {owner: 'root'}),
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


const getNodesCount = (tree) => {
  if (isFile(tree)) {
    // Возвращаем 1 для учёта текущего файла
    return 1;
  }

  // Если узел — директория, получаем его детей
  const children = getChildren(tree);
  // Самая сложная часть
  // Считаем количество потомков для каждого из детей,
  // вызывая рекурсивно нашу функцию getNodesCount
  const descendantCounts = children.map(getNodesCount);
  // Возвращаем 1 (текущая директория) + общее количество потомков
  return 1 + _.sum(descendantCounts);
};


const isHidden = (tree) => getName(tree).startsWith('.');

const getHiddenFilesCount = (tree) => {
  if (isFile(tree)) {
    return isHidden(tree) ? 1 : 0;
  }

  const children = getChildren(tree)
    .map(getHiddenFilesCount);

  return _.sum(children);
};


const getFileSizes = (tree) => {
  if (isFile(tree)) {
    return getMeta(tree)?.size;
  }

  const children = getChildren(tree)
    .map(getFileSizes);

  return _.sum(children);
};

const du = (tree) => {
  if (isFile(tree)) {
    return [getName(tree), getMeta(tree)?.size];
  }

  return getChildren(tree)
    .map((child) => [getName(child), getFileSizes(child)])
    .sort(([, size1], [, size2]) => size2 - size1);
};

const findFilesByName = (tree, str) => {
  const iter = (node, link) => {
    const name = getName(node);
    const fullName = path.join(link, name);

    if (isFile(node)) {
      return name.includes(str) ? fullName : [];
    }

    return getChildren(node).flatMap((child) => iter(child, fullName));
  };

  return iter(tree, getName(tree));
};


// console.log(JSON.stringify(changeOwner(tree, 'jPee')));
// console.log(getNodesCount(tree));
// console.log(findFilesByName(tree, 'on'));
