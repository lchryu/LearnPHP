<!DOCTYPE html>
<html>
<head>
    <title>Error</title>
    <!-- Add your CSS styling here -->
    <style>
        .error-container {
            margin: 50px auto;
            padding: 20px;
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            max-width: 400px;
            text-align: center;
        }

        .error-container h2 {
            color: #f00;
        }

        .error-container img {
            max-width: 100%;
            max-height: 300px; /* Adjust the height as needed */
            object-fit: contain;
        }

        .error-container p {
            margin-top: 20px;
        }

        .error-container .instructions {
            font-style: italic;
            color: #888;
        }
    </style>
</head>
<body>
<div class="error-container">
    <h2>Error</h2>
    <img src="../../assets/images/404_not_found.jpg" alt="404 Not Found">
    <p><?php echo $errorMessage; ?></p>
    <p class="instructions">Additional instructions or information can be placed here.</p>
</div>
</body>
</html>
