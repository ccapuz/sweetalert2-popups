<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pop-ups</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <button id='norm'>Normal Pop-up</button>
    <button id='long-content'>Long Content Pop-up</button>
    <button id='aria-labels'>Aria Labels Pop-up</button>
    <button id='aria-labels'>Top Right Pop-up</button>

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
            icon: 'question',
            html:
                'You can use <b>bold text</b>, <em>italicized</em>, ' +
                '<a href="https://github.com/ccapuz/sweetalert2-popups">linking GitHub Repository</a> ',
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

        $('#long-content').on('click', function(){
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
            })
        })

    </script>

</body>
</html>