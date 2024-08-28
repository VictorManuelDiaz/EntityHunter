<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Entity Hunter</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/form-handler.js') }}" defer></script>

    <style>
        body {
            background-color: #000000;
            color: #FFFFFF;
            font-family: 'Montserrat', sans-serif;
        }

        .btn-custom {
            background-color: #FF1493;
            border: none;
            color: #FFFFFF;
        }

        .btn-custom:hover {
            background-color: #00BFFF;
            color: #000000;
        }

        .form-control {
            background-color: #000000;
            border: 2px solid #FF1493;
            color: #FFFFFF;
        }

        .form-control::placeholder {
            color: #FFFFFF;
        }

        h4 {
            color: #00BFFF;
        }
        h5 {
            color: #FFD700;
        }
        .card {
            background-color: #1a1a1a;
            border: 2px solid #FF1493;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header text-center">
                        <h4>Entity Hunter</h4>
                    </div>
                    <div class="card-body">
                        <form id="url-form">
                            <div class="mb-3">
                                <label for="url" class="form-label text-white">Enter URL:</label>
                                <input type="url" class="form-control" id="url" name="url" placeholder="https://example.com" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-custom">Extract Entities</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="results" class="mt-5 text-center">
            <div class="card">
                <div class="card-header">
                    <h5>Top 5 Entities</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-dark">
                        <thead>
                            <tr>
                                <th>Entity</th>
                                <th>Type</th>
                                <th>Salience</th>
                            </tr>
                        </thead>
                        <tbody id="result">
                            <!-- Results will be appended here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>