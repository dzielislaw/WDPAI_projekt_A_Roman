async function checkOutDialog(rentalId, client, equipmentName){
    let userChoice = confirm(`Potwierdź operację wydania ${equipmentName} klientowi ${client}`);
    if(userChoice === true) {
        await issue(rentalId);
        window.location.reload();
    }
}

async function issue(rentalId){
    let url = '/checkOut?rentalId=' + rentalId.toString();
    const response = await fetch(url, {method: 'POST', credentials: 'include' });
}

async function checkInDialog(rentalId, client, equipmentName){
    let userChoice = confirm(`Potwierdź operację zwrotu ${equipmentName} przez ${client}`);
    if(userChoice === true) {
        await ret(rentalId);
        window.location.reload();
    }
}

async function ret(rentalId){
    let url = '/checkIn?rentalId=' + rentalId.toString();
    const response = await fetch(url, {method: 'POST', credentials: 'include' });
}
