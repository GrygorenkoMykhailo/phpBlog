$(document).ready(function() {
    $('.create-post-button').click(function(e) {
        e.preventDefault();
        const pathArray = window.location.pathname.split('/');
        const userId = pathArray[2]; 
        
        $.ajax({
            url: '/user/' + userId + '/posts/store',
            method: 'POST',
            headers: {
                "X-CSRF-Token": $('input[name=_token]').val()
            },
            contentType: 'application/json',
            data: JSON.stringify({
                'content': $('input[name=content]').val(),
            }),
            success: function(data) {
                const post = data.post;
                const created_at = new Date(post.created_at);
                
                const year = created_at.getFullYear();
                const month = String(created_at.getMonth() + 1).padStart(2, '0');
                const day = String(created_at.getDate()).padStart(2, '0');
                const hours = String(created_at.getHours()).padStart(2, '0');
                const minutes = String(created_at.getMinutes()).padStart(2, '0');
                const seconds = String(created_at.getSeconds()).padStart(2, '0');
            
                const formatted_date = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
                
                const listItem = $('<li>').addClass('list-group-item');
                const div = $('<div>').addClass(['d-flex', 'justify-content-between']);
                
                div.html(`<div><p>${formatted_date}</p><p>${post.content}</p></div>`);
                $('ul').append(listItem.append(div));
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});