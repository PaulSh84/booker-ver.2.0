function removeLoading() {
        
    $('body').removeAttr("class");
}

function fetch() {
    
    window.location.reload();
    //setTimeout(removeLoading, 1500);
        
}
function refetchEvents() {

    setTimeout(fetch, 1500);
   
}




    
