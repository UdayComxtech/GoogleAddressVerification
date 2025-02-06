<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZoifwHxyHs-8D6WBlNShrWUya9v7Orak&libraries=places"></script>
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