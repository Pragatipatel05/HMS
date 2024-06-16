document.addEventListener('DOMContentLoaded', () => {
    initSelectDropdowns();
    initDropdowns();
  });

 function initDropdowns() {
const dropdowns = document.querySelectorAll('.dropdown:not(select)');
dropdowns.forEach(dropdown => {
new DropdownFunction(dropdown, {
multipleSelection: dropdown.hasAttribute('multiple'),
});
});
}

function DropdownFunction(dropdown, options) {
const dropDown = dropdown;
const opener = dropDown?.querySelector('[data-opener]');
const dropDownList = dropDown?.querySelector('[data-list]');
const dropDownItems = dropDownList?.querySelectorAll('li');

const activeClass = 'active';
const optionActive = 'option-active';

let placeholderText = opener?.textContent;
let isOpen = false;
let isActive = false;
let prevSelection;
let activeList;

const openDrop = () => (dropDown?.classList.add(activeClass), (isOpen = true));
const closeDrop = () => (dropDown?.classList.remove(activeClass), (isOpen = false));
const toggler = e => (e.preventDefault(), isOpen ? closeDrop() : openDrop());

dropDownItems?.forEach(dropDownListItem => {
const dropOption = dropDownListItem?.querySelector('[data-option]');

const addClass = () => dropDownListItem?.classList.add(optionActive);

const removeClass = () => dropDownListItem?.classList.remove(optionActive);

const createTagOption = () => {
activeList ||= (() => {
const list = document.createElement('ul');
list.classList.add('active-options');
dropDown.append(list);

const clearAll = document.createElement('button');
clearAll.classList.add('clear-all');
clearAll.textContent = 'Clear';
dropDown.append(clearAll);

return list;
})();

const activeListItem = document.createElement('li');

const optionText = document.createElement('button');
optionText.textContent = dropOption?.textContent;
optionText?.setAttribute('data-selected', `${dropOption?.dataset.option}`);

activeListItem?.append(optionText);

optionText?.addEventListener('click', e => {
const optionName = e.target.dataset.selected;
const selectedOption = dropDown?.querySelector(`[data-option="${optionName}"]`);
selectedOption.closest('li').classList.remove(optionActive);
e.target.closest('li').remove();

if (!activeList?.querySelector('li')) {
activeList?.remove();
activeList = null;
opener.textContent = placeholderText;
document.querySelector('.clear-all')?.remove();
}

showResults();
});

activeList?.append(activeListItem);
opener.textContent = '';
removeAll();
};

const removeTagOption = (selectedOption, clearAll) => {
const clearSelection = () => {
if (activeList?.querySelectorAll('li').length === 0) {
activeList?.remove();
activeList = null;
opener.textContent = placeholderText;
document.querySelector('.clear-all')?.remove();
}
};

if (selectedOption) {
const optionName = selectedOption.dataset.option;
const selectedTagOption = dropDown?.querySelector(`[data-selected="${optionName}"]`);
selectedTagOption?.closest('li').remove();
clearSelection();
}

if (clearAll) {
clearAll?.addEventListener('click', e => {
e.preventDefault();
activeList?.remove();
activeList = null;
dropDownListItem.classList.remove(optionActive);
opener.textContent = placeholderText;
clearAll?.remove();
closeDrop();
});
}
};

const removeAll = () => {
removeTagOption(null, document.querySelector('.clear-all'));
};

const dropHandler = () => {
if (!options.multipleSelection) {
opener.textContent = dropOption?.textContent;
console.log(dropOption?.dataset.option);

if (prevSelection && prevSelection !== dropDownListItem) {
prevSelection?.classList.remove(optionActive);
isActive = false;
}

if (!isActive) {
addClass();
isActive = true;
prevSelection = dropDownListItem || null;
}

closeDrop();
} else {
const addOption = !dropDownListItem.classList.contains(optionActive);
addOption ? addClass() : removeClass();
addOption ? createTagOption() : removeTagOption(dropOption);
showResults();
}
};

dropOption.addEventListener('click', dropHandler);
});

const clickOutside = e => {
e.preventDefault();
const isOutsideDropdown = !dropDown?.contains(e.target);
const isOutsideSelected = !e.target.closest('[data-selected]');
const isOutsideClearAll = !e.target.closest('.clear-all');

if (isOpen && isOutsideDropdown && isOutsideSelected && isOutsideClearAll) {
closeDrop();
}
};

opener.addEventListener('click', toggler);
document.addEventListener('click', clickOutside);

const showResults = () => {
console.log(Array.from(document.querySelectorAll('.active-options [data-selected]'), option => option.dataset.selected));
};
}

function initSelectDropdowns() {
const selectDropdowns = document.querySelectorAll('select.dropdown');
selectDropdowns.forEach(selectDropdown => {
const isMultiple = selectDropdown.hasAttribute('multiple');
const dropdownWrapper = document.createElement('div');

dropdownWrapper.classList.add('dropdown');
if (isMultiple) {
dropdownWrapper.setAttribute('multiple', '');
}

const opener = document.createElement('button');
opener.classList.add('opener');
opener.setAttribute('data-opener', '');
const defaultOption = selectDropdown.querySelector('option');
opener.textContent = defaultOption ? defaultOption.textContent : 'Select an option';
dropdownWrapper.appendChild(opener);

const dropdownList = document.createElement('ul');
dropdownList.classList.add('dropdown-list');
dropdownList.setAttribute('data-list', '');
dropdownWrapper.appendChild(dropdownList);

const options = selectDropdown.querySelectorAll('option:not([data-option ="default"])');
options.forEach(option => {
const listItem = document.createElement('li');
const btn = document.createElement('button');
btn.setAttribute('data-option', option.data-option );
btn.textContent = option.textContent;
listItem.appendChild(btn);
dropdownList.appendChild(listItem);

btn.addEventListener('click', () => {
if (!isMultiple) {
opener.textContent = option.textContent;
dropdownWrapper.querySelector('.option-active')?.classList.remove('option-active');
listItem.classList.add('option-active');
closeSelectDropdown(selectDropdown);
} else {
btn.classList.toggle('option-active');
}
});
});

selectDropdown.insertAdjacentElement('afterend', dropdownWrapper);
selectDropdown.style.display = 'none';

const toggleDropdown = () => {
dropdownWrapper.classList.toggle('active');
};

opener.addEventListener('click', toggleDropdown);
});
}

function closeSelectDropdown(selectDropdown) {
const event = new Event('change');
selectDropdown.dispatchEvent(event);
}

// const checkbox = document.querySelector("#myCheckbox");
// const form = document.querySelector("#Form");
// checkbox.addEventListener("change", function(){
//     if (this.checked){
//         form.style.display = "block";
//     }
//     else{
//         form.style.display = "none";
//     }
// });