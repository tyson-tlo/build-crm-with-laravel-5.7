document.body.onload = () => {
    let addProspectBtn = document.getElementById('add-prospect-btn');
    let addProspectModal = document.getElementById('add-prospect-modal');
    let closeProspectModal = document.getElementsByClassName('close-modal');
    let modalStyle = document.getElementsByClassName('modal-style');

    addProspectModal.style.display = 'none';

    addProspectBtn.onclick = () => {
        if(addProspectModal.style.display == 'none'){
            addProspectModal.style.display = 'block';
        }else{
            addProspectModal.style.display = 'none';
        }
    }

    for(let i = 0; i < closeProspectModal.length; i++){
        closeProspectModal[i].onclick = () => {
            for(let x = 0; x < modalStyle.length; x++){
                modalStyle[x].style.display = 'none';
            }
        }

    }
}