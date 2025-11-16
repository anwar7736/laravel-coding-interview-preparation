<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <title>Multi-Step Form</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Multi-Step Form</h2>

        <ul class="nav nav-tabs" id="formTabs">
            <li class="nav-item">
                <a class="nav-link active" href="#" data-step="1">Step 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-step="2">Step 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-step="3">Step 3</a>
            </li>
        </ul>

        <div class="tab-content p-4 border border-top-0">
            <!-- Step 1 -->
            <div class="tab-pane fade show active" id="step1">
                <form class="stepForm" data-step="1" action="{{ route('stepOne') }}" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email">
                    </div>
                    <button type="submit" class="btn btn-primary">Next Step</button>
                </form>
            </div>

            <!-- Step 2 -->
            <div class="tab-pane fade" id="step2">
                <form class="stepForm" data-step="2" action="{{ route('stepTwo') }}" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Enter your address">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">City</label>
                        <input type="text" name="city" class="form-control" placeholder="Enter your city">
                    </div>
                    <button type="submit" class="btn btn-primary">Next Step</button>
                </form>
            </div>

            <!-- Step 3 -->
            <div class="tab-pane fade" id="step3">
                <form class="stepForm" data-step="3" action="{{ route('store') }}" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Choose a username">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter a password">
                    </div>
                    <button type="submit" class="btn btn-success">Submit Now</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                }
            });
            let currentStep = 1;
            const totalSteps = 3;

            // Tab click navigation
            $('#formTabs .nav-link').on('click', function(e) {
                e.preventDefault();
                const step = $(this).data('step');

                if (step <= currentStep) {
                    showStep(step);
                }
            });

            // Form submit => move to next tab
            $('.stepForm').on('submit', function(e) {
                e.preventDefault();
                toastr.clear();
                $('span.error').remove();
                const button = $(this).find('button');
                const oldButtonText = button.text();
                button.attr('disabled', true).text('Submitting...');
                const step = $(this).data('step');
                const method = $(this).attr('method');
                const url = $(this).attr('action');
                const data = new FormData($(this)[0]);

                $.ajax({
                    method,
                    url,
                    data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        button.attr('disabled', false).text(oldButtonText);
                        if (res.success) {
                            res.data ? console.log(res.data) : '';

                            if (step < totalSteps) {
                                currentStep = step + 1;
                            } else {
                                currentStep = 1;
                                $('.stepForm')[0].reset();
                                alert('Form submitted successfully!');
                            }
                            showStep(currentStep);
                        }
                    },
                    error: function(response) {
                        button.attr('disabled', false).text(oldButtonText);
                        $.each(response.responseJSON.errors, function(field_name, error) {
                            $(document).find('[name=' + field_name + ']').after(
                                '<span style="color:red" class="error">' + error +
                                '</span>')
                            // toastr.error(error);
                        })
                    }

                });

            });

            // Function to show a specific step
            function showStep(step) {
                // Update tab classes
                $('#formTabs .nav-link').removeClass('active');
                $(`#formTabs .nav-link[data-step="${step}"]`).addClass('active');

                // Update tab pane visibility
                $('.tab-pane').removeClass('show active');
                $(`#step${step}`).addClass('show active');
            }
        });
    </script>
</body>

</html>
