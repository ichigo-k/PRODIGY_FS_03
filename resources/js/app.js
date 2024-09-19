import './bootstrap';
import Swal from "sweetalert2";


window.addEventListener('alert',(event)=>{
    let data = event.detail;

    Swal.fire({
        position: "center",
        icon: data.type,
        title: data.title,
        showConfirmButton: false,
        timer: 1500
    });
})
