/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';
import {Dropdown} from 'bootstrap';
import { async } from 'regenerator-runtime';


document.addEventListener('DOMContentLoaded', ()=> {
    new App();
});

class App {

constructor(){
    this.enableDropdowns();
    this.handleCommentForm();
}

enableDropdowns() {
    const dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
    dropdownElementList.map(function (dropdownToggleEl) {
        return new Dropdown(dropdownToggleEl);
    });
}


handleCommentForm() {

    // const commentData = document.getElementById('comment_content');
    // console.log(commentData);



    // const commentForm = document.querySelector('form.form-control');
    // const commentId = document.getElementById('idcomment');
    // commentId.addEventListener('submit', (e) => { e.preventDefault() 
    
    //         alert('pouic')});

    // commentId.addEventListener('submit', async(e) => {
    //     e.preventDefault();

    //     const response = await fetch('/comments/create', {
    //         method: 'POST',
    //         body: new FormData(e.target)
    //     });
    //    console.log(commentId)
 

        // if(!response.ok) {
        //     return '';
        // }

        // const json = await response.json();

    //     console.log(json);

    //     if (json.code === 'COMMENT_ADDED_SUCCESSFULLY') {
    //         const commentsList = document.querySelector('.comment-list');
    //         const commentCount = document.querySelector('#comment-count');
    //         const commentFormContent = document.querySelector('#comment_form_content');
    //         commentsList.insertAdjacentHTML('beforeend', json.message);
    //         commentsList.lastElementChild.scrollIntoView();
    //         commentCount.innerText = json.numberOfComments;
    //         commentFormContent.value = '';
    //     }
    // })

}

}
