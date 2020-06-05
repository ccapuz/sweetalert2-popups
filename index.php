<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pop-ups</title>
</head>
<body>
    <button id='norm'>Normal Pop-up</button>
    <button id='long-content'>Long Content Pop-up</button>
    <button id='aria-labels'>Aria Labels</button>

    <script src="jquery-3.5.1.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>

    <script>
        $('#norm').on('click', function(){
            Swal.fire({
            icon: 'info',
            title: 'Testing..',
            text: 'This is a test!',
            footer: '<a href="https://www.easyeventplanning.com/" target="_blank">A link where you can add stuff..</a>'
            })
        })

        $('#long-content').on('click', function(){
            Swal.fire({
                title: 'Long Content',
                text: 'You can put long content here',
                imageUrl: 'https://placeholder.pics/svg/300x1500',
                imageHeight: 1500,
                imageAlt: 'A tall image'
            })
        })

        $('#aria-labels').on('click', function(){
            Swal.fire({
            title: '<strong>HTML <u>example</u></strong>',
            icon: 'info',
            html:
                'You can use <b>bold text</b>, ' +
                '<a href="//sweetalert2.github.io">links</a> ' +
                'and other HTML tags',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText:
                '<i class="fa fa-thumbs-up"></i> Great!',
            confirmButtonAriaLabel: 'Thumbs up, great!',
            cancelButtonText:
                '<i class="fa fa-thumbs-down"></i>',
            cancelButtonAriaLabel: 'Thumbs down'
            })
        })



    </script>

</body>
</html>