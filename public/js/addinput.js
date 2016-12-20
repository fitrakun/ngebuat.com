var counter = 1;
function addInput(divName){
    var newdiv = document.createElement('div');
    newdiv.className= 'row';
    counter++;
    newdiv.innerHTML = "<div class='col-sm-3'></div> <div class='col-sm-5 addalatleft'> <input type='text' placeholder='Alat' class='form-control inputform' id='alat" + counter + "'> </div>";
    document.getElementById(divName).appendChild(newdiv);
}

var counter2 = 1;
function addInput2(divName){
    var newdiv = document.createElement('div');
    newdiv.className= 'row';
    counter2++;
    newdiv.innerHTML = "<div class='col-sm-3'></div> <div class='col-sm-5 addalatleft'> <input type='text' placeholder='Bahan' class='form-control inputform' id='bahan" + counter2 + "'> </div>";
    document.getElementById(divName).appendChild(newdiv);
}

