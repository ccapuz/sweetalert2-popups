<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pop-ups</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="text-align:center;">
    <h1>Sweet Alert 2 Custom and Responsive Pop-ups</h1>
    <div>
        <button id='norm'>Normal Pop-up</button>
        <button id='with-image'>With Image Pop-up</button>
        <button id='long-content'>Long Content Pop-up</button>
        <button id='aria-labels'>Aria Labels Pop-up</button>
        <button id='top-right'>Top Right Pop-up</button>
        <button id='email-list'>Email Pop-up</button>
        <button id='custom-background'>Custom Background Pop-up</button>
        <button id='ajax'>AJAX Request Pop-up</button>
        <button id='sign-up'>Sign Up Pop-up</button>
    </div>
    <h1>Source/Documentation: https://sweetalert2.github.io/#input-types</h1>

    <script src="jquery-3.5.1.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>

    <script>
        // Uses async() for pop-up
        (async () => {

        const { value: email } = await Swal.fire({
        title: 'Sign up for our newsletter!',
        input: 'email',
        inputPlaceholder: 'Enter your email address',
        showCloseButton: true
        })

        // Checks if email is valid
        if (email) {
        Swal.fire(`Entered email: ${email}`)
        }

        })()

        // Manual button pop-up for email list
        $('#email-list').on('click', function(){
            Swal.fire({
            title: 'Sign up for our newsletter!',
            input: 'email',
            inputPlaceholder: 'Enter your email address',
            imageUrl: 'https://ezeventplanning.net/wp-content/uploads/2020/03/logo-smaller-1024x322.png',
            imageWidth: 300,
            imageHeight: 100,
            imageAlt: 'EasyEventPlanning'
            })

            // Checks if email is valid
            if (email) {
            Swal.fire(`Entered email: ${email}`)
            }
        })

        // Normal pop-up
        $('#norm').on('click', function(){
            Swal.fire({
            icon: 'info',
            title: 'Testing..',
            text: 'This is a test!',
            footer: '<a href="https://www.easyeventplanning.com/" target="_blank">A link where you can add stuff..</a>'
            })
        })

        // Pop-up with image
        $('#with-image').on('click', function(){
            Swal.fire({
            title: 'Easy Event Planning',
            text: 'Helping the Event Industry Recover from Covid',
            imageUrl: 'https://ezeventplanning.net/wp-content/uploads/2020/03/logo-smaller-1024x322.png',
            imageWidth: 300,
            imageHeight: 100,
            imageAlt: 'EasyEventPlanning',
            })
        })
        
        // Long window pop-up
        $('#long-content').on('click', function(){
            Swal.fire({
                title: 'Long Content',
                text: 'You can put long content here',
                imageUrl: 'https://placeholder.pics/svg/300x1500',
                imageHeight: 1500,
                imageAlt: 'A tall image'
            })
        })
        
        // Pop-up with Aria Labels
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

        // Pop-up that shows on top right - can be adjusted anywhere
        $('#top-right').on('click', function(){
            Swal.fire({
            position: 'top-end',
            icon: 'warning',
            title: 'Warning! This pop-up will close in 3 seconds!',
            showConfirmButton: true,
            timer: 3000
            })
        })

        // Custom background pop-up
        $('#custom-background').on('click', function(){
            Swal.fire({
            title: 'Custom width, padding, background. You can also insert picture/gif anywhere on the backdrop.',
            width: 600,
            padding: '3em',
            background: '#fff url(/images/trees.png)',
            showCloseButton: true,
            backdrop: `
                rgba(6, 42, 94,0.7)
                url("https://media.tenor.com/images/b1c17afeeb5a58ec308201ec5ddfb04c/tenor.gif")
                center top
                no-repeat
            `
            })
        })

        // AJAX Request pop-up
        $('#ajax').on('click', function(){
            Swal.fire({
            title: 'Submit your Github username',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Look up',
            showLoaderOnConfirm: true,
            preConfirm: (login) => {
                return fetch(`//api.github.com/users/${login}`)
                .then(response => {
                    if (!response.ok) {
                    throw new Error(response.statusText)
                    }
                    return response.json()
                })
                .catch(error => {
                    Swal.showValidationMessage(
                    `Request failed: ${error}`
                    )
                })
            },
            allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
            if (result.value) {
                Swal.fire({
                title: `${result.value.login}'s avatar`,
                imageUrl: result.value.avatar_url
                })
            }
            })
        })
        
        // Sign-up pop-up
        $('#sign-up').on('click', function(){
            Swal.mixin({
                input: 'text',
                confirmButtonText: 'Next &rarr;',
                showCancelButton: true,
                progressSteps: ['1', '2', '3']
            }).queue([
                {
                    title: 'Name of Business',
                    text: 'What is the name of the business you wish to add?'
                },
                'Business Category',
                'Name of Owner/Manager'
            ]).then((result) => {
                if (result.value) {
                    const answers = JSON.stringify(result.value)
                    Swal.fire({
                        title: 'All done!',
                        html: `
                            Your answers:
                            <pre><code>${answers}</code></pre>
                        `,
                        confirmButtonText: 'Done!'
                    })
                }
            })
        })
    </script>

</body>
</html>