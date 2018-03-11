(function () { 

    var udata = [73];

    if (udata >= 70) {
    document.getElementById("courseProgress").style.backgroundColor = '#99C262';
    }
    else  
    if (udata >= 51 && udata <70)  
    {
    document.getElementById("courseProgress").style.backgroundColor = '#F8D347';
    }  
    else  
    if (udata <=50)  
    {
    document.getElementById("courseProgress").style.backgroundColor = '#FF6C60';
    }
 })();