function addComment() {
    var commentInput = document.getElementById('commentInput');
    var commentText = commentInput.value;
    
    if (commentText.trim() !== '') {
        var commentsDiv = document.getElementById('comments');
        var commentBaru = document.createElement('div');
        commentBaru.className = 'comment';
        commentBaru.textContent = commentText;
        commentsDiv.appendChild(commentBaru);
        commentInput.value = '';

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'save_comment.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log('Komentar berhasil disimpan');
            }
        };
        xhr.send('comment=' + encodeURIComponent(commentText));
    }
}
