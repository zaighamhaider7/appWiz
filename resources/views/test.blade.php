<?php
use App\Models\Test;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>
    <form action="{{route('test.store')}}" method="POST">
        @csrf
        <input type="text" name="name" id="name" placeholder="Enter Name">
        <input type="text" name="email" id="email" placeholder="Enter Email">
        <input type="file" name="file" id="file">
        <button type="submit" id="submitBtn">Submit</button>
    </form>

    <div id="msg" style="display: none">Data submitted successfully!</div>


    <script>
        $(document).ready(function() {
            $('#submitBtn').click(function (event) {
                event.preventDefault(); 
                
                name = $('#name').val();
                email = $('#email').val();
                file = $('#file').val();

                let formData = new FormData();
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('name', $('#name').val());
                formData.append('email', $('#email').val());
                formData.append('file', $('#file')[0].files[0]);
                  

                $.ajax({
                    url: "{{ route('test.store') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if(response) {
                            $('#msg').show();
                        }
                        // console.log("Data submitted successfully:", response);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error submitting data:", error);
                    }
                });
            });
        });
    </script>
</body>
</html>