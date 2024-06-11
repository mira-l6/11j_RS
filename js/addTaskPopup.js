let addTaskBtn = document.getElementById('addTaskBtn');
let closePopupBtn = document.getElementById('closePopupBtn');
let pageDarken = document.getElementById('pageDarken');
let addTaskPopup = document.getElementById('taskPopup');


// const popups = [...addTaskPopup];

// window.addEventListener('click', ({ target }) => {
//   const popup = target.closest('.popup');
//   const clickedOnClosedPopup = popup && !popup.classList.contains('active');
  
//   popups.forEach(p => p.classList.remove('active'));
  
//   if (clickedOnClosedPopup) popup.classList.add('active');  
// });


addTaskBtn.addEventListener('click', addTaskPopupShow)

function addTaskPopupShow(){
    addTaskPopup.classList.toggle('active');
    addTaskBtn.classList.toggle('popup-animation');
    pageDarken.classList.toggle('active');
}

// function addTaskPopupClose(){
//     pageDarken.classList.remove('active');
// }