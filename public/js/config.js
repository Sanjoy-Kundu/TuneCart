

function successToast(msg){

    Toastify({
        text: msg,
        duration: 4000,
        gravity: "bottom", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        style: {
          background: "linear-gradient(to right, #00b09b, #96c93d)",
        },
      }).showToast();
}


function errorToast(msg){
    Toastify({
        text: msg,
        duration: 4000,
        gravity: "top", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        style: {
          background: "linear-gradient(to right, #FF0000, #96c93d)",
        },
      }).showToast();
}