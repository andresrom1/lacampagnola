// filters
$('.filtro-select').on('change', function(e) {
    if( $(this).find('option:selected').length > 0 && $(this).val() != '' ) {
        $(this).parent().parent('li.filtro').addClass('checked');
    }
    else {
        $(this).parent().parent('li.filtro').removeClass('checked');
    }
});

// $(document).ready(function() {
//     setTimeout(() => {
//         $('.crt-load-more').find('span').html('Cargar mas');
//     }, 3000);
// });

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
        $('body').append('<div class="select-options-holder" id="'+selector+'" data-type="multiple"><ul class="dropdown-list '+selector+'" data-target="'+selector+'">'+ PopupOptions +'</ul></div>');
    }else{
        $('body').append('<div class="select-options-holder" id="'+selector+'"  data-type="single"><ul class="dropdown-list '+selector+'" data-target="'+selector+'">'+ PopupOptions +'</ul></div>');
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



