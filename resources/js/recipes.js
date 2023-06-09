$(document).ready(function() {
    // simulates trigger of filter selects to update the selected options
    $('select[data-selector="product_category"]').trigger('change');
    $('select[data-selector="duration"]').trigger('change');
    $('select[data-selector="moment"]').trigger('change');
    $('select[data-selector="special_needs"]').trigger('change');
});

// filters
$('.filtro-select').on('change', function (e) {
    let selector = $(this).parent().prev('a');

    if ($(this).find('option:selected').length > 0 && $(this).val() != '') {
        let optionsSelected = $(this).find('option:selected').toArray().map(item => item.text).join(', ');

        $(selector).find('.txt').html(optionsSelected);
    } else {
        $(selector).find('.txt').html($(this).data('placeholder'));
    }

    search();
});

$('.btn-buscar').on('click', function (e) {
    e.preventDefault();

    if ($('.search-input input').val()) {
        search();
    } else {
        $('.search-input input').focus();
    }
});

// cargar mas
$('#load-more').on('click', function (e) {
    e.preventDefault();

    loadMore();
});

function search() {
    $.ajax({
        type: "POST",
        url: $('.recipes-filters-section form').attr('action'),
        data: $('.recipes-filters-section form').serialize(),
        dataType: "json",
        beforeSend: function() {
            $('.loader-content').show();
        },
        success: function(response) {
            if (response.data.length > 0) {
                $('.no-results').hide();

                $('#load-more').show();
                $('#load-more').attr('data-total', response.total);

                $('.recetas-list').html('');

                response.data.forEach(recipe => {
                    let html = '';

                    html += "<li class=\"item receta\">";
                    html += "<a href=\"" + recipe.url + "\">";
                    html += "<div class=\"image-content\">";
                    html += "<div class=\"image-content-mask\" ><img src=\"" + recipe.icon_image + "\"></div>";
                    html += "</div>";
                    html += "<div class=\"receta-name\">";
                    html += "<h3>" + recipe.title + "</h3>"
                    html += "</div>";

                    if (recipe.tags.length > 0) {
                        html += "<ul class=\"caracteristicas\">";
                        recipe.tags.forEach(tag => {
                            html += "<li>";
                            html += "<span><img src=\"" + tag.icon_image + "\"></span>";
                            html += "<p>" + tag.title + "</p>";
                            html += "</li>";
                        });
                        html += "</ul>";
                    }

                    html += "</a>"
                    html += "</li>"

                    $('.recetas-list').append(html);
                });
            }
            else {
                $('.recetas-list').html('');
                $('.no-results').show();
                $('#load-more').hide();
            }
        },
        complete: function() {
            $('.loader-content').hide();
        }
    });
}

function loadMore(page) {
    var totalCurrentResults = $('.recetas-list').find('li.item').length;

    $.ajax({
        url: $('#load-more').data('url'),
        type: 'GET',
        dataType: 'html',
        data: {
            skip: totalCurrentResults,
            product_category: $('select[data-selector="product_category"]').val(),
            duration: $('select[data-selector="duration"]').val(),
            moment: $('select[data-selector="moment"]').val(),
            special_needs: $('select[data-selector="special_needs"]').val(),
        },
        beforeSend: function() {
            $('.loader-content').show();
            $('#load-more').html('Cargando...');
        },
        success: function(html) {
            $('.recetas-list').append(html);
            $('.loader').hide();

            var totalCurrentResults = $('.recetas-list').find('li.item').length;
            var totalResults = parseInt($('#load-more').attr('data-total'));

            $('#load-more').html('Cargar más');
            if( totalCurrentResults == totalResults ) {
                $('#load-more').hide();
            }
        },
        complete: function() {
            $('.loader-content').hide();
        }
    });
}


if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {

    $('.filtro-select-content').css({'display' : 'block'})

}else{
    $('.filtro-select-content').css({'display' : 'none'})
}


$('.select-popup').each(function(){
    // Traigo todas las opciones del popup
    var PopupOptions = [];
    $(this).find('option').each(function(){
        var Values = $(this).val();
        var Texts = $(this).text();
        optionsHtml= '<li data-value="'+ Values +'">'+ Texts +'</li>';
        PopupOptions.push(optionsHtml);

    });


    var selector = $(this).data('selector');

    // Armado de listado

    if($(this).prop('multiple') == true){
        $('main').append('<div class="select-options-holder" id="'+selector+'" data-type="multiple"><ul class="dropdown-list '+selector+'" data-target="'+selector+'">'+ PopupOptions +'</ul></div>');
    }else{
        $('main').append('<div class="select-options-holder" id="'+selector+'"  data-type="single"><ul class="dropdown-list '+selector+'" data-target="'+selector+'">'+ PopupOptions +'</ul></div>');
    }

    $('ul.'+selector+'').html(PopupOptions);
});


$('.select-button').each(function(){
    var popupClass = $(this).data('open');
    // posicion del botón

    var $el = $(this);  //record the elem so you don't crawl the DOM everytime


    $( window ).resize(function() {
            var bottom = $el.position().top-50 + $el.offset().top + $el.outerHeight(true);
            var left = $el.offset().left;
            var width = $el.outerWidth();
            $('#'+popupClass+'').css({'width' : width, 'position' : 'absolute', 'top' : bottom, 'left' : left});
      }).resize();
    //Muestro el listado con el click en el botón
    $($el).on('click', function(e){

        e.preventDefault();


        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {


        }else{
            $('.select-options-holder').hide();
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                $('.select-button').removeClass('active');
                $('.select-options-holder').hide();
            }else{
                $('.select-button').removeClass('active');
                $(this).addClass('active');
                $('#'+popupClass+'').show();
            }
        }

    });


});




//Clonamos el value del data del li al value del select
$('.dropdown-list li').click(function(){


    var clases = $(this).parent().data('target');
    var multiple = $(this).parent().parent().data('type');


    if(multiple == 'multiple'){
        $(this).toggleClass('active');

        //$('.select-popup[data-selector="'+ clases +'"]').val($(this).data('value')).trigger('change');


        var multipleVal = $(this).parent().find('li.active');

        var arr = new Array();

        $.each(multipleVal, function(index, item){
            arr.push($(item).data('value'));
        });

        $('.select-popup[data-selector="'+ clases +'"]').val(arr).trigger('change');

    }else{
        $(this).parent().find('li').removeClass('active');
        $(this).addClass('active');
        $('.select-popup[data-selector="'+ clases +'"]').val($(this).data('value')).trigger('change');
        $('.select-options-holder').hide();
        $('.select-button').removeClass('active');
    }
});
