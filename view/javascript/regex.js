document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('myForm').addEventListener('submit', function(event) {
        var firstname = document.getElementById('firstname').value;
        var lastname = document.getElementById('lastname').value;
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;

        // Regex patterns
        var patternEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        var patternName = /^[a-zA-Z\s'.-]+$/;
        var patternPassword = /^.{4,}$/;

        // Validation
        if (!patternName.test(firstname)) {
            alert('Please enter a valid first name');
            event.preventDefault(); 
        }

        if (!patternName.test(lastname)) {
            alert('Please enter a valid last name');
            event.preventDefault(); 
        }

        if (!patternEmail.test(email)) {
            alert('Please enter a valid email address');
            event.preventDefault(); 
        }

        if (!patternPassword.test(password)) {
            alert('Password must be at least 4 characters long');
            event.preventDefault(); 
        }
    });
});

function validateForm() {
    var tagNameInput = document.getElementById('tagName');
    var tagName = tagNameInput.value.trim();

    if (!tagName.match(/^#/)) {
        alert('Tag name must start with "#".');
        tagNameInput.focus();
        return false; 
    }

    

    return true; 
}