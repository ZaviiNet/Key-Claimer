# Key-Claimer

Key Claimer is a simple 1 script tool to claim keys from a csv file and log the emails of those who have claimed the keys.

## Installation

1. Download the latest release from the [releases page].
2. Create a csv file with the keys you want to claim making sure that each key is on a new line (You can also use the example csv file provided).
3. Create a csv file named email.csv and leave it blank (You can also use the example csv file provided).
4. Edit the index.php file and make sure that you have the correct path to the keys.csv file and the email.csv file, You may wish to customize The page title and the page heading.
5. Edit the reCaptcha 'SITEKEY_API' otherwise the reCaptcha will not work.
6. Upload the files to your web server.

## Usage

1. Navigate to the index.php file on your web server.
2. Enter the email you want to claim the key with.
3. Press 'Claim Key' it will first check your email is valid and then check if you have already claimed a key. If you have not claimed a key it will then check if there are any keys left to claim. If there are keys left to claim it will then claim the key and add your email to the email.csv file.
4. If you have already claimed a key it will tell you that you have already claimed a key.
5. If there are no keys left to claim it will tell you that there are no keys left to claim.
6. If you have entered an invalid email it will tell you that you have entered an invalid email.

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License

[MIT](https://choosealicense.com/licenses/mit/)

## Disclaimer

1. This tool is not affiliated with any game or company. This tool is for educational purposes only.
2. This tool uses the reCaptcha API from Google.
3. This tool is not responsible for GDPR compliance.

**Warning this tool is not GDPR compliant and you should not use this tool if you are wish to be GDPR compliant as it uses an accessible csv file to store emails and keys. If you wish to be GDPR compliant you should use a database to store the emails and keys.**
