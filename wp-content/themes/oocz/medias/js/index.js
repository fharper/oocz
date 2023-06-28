
/* Target blank */
$(function() { $("a").not("[href^='https://outofcomfortzone.net']").not(".comment-reply-link").click( function() { this.target = "_blank"; }); });

$(document).ready(function() {
	// zone recherche
	$('input.s,textarea.s').each(function() {
		var default_value = this.value;
		$(this).focus(function() {
            if(this.value == default_value) {
                this.value = '';
            }
        });
        $(this).blur(function() {
            if(this.value == '') {
                this.value = default_value;
            }
        });
	});


    // menu catégories
    $('#nav-categories li a').each(function(index) {
        var texte = $(this).html();
        $(this).addClass('cat' + index);
        $(this).html('<span>' + texte + '</span>');
    });
    $('#nav-categories li a').hover(
        function() {
            $(this).children('span').css('color', '#0000ff');
        },
        function() {
            $(this).children('span').css('color', '#fff');
            $('li.current-cat a span').css('color', '#0000ff');
        }
    );

    $('li.current-cat a span').css('color', '#0000ff');
    $('.single-post .entry-content p:first-child').addClass('first');
/*
    $('.firefox .single-post .entry-content').children('p:first').css({
        'font-size':'63px',
        'font-family':'GrotesqueMTStdCondensed, Arial, Helvetica, sans-serif',
        'color':'#0000ff',
        'float':'left',
        'margin':'0.05em 0.1em 0.2em 0'
    });
*/
    
    // menu header
    $('#menu-menu li').each(function(index) {
        var test = '0' + (index + 1) + '_';
        $(this).prepend('<span>' + test + '</span>');
    });
    $('#menu-menu li a').hover(
        function() {
            $(this).parent().children('span').css('color', '#9999ff');
        },
        function() {
            $(this).parent().children('span').css('color', '#ccccff');
            $('#menu-menu li.current-menu-item span').css('color', '#9999ff');
        }
    );

	//Archives
    $('.archives #months-list ul li.archive-year span.year').click(function(){
        $(this).parent().children('ul').slideToggle();
    });
	
	//Speaking experiences
	$('.talks .talk-year span').click(function(){
        $(this).parent().children('ul').slideToggle();
    });

    //$('.posts-list .span6:even').addClass('even');
    $('.single-post .entry-content p:last').css({
        'border-bottom': '1px solid #b2b2ff',
        'padding-bottom': '25px',
        'margin-bottom': '20px'
    });

    if ($('.trackbacks ol li').size() == 0) {
        $('.trackbacks').hide();
    }

    $('.error404').keydown( function(eventObject) {
        window.location.href = 'http://' + document.domain;
    });

});

