const fetch = require('node-fetch');
const dotenv = require('dotenv');

dotenv.config();

// Aircall API credentials
const API_HOSTNAME = 'api.aircall.io';
const API_TOKEN = process.env.API_TOKEN;

// OAuth authentication flow
const getAuthorizationCode = async () => {
  // Step 1: Redirect the user to the authorization endpoint
  const authUrl = `https://${API_HOSTNAME}/oauth/authorize?client_id=${API_TOKEN}`;
  console.log(`Please visit the following URL to authorize the application: ${authUrl}`);

  // Step 2: Retrieve the authorization code from the redirect URI
  const redirectUri = '<YOUR_REDIRECT_URI>';
  const authorizationCode = '<YOUR_AUTHORIZATION_CODE>';

  return authorizationCode;
};

const getAccessToken = async (authorizationCode) => {
  // Step 3: Exchange the authorization code for an access token
  const tokenUrl = `https://${API_HOSTNAME}/oauth/token`;
  const response = await fetch(tokenUrl, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      grant_type: 'authorization_code',
      client_id: API_TOKEN,
      code: authorizationCode,
    }),
  });

  if (!response.ok) {
    throw new Error(`Error retrieving access token: ${response.statusText}`);
  }

  const data = await response.json();

  return data.access_token;
};

const authenticate = async () => {
  try {
    const authorizationCode = await getAuthorizationCode();
    const accessToken = await getAccessToken(authorizationCode);

    console.log(`Access token: ${accessToken}`);
  } catch (error) {
    console.error(`Error authenticating with Aircall API: ${error.message}`);
  }
};

authenticate();
