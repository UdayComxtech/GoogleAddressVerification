<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        #registrationForm {
            width: 100%;
            max-width: 400px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        #registrationForm label {
            display: block;
            font-weight: bold;
            margin: 10px 0 5px;
        }

        #registrationForm input,
        #registrationForm textarea,
        #registrationForm select {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            background: #fff;
            transition: border-color 0.3s ease-in-out;
        }

        #registrationForm textarea {
            height: 80px;
            resize: vertical;
        }

        #registrationForm select:disabled,
        #registrationForm input:disabled {
            background: #e9ecef;
            cursor: not-allowed;
        }

        #registrationForm input:focus,
        #registrationForm textarea:focus,
        #registrationForm select:focus {
            border-color: #007bff;
            outline: none;
        }

        #registrationForm button {
            width: 100%;
            padding: 12px;
            background: #23486A;
            color: #fff;
            border: 1px solid transparent;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 15px;
            transition: background 0.3s ease-in-out;
        }

        #registrationForm button:hover {
            background: #fff;
            color: #23486A;
            border: 1px solid #23486A;
        }

    </style>
</head>
<body>
<form id="registrationForm">
    <label>Address:</label>
    <textarea name="address" id="address" required></textarea>

    <label>City:</label>
    <select name="city" id="city">
        <option value="">Select City</option>
    </select>

    <label>State:</label>
    <select name="state" id="state" disabled>
        <option value="">Select State</option>
    </select>

    <label>ZIP Code:</label>
    <input type="text" name="zip" id="zip" disabled>

    <button type="submit">Submit</button>
</form>

<script src="https://maps.googleapis.com/maps/api/js?key=addyourkeyhere&libraries=places"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=addyourkeyhere&libraries=places"></script> -->
<script>
    function initAutocomplete() {
        var addressInput = document.getElementById('address');
        var autocomplete = new google.maps.places.Autocomplete(addressInput, {
            types: ['geocode'],
            componentRestrictions: { country: 'AU' } 
        });

        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                alert("Invalid address. Please enter a valid address.");
                return;
            }

            // Extract address components
            var city = '', state = '', postcode = '';

            place.address_components.forEach(component => {
                if (component.types.includes("locality")) {
                    city = component.long_name;
                }
                if (component.types.includes("administrative_area_level_1")) {
                    state = component.long_name;
                }
                if (component.types.includes("postal_code")) {
                    postcode = component.long_name;
                }
            });

            // Auto-fill form fields
            document.getElementById('city').innerHTML = `<option value="${city}" selected>${city}</option>`;
            document.getElementById('state').innerHTML = `<option value="${state}" selected>${state}</option>`;
            document.getElementById('zip').value = postcode;

            // Highlight the verified address
            addressInput.style.border = "2px solid green";
        });
    }

    google.maps.event.addDomListener(window, 'load', initAutocomplete);
</script>

</body>
</html>
