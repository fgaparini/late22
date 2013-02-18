$(document).ready(function() {
    
    $('.tips').hover(
    function(e){
        $(this).popover('show');
        
        //alert('chango')
    },
    function(e){
        $(this).popover('hide');
        
        //alert('chango')
    }
);
    
});

