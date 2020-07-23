let prev_plyst;
let toggle_playlist=false;
let action_play=false;
let classic_vid;
let divMax;
let x=0;
$('.remove').remove();
//console.log($('#maj_li>.classs').length);
//console.log($('.classs:nth-child(4)'));
$('.playlist').each(function(){
    var items = $('.playlist');
    items.sort(function(a, b){
        return +$(a).data('ordre') - +$(b).data('ordre');
    });
    $('#maj_li').append(items);
});
$('.playlist').each(function(){
    divMax=$('#maj_li>.classs').length;
    //console.log(divMax);
    if($('#maj_li>.classs').length==parseInt($(this).attr('data-ordre')) && !$(this).attr('data-souscat')) {
        //console.log('der');
        classic_vid=$('.classs:nth-child('+divMax+')');
        classic_vid.after($(this));
    }
    else if(parseInt($(this).attr('data-ordre'))==1){
        classic_vid=$('.classs:first-child').before($(this));
    }
    else{
        classic_vid=$('.classs:nth-child('+$(this).attr('data-ordre')+')');
        //console.log(classic_vid);
        classic_vid.before($(this));
    }
    $(this).addClass('classs');
});
$('.bloc_vid').click(function(){
    if(!action_play) {
        if(!$(this).hasClass('orga')){
            if(toggle_playlist){
                toggle_playlist=false;
                toggle_playlistO();
                if($(this).hasClass('playlist')){
                    setTimeout(place_playlist,300,$(this));
                }
                else{
                    prev_plyst='';
                }
            }
            else{
                if($(this).hasClass('playlist')){
                    place_playlist($(this));
                    //console.log('hasclass')
                    action_play=true;
                }
            }
        }
    }

});

function place_playlist(elem){
    let placed=false;
    let top=elem.offset().top;
    //console.log(action_play);
    elem.children('.play_arrow').css('transform', 'translate(-50%,0%)');
    $('.play_vid').each(function () {
        if ($(this).attr('data-filter') != elem.attr('id')) {
            $(this).css('display', 'none');
        } else {
            $(this).css('display', 'block');
        }
    });


    if (prev_plyst != elem.attr('id')) {
        $('.bloc_vid').each(function () {//replacer bloc playlist
            //console.log($(this).offset().top, top, $(this).attr('title'), $(this).hasClass('play_vid'));
            if ($(this).offset().top > top && !placed && !$(this).hasClass('play_vid')) {
                if ($(this).prev().hasClass('bloc_vid')) {
                    $(this).before($('#bloc_playlist'));
                } else {
                    $(this).prev().before($('#bloc_playlist'));
                }
                placed = true;
            }
        });
        if (!placed) {
            //console.log('!placed');
            $('#maj_li').append($('#bloc_playlist'));
        }
        prev_plyst = '';
        toggle_playlistI();
        prev_plyst = elem.attr('id');
    } else {
        prev_plyst = '';
        toggle_playlistO();
    }
    setTimeout(function(){action_play=false;},300);
}
function toggle_playlistI(){
    let plyst_assoc=$('#bloc_playlist');
    let curHeight = plyst_assoc.height();
    plyst_assoc.css('height','auto');
    let autoHeight = plyst_assoc.height();
    plyst_assoc.css('height',curHeight);
    plyst_assoc.css('height',autoHeight);
    //console.log(curHeight,autoHeight);
    toggle_playlist=true;
    setTimeout(function(){action_play=false;},300);
}
function toggle_playlistO(){
    $('.play_arrow').css('transform','translate(-50%,-100%)');
    $('#bloc_playlist').css('height','0');
    setTimeout(toggle_playlist1,300);
}
function toggle_playlist1() {
    $('#maj_li').append($('#bloc_playlist'));
    toggle_playlist=false;
    action_play=false;
}