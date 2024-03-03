'use strict';
class CProject
{
    commentsShow(commentableType)
    {
        let Els = document.querySelectorAll('.post_show__comments-href');
        Els.forEach( (Element) =>
        {
            Element.classList.remove('href_selected');
            Element.classList.add('href_unselected');
        });

        Els = document.querySelectorAll('.comments_list');
        Els.forEach( (Element) =>
        {
            Element.style.display = 'none';
        });

        let Element = document.querySelector('.comments-list_' + commentableType + '__header .post_show__comments-href');
        Element.classList.remove('href_unselected');
        Element.classList.add('href_selected');

        Element = document.querySelector('.comments_' + commentableType);
        Element.style.display = 'block';
    }

    commentAddShow(commentableType)
    {
        document.querySelector('#comment-add_' + commentableType).style.display ='block';
        document.querySelector('#comment-add_' + commentableType + '__button').style.display ='none';
    }

    /**
     * This function for submit buttons to prevent an user from double clicks on submit button
     */
    formSubmitDbClickPrevent(Element)
    {
        Element.disabled = true;
        Element.parentElement.submit();
    }

    replyAddShow(commentId)
    {
        document.querySelector('#comment__reply-add' + commentId).style.display ='block';
        document.querySelector('#btn_comment-reply-add' + commentId).style.display ='none';
    }
}

window.PrjHelper = new CProject();

