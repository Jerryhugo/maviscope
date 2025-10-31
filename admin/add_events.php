<?php session_start();
    include "conn.php";

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php"); // Redirect to login page
        exit();
    }
    ?>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Post</title>

    <!-- JS TextEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>



    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <!-- sweet alert template -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- sweetalert js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <style>
        .preview-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .preview-box {
            border: 1px solid #ccc;
            padding: 10px;
            width: 180px;
            text-align: center;
        }

        .preview-box img {
            width: 100%;
            height: auto;
            margin-bottom: 8px;
        }

        .preview-box input {
            width: 100%;
            padding: 5px;
        }
    </style>

</head>





<body id="page-top">

    <div id="wrapper">

        <?php include "partials/sidebar.php" ?>

        <main id="content-wrapper" class="d-flex flex-column">



            <div id="content">

                <!-- Topbar -->
                <?php include "partials/nav.php"; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- <div class="jumbotron text-center ">
                        <h1 class="display-3 font-weight-normal text-muted">Submit an Article</h1>
                    </div> -->
                    <h4>Add Events:</h4>

                    <div class="">
                        <div class="row">

                            <div class="col-lg-12 mb-4">
                                <!-- Form -->
                                <form action="functions/add_events_function.php" method="POST" enctype="multipart/form-data">
                                    <!-- <div class="form-group">
                                        <label for="arTitle">Title</label>
                                        <input type="text" class="form-control" name="arTitle" id="arTitle" required>
                                    </div> -->


                                    <div class="form-group">

                                        <div class="custom-file ">
                                            <!-- <label for="img" >Select Images</label> -->
                                            <p>Select Images</p>
                                            <input type="file" class="custom-file-input" name="image" id="image"
                                               accept="image/*"  required>
                                            <label class="custom-file-label" for="image">Choose file</label>

                                            <!-- <p id="imageCount"><i class="fas fa-file-image"></i></p> -->
                                        </div>
                                        <!-- <div>
                                            <i class="fas fa-file-image fa-2x my-2"><span class="px-2"
                                                    id="imageCount"></span></i>
                                        </div> -->
                                        <div class="preview-container mt-3" id="preview"></div>
                                    </div>



                                    <!-- <div class="form-group">
                                        <label for="arContent">Event Description</label>

                                        <textarea class="form-control" name="event_description" id="arContent"
                                            rows="3"></textarea>
                                    </div> -->

                            </div>
                        </div>




                        <div class="">
                            <button type="submit" name="upload" class="btn btn-success btn-lg w-25">upload</button>
                        </div>
                        </form>
                    </div>

                    <!-- <div class="col-lg-4 mb-4">
                     <h1> Random Articles </h1>
                  </div> -->


                </div>
            </div>
    </div>


    <!-- Preview area -->
    <div id="preview-container" class="row"></div>




    </div>

    </main>
    </div>




    <!-- Main -->


    <!-- Footer -->
    <?php include "partials/footer_links.php" ?>

    <!-- Text Editor Script -->
    <script>
        ClassicEditor
            .create(document.querySelector('#arContent'))
            .then(editor => {
                console.log('Editor is ready!', editor);
            })
            .catch(error => {
                console.error('There was a problem initializing the editor.', error);
            });
    </script>

  

    <!-- script for gallery image to be upload preview -->

    <script>
        const input = document.getElementById("image");
        const preview = document.getElementById("preview");

      input.addEventListener("change", () => {
    preview.innerHTML = ""; // Clear previous preview
    const file = input.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            const box = document.createElement("div");
            box.classList.add("preview-box");
            box.innerHTML = `
                <img src="${e.target.result}" alt="Preview">
            `;
            preview.appendChild(box);
        };
        reader.readAsDataURL(file);
    }
});

    </script>




</body>

</html>





















<!-- <form>
  <label>Category:</label>
  <input type="text" name="category" required><br><br>

  <label>Select Images:</label>
  <input type="file" name="images[]" id="imageInput" multiple required><br><br>

  <p id="imageCount">No image selected</p>

  <button type="submit">Upload</button>
</form>

<script>
  const imageInput = document.getElementById('imageInput');
  const imageCount = document.getElementById('imageCount');

  imageInput.addEventListener('change', function () {
    const count = imageInput.files.length;
    imageCount.textContent = count === 0
      ? 'No image selected'
      : `${count} image${count > 1 ? 's' : ''} selected`;
  });
</script> -->