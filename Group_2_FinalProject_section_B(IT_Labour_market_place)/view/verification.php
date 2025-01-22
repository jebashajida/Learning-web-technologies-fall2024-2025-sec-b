<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skill Verification</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            line-height: 1.6;
            padding: 2rem;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2.5rem;
        }

        h2 {
            color: #34495e;
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
        }

        .upload-section {
            background-color: #f8f9fa;
            padding: 2rem;
            border-radius: 8px;
            border: 2px dashed #dee2e6;
            margin-bottom: 2rem;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        label {
            font-weight: 600;
            color: #4a5568;
            font-size: 1.1rem;
        }

        input[type="file"] {
            display: block;
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #cbd5e0;
            border-radius: 4px;
            margin-top: 0.5rem;
        }

        button {
            background-color: #3498db;
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: background-color 0.3s ease;
            width: fit-content;
        }

        button:hover {
            background-color: #2980b9;
        }

        #preview-section {
            margin-top: 2rem;
            display: none;
        }

        #preview-section.active {
            display: block;
        }

        #preview-container {
            width: 100%;
            max-height: 500px;
            overflow: auto;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 1rem;
        }

        #preview-container img {
            max-width: 100%;
            height: auto;
        }

        #preview-container iframe {
            width: 100%;
            height: 500px;
            border: none;
        }

        .preview-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .remove-preview {
            background-color: #e74c3c;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }

        .remove-preview:hover {
            background-color: #c0392b;
        }

        @media (max-width: 600px) {
            body {
                padding: 1rem;
            }

            .container {
                padding: 1rem;
            }

            h1 {
                font-size: 2rem;
            }

            h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Skill Verification</h1>

        <div class="upload-section">
            <h2>Upload Certifications</h2>
            <form action="../controller/ver_ver.php" method="post" enctype="multipart/form-data" id="upload-form">
                <div>
                    <label for="certification">Choose a certification to upload:</label>
                    <input type="file" id="certification" name="certification" accept=".pdf, .jpg, .jpeg, .png">
                </div>
                <button type="submit" name="verification">Upload</button>
            </form>
        </div>

        <div id="preview-section">
            <div class="preview-header">
                <h2>Document Preview</h2>
                <button class="remove-preview">Remove Preview</button>
            </div>
            <div id="preview-container"></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('certification');
            const previewSection = document.getElementById('preview-section');
            const previewContainer = document.getElementById('preview-container');
            const removePreviewButton = document.querySelector('.remove-preview');
            const form = document.getElementById('upload-form');

            fileInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (!file) return;

                const fileType = file.type;
                const validImageTypes = ['image/jpeg', 'image/png'];
                const validPDFType = 'application/pdf';

                previewContainer.innerHTML = '';

                if (validImageTypes.includes(fileType)) {
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.onload = function() {
                        URL.revokeObjectURL(this.src);
                    }
                    previewContainer.appendChild(img);
                    previewSection.classList.add('active');
                } else if (fileType === validPDFType) {
                    const iframe = document.createElement('iframe');
                    iframe.src = URL.createObjectURL(file);
                    previewContainer.appendChild(iframe);
                    previewSection.classList.add('active');
                } else {
                    alert('Please upload only PDF, JPG, or PNG files.');
                    fileInput.value = '';
                    return;
                }
            });

            removePreviewButton.addEventListener('click', function() {
                previewSection.classList.remove('active');
                previewContainer.innerHTML = '';
                fileInput.value = '';
            });


            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(form);
                const xhr = new XMLHttpRequest();
                xhr.open('POST', '../controller/ver_ver.php', true); 

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        const response = xhr.responseText;
                        if (response === "Certification uploaded successfully!") {
                            alert('File uploaded successfully!');
                        } else {
                            alert('Error uploading file: ' + response);
                        }
                    }
                };
                xhr.send(formData);
            });
        });
    </script>
</body>

</html>