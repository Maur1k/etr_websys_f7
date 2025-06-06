@extends('layouts.app')

@section('title', 'Add Employee')

@push('styles')
    <style>
        /* Your page-specific styles here */

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .logo-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 30px;
        }

        .logo-container img {
            width: 150px;
            margin-bottom: 15px;
        }

        .logo-container h2 {
            color: #0A28D8;
            font-size: 22px;
            text-align: center;
        }

        .logo-container p {
            color: #999;
            font-size: 14px;
            text-align: center;
        }

        form h2 {
            font-size: 24px;
            color: #0A28D8;
            margin-bottom: 25px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 6px;
            color: #333;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 2px solid #0A28D8;
            border-radius: 8px;
            background: #fff;
            color: #333;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #FFDA27;
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 218, 39, 0.5);
        }

        .form-group input::placeholder {
            color: #aaa;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            background-color: #0A28D8;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            color: #f2f2f2;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-btn:hover {
            background-color: #FFDA27;
            color: #0A28D8;
        }

        #preview {
            max-width: 100%;
            margin-top: 10px;
            border-radius: 8px;
            display: none;
        }
    </style>
@endpush

@section('content')
    <div class="main-content">
        <div class="container">
            <div class="logo-container">
                <img src="/images/psulogo.png" alt="Logo" />
                <h2>Pangasinan State University - Urdaneta City Campus</h2>
                <p>Region's Premier University of Choice</p>
            </div>

            <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <h2>Add Employee Data</h2>

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter full name" />
                    @error('name')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="id_number">ID:</label>
                    <input type="text" name="id_number" value="{{ old('id_number') }}" placeholder="Enter ID number" />
                    @error('id_number')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="college">Choose College:</label>
                    <select name="college">
                        <option value="">Select</option>
                        <option value="College of Computing" {{ old('college') == 'College of Computing' ? 'selected' : '' }}>
                            College of Computing</option>
                        <option value="College of Teacher Education" {{ old('college') == 'College of Teacher Education' ? 'selected' : '' }}>College of Teacher Education</option>
                        <option value="College of Engineering" {{ old('college') == 'College of Engineering' ? 'selected' : '' }}>College of Engineering</option>
                        <option value="College of Architecture" {{ old('college') == 'College of Architecture' ? 'selected' : '' }}>College of Architecture</option>
                    </select>
                    @error('college')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="classification">Choose Class Role:</label>
                    <select name="classification">
                        <option value="">Select</option>
                        <option value="Instructional" {{ old('classification') == 'Instructional' ? 'selected' : '' }}>
                            Instructional</option>
                        <option value="Non-instructional" {{ old('classification') == 'Non-instructional' ? 'selected' : '' }}>Non-instructional</option>
                    </select>
                    @error('classification')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="picture">Select image to upload:</label>
                    <input type="file" name="picture" id="pictureInput" onchange="previewImage(event)" />
                    <img id="preview" alt="Image Preview" />
                    @error('picture')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="login-btn">Save</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Function to preview image when selected
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function () {
                preview.src = reader.result;
                preview.style.display = 'block';
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endpush