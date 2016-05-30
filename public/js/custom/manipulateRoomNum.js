function getRoomNum() {
        
        var room_no = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
        
        //changing roomNumber dynamically
        document.getElementById("room_no").innerHTML = room_no;    
        
        return room_no;
}
    
function addRoomNum() {
    
    //adding correct room_no to "Book It" URL
    var _href = $('a#book').attr('href');
    $('a#book').attr('href', _href + "/" + getRoomNum());

    //choosing correct nav tab as an active tab
    $('ul li a').each( function(){
        if($(this).attr('href') === getRoomNum())

        $(this).parent().addClass('active');

    });
}


    
    
    
