
window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink')
        } else {
            navbarCollapsible.classList.add('navbar-shrink')
        }
    };

    // Shrink the navbar
    navbarShrink();

    // Shrink the navbar when page is scrolled
    document.addEventListener('scroll', navbarShrink);

    // Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            rootMargin: '0px 0px -40%',
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

    // Event listener for the sum form submission
    // Event listener for the sum form submission

 // Event listener for the image upload form submission

function processInput() {
    var inputType = $('input[name="inputType"]:checked').val();
    var formData = new FormData();

    if (inputType === 'upload') {
        var fileInput = document.getElementById('fileInput');
        var file = fileInput.files[0];
        if (!file) {
            alert('Please select a file.');
            return;
        }
        formData.append('file', file);
    } else if (inputType === 'text') {
        var textInput = document.getElementById('textInput').value;
        if (!textInput.trim()) {
            alert('Please enter text.');
            return;
        }
        formData.append('text', textInput);
    }

    $.ajax({
        type: 'POST',
        url: 'http://localhost:5000/extract_text',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            $('#result').text('Result: ' + response.extracted_text);
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            $('#result').text('Error: ' + error);
        }
    });
}


});