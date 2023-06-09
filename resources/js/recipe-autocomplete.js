// predictive search
var autocomplete = require('autocompleter');

autocomplete({
    input: document.getElementById("recipe-query"),
    minLength: 2,
    fetch: function(text, update) {
        $.ajax({
            type: "POST",
            url: $('.search-input #recipe-query').data('url'),
            data: {
                'q': $('.search-input #recipe-query').val()
            },
            dataType: "json",
            success: function (response) {
                update(response);

                // move results div to main-search container
                $('.autocomplete').appendTo($('.search-input'));
                var html = $('.autocomplete').html();
                var div = document.createElement('div');
                div.setAttribute('class', 'content');
                div.innerHTML = html;

                // $('.autocomplete').html(div);
            }
        });
    },
    renderGroup: function(groupName, currentValue) {
        var div = document.createElement('div');
        var paragraph = document.createElement('p');
        paragraph.textContent = groupName;
        div.appendChild(paragraph);

        return div;
    },
    render: function(item, currentValue) {
        // <a href="#">
        //     <div><img src=""></div>
        //     <div><p>Puré de tomates</p></div>
        // </a>
        $('body').css('overflow','hidden');
        var div = document.createElement('div');
        var anchor = document.createElement('a');
        anchor.setAttribute('href', item.url);
        div.appendChild(anchor);

        var divImage = document.createElement('div');
        divImage.classList.add('item-image');
        var image = document.createElement('img');
        image.src = item.image;
        divImage.appendChild(image);
        anchor.appendChild(divImage);

        var divTitle = document.createElement('div');
        divTitle.classList.add('item-title');
        var paragraph = document.createElement('p');
        paragraph.textContent = item.title;
        divTitle.appendChild(paragraph);
        anchor.appendChild(divTitle);

        return div;
    }
});
