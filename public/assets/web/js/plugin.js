$(function (){

    'use strict';

    $('.main-btn1').on('click', function (){   // call the button
        $('.content-list > div').hide();      // Hide current content
    
        $($(this).data('content')).fadeIn();   //Show the content of the clicked button "custom attribute"
    });

});