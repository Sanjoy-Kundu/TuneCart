window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }

    // const datatablesSimpl2 = document.getElementById('datatablesSimple2');
    // if (datatablesSimple2) {
    //     new simpleDatatables.DataTable(datatablesSimple2);
    // }
});
