const commentForm = document.querySelector('#comment-form');
const nameInput = commentForm.querySelector('#name');
const emailInput = commentForm.querySelector('#email');
const commentInput = commentForm.querySelector('#comment');

commentForm.addEventListener('submit', function($e) {
    $e.preventDefault();

    const name = nameInput.value.trim();
    const email = emailInput.value.trim();
    const comment = commentInput.value.trim();
    const method = commentForm.getAttribute('method');
    const path = commentForm.getAttribute('action');
    const token = commentForm.querySelector('[name="_token"]').value;



    commentForm.reset();
})