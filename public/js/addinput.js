var counteralat = 1;
function addInput(divName){
    var newdiv = document.createElement('div');
    newdiv.className= 'row';
    counteralat++;
    newdiv.innerHTML = "<div class='col-sm-3'></div> <div class='col-sm-5 addalatleft'> <input type='text' placeholder='Alat' class='form-control inputform' id='alat" + counteralat + "'> </div>";
    document.getElementById(divName).appendChild(newdiv);
    document.getElementById('countAlat').setAttribute('value',counteralat);
}

var counterbahan = 1;
function addInput2(divName){
    var newdiv = document.createElement('div');
    newdiv.className= 'row';
    counterbahan++;
    newdiv.innerHTML = "<div class='col-sm-3'></div> <div class='col-sm-5 addalatleft'> <input type='text' placeholder='Bahan' class='form-control inputform' id='bahan" + counterbahan + "'> </div>";
    document.getElementById(divName).appendChild(newdiv);
    document.getElementById('countBahan').setAttribute('value',counterbahan);
}

