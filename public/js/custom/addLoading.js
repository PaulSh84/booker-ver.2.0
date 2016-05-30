$( window ).on('beforeunload', function() {
        addLoading();
});  

function addLoading() {
    
    var att = document.createAttribute('class');
        att.value = 'loading';
    window.opener.document.body.setAttributeNode(att);
    window.opener.refetchEvents();
}