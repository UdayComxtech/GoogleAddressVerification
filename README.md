# Google Address Verification

This project integrates Google Places API for address verification and autofill functionality in a form. Users need to add their own Google API key for the service to function.

## Features
- Address auto-completion using Google Places API
- Auto-fills city, state, and postal code fields based on user input
- Prevents incorrect or incomplete address submissions

## Getting Started

### Prerequisites
- A Google Cloud account
- Google Places API enabled
- A valid Google API key

### Installation
1. Clone the repository:
   ```sh
   git clone https://github.com/yourusername/google-address-verification.git
   cd google-address-verification
   ```

2. Open the `config.js` or relevant configuration file and add your Google API key:
   ```js
   const GOOGLE_API_KEY = "YOUR_GOOGLE_API_KEY_HERE";
   ```

   **Note:** It is recommended to restrict your API key in production for security purposes. However, this project assumes an unrestricted key for initial setup.

3. Install dependencies (if applicable):
   ```sh
   npm install
   ```

4. Start the project:
   ```sh
   npm start
   ```

## Usage
- Enter an address in the input field.
- Google Places API will suggest valid addresses.
- Once selected, city, state, and postal code fields will be auto-filled.

## Google API Key Setup
1. Go to [Google Cloud Console](https://console.cloud.google.com/).
2. Create a new project or select an existing one.
3. Navigate to **APIs & Services > Credentials**.
4. Click **Create Credentials > API Key**.
5. Copy the generated API key and paste it into `config.js`.
6. (Optional) Restrict the API key to prevent unauthorized use.

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Contributions
Contributions are welcome! Please submit a pull request or open an issue.

## Contact
For issues or feature requests, open an issue on [GitHub](https://github.com/UdayComxtech/GoogleAddressVerification/issues).

