/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){

    $('nav li ul').hide().removeClass('fallback');
    $('nav li').hover(
        function () {
            $('ul', this).stop().slideDown(100);
        },
        function () {
            $('ul', this).stop().slideUp(100);
        }
    );


});


/*

*/