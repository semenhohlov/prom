const promUl = document.querySelector('#prom_groups');
const loadedUl = document.querySelector('#loaded_groups');
const search = document.querySelector('#searchId');

function getSubCats(root, source, begin = '-') {
  // console.log(begin, root.group_name, root.group_id);
  begin += '-';
  root.subCats = source.filter(item => {
    if (root.group_id && (root.group_id === item.group_parent_id))
      return item;
    });
  // console.log('SubCats: ', root.subCats.length);
  root.subCats.forEach(item => getSubCats(item, source, begin));
}
function show(item, begin = '-') {
  const li = document.createElement('li');
  const span = document.createElement('span');
  span.innerHTML = item.group_name;
  // li.appendChild(span);
  li.insertAdjacentElement('afterbegin', span);
  // console.log(begin, item.group_name);
  if (item.subCats.length) {
    const ul = document.createElement('ul');
    // li.appendChild(ul);
    // li.insertAdjacentElement('beforeend', ul);
    begin += '-';
    // let result = '';
    item.subCats.forEach(el => {
      ul.insertAdjacentElement('beforeend', show(el, begin));
    });
    li.insertAdjacentElement('beforeend', ul);
  }
  return li
}

const promGroups = cats.filter(item => !item.group_parent_id);
promGroups.forEach(item => getSubCats(item, cats));

const loadGroups = loaded.filter(item => !item.group_parent_id);
loadGroups.forEach(item => getSubCats(item, loaded));

promGroups.forEach(item => {
  promUl.appendChild(show(item));
});
loadGroups.forEach(item => {
  loadedUl.appendChild(show(item));
});

function searchFilter(item, search){
  // console.log('searchFilter');
  if (item.group_name.includes(search)) {
    return true;
  }
  for (let i = 0; i < item.subCats.length; i++) {
    if (searchFilter(item.subCats[i], search)) {
      return true;
    }
  }
  return false
}

search.addEventListener('keyup', (event) => {
  event.preventDefault();
  if (event.target.value.length < 5) {
    return;
  }
  const filtered = promGroups.filter((item) => {
    return searchFilter(item, event.target.value);
  });
  promUl.childNodes.forEach(node => node.remove());
  filtered.forEach(item => {
    promUl.appendChild(show(item));
  });
  
}, false);