import './bootstrap';
import './theme/app';
import $ from 'jquery'


$(function(){
    var $logoutBtn = $('#logout')

    $logoutBtn.on('click',function(){
        $("#logout-form").submit()
    })
})
